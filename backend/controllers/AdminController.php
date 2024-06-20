<?php
namespace backend\controllers;

use backend\components\behaviors\DataPanelBehavior;
use backend\models\User;
use Yii;
use yii\web\Controller;
use function Psy\debug;

class AdminController extends Controller{

    public $layout = 'main';
   public function behaviors(): array
    {
        return [
           [
                'class'=>DataPanelBehavior::class
            ]
        ];
    }

    public function actionIndex()
    {
        $this->view->title = 'Админ панель';
        return $this->render('index', ['models'=>$this->get_models()]);
    }

    public function actionShowModel($table)
    {
        if($this->show_model($table)){
            $model = $this->show_model($table);
            $columns = array_slice($model::getTableSchema()->getColumnNames(), 0, 3);
            $objects = $model::find()->all();
        }
        $this->view->title = $model::tableLabel();
        return $this->render('show_model', compact('objects', 'columns', 'model'));
    }
}