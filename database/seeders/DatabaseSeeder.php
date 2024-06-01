<?php

namespace Database\Seeders;

use App\Models\MsUser;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MsVideo;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = MsUser::factory()->create();

        // Generate 10 videos for the created user
        MsVideo::factory(10)->create([
            'UserID' => $user->id,
        ]);

    }
}
