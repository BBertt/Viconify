<?php

namespace Database\Seeders;

use App\Models\MsUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class MsUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MsUser::create([
            'UserID' => 1,
            'ProfileImage' => 'profile_images/Nico.png',
            'Name' => 'Jerenico Franssen Imannuel',
            'password' => Hash::make('password'),
            'email' => 'jerenico@gmail.com',
            'Address' => 'Silkwood Lt. 19',
            'PhoneNumber' => '0812543921',
            'Role' => 'user',
            'StoreName' => 'Franssesco'
        ]);

        MsUser::create([
            'UserID' => 2,
            'ProfileImage' => 'profile_images/Botak.jpg',
            'Name' => 'Hairy Sebastian Putra',
            'password' => Hash::make('password'),
            'email' => 'sebastian@gmail.com',
            'Address' => 'Sutera Jelita 7',
            'PhoneNumber' => '0812543921',
            'Role' => 'user',
            'StoreName' => 'Hairy Store'
        ]);
    }
}
