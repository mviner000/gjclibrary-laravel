<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Book;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Author>
 */
class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Generate a full name for the author
        $fullName = $this->faker->name;

        // Generate a random username
        $username = Str::slug($this->faker->unique()->userName);

        // Construct RoboHash image URL based on the username
        $imageUrl = "https://robohash.org/{$username}.png?size=200x200";

        return [
            'name' => $fullName,
            'image_path' => $imageUrl,
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}