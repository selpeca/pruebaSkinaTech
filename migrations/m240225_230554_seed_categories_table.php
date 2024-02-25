<?php

use yii\db\Migration;

/**
 * Class m240225_230554_seed_categories_table
 */
class m240225_230554_seed_categories_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insertCategories();

    }

    private function insertCategories(){
        $faker = \Faker\Factory::create();

        $this->insert('categories',['name' => 'Tecnología']);
        $this->insert('categories',['name' => 'Hogar']);
        $this->insert('categories',['name' => 'Comida']);
        for ($i = 0; $i < 20; $i++) {
            $this->insert(
                'categories',
                [
                    'name' => $faker->word(),
                    'parent_id' => rand(1,3)
                ]
            );
        }
    }
}
