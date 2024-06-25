<?php
/**
 * @var \yii\db\ActiveRecord $model
 */

use yii\widgets\ActiveForm;
?>


<?php $form = ActiveForm::begin(['enableClientValidation' => false])?>
    <?= $form->field($model, 'title')?>
    <div>
        <label class="control-label">Старое фото</label>
        <div class="image-container-update">
            <img src="<?=Yii::getAlias('@frontendUrl')."/$model->icon"?>">
        </div>
        <?= $form->field($model, 'icon')->fileInput(['class'=>'form-control', 'accept'=>'image/png, image/gif, image/jpeg'])?>
    </div>
    
    <div><input class="btn btn-primary" type="submit" value="Создать"></div>
<?php ActiveForm::end()?>
