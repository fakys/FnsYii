<?php
use backend\components\ShowObjectComponent;
use yii\helpers\Url;

?>
<?=ShowObjectComponent::widget(['model'=>$model])?>
<div class="mt-4">
    <a href="<?=Url::to(['admin/delete', 'table'=>$model::tableName(), 'id'=>$model->id])?>" class="btn btn-danger">Удалить</a>
    <a href="<?=Url::to(['admin/update', 'table'=>$model::tableName(), 'id'=>$model->id])?>" class="btn btn-success">Изменить</a>
</div>