<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MsVideoSeeder extends Seeder
{
    public function run()
    {
        DB::table('ms_videos')->insert([
            [
                'UserID' => 1,
                'VideoImage' => 'Assets/HomeBanner.png',
                'VideoLinkEmbedded' => 'https://www.youtube.com/embed/example1',
                'Title' => 'Relaxing Music',
                'Description' => 'Relaxing music to help you unwind.',
                'PostTime' => Carbon::now(),
                'Views' => 1000,
                'Like' => 500,
                'Dislike' => 10,
                'VideoType' => 'Videos',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'UserID' => 1,
                'VideoImage' => 'Assets/Val.jpg',
                'VideoLinkEmbedded' => 'https://www.youtube.com/embed/example2',
                'Title' => 'Uplifting Musiccccccccccccccccccccccccccccccccccccccccccc',
                'Description' => 'Uplifting music to boost your mood.',
                'PostTime' => Carbon::now(),
                'Views' => 2000,
                'Like' => 1500,
                'Dislike' => 5,
                'VideoType' => 'Videos',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'UserID' => 1,
                'VideoImage' => 'Assets/Val.jpg',
                'VideoLinkEmbedded' => 'https://www.youtube.com/embed/example3',
                'Title' => 'Valorant Episode 7',
                'Description' => 'Gameplay of Valorant Episode 7.',
                'PostTime' => Carbon::now(),
                'Views' => 3000,
                'Like' => 2000,
                'Dislike' => 20,
                'VideoType' => 'Videos',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'UserID' => 1,
                'VideoImage' => 'Assets/Val.jpg',
                'VideoLinkEmbedded' => 'https://www.youtube.com/embed/example4',
                'Title' => 'Character Demo - Xiao',
                'Description' => 'Character demo for Xiao from Genshin Impact.',
                'PostTime' => Carbon::now(),
                'Views' => 4000,
                'Like' => 2500,
                'Dislike' => 15,
                'VideoType' => 'Videos',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
