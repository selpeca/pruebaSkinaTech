<?php

use yii\db\Migration;

class m240225_230542_seed_users_table extends Migration
{
    public function safeUp()
    {
        $this->insertUsers();
    }

    private function insertUsers() {
        $this->insert(
            'users',
            [
                'username' => 'admin',
                'password_hash' => \Yii::$app->security->generatePasswordHash('admin'),
                'access_token' => \Yii::$app->security->generateRandomString(256),
                'owner' => 1,
            ]
        );
        $this->insert(
            'users',
            [
                'username' => 'basic',
                'password_hash' => \Yii::$app->security->generatePasswordHash('basic'),
                'access_token' => \Yii::$app->security->generateRandomString(256),
                'owner' => 0,
            ]
        );
    }
}
