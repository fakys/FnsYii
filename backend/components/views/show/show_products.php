<?php

use yii\helpers\Url;

$catalog = $model->getCatalog()->one();
?>
<div>
    <div class="card mb-3">
        <div class="card-header text-white  bg-dark">Название</div>
        <div class="card-body">
            <p class="card-text font-size-20"><?=$model->title?></p>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header text-white  bg-dark">Описание</div>
        <div class="card-body">
            <p class="card-text font-size-20"><?=$model->description?></p>
        </div>
    </div>
    <?php if($model->main_photo):?>
    <div class="card mb-3">
        <div class="card-header text-white  bg-dark">Главное фото </div>
        <div class="card-body">
            <div class="image-container">
                <img src='<?=Yii::getAlias("@frontendUrl")."/$model->main_photo"?>'>
            </div>
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