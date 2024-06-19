<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_groups}}`.
 */
class m240619_110529_create_user_groups_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions= null;
        if($this->db->driverName === 'mysql'){
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user_groups}}', [
            'id' => $this->primaryKey(),
            'title'=>$this->string()->notNull(),
            'icon'=>$this->string(500),
            'created_at'=>$this->dateTime(),
            'updated_at'=>$this->dateTime()
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user_groups}}');
    }
}
