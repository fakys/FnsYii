<?php
namespace backend\models;

use yii\db\ActiveRecord;
class Category extends ActiveRecord
{

    public const CREATE  = 'create';
    public const UPDATE  = 'update';
    public static function tableName()
    {
        return 'categories';
    }

    public static function tableLabel()
    {
        return 'Категории';
    }

    public function rules()
    {
        return [
            [['title'], 'required', 'on'=>self::CREATE],
            ['catalog_id', 'integer'],
            ['icon', 'image', 'extensions'=>'png, jpg, gif'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'title'=>'Название',
            'icon'=>'Изображение',
            'catalog_id'=>'Каталог'
        ];
    }
}