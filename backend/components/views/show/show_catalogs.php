<?php

use yii\helpers\Url;

/**
 * @var \yii\db\ActiveRecord $model
 */
$categories = $model->getCategories()->all();
?>
<div>
    <div class="card mb-3">
        <div class="card-header text-white  bg-dark">Название</div>
        <div class="card-body">
            <p class="card-text font-size-20"><?=$model->title?></p>
        </div>
    </div>
    <?php if($model->icon):?>
    <div class="card mb-3">
        <div class="card-header text-white  bg-dark">Фотография</div>
        <div class="card-body">
            <div class="image-container">
                <img src='<?=Yii::getAlias("@frontendUrl")."/$model->icon"?>'>
            </div>
        </div>
    </div>
    <?php endif;?>
    <?php if($categories):?>
        <div class="card mb-3">
            <div class="card-header text-white  bg-dark">Категории</div>
            <div class="card-body show-scroll-block">
                <?php foreach ($categories as $val):?>
                    <div class="d-flex">
                        <div class="content-scroll-block">
                            <a href="<?=Url::to(['admin/show-object', 'table'=>$val->tableName(), 'id'=>$val->id])?>" class="font-size-20"><?=$val->title?></a>
                        </div>
                        <div class="ml-auto">
                            <a href="<?=Url::to(['admin/update', 'table'=>$val->tableName(), 'id'=>$val->id])?>" class="btn btn-success p-1">Изменить</a>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
    <?php endif;?>
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
