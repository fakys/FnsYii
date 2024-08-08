<div class="favorite-page">
    <?php if($products):?>
    <?php foreach ($products as $value):?>
        <div class="product-favorite-container  product-favorite-<?=$value->id?>">
            <div class="product-favorite-image">
                <img src="<?=Yii::getAlias('@web')."/{$value->main_photo}"?>">
            </div>
            <div class="product-favorite-content">
                <a href="#" class="link-product"><?= strlen($value->title)>=70? substr($value->title, 0 ,70).'...':$value->title?></a>
                <a href="#" class="link-product-active"><?= strlen($value->description)>=200? substr($value->description, 0 ,200).'...':$value->description?></a>
            </div>
            <div class="d-flex flex-column">
                <a href="#" class="price-favorite">
                    <?=$value->price?> ₽
                </a>
                <div class="btn-favorite-container">
                    <div class="btn-favorite-active remove-fav-btn" data-product_id="<?=$value->id?>"><i class="fa fa-heart" aria-hidden="true"></i></div>
                    <div>
                        <div class="btn-main buy-btn-favorite">Купить</div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach;?>

    <?php else:?>
        <div class="">

        </div>
    <?php endif;?>
</div>