<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ToySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('toys')->insert([
            [
                'id_toy' => 1,
                'toy_name' => 'Hotwheel',
                'toy_price' => 45.99,
                'url' => 'hotwheel.jpg',
                'id_toy_genre' => 1, // Niño
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'id_toy' => 2,
                'toy_name' => 'Barbie',
                'toy_price' => 25.50,
                'url' => 'barbie.jpg',
                'id_toy_genre' => 2, // Niña
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'id_toy' => 3,
                'toy_name' => 'Dino Riders',
                'toy_price' => 89.99,
                'url' => 'dino-riders.jpg',
                'id_toy_genre' => 1, // Niño
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'id_toy' => 4,
                'toy_name' => 'My little ponny',
                'toy_price' => 35.00,
                'url' => 'my-little-ponny.jpg',
                'id_toy_genre' => 2, // Niña
                'created_at' => now(), 'updated_at' => now()
            ],
        ]);
    }
}
