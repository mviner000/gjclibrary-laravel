<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Author;
use App\Models\Categories;
use App\Models\Department;
use App\Models\Tag;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->realText($maxNbChars = 50); // Adjust maxNbChars as needed
        $formattedName = ucwords($name);

        // Set a default image path
        $imagePath = 'https://source.unsplash.com/480x640/?book';     

        // Generate a random year of publication between 1800 and the current year
        $currentYear = date('Y');
        $yearPublished = fake()->numberBetween($min = 1800, $max = $currentYear);
 
        return [
            //
            'name' => $formattedName,
            'description' => fake()->realText(),
            'quantity' => fake()->numberBetween($min = 1, $max = 100),
            // 'author_id' => fake()->numberBetween($min = 1, $max = 100),
            'authors' => Author::pluck('id')->random(fake()->numberBetween($minTags = 1, $maxTags = 3)),
            'tags' => Tag::pluck('id')->random(fake()->numberBetween($minTags = 1, $maxTags = 10)),
            'categories' => Categories::pluck('id')->random(fake()->numberBetween($minTags = 1, $maxTags = 2)),
            'departments' => Department::pluck('id')->random(fake()->numberBetween($minTags = 1, $maxTags = 1)),
            'cabinet_number' => fake()->numberBetween($min = 1, $max = 6),
            'cabinet_side' => fake()->randomElement(['Left', 'Right']),
            'status' => fake()->randomElement(['Verified', 'Unverified', 'Phased Out']),
            'status_approved_by' => 1,
            'status_updated_at' => fake()->dateTimeThisYear(),
            'rating' =>fake()->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 5),
            'year_published' => $yearPublished,
            'pages' => fake()->numberBetween($min = 50, $max = 2000),
            'image_path' => $imagePath,
            'borrowed_by' => 1,
            'borrowed_book_approved_by' => 1,
            'borrowed_date' => fake()->dateTimeBetween('now', '+1 month'),
            'returned_date' => fake()->dateTimeBetween('+1 month', '+1 year'),
            'returned_by' => 1,
            'returned_book_approved_by' => 1,
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => time(),
            'updated_at' => time(),
        ];
    }
}
