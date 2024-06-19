<?php

namespace backend\components;

use backend\components\behaviors\DataPanelBehavior;
use yii\base\Widget;

class SidebarComponent extends Widget
{
    public function behaviors()
    {
        return [
            [
                'class'=>DataPanelBehavior::class
            ]
        ];
    }

    public function run()
    {

        return $this->render('sidebar', ['models'=>$this->get_models()]);
    }
}