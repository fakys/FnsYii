<?php

use yii\helpers\Url;

/**
 * @var \yii\db\ActiveRecord $model
 */

$catalog = $model->getCategories()->one();
$sales = $model->getSales()->all();
$photos = $model->getPhotos()->all();
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

    <?php if($catalog):?>
    <div class="card mb-3">
        <div class="card-header text-white bg-dark">Категория</div>
        <div class="card-body">
            <div class="d-flex">
                <div class="content-scroll-block">
                    <a href="<?=Url::to(['admin/show-object', 'table'=>$catalog->tableName(), 'id'=>$catalog->id])?>" class="font-size-20"><?=$catalog->title?></a>
                </div>
                <div class="ml-auto">
                    <a href="<?=Url::to(['admin/update', 'table'=>$catalog->tableName(), 'id'=>$catalog->id])?>" class="btn btn-success p-1">Изменить</a>
                </div>
            </div>
        </div>
    </div>
    <?php endif;?>

    <?php if($sales):?>
        <div class="card mb-3">
            <div class="card-header text-white  bg-dark">Акции</div>
            <div class="card-body show-scroll-block">
                <?php foreach ($sales as $val):?>
                    <div class="d-flex">
                        <div>
                            <a href="<?=Url::to(['admin/show-object', 'table'=>$val->getSale()->tableName(), 'id'=>$val->getSale()->id])?>" class="font-size-20"><?=$val->getSale()->title?></a>
                        </div>
                        <div class="ml-auto">
                            <a href="<?=Url::to(['admin/update', 'table'=>$val->getSale()->tableName(), 'id'=>$val->getSale()->id])?>" class="btn btn-success p-1">Изменить</a>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
    <?php endif;?>

    <div class="card md-3">
        <div class="card-header text-white bg-dark">Фотографии</div>
        <div class="card-body">
            <div class="images-scroll-block">
                <?php foreach ($photos as $val):?>
                <div class="image-container">
                    <img src='<?=Yii::getAlias('@frontendUrl')."/{$val->photo}"?>'>
                </div>

                <?php endforeach;?>
            </div>
        </div>
    </div>

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