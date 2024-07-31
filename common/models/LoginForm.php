<?php

namespace common\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $email;
    public $password;
    public $rememberMe = true;

    private $_user;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'password'], 'required'],
            ['rememberMe', 'boolean'],
            ['password', 'validatePassword'],
        ];
    }
    public function attributeLabels()
    {
        return[
            'password'=>'Пароль'
        ];
    }
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Не верный пароль или email');
            }
        }
    }

    public function login()
    {
        if ($this->validate() && $this->getUser()) {

            return Yii::$app->user->login($this->_user, $this->rememberMe ? 30 * 24 * 60 * 60:0);
        }
        return false;
    }

    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findOne(['email'=>$this->email]);
        }
        return $this->_user;
    }
}
