<?php
/**
 * @var \yii\db\ActiveRecord $model
 */

use backend\components\CreateObjectsComponent;
use yii\db\Query;
use yii\widgets\ActiveForm;
$categories= (new Query())->select(['id', 'title'])->from('categories')->all();
?>


<?php $form = ActiveForm::begin(['enableClientValidation' => false])?>
    <?= $form->field($model, 'title')?>
    <?= $form->field($model, 'description')->textarea()?>
    <?=$form->field($model, 'price')->input('number')?>
    <?=$form->field($model, 'main_photo')->fileInput(['class'=>'form-control', 'accept'=>'image/png, image/gif, image/jpeg'])?>
    <?=$form->field($model, 'photos[]')->fileInput(['class'=>'form-control', 'accept'=>'image/png, image/gif, image/jpeg', 'multiple'=>true])?>
    <?=$form->field($model, 'category_id')->dropDownList(CreateObjectsComponent::adapt_drop_list($categories, 'title'))?>
    <div><input class="btn btn-primary" type="submit" value="Создать"></div>
<?php ActiveForm::end()?>
