<?php
namespace backend\models;

use yii\db\ActiveRecord;
class Product extends ActiveRecord
{

    public const CREATE  = 'create';
    public const UPDATE  = 'update';
    public static function tableName()
    {
        return 'products';
    }

    public static function tableLabel()
    {
        return 'Продукты';
    }
}