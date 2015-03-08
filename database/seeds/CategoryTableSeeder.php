<?php

use Valgomat\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
//use Laracasts\TestDummy\Factory as TestDummy;

class CategoryTableSeeder extends Seeder {

    public function run()
    {
        Category::insert(
            [
                [
                    'name'       => 'Skole og oppvekst',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'name'       => 'Miljø og ressurser',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'name'       => 'Skatter og avgifter',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'name'       => 'Eldre og ungdom',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'name'       => 'Generelt',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]
            ]
        );
    }

}