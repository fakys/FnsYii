<?php

use yii\helpers\Url;

$group = $model->getGroup()->one();
?>
<div>
    <div class="card mb-3">
        <div class="card-header text-white  bg-dark">Логин</div>
        <div class="card-body">
            <p class="card-text font-size-20"><?=$model->name?></p>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header text-white  bg-dark">Email</div>
        <div class="card-body">
            <p class="card-text font-size-20"><?=$model->email?></p>
        </div>
    </div>
    <?php if($group):?>
        <div class="card mb-3">
            <div class="card-header text-white  bg-dark">Группа</div>
            <div class="card-body d-flex">
                <a href="<?=Url::to(['admin/show-object', 'table'=>$group::tableName(), 'id'=>$group->id])?>" class="card-text font-size-20"><?=$group->title?></a>
                <a href="<?=Url::to(['admin/update', 'table'=>$group::tableName(), 'id'=>$group->id])?>" class="btn btn-success p-1 ml-auto">Изменить</a>
            </div>
        </div>
    <?php endif;?>
    <?php if($model->avatar):?>
    <div class="card mb-3">
        <div class="card-header text-white  bg-dark">Аватар</div>
        <div class="card-body">
            <div class="image-container">
                <img src='<?=Yii::getAlias("@frontendUrl")."/$model->avatar"?>'>
            </div>
        </div>
    </div>
    <?php endif;?>
    <div class="card mb-3">
        <div class="card-header text-white  bg-dark">Статус</div>
        <div class="card-body">
            <?php if($model->status):?>
            <div class="text-success">Активный</div>
            <?php else:?>
            <div class="text-danger">Неактивный</div>
            <?php endif;?>
        </div>
    </div>

    <?php if($model->created_at):?>
        <div class="card mb-3">
            <div class="card-header text-white  bg-dark">Дата создания</div>
            <div class="card-body">
                <?=$model->created_at?>
            </div>
        </div>
    <?php endif;?>
    <?php if($model->updated_at):?>
        <div class="card mb-3">
            <div class="card-header text-white  bg-dark">Дата обновления</div>
            <div class="card-body">
                <?=$model->updated_at?>
            </div>
        </div>
        <?php endif;?>
</div>