<?php

use yii\db\Migration;

/**
 * Class m240225_230608_seed_products_table
 */
class m240225_230608_seed_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insertPorducts();
    }
    
    private function insertPorducts(){
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 50; $i++) {
            $this->insert('products',['name' => $faker->word()]);
        }
    }
}
