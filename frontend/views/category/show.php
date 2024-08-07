<div class="show_category_page">
    <?php if($products):?>
    <?php foreach ($products as $val):?>
        <div class="product-block">
            <a href="<?=\yii\helpers\Url::to(['product/show/', 'id'=>$val->id])?>" class="product-image-block">
                <?php if($val->main_photo):?>
                    <img src="<?=Yii::getAlias('@web')."/{$val->main_photo}"?>">
                <?php else:?>
                    <img src="<?=Yii::getAlias('@web').'/image/site/not_image.png'?>">
                <?php endif;?>
            </a>
            <div class="text-center">
                <a href="<?=\yii\helpers\Url::to(['product/show/', 'id'=>$val->id])?>" class="link-product">
                    <?=$val->title?>
                </a>
            </div>
            <div class="d-flex align-items-center justify-content-between">
                <div class="price-block-main-content">
                    <?=$val->price?> ₽
                </div>
                <div class="d-flex gap-2">
                    <?php if(Yii::$app->session->has('favorite') && in_array($val->id, Yii::$app->session->get('favorite'))):?>
                    <div class="btn-fav btn-fav-active" data-product_id="<?=$val->id?>">
                        <i class="fa fa-heart" aria-hidden="true"></i>
                    </div>
                    <?php else:?>
                        <div class="btn-fav" data-product_id="<?=$val->id?>">
                            <i class="fa fa-heart" aria-hidden="true"></i>
                        </div>
                    <?php endif;?>
                    <div class="p-0 btn-buy">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach;?>
    <?php else:?>
    <div class="d-flex justify-content-center">
        <div>
            <h1 class="h1">В этой категории пока нет товара</h1>
            <p>Видимо в этой категории пока нет товара, в скором времени его добовят</p>
            <div class="d-flex">
                <a href="#" class="btn-main font-size-20">На главную</a>
            </div>
        </div>
    </div>

    <?php endif;?>

</div>