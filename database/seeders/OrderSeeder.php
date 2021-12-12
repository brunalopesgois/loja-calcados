<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            'customer_document' => '123.456.789-10',
            'seller_id' => 2,
            'amount' => 738.97
        ]);

        DB::table('orders')->insert([
            'customer_document' => '987.654.321-01',
            'seller_id' => 2,
            'amount' => 355.77
        ]);

        DB::table('orders')->insert([
            'customer_document' => '123.123.123-12',
            'seller_id' => 2,
            'amount' => 389.48
        ]);

        DB::table('orders')->insert([
            'customer_document' => '321.321.321-21',
            'seller_id' => 1,
            'amount' => 1096.12
        ]);
    }
}
