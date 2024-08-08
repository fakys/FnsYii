<?php
namespace frontend\components\behaviors;

use Yii;
use yii\base\Behavior;
use yii\base\Controller;


class AuthBehavior extends Behavior
{
    public $auth_actions = [];
    public $guest_action = [];
    public function events()
    {
        return [
            Controller::EVENT_BEFORE_ACTION => 'beforeAction',
        ];
    }
    public function beforeAction($action)
    {
        if(Yii::$app->user->isGuest && in_array($action->action->id, $this->auth_actions)){
           Yii::$app->response->redirect(['user/login']);
        }elseif (!Yii::$app->user->isGuest && in_array($action->action->id, $this->guest_action)){
            Yii::$app->response->redirect(['user/profile']);
        }
        return true;
    }
}