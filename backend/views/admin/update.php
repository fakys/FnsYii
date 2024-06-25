<?php
/**
 * @var \yii\db\ActiveRecord $obj
 */
use backend\components\UpdateObjectsComponent;
use yii\helpers\Url;

?>

<div class="pb-5">
    <?=UpdateObjectsComponent::widget(['model'=>$obj])?>
    <div class="pt-3"><div class="btn btn-danger p-1 btn-delete" data-id="<?=$obj->id?>">Удалить</div></div>
    <div class="delete-panel-container delete-panel-<?=$obj->id?>">
        <div class="delete-panel">
            <div class="head-delete-panel">
                <div class="logo-delete-panel">FNS</div>
                <div class="ml-auto close-delete-panel" data-id="<?=$obj->id?>"><i class="fa fa-times" aria-hidden="true"></i></div>
            </div>
            <div class="body-delete-panel">
                <h3>Вы уверены что хотите удалить элемент из таблицы "<?=$obj::tableLabel()?>"?</h3>
                <ul>
                    <div class="pt-3">Примечание:</div>
                    <li>Все связанные объекты в родительских таблицах будут удалены</li>
                    <li>Удаленные данные не возможно будет восстановить</li>
                </ul>
            </div>
            <div class="d-flex gap-3 mr-3 mb-2">
                <a href="<?=Url::to(['admin/delete', 'table'=>$obj::tableName(), 'id'=>$obj->id])?>" class="btn btn-danger ml-auto">Удалить</a>
                <div class="btn btn-white close-delete-panel" data-id="<?=$obj->id?>">Назад</div>
            </div>
        </div>
    </div>
</div>

