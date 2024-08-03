<?php
namespace frontend\controllers;

use frontend\models\Catalog;
use Yii;
use yii\web\Controller;

class CatalogController extends Controller
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
        $catalogs = Catalog::find()->all();
        $this->view->title = 'Каталоги';
        return $this->render('index', compact('catalogs'));
    }

    public function actionShow($catalog)
    {
        $catalog = Catalog::find()->where(['title'=>$catalog])->one();
        if($catalog){
            $categories = $catalog->getCategories()->all();
            if($categories){
                return $this->render('show', compact('categories'));
            }
        }
        return \Yii::$app->response->setStatusCode(404);

    }
}