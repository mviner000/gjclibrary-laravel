<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Categories;
use App\Models\Department;
// use App\Models\Project;
use App\Models\User;
use App\Models\Tag;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'id' => 1,
            'name' => 'Zura',
            'email' => 'zura@example.com',
            'password' => bcrypt('123.321A'),
            'email_verified_at' => time()
        ]);
        User::factory()->create([
            'id' => 2,
            'name' => 'John Smith',
            'email' => 'john@example.com',
            'password' => bcrypt('123.321A'),
            'email_verified_at' => time()
        ]);

        
        // Generate 100 tags
        Tag::factory()->count(100)->create();
        
        // Generate 100 tags
        Author::factory()->count(10)->create();

        // Generate 100 tags
        Categories::factory()->count(100)->create();
        
        // Generate 100 tags
        Department::factory()->count(6)->create();

        // Generate 100 tags
        Book::factory()->count(100)->create();
    }
}