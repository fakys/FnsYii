<?php
namespace frontend\controllers;

use frontend\models\Product;
use Yii;
use yii\web\Controller;

class ProductController extends Controller
{

    public function beforeAction($action)
    {
        if(!Yii::$app->user->isGuest){
            $this->view->params['user'] = Yii::$app->user->identity;
        }else{
            $this->view->params['user'] = [];
        }
        return parent::beforeAction($action);
    }
    public function actionShow($id)
    {
        $product = Product::findOne($id);
        if($product){
            return $this->render('show', compact('product'));
        }
    }
}