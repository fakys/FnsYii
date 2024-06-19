<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_sale}}`.
 */
class m240619_142233_create_product_sale_table extends Migration
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
        $this->createTable('{{%sales}}', [
            'id' => $this->primaryKey(),
            'sale'=>$this->float()->notNull(),
            'title'=>$this->string(),
            'description'=>$this->text(),
            'icon'=>$this->string(500),
            'created_at'=>$this->dateTime(),
            'updated_at'=>$this->dateTime()
        ], $tableOptions);

        $this->createTable('{{%products_sales}}', [
            'id' => $this->primaryKey(),
            'product_id'=>$this->integer()->notNull(),
            'sale_id'=>$this->integer()->notNull(),
            'created_at'=>$this->dateTime(),
            'updated_at'=>$this->dateTime()
        ], $tableOptions);
        $this->addForeignKey(
            'fk-products_sales-product_id',
            'products_sales',
            'product_id',
            'products',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-products_sales-sale_id',
            'products_sales',
            'sale_id',
            'sales',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%products_sales}}');
        $this->dropTable('{{%sales}}');
    }
}
