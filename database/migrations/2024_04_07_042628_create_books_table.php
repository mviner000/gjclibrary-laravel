<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description')->nullable();
            $table->integer('quantity')->default(0);
            $table->json('tags')->nullable();
            $table->json('authors')->nullable();
            $table->json('categories')->nullable();
            $table->json('departments')->nullable();
            $table->string('cabinet_number')->nullable();
            $table->string('cabinet_side');
            $table->string('status');
            $table->foreignId('status_approved_by')->nullable()->constrained('users');
            $table->timestamp('status_updated_at')->nullable();
            $table->float('rating')->nullable();
            $table->integer('year_published')->nullable();
            $table->integer('pages')->nullable();
            $table->string('image_path')->nullable();
            $table->foreignId('borrowed_by')->nullable()->constrained('users');
            $table->foreignId('borrowed_book_approved_by')->nullable()->constrained('users');
            $table->timestamp('borrowed_date')->nullable();
            $table->timestamp('returned_date')->nullable();
            $table->foreignId('returned_by')->nullable()->constrained('users');
            $table->foreignId('returned_book_approved_by')->nullable()->constrained('users');
            $table->foreignId('created_by')->constrained('users');
            $table->foreignId('updated_by')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
