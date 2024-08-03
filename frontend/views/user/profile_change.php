<div class="profile-change-page">
    <div class="profile-change-panel-container">
        <div class="profile-change-panel">
            <div class="title-form-chang">
                Изменить профиль
            </div>
            <div class="change-data">
                <?php $form = \yii\widgets\ActiveForm::begin(['options'=>['class'=>'']])?>
                <div class="form-chang-user">
                    <div class="change-avatar">
                        <div>Аватар</div>
                        <div>
                            <img src="<?=Yii::getAlias('@web')."/{$user->avatar}"?>">
                        </div>
                        <?=$form->field($user, 'avatar')->input('file')->label(false)?>
                    </div>
                    <div class="d-flex justify-content-center flex-column w-100">
                        <?=$form->field($user, 'name')?>
                        <?=$form->field($user, 'email')->input('email')?>
                        <?=$form->field($user, 'new_password')->passwordInput()?>
                        <?=$form->field($user, 'password_confirm')->passwordInput()?>
                    </div>
                </div>
                <input type="submit" class="btn-main" value="Сохранить">
                <?php \yii\widgets\ActiveForm::end()?>
            </div>
        </div>
    </div>
</div>
