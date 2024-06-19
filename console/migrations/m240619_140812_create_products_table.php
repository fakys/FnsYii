<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%products}}`.
 */
class m240619_140812_create_products_table extends Migration
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
        $this->createTable('{{%products}}', [
            'id' => $this->primaryKey(),
            'title'=>$this->string()->notNull(),
            'description'=>$this->text()->notNull(),
            'price'=>$this->integer()->notNull(),
            'main_photo'=>$this->string(),
            'category_id'=>$this->integer(),
            'created_at'=>$this->dateTime(),
            'updated_at'=>$this->dateTime()
        ], $tableOptions);

        $this->addForeignKey(
            'fk-products-category_id',
            'products',
            'category_id',
            'categories',
            'id',
            'SET NULL'
        );

        $this->createTable('{{%product_photos}}', [
            'id' => $this->primaryKey(),
            'photo'=>$this->string(500)->notNull(),
            'product_id'=>$this->integer()->notNull()
        ], $tableOptions);

        $this->addForeignKey(
            'fk-product_photos-product_id',
            'product_photos',
            'product_id',
            'products',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product_photos}}');
        $this->dropTable('{{%products}}');
    }
}
