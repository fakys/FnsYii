<?php
namespace frontend\controllers;

use frontend\models\User;
use yii\web\Controller;

class UserController extends Controller
{
    public $layout = 'main';
    public function actionLogin()
    {
        $user = new User();
        return $this->render('login', compact('user'));
    }

    public function actionRegister()
    {

    }

}