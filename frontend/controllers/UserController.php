<?php
namespace frontend\controllers;

use common\models\User;
use frontend\components\behaviors\AuthBehavior;
use Yii;
use yii\db\Exception;
use yii\web\Controller;
use common\models\LoginForm;

class UserController extends Controller
{
    public $layout = 'main';

    public function behaviors()
    {
        return [
            'AuthBehavior'=>AuthBehavior::class
        ];
    }
//    public function beforeAction($action)
//    {
//        if(!Yii::$app->user->isGuest){
//            $this->view->params['user'] = Yii::$app->user->identity;
//        }else{
//            $this->view->params['user'] = [];
//        }
//        return parent::beforeAction($action);
//    }

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
        return $this->render('profile');
    }

    public function actionProfileChang()
    {
        $user = $this->view->params['user'];
        $user->scenario = $user::UPDATE;
        if(Yii::$app->request->isPost){
           $user->load(Yii::$app->request->post());
           if($user->save()){
                $this->redirect(['user/profile']);
           }
        }
        return $this->render('profile_change', compact('user'));
    }

    public function actionLogout()
    {
        if(!Yii::$app->user->isGuest){
            Yii::$app->user->logout();
        }
        return $this->redirect(['user/login']);
    }

}