<?php
namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\web\UploadedFile;

class Category extends ActiveRecord
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
        return 'categories';
    }

    public static function tableLabel()
    {
        return 'Категории';
    }

    public function rules()
    {
        return [
            [['title'], 'required', 'on'=>[self::CREATE, self::UPDATE]],
            ['title', 'unique'],
            ['catalog_id', 'integer'],
            ['icon', 'image', 'extensions'=>'png, jpg, gif'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'title'=>'Название',
            'icon'=>'Изображение',
            'catalog_id'=>'Каталог'
        ];
    }

    private function add_icon()
    {
        $icon = UploadedFile::getInstance($this ,'icon');
        if($icon){
            $this->icon = "storage/categories/".Yii::$app->security->generateRandomString().".{$icon->getExtension()}";
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
}