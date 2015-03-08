<?php

use Valgomat\Party;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PartyTableSeeder extends Seeder
{

    public function run()
    {
        Party::create([
            'name'       => 'Arbeiderpartiet',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ])->opinions()->attach([1,9,17,25]);

        Party::create([
            'name'       => 'Fremskrittspartiet',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ])->opinions()->attach([2,10,18,1]);

        Party::create([
            'name'       => 'Høyre',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ])->opinions()->attach([3,11,19,2]);

        Party::create([
            'name'       => 'Kristelig Folkeparti',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ])->opinions()->attach([4,12,20,3]);

        Party::create([
            'name'       => 'Miljøpartiet De Grønne',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ])->opinions()->attach([5,13,21,4]);

        Party::create([
            'name'       => 'Senterpartiet',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ])->opinions()->attach([6,14,22,5]);

        Party::create([
            'name'       => 'Sosialistisk Venstreparti',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ])->opinions()->attach([7,15,23,6]);

        Party::create([
            'name'       => 'Venstre',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ])->opinions()->attach([8,16,24,7]);
    }

}