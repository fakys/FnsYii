<?php
namespace backend\models;

use Yii;
use yii\base\Exception;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\web\UploadedFile;

class User extends ActiveRecord
{
    public $password_confirm;
    public $new_password;
    public $auth_key;
    public $access_token;

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
            'new_password'=>'Новый пароль',
            'status'=>"Статус",
            'created_at'=>"Время создания",
            'updated_at'=>"Время обновления",
            'password_confirm'=>"Повторите пароль"
        ];
    }

    public function hasPassword()
    {
        if($this->password){
            $this->password = Yii::$app->security->generatePasswordHash($this->password);
        }

    }
    public function add_status()
    {
        if(!$this->status){
            $this->status = false;
        }
    }
    private function add_user_ava()
    {
        $file = UploadedFile::getInstance($this, 'avatar');
        $ava_name = Yii::$app->security->generateRandomString();
        if($file){
            $this->avatar = "storage/users_avatars/{$ava_name}.{$file->getExtension()}";
            $file->saveAs("@frontend/web/{$this->avatar}");
        }else{
            $this->avatar = "image/user/default_user_ava.png";
        }
    }

    public function update_user_ava()
    {
        $file = UploadedFile::getInstance($this, 'avatar');
        $ava_name = Yii::$app->security->generateRandomString();
        if($file){
            $this->avatar = "storage/users_avatars/{$ava_name}.{$file->getExtension()}";
            $file->saveAs("@frontend/web/{$this->avatar}");
        }else{
            unset($this->avatar);
        }
    }
    public function update_password()
    {
        if($this->new_password){
            $this->password = $this->new_password;
        }
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
        parent::beforeSave($insert);
        if($insert){
            $this->generateAccessToken();
            $this->generateAuthKey();
            $this->add_user_ava();
        }else{
            $this->update_user_ava();
            $this->update_password();
        }
        $this->hasPassword();
        return true;
    }
    public function rules()
    {
        return [
            [['name', 'email', 'password'], 'required', 'on'=>self::CREATE],
            [['name', 'email'], 'required', 'on'=>self::UPDATE],
            [['new_password', 'password', 'password_confirm','name'], 'string'],
            ['email', 'email'],
            ['avatar', 'image', 'extensions'=>'png, jpg, gif'],
            ['status', 'boolean'],
            ['group_id', 'integer'],
            ['new_password', 'compare', 'compareAttribute'=>'password_confirm', 'on'=>self::UPDATE],
            ['password', 'compare', 'compareAttribute'=>'password_confirm', 'on'=>self::CREATE],
            ['created_at', 'datetime', 'format'=>'php:Y-m-d\TH:i:s']
        ];
    }
    public function getGroup()
    {
        return $this->hasOne(UserGroup::class, ['id'=>'group_id']);
    }

}