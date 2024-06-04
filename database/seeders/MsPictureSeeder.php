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
            'PictureData' => 'product_images/product_1_1.png'
        ]);

        MsPicture::create([
            'PictureID' => 2,
            'ProductID' => 2,
            'PictureData' => 'product_images/product_2_1.png'
        ]);

        MsPicture::create([
            'PictureID' => 3,
            'ProductID' => 2,
            'PictureData' => 'product_images/product_2_2.png'
        ]);

        MsPicture::create([
            'PictureID' => 4,
            'ProductID' => 3,
            'PictureData' => 'product_images/product_3_1.png'
        ]);

        MsPicture::create([
            'PictureID' => 5,
            'ProductID' => 3,
            'PictureData' => 'product_images/product_3_2.png'
        ]);

        MsPicture::create([
            'PictureID' => 6,
            'ProductID' => 4,
            'PictureData' => 'product_images/product_4_1.png'
        ]);

        MsPicture::create([
            'PictureID' => 7,
            'ProductID' => 4,
            'PictureData' => 'product_images/product_4_2.png'
        ]);

        MsPicture::create([
            'PictureID' => 8,
            'ProductID' => 5,
            'PictureData' => 'product_images/product_5_1.png'
        ]);
    }
}
