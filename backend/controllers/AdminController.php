<?php
namespace backend\controllers;

use backend\components\behaviors\DataPanelBehavior;
use backend\models\User;
use Yii;
use yii\base\InvalidRouteException;
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
            $objects = $model::find()->asArray()->all();
        }else{
            return Yii::$app->response->setStatusCode(404);
        }
        $this->view->title = $model::tableLabel();
        return $this->render('show_model', compact('objects', 'columns', 'model'));
    }

    public function actionDelete($table, $id)
    {
        $model = $this->show_model($table);
        if($model){
            $obj = $model::findOne($id);
            if($obj){
                $obj->delete();
            }
            return Yii::$app->response->redirect(['admin/show-model', 'table'=>$table]);
        }
        return Yii::$app->response->setStatusCode(404);
    }

    public function actionCreate($table)
    {
        if($this->show_model($table)){
            $model = $this->show_model($table);
            $this->view->title = "Создание объекта в '{$this->show_model($table)::tableLabel()}'";
            $model = new $model();
            $model->scenario = $model::CREATE;
            if(Yii::$app->request->method == 'POST'){
                $model->load(Yii::$app->request->post());
                if($model->save()){
                    return  Yii::$app->response->redirect(['admin/show-model', 'table'=>$model::tableName()]);
                }
            }
        }else{
            return Yii::$app->response->setStatusCode(404);
        }
        return $this->render('create', compact('model'));
    }

    public function actionUpdate($table, $id)
    {
       $model = $this->show_model($table);
       if($model){
           $obj = $model::findOne($id);
           if (Yii::$app->request->isPost){
               $obj->load(Yii::$app->request->post());
               $obj->scenario = $obj::UPDATE;
               if($obj->save()){
                   return Yii::$app->response->redirect(['admin/update', 'table'=>$table, 'id'=>$id]);
               }
           }
       }else{
           return Yii::$app->response->setStatusCode(404);
       }
       return $this->render('update', compact('obj'));
    }

    public function actionShowObject($table, $id)
    {
        if($this->show_model($table)){
            $model = $this->show_model($table)::findOne($id);
        }else{
            Yii::$app->response->setStatusCode(404);
        }
        return $this->render('show_object', compact('model'));
    }
}