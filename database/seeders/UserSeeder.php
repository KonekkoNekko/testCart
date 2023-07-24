<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'name' => 'Nabiel Setiawan',
            'username' => 'konekkoUhuy',
            'email' => 'biel@awan',
            'password' => bcrypt('bielawan'),
        ]);
        User::create([
            'name' => 'Kevin Huditara',
            'username' => 'kepinginseng',
            'email' => 'pin@ken',
            'password' => bcrypt('pinseng'),
        ]);
    }
}
