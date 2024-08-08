<div class="main-navbar-background"></div>
<div class="main-navbar-container">
    <div class="main-navbar">
        <div class="close-btn-navbar">
            <i class="fa fa-times" aria-hidden="true"></i>
        </div>
        <div class="navbar-title">
            Каталоги
        </div>
        <div class="navbar-catalog-container">
            <?php foreach ($catalog as $val):?>
                <a href="<?=\yii\helpers\Url::to(['/catalog/show', 'catalog'=>$val['title']])?>" class="navbar-catalog">
                    <div class="navbar-catalog-icon">
                        <?php if(isset($val['icon'])):?>
                            <img src="<?=Yii::getAlias('@web').'/'.$val['icon']?>">
                        <?php else:?>
                            <img src="<?=Yii::getAlias('@web').'image/site/not_image.png'?>">
                        <?php endif;?>
                    </div>
                    <div class="navbar-catalog-text">
                        <?=$val['title']?>
                    </div>
                </a>
            <?php endforeach;?>
        </div>
    </div>
</div>