<?php
namespace frontend\controllers;

use backend\models\Category;
use yii\web\Controller;

class CategoryController extends Controller
{

    public $layout = 'main';
    public function actionIndex()
    {
        $categories = Category::find()->all();
        return $this->render('index', compact('categories'));
    }
}