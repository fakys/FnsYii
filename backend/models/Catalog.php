<?php
namespace backend\models;

use yii\db\ActiveRecord;
class Catalog extends ActiveRecord
{
    public static function tableName()
    {
        return 'catalogs';
    }
}