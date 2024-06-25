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
                <td><a href="#" class="btn btn-primary p-1">Просмотреть</a></td>
                <td><a href="<?=Url::to(['admin/update', 'table'=>$model::tableName(), 'id'=>$obj['id']])?>" class="btn btn-success p-1">Изменить</a></td>
                <td><a href="<?=Url::to(['admin/delete', 'table'=>$model::tableName(), 'id'=>$obj['id']])?>" class="btn btn-danger p-1">Удалить</a></td>
            </tr>
        <div class="delete-panel">
            <div>
                <div>
                    <h3>Вы уверены что хотите удалить элемент из таблицы "<?=$model::tableLabel()?>"?</h3>
                </div>
                <div></div>
            </div>
        </div>
        <?php endforeach;?>
    </tbody>
</table>