<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m240619_110538_create_users_table extends Migration
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

        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'name'=>$this->string(50)->notNull(),
            'email'=>$this->string()->notNull(),
            'group_id'=>$this->integer(),
            'avatar'=>$this->string(500),
            'password'=>$this->string(500)->notNull(),
            'status'=>$this->boolean()->defaultValue(1),
            'auth_key'=>$this->string()->null(),
            'access_token'=>$this->string()->null(),
            'created_at'=>$this->dateTime(),
            'updated_at'=>$this->dateTime()
        ], $tableOptions);
        $this->addForeignKey(
            'fk-users-group_id',
            'users',
            'group_id',
            'user_groups',
            'id',
            'SET NULL'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users}}');
    }
}
