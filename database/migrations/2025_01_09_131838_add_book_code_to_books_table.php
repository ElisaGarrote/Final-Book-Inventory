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
        Schema::table('books', function (Blueprint $table) {
            // Adding the new 'book_code' column
            $table->string('book_code', 50)->nullable(); // Allow book_code to be nullable initially
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            // Dropping the 'book_code' column if rollback is needed
            $table->dropColumn('book_code'); // Drop book_code column if rollback
        });
    }
};
