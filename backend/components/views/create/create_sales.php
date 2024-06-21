<?php
/**
 * @var \yii\db\ActiveRecord $model
 */

use yii\db\Query;
use yii\widgets\ActiveForm;
$group= (new Query())->select(['id', 'title'])->from('user_groups')->all();
?>


<?php $form = ActiveForm::begin(['enableClientValidation' => false])?>
    <?= $form->field($model, 'sale')?>
    <?= $form->field($model, 'title')?>
    <?= $form->field($model, 'description')->textarea()?>
    <?= $form->field($model, 'icon')->fileInput(['class'=>'form-control', 'accept'=>'image/png, image/gif, image/jpeg'])?>
    <div><input class="btn btn-primary" type="submit" value="Создать"></div>
<?php ActiveForm::end()?>
