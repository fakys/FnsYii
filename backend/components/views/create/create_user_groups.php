<?php
/**
 * @var \yii\db\ActiveRecord $model
 */

use backend\components\CreateObjectsComponent;
use yii\widgets\ActiveForm;
?>


<?php $form = ActiveForm::begin(['enableClientValidation' => false])?>
    <?= $form->field($model, 'title')?>
    <?= $form->field($model, 'icon')->fileInput(['class'=>'form-control', 'accept'=>'image/png, image/gif, image/jpeg'])?>
    <div><input class="btn btn-primary" type="submit" value="Создать"></div>
<?php ActiveForm::end()?>
