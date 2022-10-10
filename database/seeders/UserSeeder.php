<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->insert([         
            'name'=> 'lectorOne',
            'email' => 'one@mail.com',
            'password'=> 'marcador',
        ]);
    }
}


