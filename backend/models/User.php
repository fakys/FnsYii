<?php
namespace backend\models;

use yii\db\ActiveRecord;
class User extends ActiveRecord
{

    public const CREATE  = 'create';
    public const UPDATE  = 'update';

    public static function tableName()
    {
        return 'users';
    }

    public static function tableLabel()
    {
        return 'Пользователи';
    }


    public function attributeLabels()
    {
        return [
            'name'=>'Логин',
            'email'=>'Email',
            'group_id'=>'Группа',
            'avatar'=>"Аватал",
            'password'=>"Пароль",
            'status'=>"Статус",
            'created_at'=>"Время создания",
            'updated_at'=>"Время обновления"
        ];
    }
    public function rules()
    {
        return [
            [['name', 'email', 'password'], 'required', 'on'=>self::CREATE]
        ];
    }
}