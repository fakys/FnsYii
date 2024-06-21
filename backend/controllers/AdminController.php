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
        }else{
            return Yii::$app->response->setStatusCode(404);
        }
        $this->view->title = $model::tableLabel();
        return $this->render('show_model', compact('objects', 'columns', 'model'));
    }

    public function actionCreate($table)
    {
        if($this->show_model($table)){
            $model = $this->show_model($table);
            $this->view->title = "Создание объекта в '{$this->show_model($table)::tableLabel()}'";
            $model = new $model();
            $model->scenario = $model::CREATE;
            if(Yii::$app->request->method == 'POST'){

            }
        }else{
            return Yii::$app->response->setStatusCode(404);
        }
        return $this->render('create', compact('model'));
    }
}