<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%catalogs}}`.
 */
class m240619_134958_create_catalogs_table extends Migration
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

        $this->createTable('{{%catalogs}}', [
            'id' => $this->primaryKey(),
            'title'=>$this->string()->unique()->notNull(),
            'icon'=>$this->string(500),
            'created_at'=>$this->dateTime(),
            'updated_at'=>$this->dateTime()
        ],  $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%catalogs}}');
    }
}
