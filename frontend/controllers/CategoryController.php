<?php
namespace frontend\controllers;

use frontend\models\Category;
use yii\web\Controller;

class CategoryController extends Controller
{

    public $layout = 'main';
    public function actionIndex()
    {
        $categories = Category::find()->all();
        $this->view->title = 'Категории';
        return $this->render('index', compact('categories'));
    }

    public function actionShow($category)
    {
        $category= Category::find()->where(['title'=>$category])->one();
        if($category){
            $products = $category->getProducts()->all();
            if($products){
                return $this->render('show', compact('products'));
            }
        }
        return \Yii::$app->response->setStatusCode(404);

    }
}