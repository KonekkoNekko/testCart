<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'product_album' => 'Bela Lugosi Dead',
            'product_artist' => 'Bauhaus',
            'product_photo_filename' => 'bld.png',
            'product_price' => 200000,
        ]);

        Product::create([
            'product_album' => 'Born To Die',
            'product_artist' => 'Lana Del Rey',
            'product_photo_filename' => 'btd.png',
            'product_price' => 200000,
        ]);

        Product::create([
            'product_album' => 'Filosofem',
            'product_artist' => 'Burzum',
            'product_photo_filename' => 'fsm.png',
            'product_price' => 200000,
        ]);
    }
}
