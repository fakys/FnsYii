<div class="cat-page">
    <?php foreach ($categories as $val):?>
        <a href="#" class="content-block-content">
            <?php if($val->icon):?>
                <div class="content-block-image"><img src="<?=Yii::getAlias('@web')."/$val->icon"?>"></div>
            <?php else:?>
                <div class="content-block-image"><img src="<?=Yii::getAlias('@web').'/image/site/not_image.png'?>"></div>
            <?php endif;?>

            <?=$val->title?>
        </a>
    <?php endforeach;?>
</div>
