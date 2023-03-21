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
            $table->id(); // Automatically create the ID
            // $table->unsignedBigInteger('id')->autoIncrement();
            $table->string('title'); // Max length 255 chars
            $table->string('sub_title')->nullable(); // allows for NO subtitle
            $table->boolean('series')->default(false);
            $table->string('isbn13', 13)->nullable();
            $table->tinyInteger('edition')->nullable();
            $table->boolean('is_fiction')->default(true);
            $table->string('language', 8)->default('en');
            $table->year('published')->nullable();
            $table->string('format', 16)->default('paperback');
//            $table->unsignedBigInteger('publisher_id')->nullable();
            $table->foreignId('publisher_id')->default(1);
            $table->timestamps(); // autocreate created_at, updated_at
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
