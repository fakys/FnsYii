<?php
/**
 * @var \yii\db\ActiveRecord $model
 */

use backend\components\CreateObjectsComponent;
use yii\db\Query;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
$categories= (new Query())->select(['id', 'title'])->from('categories')->all();
$photos = $model->getPhotos()->asArray()->all();
$sales = \backend\models\Sale::find()->asArray()->all();
$product_sales = [];

foreach ($model->getSales()->asArray()->all() as $val){
    $product_sales[$val['sale_id']] = ['Selected'=>'selected'];
}
?>


<?php $form = ActiveForm::begin(['enableClientValidation' => false])?>
    <?= $form->field($model, 'title')?>
    <?= $form->field($model, 'description')->textarea()?>
    <?=$form->field($model, 'price')->input('number')?>
    <div>
        <?php if($model->main_photo):?>
            <label class="control-label">Старое фото</label>
            <div class="image-container-update">
                <img src="<?=Yii::getAlias('@frontendUrl')."/$model->main_photo"?>">
            </div>
        <?php endif;?>
        <?=$form->field($model, 'main_photo')->fileInput(['class'=>'form-control', 'accept'=>'image/png, image/gif, image/jpeg'])?>
    </div>
    <div>
        <?php if($photos):?>
        <div class="images-scroll-block">
            <?php foreach ($photos as $val):?>
            <div class="images-container-update">
                <img src="<?=Yii::getAlias('@frontendUrl')."/{$val['photo']}"?>">
                <div>photo: <?=$val['photo']?></div>
                <div><samp>id: <?=$val['id']?></samp></div>
                <?=$form->field($model,"deleted_photos[{$val['id']}]")->checkbox()?>
            </div>
            <?php endforeach;?>
        </div>
        <?php endif;?>
        <?=$form->field($model, 'photos[]')->fileInput(['class'=>'form-control', 'accept'=>'image/png, image/gif, image/jpeg', 'multiple'=>true])?>
    </div>
    <?=$form->field($model, 'category_id')->dropDownList(ArrayHelper::map($categories, 'id','title'))?>
    <?=$form->field($model, 'sales[]')->dropDownList(ArrayHelper::map($sales, 'id', 'title'), ['multiple'=>true, 'options' => $product_sales])?>
    <?= $form->field($model, 'created_at')->input('datetime-local')?>
    <div><input class="btn btn-primary" type="submit" value="Обновить"></div>
<?php ActiveForm::end()?>
