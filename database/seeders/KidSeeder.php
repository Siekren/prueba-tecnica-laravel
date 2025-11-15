<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kid')->insert([
            [
                'name' => 'Rodrigo Garcia',
                'email' => "roga@gmail.com",
                'idkid_genre' => 1,
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'name' => 'Malena Fernandez',
                'email' => "mafer@gmail.com",
                'idkid_genre' => 2,
                'created_at' => now(), 'updated_at' => now()
            ],
        ]);
    }
}
