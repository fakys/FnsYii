<?php
namespace backend\controllers;

use backend\components\behaviors\DataPanelBehavior;
use yii\web\Controller;
use function Psy\debug;

class AdminController extends Controller{

    public $layout = 'main';
   public function behaviors(): array
    {
        return [
           [
                'class'=>DataPanelBehavior::class
            ]
        ];
    }

    public function actionIndex()
    {

        return $this->render('index');
    }
}