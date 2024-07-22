<?php

/**
 * @var frontend\models\Product $product
 */

$photos = $product->getPhotos()->asArray()->all();
?>

<div class="product-page">
    <div class="product-page-panel">
        <div class="start-slider-container">
            <div class="start-slider">
                    <div class="slider-pre scip-btn">
                        <div class="slider-pre">
                            <i class="fa fa-angle-left" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="slider-container">
                        <div class="slide" data-id='0'>
                            <img src="<?=Yii::getAlias('@web')."/{$product->main_photo}"?>">
                        </div>
                        <?php foreach ($photos as $img):?>
                            <div class="slide" data-id=<?=$img['id']?>>
                                <img src="<?=Yii::getAlias('@web')."/{$img['photo']}"?>">
                            </div>
                        <?php endforeach;?>
                    </div>
                    <div class="scip-btn">
                        <div class="slider-nex">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </div>
                    </div>
            </div>
            <div class="mini-slide-container">
                <div class="mini-slide" data-id='0'>
                    <img src="<?=Yii::getAlias('@web')."/{$product->main_photo}"?>">
                </div>
                <?php foreach ($photos as $img):?>
                    <div class="mini-slide" data-id=<?=$img['id']?>>
                        <img src="<?=Yii::getAlias('@web')."/{$img['photo']}"?>">
                    </div>
                <?php endforeach;?>
            </div>
        </div>

        <div class="data-product-panel">
            <div class="title-product-block">
                <?=$product->title?>
            </div>
            <?php if($product->description):?>
                <div class="description-container">
                    <div class="font-size-18">Описание</div>
                    <div class="description-product">
                        <?=$product->description?>
                    </div>
                </div>
            <?php endif;?>
            <div class="buy-block">
                <div class="buy-block-container">
                    <div class="price-product"><?=$product->price?> ₽</div>
                    <div class="fav-btn-product"><i class="fa fa-heart" aria-hidden="true"></i></div>
                    <div class="buy-btn-product">Купить</div>
                </div>

            </div>
        </div>
    </div>
</div>