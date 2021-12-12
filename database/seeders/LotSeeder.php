<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lots')->insert([
            'manufacturing_date' => '2018-01-10',
            'manufactured_products' => 50
        ]);

        DB::table('lots')->insert([
            'manufacturing_date' => '2019-06-20',
            'manufactured_products' => 200
        ]);

        DB::table('lots')->insert([
            'manufacturing_date' => '2020-10-25',
            'manufactured_products' => 130
        ]);
    }
}
