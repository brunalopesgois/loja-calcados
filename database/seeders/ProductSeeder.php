<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Tênis A',
            'lot_id' => 1,
            'description' => 'Um belo tênis da marca A'
        ]);

        DB::table('products')->insert([
            'name' => 'Sapatilha X',
            'lot_id' => 2,
            'description' => 'Um bela sapatilha da marca B'
        ]);

        DB::table('products')->insert([
            'name' => 'Chinelo Alpha',
            'lot_id' => 3,
            'description' => 'Um belo chinelo da marca Alpha'
        ]);
    }
}
