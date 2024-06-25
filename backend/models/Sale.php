<?php
namespace backend\models;

use Yii;
use yii\base\Exception;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\web\UploadedFile;

class Sale extends ActiveRecord
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
        return 'sales';
    }

    public static function tableLabel()
    {
        return 'Акции';
    }

    public function rules()
    {
        return [
            ['sale', 'required', 'on'=>[self::CREATE, self::UPDATE]],
            ['sale', 'required'],
            ['title', 'string'],
            ['description', 'string', 'length'=>[10, 4000]],
            ['icon', 'image', 'extensions'=>'png, jpg, gif'],
            ['created_at', 'datetime', 'format'=>'php:Y-m-d\TH:i:s']
        ];
    }

    public function attributeLabels()
    {
        return [
            'sale'=>'Скидка',
            'title'=>'Название',
            'description'=>'Описание',
            'icon'=>'Изображение',
            'created_at'=>"Время создания",
        ];
    }


    private function add_icon()
    {
        $file = UploadedFile::getInstance($this, 'icon');
        $file_name = Yii::$app->security->generateRandomString();
        if($file){
            $this->icon = "storage/sales/{$file_name}.{$file->getExtension()}";
            $file->saveAs("@frontend/web/{$this->icon}");
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
}