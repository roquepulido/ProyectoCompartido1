<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illunate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            'name'=> Str::random(8),
            'email'=>Str::random(15) . '@gmail.com',
            'assessment'=>Str::random(2)
        ]);
    }
}
