<?php
/**
 * @var array $model
 * @var array $objects
 * @var array $columns
 */

use yii\helpers\Url;

?>
<table class="table">
    <thead class="table-dark">
    <tr>
        <?php foreach ($columns as $val):?>
        <th scope="col"><?= $val?></th>
        <?php endforeach;?>
        <th>Просмотреть</th>
        <th>Изменить</th>
        <th>Удалить</th>
    </tr>
    </thead>
    <tbody>
        <?php foreach ($objects as $obj):?>
            <tr class="tr-admin-table">
                <?php foreach ($obj as $filed=>$value):?>
                    <?php if(in_array($filed, $columns)):?>
                        <?php if($value):?>
                            <td><?=(strlen($value)>20)? substr($value, 0, 20)."..." : $value?></td>
                        <?php else:?>
                            <td><div class="val-null">Null</div></td>
                        <?php endif;?>
                    <?php endif;?>
                <?php endforeach;?>
                <td><a href="<?=Url::to(['admin/show-object', 'table'=>$model::tableName(), 'id'=>$obj['id']])?>" class="btn btn-primary p-1">Просмотреть</a></td>
                <td><a href="<?=Url::to(['admin/update', 'table'=>$model::tableName(), 'id'=>$obj['id']])?>" class="btn btn-success p-1">Изменить</a></td>
                <td><div class="btn btn-danger p-1 btn-delete" data-id="<?=$obj['id']?>">Удалить</div></td>
            </tr>
        <div class="delete-panel-container delete-panel-<?=$obj['id']?>">
            <div class="delete-panel">
                <div class="head-delete-panel">
                    <div class="logo-delete-panel">FNS</div>
                    <div class="ml-auto close-delete-panel" data-id="<?=$obj['id']?>"><i class="fa fa-times" aria-hidden="true"></i></div>
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
                    <a href="<?=Url::to(['admin/delete', 'table'=>$model::tableName(), 'id'=>$obj['id']])?>" class="btn btn-danger ml-auto">Удалить</a>
                    <div class="btn btn-white close-delete-panel" data-id="<?=$obj['id']?>">Назад</div>
                </div>
            </div>
        </div>
        <?php endforeach;?>
    </tbody>
</table>