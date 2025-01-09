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
            $table->string('book_number', 4)->unique(); // Max 4 characters, unique, not null
            $table->string('research_title', 100); // Max 100 characters, not null
            $table->string('researcher', 50); // Max 50 characters, not null
            $table->string('abstract', 255); // Max 255 characters, not null
            $table->string('held_by', 50); // Max 50 characters, not null
            $table->enum('location', ['Book shelf 1', 'Book shelf 2', 'Book shelf 3', 'Book shelf 4', 'Book shelf 5']); // Enum for bookshelf
            $table->enum('status', ['active', 'inactive']); // Enum for status
            $table->timestamps();
            $table->softDeletes(); // Soft delete column
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
