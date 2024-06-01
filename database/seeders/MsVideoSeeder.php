<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\MsVideo;

class MsVideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::factory()->create();

        // Generate 10 videos for the created user
        MsVideo::factory(10)->create([
            'UserID' => $user->id,
        ]);
    }
    
}
