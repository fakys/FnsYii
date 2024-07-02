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

    public function getProduct()
    {
        return $this->hasOne(Product::class, ['id'=>'product_id'])->one();
    }

    public function getSale()
    {
        return $this->hasOne(Sale::class, ['id'=>'sale_id'])->one();
    }
}