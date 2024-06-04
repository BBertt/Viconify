<?php

namespace Database\Seeders;

use App\Models\MsComment;
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

        MsUser::factory(5)->create();
        $this->call([
            MsVideoSeeder::class,
            MsProductSeeder::class,
            MsPictureSeeder::class
        ]);
        MsComment::factory(200)->create();
    }
}
