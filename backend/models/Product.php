<?php
namespace backend\models;


use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
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

    public const CREATE  = 'create';
    public const UPDATE  = 'update';

    public static function tableName()
    {
        return 'products';
    }

    public function rules()
    {
        return [
            [['title', 'description', 'price'], 'required', 'on'=>'create'],
            [['main_photo', 'photos'], 'image', 'extensions'=>'png, jpg, gif'],
            ['category_id', 'number']
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
            'category_id'=>'Категории'
        ];
    }
    public function add_main_photo()
    {
        $file = UploadedFile::getInstance($this,'main_photo');
        $file_name = \Yii::$app->security->generateRandomString(20);
        if($file){
            $this->main_photo = "storage/products_main_photo/{$file_name}.{$file->getExtension()}";
            $file->saveAs("@frontend/web/{$this->main_photo}");
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

    public function beforeSave($insert)
    {
        parent::beforeSave($insert);
        if($insert){
            $this->add_main_photo();
        }else{

        }
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
}