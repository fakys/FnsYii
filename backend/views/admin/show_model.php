<?php
/**
 * @var \yii\db\ActiveRecord $model
 * @var array $objects
 * @var array $columns
 */
?>
<table class="table">
    <thead class="table-dark">
    <tr>
        <?php foreach ($columns as $val):?>
        <th scope="col"><?=$val?></th>
        <?php endforeach;?>
        <th>Изменить</th>
        <th>Удалить</th>
    </tr>
    </thead>
    <tbody>
        <?php foreach ($objects as $key=>$val):?>
            <tr class="tr-admin-table">
                <th scope="row"></th>
                <td><a href="#"></a></td>
                <td></td>
                <td><a href="#" class="btn btn-success p-1">Изменить</a></td>
                <td><a href="#" class="btn btn-danger p-1">Удалить</a></td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>