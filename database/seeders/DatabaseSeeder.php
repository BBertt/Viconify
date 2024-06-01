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

        $this->call([
            MsVideoSeeder::class,
            MsProductSeeder::class,
            MsPictureSeeder::class
        ]);

        MsUser::factory(1)->create();
        MsVideo::factory(40)->create();

    }
}
