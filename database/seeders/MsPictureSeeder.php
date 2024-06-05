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
            'PictureData' => 'product_images/product_1_1.png'
        ]);

        MsPicture::create([
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

        MsPicture::create([
            'PictureID' => 9,
            'ProductID' => 6,
            'PictureData' => 'product_images/product_6_1.png'
        ]);

        MsPicture::create([
            'PictureID' => 10,
            'ProductID' => 6,
            'PictureData' => 'product_images/product_6_2.png'
        ]);

        MsPicture::create([
            'PictureID' => 11,
            'ProductID' => 7,
            'PictureData' => 'product_images/product_7_1.png'
        ]);

        MsPicture::create([
            'PictureID' => 12,
            'ProductID' => 7,
            'PictureData' => 'product_images/product_7_2.png'
        ]);

        MsPicture::create([
            'PictureID' => 13,
            'ProductID' => 8,
            'PictureData' => 'product_images/product_8_1.png'
        ]);

        MsPicture::create([
            'PictureID' => 14,
            'ProductID' => 8,
            'PictureData' => 'product_images/product_8_2.png'
        ]);

        MsPicture::create([
            'PictureID' => 15,
            'ProductID' => 9,
            'PictureData' => 'product_images/product_9_1.png'
        ]);

        MsPicture::create([
            'PictureID' => 16,
            'ProductID' => 9,
            'PictureData' => 'product_images/product_9_2.png'
        ]);

        MsPicture::create([
            'PictureID' => 17,
            'ProductID' => 10,
            'PictureData' => 'product_images/product_10_1.png'
        ]);

        MsPicture::create([
            'PictureID' => 18,
            'ProductID' => 10,
            'PictureData' => 'product_images/product_10_2.png'
        ]);
    }
}
