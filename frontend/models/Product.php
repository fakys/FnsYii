<?php
namespace frontend\models;

class Product extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'products';
    }
}