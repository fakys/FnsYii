<?php

namespace frontend\components;

use frontend\models\Catalog;
use yii\base\Widget;

class CatalogMenuComponent extends Widget
{
    public function run()
    {
        $catalog = Catalog::find()->asArray()->all();
        return $this->render('catalog-menu', compact('catalog'));
    }
}