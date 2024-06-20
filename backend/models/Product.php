<?php
namespace backend\models;

use yii\db\ActiveRecord;
class Product extends ActiveRecord
{
    public static function tableName()
    {
        return 'products';
    }

    public static function tableLabel()
    {
        return 'Продукты';
    }
}