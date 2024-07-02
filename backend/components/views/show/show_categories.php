<?php

use yii\helpers\Url;

/**
 * @var \yii\db\ActiveRecord $model
 */
$catalog = $model->getCatalog()->one();
$products = $model->getProducts()->all();
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
    <?php if($catalog):?>
    <div class="card mb-3">
        <div class="card-header text-white  bg-dark">Каталог</div>
        <div class="card-body d-flex">
            <a href="<?=Url::to(['admin/show-object', 'table'=>$catalog->tableName(), 'id'=>$catalog->id])?>" class="card-text font-size-20"><?=$catalog->title?></a>
            <a href="<?=Url::to(['admin/update', 'table'=>$catalog->tableName(), 'id'=>$catalog->id])?>" class="btn btn-success p-1 ml-auto">Изменить</a>
        </div>
    </div>
    <?php endif;?>
    <?php if($products):?>
        <div class="card mb-3">
            <div class="card-header text-white  bg-dark">Твары</div>
            <div class="card-body show-scroll-block">
                <?php foreach ($products as $val):?>
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
