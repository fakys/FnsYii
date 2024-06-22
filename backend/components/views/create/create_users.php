<?php
/**
 * @var \yii\db\ActiveRecord $model
 */

use backend\components\CreateObjectsComponent;
use yii\db\Query;
use yii\widgets\ActiveForm;
$group= (new Query())->select(['id', 'title'])->from('user_groups')->all();
?>

<?php $form = ActiveForm::begin(['enableClientValidation' => false])?>
    <?= $form->field($model, 'name')?>
    <?= $form->field($model, 'email')?>
    <?= $form->field($model, 'group_id')->dropDownList(CreateObjectsComponent::adapt_drop_list($group, 'title'))?>
    <?= $form->field($model, 'avatar')->fileInput(['class'=>'form-control', 'accept'=>'image/png, image/gif, image/jpeg'])?>
    <?= $form->field($model, 'status')->checkbox()?>
    <?= $form->field($model, 'password')?>
    <div><input class="btn btn-primary" type="submit" value="Создать"></div>
<?php ActiveForm::end()?>
