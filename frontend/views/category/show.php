<div class="show_category_page">
    <?php foreach ($products as $val):?>
        <div class="product-block">
            <a href="#" class="product-image-block">
                <?php if($val->main_photo):?>
                    <img src="<?=Yii::getAlias('@web')."/{$val->main_photo}"?>">
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