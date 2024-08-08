<?php

use yii\db\Migration;

/**
 * Class m240808_163930_create_basket
 */
class m240808_163930_create_basket extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('baskets', [
            'id'=>$this->primaryKey(),
            'user_id'=>$this->integer(),
            'product_id'=>$this->integer(),
            'created_at'=>$this->dateTime(),
            'updated_at'=>$this->dateTime()
        ]);
        $this->addForeignKey(
            'fk-basket-product_id',
            'baskets',
            'product_id',
            'products',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-basket-user_id',
            'baskets',
            'user_id',
            'users',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('basket');
    }

}
