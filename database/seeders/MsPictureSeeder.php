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
    }
}
