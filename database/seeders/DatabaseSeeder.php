<?php

namespace Database\Seeders;

use App\Models\MsUser;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        MsUser::factory()->create();
        $this->call(MsProductSeeder::class);
        $this->call(MsPictureSeeder::class);
    }
}
