<?php
use yii\widgets\ActiveForm;
?>

<div class="d-flex justify-content-center pt-5">
    <?php $form = ActiveForm::begin(['options'=>['class'=>'auth_form']])?>
        <div class="auth-form-head">Вход</div>
        <div class="auth-form-body">
            <?=$form->field($user, 'name')?>
            <?=$form->field($user, 'password')->input('password')?>
            <input type="submit" class="btn-main mt-3" value="Войти">
        </div>
    <?php ActiveForm::end()?>
</div>