<?php
use yii\widgets\ActiveForm;
?>

<div class="container">
    <div class="page-login">
        <div class="form-auth-admin">
            <?php $form = ActiveForm::begin()?>
            <div class="title-login-admin-form">Вход</div>
            <div class="body-login-admin-form">
                <?=$form->field($model, 'email')->input('email')?>
                <?=$form->field($model, 'password')->passwordInput()?>
                <div><input type="submit" class="btn bg-dark p-1" value="Войти"></div>
            </div>
            <?php ActiveForm::end()?>
        </div>
    </div>
</div>