<?php
namespace frontend\controllers;

use frontend\models\Catalog;
use yii\web\Controller;

class CatalogController extends Controller
{

    public $layout = 'main';
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