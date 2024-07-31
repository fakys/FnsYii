<?php
namespace backend\models;

use common\models\User;
use Yii;
use yii\base\Exception;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\web\UploadedFile;
use function Psy\debug;

class UserGroup extends ActiveRecord
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
        return 'user_groups';
    }

    public static function tableLabel()
    {
        return 'Группы';
    }

    public function rules()
    {
        return [
            [['title'], 'required', 'on'=>[self::CREATE, self::UPDATE]],
            ['title', 'unique'],
            ['icon', 'image', 'extensions'=>'png, jpg, gif'],
            ['created_at', 'datetime', 'format'=>'php:Y-m-d\TH:i:s']
        ];
    }

    public function attributeLabels()
    {
        return [
            'title'=>'Название',
            'icon'=>'Изображение',
            'created_at'=>"Время создания"
        ];
    }

    /**
     * @throws Exception
     */
    private function add_icon()
    {
        $icon = UploadedFile::getInstance($this ,'icon');
        if($icon){
            $this->icon = "storage/user_groups/".Yii::$app->security->generateRandomString().".{$icon->getExtension()}";
            $icon->saveAs("@frontend/web/{$this->icon}");
        }else{
            unset($this->icon);
        }
    }

    public function beforeSave($insert)
    {
        parent::beforeSave($insert);
        $this->add_icon();
        return true;
    }


    public function getUsers()
    {
        return $this->hasMany(User::class, ['group_id'=>'id']);
    }
}