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
            'PictureID' => 1,
            'ProductID' => 1,
            'PictureData' => 'product_images/default.jpg'
        ]);
        MsPicture::create([
            'PictureID' => 2,
            'ProductID' => 2,
            'PictureData' => 'product_images/default.jpg'
        ]);
        MsPicture::create([
            'PictureID' => 3,
            'ProductID' => 3,
            'PictureData' => 'product_images/default.jpg'
        ]);
        MsPicture::create([
            'PictureID' => 4,
            'ProductID' => 4,
            'PictureData' => 'product_images/default.jpg'
        ]);
        MsPicture::create([
            'PictureID' => 5,
            'ProductID' => 4,
            'PictureData' => 'product_images/Nico.png'
        ]);
        MsPicture::create([
            'PictureID' => 6,
            'ProductID' => 4,
            'PictureData' => 'product_images/Goblin.png'
        ]);
        MsPicture::create([
            'PictureID' => 7,
            'ProductID' => 5,
            'PictureData' => 'product_images/default.jpg'
        ]);
        MsPicture::create([
            'PictureID' => 8,
            'ProductID' => 6,
            'PictureData' => 'product_images/default.jpg'
        ]);
        MsPicture::create([
            'PictureID' => 9,
            'ProductID' => 7,
            'PictureData' => 'product_images/default.jpg'
        ]);
        MsPicture::create([
            'PictureID' => 10,
            'ProductID' => 8,
            'PictureData' => 'product_images/default.jpg'
        ]);
    }
}
