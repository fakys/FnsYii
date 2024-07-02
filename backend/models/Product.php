<?php
namespace backend\models;


use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;

class Product extends ActiveRecord
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
    public $photos=[];
    public $deleted_photos = [];
    public $sales = [];

    public const CREATE  = 'create';
    public const UPDATE  = 'update';

    public static function tableName()
    {
        return 'products';
    }

    public function rules()
    {
        return [
            [['title', 'description', 'price'], 'required', 'on'=>[self::CREATE,self::UPDATE]],
            [['title', 'description', 'price'], 'string'],
            [['main_photo', 'photos'], 'image', 'extensions'=>'png, jpg, gif'],
            [['category_id'], 'number'],
            ['created_at', 'datetime', 'format'=>'php:Y-m-d\TH:i:s', 'on'=>[self::UPDATE]],
            [['deleted_photos', 'sales', 'created_at'], 'safe']
        ];
    }
    public static function tableLabel()
    {
        return 'Продукты';
    }

    public function attributeLabels()
    {
        return [
            'title'=>'Название',
            'description'=>'Описание',
            'price'=>'Цена',
            'main_photo'=>'Главное фото',
            'photos'=>'Фотографии',
            'category_id'=>'Категории',
            'created_at'=>"Время создания",
            'deleted_photos'=>'Удалить фотографию',
            'sales'=>'Акции'
        ];
    }
    public function add_main_photo()
    {
        $file = UploadedFile::getInstance($this,'main_photo');
        $file_name = \Yii::$app->security->generateRandomString(20);
        if($file){
            $this->main_photo = "storage/products_main_photo/{$file_name}.{$file->getExtension()}";
            $file->saveAs("@frontend/web/{$this->main_photo}");
        }else{
            unset($this->main_photo);
        }
    }
    public function add_photos()
    {
        $files = UploadedFile::getInstances($this,'photos');
        if($files){
            foreach ($files as $file){
                $file_name = \Yii::$app->security->generateRandomString(20);
                $file_path = "storage/products_photos/{$file_name}.{$file->getExtension()}";
                $file->saveAs("@frontend/web/$file_path");
                (new ProductPhoto(['photo'=>$file_path, 'product_id'=>$this->id]))->save();
            }
        }
    }

    public function deleted_photos()
    {
        foreach ($this->deleted_photos as $id=>$val) {
            if($val){
                $photo = ProductPhoto::findOne($id);
                if($photo){
                    $photo->delete();
                }
            }
        }
    }
    public function add_sales()
    {
        $sale_product_id = ArrayHelper::getColumn($this->getSales()->asArray()->all(), 'sale_id');
        if($this->sales){
            foreach ($this->sales as $val){
                 if(!in_array($val, $sale_product_id)){
                     (new ProductSale(['sale_id'=>$val, 'product_id'=>$this->id]))->save();
                 }
            }
        }
    }
    public function delete_sale()
    {
        $sale_product_id = ArrayHelper::getColumn($this->getSales()->asArray()->all(), 'sale_id');
        if(!is_array($this->sales)){
            $this->sales = [];
        }
        foreach ($sale_product_id as $val){
            if(!in_array($val, $this->sales)){
                $product = ProductSale::find()->where(['product_id'=>$this->id, 'sale_id'=>$val])->one();
                if($product){
                    $product->delete();
                }
            }
        }
    }
    public function beforeSave($insert)
    {
        parent::beforeSave($insert);
        if(!$insert){
            $this->deleted_photos();
            $this->add_photos();
            $this->add_sales();
            $this->delete_sale();
        }
        $this->deleted_photos();
        $this->add_main_photo();
        return true;
    }
    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        if($insert){
            $this->add_photos();
        }else{

        }
        return true;
    }

    public function getPhotos()
    {
        return $this->hasMany(ProductPhoto::class, ['product_id'=>'id']);
    }
    public function getSales()
    {
        return $this->hasMany(ProductSale::class, ['product_id'=>'id']);
    }
    public function getCategories()
    {
        return $this->hasOne(Category::class, ['id'=>'category_id']);
    }
}