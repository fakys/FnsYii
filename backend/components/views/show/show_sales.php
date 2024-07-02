<?php

use yii\helpers\Url;

$products = $model->getProducts()->all();
?>
<div>
    <div class="card mb-3">
        <div class="card-header text-white  bg-dark">Скидка</div>
        <div class="card-body">
            <p class="card-text font-size-20">-<?=$model->sale?>%</p>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header text-white  bg-dark">Название</div>
        <div class="card-body">
            <p class="card-text font-size-20"><?=$model->title?></p>
        </div>
    </div>
    <?php if($model->description):?>
        <div class="card mb-3">
            <div class="card-header text-white  bg-dark">Описание</div>
            <div class="card-body">
                <p class="card-text font-size-20"><?=$model->description?></p>
            </div>
        </div>
    <?php endif;?>
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

    <?php if($products):?>
    <div class="card mb-3">
        <div class="card-header text-white  bg-dark">Твары</div>
        <div class="card-body show-scroll-block">
            <?php foreach ($products as $val):?>
                <div class="d-flex">
                    <div class="content-scroll-block">
                        <a href="<?=Url::to(['admin/show-object', 'table'=>$val->getProduct()->tableName(), 'id'=>$val->getProduct()->id])?>" class="font-size-20"><?=$val->getProduct()->title?></a>
                    </div>
                    <div class="ml-auto">
                        <a href="<?=Url::to(['admin/update', 'table'=>$val->getProduct()->tableName(), 'id'=>$val->getProduct()->id])?>" class="btn btn-success p-1">Изменить</a>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </div>
    <?php endif;?>

    <?php if($model->created_at):?>
        <div class="card mb-3">
            <div class="card-header text-white  bg-dark">Дата создания</div>
            <div class="card-body font-size-20">
                <?=$model->created_at?>
            </div>
        </div>
    <?php endif;?>
    <?php if($model->updated_at):?>
        <div class="card mb-3">
            <div class="card-header text-white  bg-dark">Дата обновления</div>
            <div class="card-body font-size-20">
                <?=$model->updated_at?>
            </div>
        </div>
        <?php endif;?>
</div>