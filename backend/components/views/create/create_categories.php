<?php
/**
 * @var \yii\db\ActiveRecord $model
 */

use yii\widgets\ActiveForm;
use backend\components\CreateObjectsComponent;
$catalogs = (new \yii\db\Query())->select(['id', 'title'])->from('catalogs')->all();
?>


<?php $form = ActiveForm::begin(['enableClientValidation' => false])?>
    <?= $form->field($model, 'title')?>
    <?= $form->field($model, 'icon')->fileInput(['class'=>'form-control', 'accept'=>'image/png, image/gif, image/jpeg'])?>
    <?=$form->field($model, 'catalog_id')->dropDownList(CreateObjectsComponent::adapt_drop_list($catalogs, 'title'))?>
    <div><input class="btn btn-primary" type="submit" value="Создать"></div>
<?php ActiveForm::end()?>
