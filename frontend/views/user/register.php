<?php
use yii\widgets\ActiveForm;
?>

<div class="d-flex justify-content-center pt-5">
    <?php $form = ActiveForm::begin(['options'=>['class'=>'auth_form']])?>
        <div class="auth-form-head">Регистрация</div>
        <div class="auth-form-body">
            <?=$form->field($user, 'name')?>
            <?=$form->field($user, 'email')?>
            <?=$form->field($user, 'password')->input('password')?>
            <?=$form->field($user, 'password_confirm')->input('password')?>
            <input type="submit" class="btn-main mt-3" value="Регистрация">
            <div class="font-size-12 mt-3">У вас есть аккаунт??? <a href="<?=\yii\helpers\Url::to(['user/login'])?>">Авторизуйтесь</a></div>
        </div>
    <?php ActiveForm::end()?>

</div>