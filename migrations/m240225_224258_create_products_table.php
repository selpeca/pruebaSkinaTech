<?php

use yii\db\Migration;

class m240225_224258_create_products_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('products', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
        ]);

        $this->createTable('products_categories', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->notNull(),
            'category_id' => $this->integer()->notNull(),
        ]);

        $this->createIndex('idx-products_categories-category_id','products_categories','category_id');
        $this->createIndex('idx-products_categories-product_id','products_categories','product_id');
        $this->addForeignKey('fk-products_categories-category_id','products_categories','category_id','categories','id');
        $this->addForeignKey('fk-products_categories-product_id','products_categories','product_id','products','id');
            
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk-products_categories-product_id','products');
        $this->dropForeignKey('fk-products_categories-category_id','products');
        $this->dropIndex('idx-products_categories-product_id','products_categories');
        $this->dropIndex('idx-products_categories-category_id','products_categories');
        $this->dropTable('products_categories');
        $this->dropTable('products');
    }
}
