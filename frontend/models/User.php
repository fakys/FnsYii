<?php
namespace frontend\models;

use yii\db\ActiveRecord;

class User extends ActiveRecord
{

    public $password_confirm;
    public static function tableName()
    {
        return 'users';
    }

    public function attributeLabels()
    {
        return [
            'name'=>'Логин',
            'password'=>'Пароль',
            'password_confirm'=>'Повторите пароль'
        ];
    }
}