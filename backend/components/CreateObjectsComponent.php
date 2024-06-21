<?php
namespace backend\components;

use yii\base\Widget;

class CreateObjectsComponent extends Widget
{
    protected $model;

    public function __construct($config = [])
    {
        parent::__construct($config);
        $this->model = isset($config['model'])? $config['model']: null;
    }

    public function run()
    {
        if($this->model){

        }
        return 23123;
    }

}