<?php
namespace backend\models;

use Yii;
use yii\base\Exception;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;

class Sale extends ActiveRecord
{

    public function behaviors()
    {
        return[
            [
                'class'=>TimestampBehavior::class,
                'value' => new Expression('NOW()')
            ]
        ];
    }

    public const CREATE  = 'create';
    public const UPDATE  = 'update';
    public $products = [];
    public static function tableName()
    {
        return 'sales';
    }

    public static function tableLabel()
    {
        return 'Акции';
    }

    public function rules()
    {
        return [
            ['sale', 'required', 'on'=>[self::CREATE, self::UPDATE]],
            ['sale', 'required'],
            ['title', 'string'],
            ['description', 'string', 'length'=>[10, 4000]],
            ['icon', 'image', 'extensions'=>'png, jpg, gif'],
            ['products', 'safe'],
            ['created_at', 'datetime', 'format'=>'php:Y-m-d\TH:i:s']
        ];
    }

    public function attributeLabels()
    {
        return [
            'sale'=>'Скидка',
            'title'=>'Название',
            'description'=>'Описание',
            'icon'=>'Изображение',
            'created_at'=>"Время создания",
        ];
    }


    private function add_icon()
    {
        $file = UploadedFile::getInstance($this, 'icon');
        $file_name = Yii::$app->security->generateRandomString();
        if($file){
            $this->icon = "storage/sales/{$file_name}.{$file->getExtension()}";
            $file->saveAs("@frontend/web/{$this->icon}");
        }else{
            unset($this->icon);
        }
    }

    public function add_products()
    {
        $sale_product_id = ArrayHelper::getColumn($this->getProducts()->asArray()->all(), 'product_id');
        if($this->products){
            foreach ($this->products as $val){
                if(!in_array($val, $sale_product_id)){
                    (new ProductSale(['sale_id'=>$this->id, 'product_id'=>$val]))->save();
                }
            }
        }
    }
    public function delete_sale()
    {
        $sale_product_id = ArrayHelper::getColumn($this->getProducts()->asArray()->all(), 'product_id');
        if(!is_array($this->products)){
            $this->products = [];
        }
        foreach ($sale_product_id as $val){
            if(!in_array($val, $this->products)){
                $sale_product = ProductSale::find()->where(['product_id'=> $val,'sale_id'=>$this->id])->one();
                if($sale_product){
                    $sale_product->delete();
                }
            }
        }
    }


    public function beforeSave($insert)
    {
        parent::beforeSave($insert);
        if(!$insert){
            $this->add_products();
            $this->delete_sale();
        }
        $this->add_icon();

        return true;
    }

    public function getProducts()
    {
        return $this->hasMany(ProductSale::class, ['sale_id'=>'id']);
    }
}