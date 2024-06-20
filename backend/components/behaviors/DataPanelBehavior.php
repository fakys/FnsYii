<?php
namespace backend\components\behaviors;

use backend\models\Catalog;
use backend\models\Category;
use backend\models\Product;
use backend\models\Sale;
use backend\models\User;
use backend\models\UserGroup;
use yii\base\Behavior;
class DataPanelBehavior extends Behavior
{
    protected $data = [
        Catalog::class,
        Category::class,
        Product::class,
        Sale::class,
        User::class,
        UserGroup::class
    ];

    public function show_model($table)
    {
        foreach ($this->data as $val){
            if($val::tableName() == $table){
                return $val;
            }
        }
        return null;
    }
    public function get_models()
    {
        return $this->data;
    }
}
