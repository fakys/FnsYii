<?php
namespace frontend\models;
use yii\db\ActiveRecord;

class UserGroup extends ActiveRecord
{
    public static function tableName()
    {
        return 'user_groups';
    }
}