<?php
namespace backend\models;

use yii\db\ActiveRecord;
class UserGroup extends ActiveRecord
{
    public static function tableName()
    {
        return 'user_groups';
    }

    public static function tableLabel()
    {
        return 'Группы';
    }
}