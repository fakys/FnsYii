<?php
/**
 * @var common\models\User $user
 */

$user_group = $this->params['user']->getGroup()->asArray()->one();
?>

<div class="page-profile">
    <div class="profile-block-container">
        <div class="title-profile-block">Профиль</div>
        <div class="body-profile-block">
            <div class="user-avatar-profile">
                <img src="<?=Yii::getAlias('@web')."/{$this->params['user']->avatar}"?>">
            </div>
            <div class="user-data-container">
                <div class="user-data">Логин: <?=$this->params['user']->name?></div>
                <div class="user-data">Email: <?=$this->params['user']->email?></div>
                <?php if($user_group):?>
                    <div class="user-data">Группа: <?=$user_group['title']?></div>
                <?php endif;?>
                <div class="mt-3">
                    <?php if($this->params['user']->isAdmin()):?>
                        <a href="<?=Yii::getAlias('@backendUrl')."/login"?>" class="btn btn-success p-1">Админ панель</a>
                    <?php endif;?>
                    <div class="btn btn-danger p-1 logout-profile-btn">
                        Выйти
                    </div>
                </div>
                <div class="links-body-profile">
                    <div><a href="#" class="btn-main">Корзина</a></div>
                    <div><a href="#" class="btn-main">Избранное</a></div>
                    <div><a href="#" class="btn-main">Мои отзывы</a></div>
                    <div><a href="#" class="btn-main">Покупки</a></div>
                </div>
            </div>
            <div><a href="<?=\yii\helpers\Url::to(['user/profile-chang'])?>" class="link-main"><i class="fa fa-cog" aria-hidden="true"></i></a></div>
        </div>
    </div>
    <div class="logout-menu-container">
        <div class="logout-menu">
            <div class="title-logout-menu">
                Вы уверены что хотите выйти?
            </div>
            <div class="body-logout-menu">
                <a href="<?=\yii\helpers\Url::to(['user/logout'])?>" class="btn btn-danger">Выйти</a>
                <div class="btn-main d-flex align-items-center">
                    Назад
                </div>
            </div>
        </div>
    </div>
</div>