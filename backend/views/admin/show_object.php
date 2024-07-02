<?php
use backend\components\ShowObjectComponent;
use yii\helpers\Url;

/**
 * @var \yii\db\ActiveRecord $model
 */

?>
<?=ShowObjectComponent::widget(['model'=>$model])?>
<div class="delete-panel-container delete-panel-<?=$model->id?>">
    <div class="delete-panel">
        <div class="head-delete-panel">
            <div class="logo-delete-panel">FNS</div>
            <div class="ml-auto close-delete-panel" data-id="<?=$model->id?>"><i class="fa fa-times" aria-hidden="true"></i></div>
        </div>
        <div class="body-delete-panel">
            <h3>Вы уверены что хотите удалить элемент из таблицы "<?=$model::tableLabel()?>"?</h3>
            <ul>
                <div class="pt-3">Примечание:</div>
                <li>Все связанные объекты в родительских таблицах будут удалены</li>
                <li>Удаленные данные не возможно будет восстановить</li>
            </ul>
        </div>
        <div class="d-flex gap-3 mr-3 mb-2">
            <a href="<?=Url::to(['admin/delete', 'table'=>$model::tableName(), 'id'=>$model->id])?>" class="btn btn-danger ml-auto">Удалить</a>
            <div class="btn btn-white close-delete-panel" data-id="<?=$model->id?>">Назад</div>
        </div>
    </div>
</div>
<div class="mt-4">
    <div class="btn btn-danger btn-delete" data-id="<?=$model->id?>">Удалить</div>
    <a href="<?=Url::to(['admin/update', 'table'=>$model::tableName(), 'id'=>$model->id])?>" class="btn btn-success">Изменить</a>
</div>
