<?php
/**
 * @var array $models
 */

use yii\helpers\Url;

?>
<table class="table">
    <thead class="table-dark">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Таблицы</th>
        <th scope="col">Название</th>
        <th scope="col">Добавить</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($models as $key=>$val):?>
    <tr class="tr-admin-table">
        <th scope="row"><?=$key+1?></th>
        <td><?=$val::tableName()?></td>
        <td><a href="<?=Url::to(['/admin/show-model', 'table'=>$val::tableName()])?>"><?=$val::tableLabel()?></a></td>
        <td><a href="#" class="btn btn-success p-1">Добавить</a></td>
    </tr>
    <?php endforeach;?>
    </tbody>
</table>