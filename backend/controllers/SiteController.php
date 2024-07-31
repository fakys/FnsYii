<?php

namespace backend\controllers;

use common\models\LoginForm;
use common\models\User;
use Yii;
use yii\web\Controller;

/**
 * Site controller
 */
class SiteController extends Controller
{
    public $layout= 'guest';
    public function actions()
    {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
            ],
        ];
    }
    public function actionLogin()
    {
        $model = new LoginForm();
        if(Yii::$app->request->isPost){
            $model->load(Yii::$app->request->post());
            if($model->login()){
                $this->redirect(['admin/']);
            }
        }
        return $this->render('login', compact('model'));
    }

}
