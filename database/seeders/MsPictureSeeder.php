<?php

namespace Database\Seeders;

use App\Models\MsPicture;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MsPictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MsPicture::create([
            'ProductID' => 1,
            'PictureData' => 'product_images/default.jpg'
        ]);
        MsPicture::create([
            'ProductID' => 2,
            'PictureData' => 'product_images/default.jpg'
        ]);
        MsPicture::create([
            'ProductID' => 3,
            'PictureData' => 'product_images/default.jpg'
        ]);
        MsPicture::create([
            'ProductID' => 4,
            'PictureData' => 'product_images/default.jpg'
        ]);
        MsPicture::create([
            'ProductID' => 4,
            'PictureData' => 'product_images/Nico.png'
        ]);
        MsPicture::create([
            'ProductID' => 4,
            'PictureData' => 'product_images/Goblin.png'
        ]);
    }
}
