<?php
namespace backend\models;

use yii\db\ActiveRecord;
class Catalog extends ActiveRecord
{
    public static function tableName()
    {
        return 'catalogs';
    }

    public static function tableLabel()
    {
        return 'Каталоги';
    }
}