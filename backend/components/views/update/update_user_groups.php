<?php
/**
 * @var \yii\db\ActiveRecord $model
 */

use backend\components\CreateObjectsComponent;
use yii\widgets\ActiveForm;
?>


<?php $form = ActiveForm::begin(['enableClientValidation' => false])?>
    <?= $form->field($model, 'title')?>
    <div>
        <?php if($model->icon):?>
                <label class="control-label">Старое фото</label>
                <div class="image-container-update">
                    <img src="<?=Yii::getAlias('@frontendUrl')."/$model->icon"?>">
                </div>
        <?php endif;?>
        <?= $form->field($model, 'icon')->fileInput(['class'=>'form-control', 'accept'=>'image/png, image/gif, image/jpeg'])?>
    </div>

    <?= $form->field($model, 'created_at')->input('datetime-local')?>
    <div><input class="btn btn-primary" type="submit" value="Обновить"></div>
<?php ActiveForm::end()?>
