<?php

use Valgomat\User;
use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
//use Laracasts\TestDummy\Factory as TestDummy;

class UserTableSeeder extends Seeder {

    public function run()
    {
        User::create(
            [
                'name' => 'Ole Gunnar Nedrebø',
                'email' => 'olendr@gmail.com',
                'password' => bcrypt('admin')
            ]
        );
    }

}