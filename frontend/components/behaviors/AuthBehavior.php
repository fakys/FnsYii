<?php
namespace frontend\components\behaviors;

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

        return true;
    }
}