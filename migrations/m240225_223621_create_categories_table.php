<?php

use yii\db\Migration;

class m240225_223621_create_categories_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('categories', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
            'is_active' => $this->boolean()->notNull()->defaultValue(true),
            'parent_id' => $this->integer(),
        ]);

        $this->createIndex(
            'idx-categories-parent_id',
            'categories',
            'parent_id'
        );

        $this->addForeignKey(
            'fk-categories-parent_id',
            'categories',
            'parent_id',
            'categories',
            'id'
        );
            
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk-categories-parent_id','categories');
        $this->dropIndex('idx-categories-parent_id','categories');
        $this->dropTable('categories');
    }
}
