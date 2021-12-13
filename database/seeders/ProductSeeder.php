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
            'description' => 'Um belo tênis da marca A',
            'price' => 349.49
        ]);

        DB::table('products')->insert([
            'name' => 'Sapatilha X',
            'lot_id' => 2,
            'color' => 'Azul',
            'description' => 'Um bela sapatilha da marca B',
            'price' => 118.59
        ]);

        DB::table('products')->insert([
            'name' => 'Chinelo Alpha',
            'lot_id' => 3,
            'color' => 'Amarelo',
            'description' => 'Um belo chinelo da marca Alpha',
            'price' => 39.99
        ]);

        DB::table('products')->insert([
            'name' => 'Bota XYZ',
            'lot_id' => 1,
            'color' => 'Marrom',
            'description' => 'Uma bela bota da marca XYZ',
            'price' => 39.99
        ]);

        DB::table('products')->insert([
            'name' => 'Chuteira ABC',
            'lot_id' => 1,
            'color' => 'Verde',
            'description' => 'Uma chuteira da marca ABC',
            'price' => 149.90
        ]);

        DB::table('products')->insert([
            'name' => 'Mocassim XYZ',
            'lot_id' => 2,
            'color' => 'Preto',
            'description' => 'Um sapato estilo mocassim da marca XYZ',
            'price' => 263.57
        ]);

        DB::table('products')->insert([
            'name' => 'Sapato de salto alto Omega',
            'lot_id' => 2,
            'color' => 'Rosa',
            'description' => 'Um sapato de salto alto da marca Omega',
            'price' => 170.89
        ]);

        DB::table('products')->insert([
            'name' => 'Tênis de corrida Alpha',
            'lot_id' => 1,
            'color' => 'Roxo',
            'description' => 'Um tênis de corrida da marca Alpha',
            'price' => 680.12
        ]);

        DB::table('products')->insert([
            'name' => 'Rasteirinha Sigma',
            'lot_id' => 3,
            'color' => 'Branco',
            'description' => 'Uma rasteirinha da marca Sigma',
            'price' => 89.99
        ]);
    }
}
