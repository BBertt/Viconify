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
            'UserID' => $this->faker->numberBetween(1, 5),
            'VideoImage' => 'Assets/images/videos/sample_image.jpg',
            'VideoLinkEmbedded' => 'Assets/videos/sample_video.mp4',
            'Title' => $this->faker->text(),
            'Description' => $this->faker->text(800),
            'PostTime' => $this->faker->time(),
            'Views' => $this->faker->randomNumber(),
            'Like' => $this->faker->randomNumber(),
            'Dislike' => $this->faker->randomNumber(),
            'VideoType' => $this->faker->randomElement(['Videos']),
        ];
    }
}
