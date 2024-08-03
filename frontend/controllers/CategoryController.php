<?php
namespace frontend\controllers;

use frontend\models\Category;
use Yii;
use yii\web\Controller;

class CategoryController extends Controller
{

    public $layout = 'main';

    public function beforeAction($action)
    {
        if(!Yii::$app->user->isGuest){
            $this->view->params['user'] = Yii::$app->user->identity;
        }else{
            $this->view->params['user'] = [];
        }
        return parent::beforeAction($action);
    }

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
            return $this->render('show', compact('products'));
        }
        return \Yii::$app->response->setStatusCode(404);

    }
}