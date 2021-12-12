<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            'document' => '123.456.789-10',
            'name' => 'Eduarda Almeida',
            'birth_date' => '1999-10-10'
        ]);

        DB::table('customers')->insert([
            'document' => '987.654.321-01',
            'name' => 'Alex Cavalcanti',
            'birth_date' => '1988-06-06'
        ]);

        DB::table('customers')->insert([
            'document' => '123.123.123-12',
            'name' => 'Luiza Araujo',
            'birth_date' => '1977-05-05'
        ]);

        DB::table('customers')->insert([
            'document' => '321.321.321-21',
            'name' => 'Diego Cardoso',
            'birth_date' => '1995-07-01'
        ]);
    }
}
