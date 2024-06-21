<?php
/**
 * @var \yii\db\ActiveRecord $model
 */
use yii\widgets\ActiveForm;
?>


<?php $form = ActiveForm::begin()?>
    <?= $form->field($model, 'name')?>
    <?= $form->field($model, 'email')?>
    <?= $form->field($model, 'group_id')?>
    <?= $form->field($model, 'avatar')?>
    <?= $form->field($model, 'status')?>
    <?= $form->field($model, 'password')?>
    <div><input class="btn btn-primary" value="Создать"></div>
<?php ActiveForm::end()?>
