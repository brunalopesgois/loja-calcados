<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_colors')->insert([
            'product_id' => 1,
            'color_id' => 1
        ]);

        DB::table('product_colors')->insert([
            'product_id' => 1,
            'color_id' => 2
        ]);

        DB::table('product_colors')->insert([
            'product_id' => 2,
            'color_id' => 4
        ]);

        DB::table('product_colors')->insert([
            'product_id' => 3,
            'color_id' => 3
        ]);
    }
}
