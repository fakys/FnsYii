<?php
namespace backend\models;

use yii\db\ActiveRecord;
class Product extends ActiveRecord
{
    public $photos=[];

    public const CREATE  = 'create';
    public const UPDATE  = 'update';

    public static function tableName()
    {
        return 'products';
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
}