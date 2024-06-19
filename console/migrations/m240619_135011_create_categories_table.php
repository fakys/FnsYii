<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%categories}}`.
 */
class m240619_135011_create_categories_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%categories}}', [
            'id' => $this->primaryKey(),
            'title'=>$this->string()->notNull()->unique(),
            'catalog_id'=>$this->integer()->notNull(),
            'icon'=>$this->string(500),
            'created_at'=>$this->dateTime(),
            'updated_at'=>$this->dateTime()
        ]);
        $this->addForeignKey(
            'fk-categories-catalog_id',
            'categories',
            'catalog_id',
            'catalogs',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%categories}}');
    }
}
