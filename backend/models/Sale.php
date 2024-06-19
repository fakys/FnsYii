<?php
namespace backend\models;

use yii\db\ActiveRecord;
class Sale extends ActiveRecord
{
    public static function tableName()
    {
        return 'sales';
    }
}