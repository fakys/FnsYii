<?php
namespace backend\components\behaviors;

use yii\base\Behavior;
class DataPanelBehavior extends Behavior
{
    protected $data = [

    ];

    public function show_model($table)
    {

    }
    public function get_models()
    {
        return $this->data;
    }
}
