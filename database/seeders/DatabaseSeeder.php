<?php

namespace Database\Seeders;

use App\Models\MsUser;
use App\Models\User;
use App\Models\MsVideo;
use App\Models\MsProduct;
use App\Models\MsPicture;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        MsUser::factory(1)->create();
        MsVideo::factory(40)->create();

        $this->call([
            MsProductSeeder::class,
            MsPictureSeeder::class,
            MsUserSeeder::class
        ]);



    }
}
