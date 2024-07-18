<?php
namespace frontend\models;

use backend\models\Category;

class Catalog extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'catalogs';
    }

    public function getCategories()
    {
        return $this->hasMany(Category::class, ['catalog_id'=>'id']);
    }
}