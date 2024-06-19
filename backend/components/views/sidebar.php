<?php //var_dump($title)?>
<div>
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <?php foreach ($models as $value):?>
        <li class="nav-item">
            <a href="#" class="nav-link admin-nav-link">
                <i class="nav-icon fa fa-table" aria-hidden="true"></i>
                <p>
                    <?= $value::tableName()?>
                </p>
            </a>
        </li>
        <?php endforeach;?>
    </ul>
    123123213
</div>
