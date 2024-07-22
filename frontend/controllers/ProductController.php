<?php
namespace frontend\controllers;

use frontend\models\Product;
use yii\web\Controller;

class ProductController extends Controller
{


    public function actionShow($id)
    {
        $product = Product::findOne($id);
        if($product){
            return $this->render('show', compact('product'));
        }
    }
}