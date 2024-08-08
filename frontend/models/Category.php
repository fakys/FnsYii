<?php
namespace frontend\models;
use frontend\models\Product;

class Category extends \yii\db\ActiveRecord
{


    public static function tableName()
    {
        return 'categories';
    }

    public function getProducts()
    {
        return $this->hasMany(Product::class, ['category_id'=>'id']);
    }

}