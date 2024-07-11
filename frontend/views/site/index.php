<?php
/**
 * @var \yii\db\ActiveRecord $categories
 * @var \yii\db\ActiveRecord $catalogs
 * @var \yii\db\ActiveRecord $products
 */
?>

<div class="container">
    <div class="index-page">

        <?php if($catalogs):?>
        <div class="block-index-page">
            <a href="#" class="title-block-index-page">
                Каталог
                <i class="fa fa-chevron-right" aria-hidden="true"></i>
            </a>

            <div class="content-block-index-page">
                <?php foreach ($catalogs as $val):?>
                <a href="#" class="content-block-content">
                    <?php if($val->icon):?>
                        <div class="content-block-image"><img src="<?=Yii::getAlias('@web').$val->icon?>"></div>
                    <?php else:?>
                        <div class="content-block-image"><img src="<?=Yii::getAlias('@web').'/image/site/not_image.png'?>"></div>
                    <?php endif;?>

                    <?=$val->title?>
                </a>
                <?php endforeach;?>
            </div>

        </div>
        <?php endif;?>

        <?php if($categories):?>
        <div class="block-index-page">
            <a href="#" class="title-block-index-page">
                Катeгории
                <i class="fa fa-chevron-right" aria-hidden="true"></i>
            </a>

                <div class="content-block-index-page">
                    <?php foreach ($categories as $val):?>
                    <a href="#" class="content-block-content">
                        <?php if($val->icon):?>
                            <div class="content-block-image"><img src="<?=Yii::getAlias('@web').$val->icon?>"></div>
                        <?php else:?>
                            <div class="content-block-image"><img src="<?=Yii::getAlias('@web').'/image/site/not_image.png'?>"></div>
                        <?php endif;?>

                        <?=$val->title?>
                    </a>
                    <?php endforeach;?>
                </div>

        </div>
        <?php endif;?>

        <div class="main-content-index-page">
            <h3 class="title">Товары</h3>
            <div class="main-content-block">


                <?php foreach ($products as $val):?>
                <div class="product-block">
                    <a href="#" class="product-image-block">
                        <?php if($val->main_photo):?>
                        <img src="<?=Yii::getAlias('@web').$val->main_photo?>">
                        <?php else:?>
                            <img src="<?=Yii::getAlias('@web').'/image/site/not_image.png'?>">
                        <?php endif;?>
                    </a>
                    <div class="text-center">
                        <a href="#">
                            <?=$val->title?>
                        </a>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="price-block-main-content">
                            <?=$val->price?> ₽
                        </div>
                        <div class="d-flex gap-2">
                            <div class="btn-fav">
                                <i class="fa fa-heart" aria-hidden="true"></i>
                            </div>
                            <div class="p-0 btn-buy">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>


            </div>
        </div>
    </div>
</div>