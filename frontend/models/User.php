<?php
namespace frontend\models;

use Yii;
use yii\base\Exception;
use yii\db\ActiveRecord;

class User extends ActiveRecord implements \yii\web\IdentityInterface
{

    public $password_confirm;
    public $remember_me;
    public const LOGIN = 'login';

    public static function tableName()
    {
        return 'users';
    }

    public function attributeLabels()
    {
        return [
            'name'=>'Логин',
            'password'=>'Пароль',
            'password_confirm'=>'Повторите пароль',
            'remember_me'=>'Запомнить меня'
        ];
    }

    public function rules()
    {
        return[
            [['email','name', 'password', 'password_confirm'], 'required'],
            [['email'], 'email'],
            ['remember_me', 'boolean']
        ];
    }
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    /**
     * @throws Exception
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * @throws Exception
     */
    public function generateAccessToken()
    {
        $this->access_token = Yii::$app->security->generateRandomString();
    }

    public function beforeSave($insert)
    {
         if ($insert){
             $this->generateAccessToken();
             $this->generateAuthKey();
         }else{

         }
         return true;
    }
    public function getUserByEmail()
    {
        return self::findOne(['email'=>$this->email]);
    }
    public function hasPassword()
    {
        if($this->password){
            $this->password = Yii::$app->security->generatePasswordHash($this->password);
        }
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::LOGIN] = ['email', 'remember_me'];
        return $scenarios;
    }
}