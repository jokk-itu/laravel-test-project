<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status')->insert([
            'name' => "Available",
            'color' => "Green",
        ]);

        DB::table('status')->insert([
            'name' => "Under Maintenance",
            'color' => "Red",
        ]);

        DB::table('status')->insert([
            'name' => "Unreachable",
            'color' => "Grey",
        ]);

        DB::table('status')->insert([
            'name' => "Timed Maintenance",
            'color' => "Yellow",
        ]);
    }
}
