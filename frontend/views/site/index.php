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
            <a href="<?=\yii\helpers\Url::to(['catalog/'])?>" class="title-block-index-page">
                Каталог
                <i class="fa fa-chevron-right" aria-hidden="true"></i>
            </a>

            <div class="content-block-index-page">
                <?php foreach ($catalogs as $val):?>
                <a href="<?=\yii\helpers\Url::to(['catalog/show', 'catalog'=>$val['title']])?>" class="content-block-content">
                    <?php if($val['icon']):?>
                        <div class="content-block-image"><img src="<?=Yii::getAlias('@web').$val['icon']?>"></div>
                    <?php else:?>
                        <div class="content-block-image"><img src="<?=Yii::getAlias('@web').'/image/site/not_image.png'?>"></div>
                    <?php endif;?>

                    <?=$val['title']?>
                </a>
                <?php endforeach;?>
            </div>

        </div>
        <?php endif;?>

        <?php if($categories):?>
        <div class="block-index-page">
            <a href="<?=\yii\helpers\Url::to(['category/'])?>" class="title-block-index-page">
                Катeгории
                <i class="fa fa-chevron-right" aria-hidden="true"></i>
            </a>

                <div class="content-block-index-page">
                    <?php foreach ($categories as $val):?>
                    <a href="<?=\yii\helpers\Url::to(['/category/show', 'category'=>$val['title']])?>" class="content-block-content">
                        <?php if($val['icon']):?>
                            <div class="content-block-image"><img src="<?=Yii::getAlias('@web').$val['icon']?>"></div>
                        <?php else:?>
                            <div class="content-block-image"><img src="<?=Yii::getAlias('@web').'/image/site/not_image.png'?>"></div>
                        <?php endif;?>

                        <?=$val['title']?>
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
                    <a href="<?=\yii\helpers\Url::to(['product/show/', 'id'=>$val['id']])?>" class="product-image-block">
                        <?php if($val['main_photo']):?>
                        <img src="<?=Yii::getAlias('@web').$val['main_photo']?>">
                        <?php else:?>
                            <img src="<?=Yii::getAlias('@web').'/image/site/not_image.png'?>">
                        <?php endif;?>
                    </a>
                    <div class="text-center">
                        <a href="<?=\yii\helpers\Url::to(['product/show/', 'id'=>$val['id']])?>" class="link-product">
                            <?=$val['title']?>
                        </a>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="price-block-main-content">
                            <?=$val['price']?> ₽
                        </div>
                        <div class="d-flex gap-2">
                            <?php if(Yii::$app->session->has('favorite') && in_array($val['id'], Yii::$app->session->get('favorite'))):?>
                                <div class="btn-fav-active" data-product_id="<?=$val['id']?>">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </div>
                                <div class="btn-fav d-none" data-product_id="<?=$val['id']?>">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </div>
                            <?php else:?>
                                <div class="btn-fav-active d-none" data-product_id="<?=$val['id']?>">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </div>
                                <div class="btn-fav" data-product_id="<?=$val['id']?>">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </div>
                            <?php endif;?>
                            <div class="p-0 btn-buy">
                                <i class="fa fa-shopping-cart font-size-20" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>


            </div>
        </div>
    </div>
</div>