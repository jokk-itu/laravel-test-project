<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locations')->insert([
            'name' => 'North'
        ]);

        DB::table('locations')->insert([
            'name' => 'South'
        ]);

        DB::table('locations')->insert([
            'name' => 'East'
        ]);

        DB::table('locations')->insert([
            'name' => 'West'
        ]);
    }
}
