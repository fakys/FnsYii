<?php
use yii\widgets\ActiveForm;
?>

<div class="d-flex justify-content-center pt-5">
    <?php $form = ActiveForm::begin(['options'=>['class'=>'auth_form']])?>
        <div class="auth-form-head">Вход</div>
        <div class="auth-form-body">
            <?=$form->field($model, 'email')->input('email')?>
            <?=$form->field($model, 'password')->input('password')?>
            <?=$form->field($model, 'rememberMe')->checkbox()?>
            <input type="submit" class="btn-main mt-3" value="Войти">
            <div class="font-size-12 mt-3">У вас ещё нет аккаунта??? <a href="<?=\yii\helpers\Url::to(['user/register'])?>">Зарегистрируйтесь</a></div>
        </div>
    <?php ActiveForm::end()?>

</div>