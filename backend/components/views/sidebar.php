<?php

/**
 * @var \yii\db\ActiveRecord $models
 */

use yii\helpers\Url;
?>
<div>
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <?php foreach ($models as $value):?>
        <li class="nav-item">
            <a href="<?=Url::to(['/admin/show-model', 'table'=>$value::tableName()])?>" class="nav-link admin-nav-link">
                <i class="nav-icon fa fa-table" aria-hidden="true"></i>
                <p>
                    <?= $value::tableLabel()?>
                </p>
            </a>
        </li>
        <?php endforeach;?>
    </ul>
</div>
