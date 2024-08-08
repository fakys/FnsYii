<?php
/**
 * @var \yii\db\ActiveRecord $model
 */

use backend\components\CreateObjectsComponent;
use yii\db\Query;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
$group= (new Query())->select(['id', 'title'])->from('user_groups')->all();
?>

<?php $form = ActiveForm::begin(['enableClientValidation' => false])?>
    <?= $form->field($model, 'name')?>
    <?= $form->field($model, 'email')?>
    <?= $form->field($model, 'group_id')->dropDownList(ArrayHelper::map(ArrayHelper::merge([['id'=>null, 'title'=>'Не выбрано']],$group), 'id','title'))?>
<div>
    <?php if($model->avatar):?>
        <label class="control-label">Старое фото</label>
        <div class="image-container-update">
            <img src="<?=Yii::getAlias('@frontendUrl')."/$model->avatar"?>">
        </div>
    <?php endif;?>
    <?= $form->field($model, 'avatar')->fileInput(['class'=>'form-control', 'accept'=>'image/png, image/gif, image/jpeg'])?>
</div>
    <?= $form->field($model, 'status')->checkbox()?>
    <?= $form->field($model, 'new_password')->input('password')?>
    <?= $form->field($model, 'password_confirm')->input('password')?>
    <?= $form->field($model, 'created_at')->input('datetime-local')?>
    <div><input class="btn btn-primary" type="submit" value="Обновить"></div>
<?php ActiveForm::end()?>
