<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KidGenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kid_genre')->insert([
            [
                'idkid_genre'=>1,
                'genre_name' => 'Niño',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'idkid_genre'=>2,
                'genre_name' => 'Niña',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
