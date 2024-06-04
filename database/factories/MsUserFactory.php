<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MsUser>
 */
class MsUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ProfileImage' => 'Assets/DefaultProfile.png',
            'Name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'password' => Hash::make('password'),
            'PhoneNumber' => $this->faker->phoneNumber(),
            'Address' => $this->faker->address(),
            'Role' => 'user',
            'Balance' => 0,
            'LockedBalance' => 0
        ];
    }
}
