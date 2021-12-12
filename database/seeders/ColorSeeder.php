<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('colors')->insert([
            'name' => 'Vermelho'
        ]);

        DB::table('colors')->insert([
            'name' => 'Azul'
        ]);

        DB::table('colors')->insert([
            'name' => 'Amarelo'
        ]);

        DB::table('colors')->insert([
            'name' => 'Bege'
        ]);
    }
}
