<?php
namespace frontend\models;

use frontend\models\Category;
use frontend\models\ProductPhoto;

class Product extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'products';
    }

    public function getPhotos()
    {
        return $this->hasMany(ProductPhoto::class, ['product_id'=>'id']);
    }
    public function getCategories()
    {
        return $this->hasOne(Category::class, ['id'=>'category_id']);
    }
}