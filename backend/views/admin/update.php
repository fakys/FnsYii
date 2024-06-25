<?php
/**
 * @var \yii\db\ActiveRecord $obj
 */
use backend\components\UpdateObjectsComponent;
?>

<div class="pb-5">
    <?=UpdateObjectsComponent::widget(['model'=>$obj])?>
</div>

