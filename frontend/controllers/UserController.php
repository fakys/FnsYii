<?php
namespace frontend\controllers;

use frontend\models\User;
use Yii;
use yii\db\Exception;
use yii\web\Controller;

class UserController extends Controller
{
    public $layout = 'main';
    public function actionLogin()
    {
        $user = new User();
        return $this->render('login', compact('user'));
    }

    /**
     * @throws Exception
     */
    public function actionRegister()
    {
        $user = new User();
        dd(Yii::$app->user->isGuest);
        if(Yii::$app->request->isPost){
            $user->load(Yii::$app->request->post());
            if($user->save()){
                Yii::$app->user->login($user);
                return Yii::$app->response->redirect(['/']);
            }
        }
        return $this->render('register', compact('user'));
    }

}