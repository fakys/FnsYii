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
            'status'=>"Статус",
            'created_at'=>"Время создания",
            'updated_at'=>"Время обновления",
            'password_confirm'=>"Повторите пароль"
        ];
    }

    /**
     * @throws Exception
     */
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

    /**
     * @throws Exception
     */
    public function beforeSave($insert)
    {
        parent::beforeSave($insert);
        if($insert){
            $this->add_user_ava();
            $this->hasPassword();
        }else{

        }
        return true;
    }
    public function rules()
    {
        return [
            [['name', 'email', 'password'], 'required', 'on'=>self::CREATE],
            ['email', 'email'],
            ['avatar', 'image', 'extensions'=>'png, jpg, gif'],
            ['status', 'boolean'],
            ['group_id', 'integer'],
            ['password', 'compare', 'compareAttribute'=>'password_confirm']
        ];
    }
}