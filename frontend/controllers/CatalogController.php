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
        return $this->render('index', compact('catalogs'));
    }
}