<?php
namespace backend\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

class ProductSale extends ActiveRecord
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
    public static function tableName()
    {
        return 'products_sales';
    }
}