<?php
namespace backend\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

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