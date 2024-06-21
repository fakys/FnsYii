<?php
namespace backend\models;

use yii\db\ActiveRecord;
class Catalog extends ActiveRecord
{

    public const CREATE  = 'create';
    public const UPDATE  = 'update';
    public static function tableName()
    {
        return 'catalogs';
    }

    public static function tableLabel()
    {
        return 'Каталоги';
    }

    public function rules()
    {
        return [
            [['title'], 'required', 'on'=>self::CREATE],
            ['icon', 'image', 'extensions'=>'png, jpg, gif'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'title'=>'Название',
            'icon'=>'Изображение'
        ];
    }
}