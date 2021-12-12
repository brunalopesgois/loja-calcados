<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sellers')->insert([
            'name' => 'João Carvalho',
            'email' => 'vendedor1@loja.com',
            'password' => Hash::make('123456')
        ]);

        DB::table('sellers')->insert([
            'name' => 'Emilly Melo',
            'email' => 'vendedor2@loja.com',
            'password' => Hash::make('654321')
        ]);
    }
}
