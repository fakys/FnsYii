<?php
namespace frontend\components;
use yii\base\Widget;

class NullPageComponent extends Widget
{
    public function run()
    {
        return $this->render('null-page');
    }
}