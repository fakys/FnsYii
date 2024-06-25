<?php
/**
 * @var \yii\db\ActiveRecord $model
 */

use yii\db\Query;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
$group= (new Query())->select(['id', 'title'])->from('user_groups')->all();
$products = \backend\models\Product::find()->asArray()->all();

$product_sales = [];

foreach ($model->getProducts()->asArray()->all() as $val){
    $product_sales[$val['sale_id']] = ['Selected'=>'selected'];
}

?>


<?php $form = ActiveForm::begin(['enableClientValidation' => false])?>
    <?= $form->field($model, 'sale')->input('number')?>
    <?= $form->field($model, 'title')?>
    <?= $form->field($model, 'description')->textarea()?>
    <div>
        <?php if($model->icon):?>
        <label class="control-label">Старое фото</label>
        <div class="image-container-update">
            <img src="<?=Yii::getAlias('@frontendUrl')."/$model->icon"?>">
        </div>
        <?php endif;?>
        <?= $form->field($model, 'icon')->fileInput(['class'=>'form-control', 'accept'=>'image/png, image/gif, image/jpeg'])?>
    </div>
    <?=$form->field($model, 'products[]')->dropDownList(ArrayHelper::map($products, 'id', 'title'), ['multiple'=>true, 'options' => $product_sales])?>
    <?= $form->field($model, 'created_at')->input('datetime-local')?>
    <div><input class="btn btn-primary" type="submit" value="Создать"></div>
<?php ActiveForm::end()?>
