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
            'color' => 'Vermelho',
            'description' => 'Um belo tênis vermelho'
        ]);

        DB::table('products')->insert([
            'name' => 'Tênis A',
            'lot_id' => 1,
            'color' => 'Azul',
            'description' => 'Um belo tênis azul'
        ]);

        DB::table('products')->insert([
            'name' => 'Sapatilha X',
            'lot_id' => 2,
            'color' => 'Bege',
            'description' => 'Um bela sapatilha bege'
        ]);

        DB::table('products')->insert([
            'name' => 'Chinelo Alpha',
            'lot_id' => 3,
            'color' => 'Amarelo',
            'description' => 'Um belo chinelo amarelo'
        ]);
    }
}
