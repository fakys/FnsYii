<?php

namespace frontend\controllers;

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

        return $this->render('index');
    }
}
