<?php
namespace backend\models;

use yii\db\ActiveRecord;
class ProductSale extends ActiveRecord
{
    public static function tableName()
    {
        return 'products_sales';
    }
}