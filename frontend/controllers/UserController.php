<?php
namespace frontend\controllers;

use common\models\User;
use frontend\models\UserChengForm;
use Yii;
use yii\db\Exception;
use yii\web\Controller;
use common\models\LoginForm;

class UserController extends Controller
{
    public $layout = 'main';


    private function isAuth($login=false)
    {
        if($login){
            if (!Yii::$app->user->isGuest){
                return $this->redirect(['user/profile']);
            }
        }else{
            if (Yii::$app->user->isGuest){
                return $this->redirect(['user/login']);
            }
        }
    }


    public function actionLogin()
    {
        $this->isAuth(true);
        $model = new LoginForm();
        if (Yii::$app->request->isPost){
            $model->load(Yii::$app->request->post());
            if($model->login()){
                $this->redirect(['user/profile']);
            }
        }
        return $this->render('login', compact('model'));
    }

    /**
     * @throws Exception
     */
    public function actionRegister()
    {
        $this->isAuth(true);
        $user = new User();
        if(Yii::$app->request->isPost){
            $user->load(Yii::$app->request->post());
            if($user->save()){
                Yii::$app->user->login($user);
                return Yii::$app->response->redirect(['/']);
            }
        }
        return $this->render('register', compact('user'));
    }
    public function actionProfile()
    {
        $this->isAuth();
        $user = Yii::$app->user->identity;
        return $this->render('profile', compact('user'));
    }

    public function actionProfileChang()
    {
        $this->isAuth();
        $user = Yii::$app->user->identity;
        $user->scenario = $user::UPDATE;
        if(Yii::$app->request->isPost){
           $user->load(Yii::$app->request->post());
           if($user->save()){
                $this->redirect(['user/profile']);
           }
        }
        return $this->render('profile_change', compact('user'));
    }

}