<?php
namespace frontend\controllers;

use frontend\models\User;
use Yii;
use yii\db\Exception;
use yii\web\Controller;

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
        $model = new User();
        $model->scenario = User::LOGIN;
        if (Yii::$app->request->isPost){
            $model->load(Yii::$app->request->post());
            $password = Yii::$app->request->post('User')['password'];
            $login_user = $model->getUserByEmail();
            if($login_user){
                if(Yii::$app->security->validatePassword($password, $login_user->password)){
                    if($model->remember_me){
                        Yii::$app->user->login($login_user, 30 * 24 * 60 * 60);
                    }else{
                        Yii::$app->user->login($login_user);
                    }
                    return $this->redirect(['user/profile']);
                }
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

}