<?php
namespace backend\models;

use yii\db\ActiveRecord;
class Sale extends ActiveRecord
{

    public const CREATE  = 'create';
    public const UPDATE  = 'update';
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
            [['sale'], 'required', 'on'=>self::CREATE],
            ['title', 'string'],
            ['icon', 'image', 'extensions'=>'png, jpg, gif'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'sale'=>'Скидка',
            'title'=>'Название',
            'description'=>'Описание',
            'icon'=>'Изображение'
        ];
    }
}