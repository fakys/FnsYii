<?php
/**
 * @var \frontend\models\User $user
 */

?>

<div class="page-profile">
    <div class="profile-block-container">
        <div class="title-profile-block">Профиль</div>
        <div class="body-profile-block">
            <div class="user-avatar-profile">
                <img src="<?=Yii::getAlias('@web')."/{$user->avatar}"?>">
            </div>
            <div class="user-data-container">
                <div class="user-data">Логин: <?=$user->name?></div>
                <div class="user-data">Email: <?=$user->email?></div>
                <?php if($user->getGroup()->one()):?>
                    <div class="user-data">Группа: <?=$user->getGroup()->one()->title?></div>
                <?php endif;?>
                <div class="mt-3">
                    <?php if($user->isAdmin()):?>
                        <a href="<?=Yii::getAlias('@backendUrl')."/"?>" class="btn btn-success p-1">Админ панель</a>
                    <?php endif;?>
                </div>
                <div class="links-body-profile">
                    <div><a href="#" class="btn-main">Корзина</a></div>
                    <div><a href="#" class="btn-main">Избранное</a></div>
                    <div><a href="#" class="btn-main">Мои отзывы</a></div>
                    <div><a href="#" class="btn-main">Покупки</a></div>
                </div>
            </div>
            <div><a href="#" class="link-main"><i class="fa fa-cog" aria-hidden="true"></i></a></div>
        </div>
    </div>
</div>