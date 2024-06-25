<?php
namespace backend\components;

use yii\base\Widget;

class UpdateObjectsComponent extends Widget
{
    public $model;

    public function __construct($config = [])
    {
        parent::__construct($config);
        $this->model = isset($config['model'])? $config['model']: null;
    }


    public static function adapt_drop_list($data, string $field)
    {
        $arr = [];
        foreach ($data as $key=>$val){
            $arr[$val['id']] = $val[$field];
        }
        return $arr;
    }
    public function run()
    {
        if($this->model){
            $view = "update/update_{$this->model::tableName()}";
        }
        return $this->render($view, ['model'=>$this->model]);
    }

}