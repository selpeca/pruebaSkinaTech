<?php

use yii\db\Migration;

class m240225_222401_create_users_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'username' => $this->string(255)->notNull()->unique(),
            'password_hash' => $this->string(512),
            'access_token' => $this->string(1024),
            'is_active' => $this->boolean()->notNull()->defaultValue(true),
            'owner' => $this->integer(1)->defaultValue(0),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('users');
    }
}
