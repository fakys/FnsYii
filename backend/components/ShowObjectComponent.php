<?php
namespace backend\components;

use yii\base\Widget;

class ShowObjectComponent extends Widget
{

    public $model;
    public function __construct($config = [])
    {
        parent::__construct($config);
        $this->model = $config['model'];
    }

    public function run()
    {
        return $this->render("show/show_{$this->model->tableName()}", ['model'=>$this->model]);
    }
}