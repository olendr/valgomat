<?php

use Valgomat\Category;
use Valgomat\Opinion;
use Illuminate\Database\Seeder;
use Faker\Factory;

class OpinionTableSeeder extends Seeder {

    public function run()
    {
        $faker = Factory::create();

        $categories = Category::all();

        foreach($categories as $category) {

            foreach(range(1, 5) as $index) {
                Opinion::create(
                    [
                        'content' => $faker->sentence,
                        'category_id' => $category->id
                    ]
                );
            }
        }
    }
}