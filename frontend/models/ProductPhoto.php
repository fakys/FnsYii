<?php
namespace frontend\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

class ProductPhoto extends ActiveRecord
{
    public function rules()
    {
        return [
            ['photo', 'image'],
            ['product_id', 'number']
        ];
    }
    public static function tableName()
    {
        return 'product_photos';
    }

}