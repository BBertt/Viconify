<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\MsComment;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MsComment>
 */
class MsCommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'PostID' => null,
            'VideoID' => $this->faker->numberBetween(1, 16),
            'ForumID' => null,
            'CommentParentID' => null,
            'UserID' => $this->faker->numberBetween(1, 5),
            'Comments' => $this->faker->text,
            'Like' => $this->faker->randomNumber(),
            'Dislike' => $this->faker->randomNumber(),
        ];
    }
}
