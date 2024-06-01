<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MsVideo>
 */
class MsVideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'UserID' => \App\Models\User::factory(),
            'VideoImage' => $this->faker->imageUrl(),
            'VideoLinkEmbedded' => $this->faker->url(),
            'Title' => $this->faker->sentence,
            'Description' => $this->faker->paragraph,
            'PostTime' => now(),
            'Views' => 0,
            'Like' => 0,
            'Dislike' => 0,
            'VideoType' => $this->faker->randomElement(['Shorts', 'Videos']),
        ];
    }
}
