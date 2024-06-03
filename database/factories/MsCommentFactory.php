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
        $existingCommentIDs = MsComment::pluck('CommentID')->toArray();

        return [
            'PostID' => null,
            'VideoID' => $this->faker->numberBetween(1, 40),
            'ForumID' => null,
            'CommentParentID' => $this->faker->optional()->randomElement($existingCommentIDs),
            'UserID' => $this->faker->numberBetween(1, 5),
            'Comments' => $this->faker->text,
            'Like' => $this->faker->randomNumber(),
            'Dislike' => $this->faker->randomNumber(),
        ];
    }
}
