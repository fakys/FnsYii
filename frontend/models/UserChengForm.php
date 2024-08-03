<?php
namespace frontend\models;

use yii\base\Model;

class UserChengForm extends Model
{
    public $name;
    public $email;
    public $avatar;
    public $password;
    public $password_confirm;

    public function rules()
    {
        return [
            [['name', 'email'], 'required'],
            [['new_password', 'password', 'password_confirm','name'], 'string'],
            ['email', 'email'],
            ['avatar', 'image', 'extensions'=>'png, jpg, gif'],
            ['new_password', 'compare', 'compareAttribute'=>'password_confirm'],
            ['password', 'compare', 'compareAttribute'=>'password_confirm'],
        ];
    }

}