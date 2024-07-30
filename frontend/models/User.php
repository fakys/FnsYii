<?php
namespace frontend\models;

use yii\db\ActiveRecord;

class User extends ActiveRecord implements \yii\web\IdentityInterface
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

    public function rules()
    {
        return[
            [['email','name', 'password', 'password_confirm'], 'required'],
            [['email'], 'email']
        ];
    }
    public static function findIdentity($id)
    {
        // TODO: Implement findIdentity() method.
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
    }

    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }
}