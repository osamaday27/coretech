<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations to build the categories table cleanly.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // The hardware category name (e.g., GPUs, CPUs)
            $table->string('slug')->unique(); // SEO friendly URL slug
            $table->string('icon')->nullable(); // Image or icon pathway
            $table->boolean('is_visible')->default(true); // Toggle visibility on front-end
            
            // CORRECTED: This properly adds the 'deleted_at' column for Soft Deletes
            $table->softDeletes(); 
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations by dropping the table entirely.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
