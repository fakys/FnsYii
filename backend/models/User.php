<?php
namespace backend\models;

use yii\db\ActiveRecord;
class User extends ActiveRecord
{
    public static function tableName()
    {
        return 'users';
    }

    public static function tableLabel()
    {
        return 'Пользователи';
    }
}