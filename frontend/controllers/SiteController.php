<?php

namespace frontend\controllers;

use frontend\models\Catalog;
use frontend\models\Category;
use frontend\models\Product;
use Yii;
use yii\web\Controller;
/**
 * Site controller
 */
class SiteController extends Controller
{
    public $layout = 'main';
    public function actionIndex()
    {
        $catalogs = Catalog::find()->all();
        $categories = Category::find()->all();
        $products = Product::find()->all();

        return $this->render('index', compact('catalogs', 'categories', 'products'));
    }
}
