<?php
namespace backend\models;

use yii\db\ActiveRecord;
class UserGroup extends ActiveRecord
{
    public const CREATE  = 'create';
    public const UPDATE  = 'update';

    public static function tableName()
    {
        return 'user_groups';
    }

    public static function tableLabel()
    {
        return 'Группы';
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