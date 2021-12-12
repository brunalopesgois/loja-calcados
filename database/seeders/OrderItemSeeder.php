<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_items')->insert([
            'order_id' => 1,
            'product_id' => 1
        ]);

        DB::table('order_items')->insert([
            'order_id' => 1,
            'product_id' => 1
        ]);

        DB::table('order_items')->insert([
            'order_id' => 1,
            'product_id' => 3
        ]);

        DB::table('order_items')->insert([
            'order_id' => 2,
            'product_id' => 2
        ]);

        DB::table('order_items')->insert([
            'order_id' => 2,
            'product_id' => 2
        ]);

        DB::table('order_items')->insert([
            'order_id' => 2,
            'product_id' => 2
        ]);

        DB::table('order_items')->insert([
            'order_id' => 3,
            'product_id' => 1
        ]);

        DB::table('order_items')->insert([
            'order_id' => 3,
            'product_id' => 3
        ]);

        DB::table('order_items')->insert([
            'order_id' => 4,
            'product_id' => 1
        ]);

        DB::table('order_items')->insert([
            'order_id' => 4,
            'product_id' => 1
        ]);

        DB::table('order_items')->insert([
            'order_id' => 4,
            'product_id' => 2
        ]);

        DB::table('order_items')->insert([
            'order_id' => 4,
            'product_id' => 2
        ]);

        DB::table('order_items')->insert([
            'order_id' => 4,
            'product_id' => 3
        ]);

        DB::table('order_items')->insert([
            'order_id' => 4,
            'product_id' => 3
        ]);

        DB::table('order_items')->insert([
            'order_id' => 4,
            'product_id' => 3
        ]);

        DB::table('order_items')->insert([
            'order_id' => 4,
            'product_id' => 3
        ]);
    }
}
