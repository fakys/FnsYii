<?php
namespace frontend\models;

class Catalog extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'catalogs';
    }
}