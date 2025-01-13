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
        Schema::create('offers', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('name'); // Offer name
            $table->text('description')->nullable(); // Offer description
            $table->decimal('price', 8, 2); // Offer price (e.g., 9999.99 max)
            $table->string('image')->nullable(); // Path to the offer's image
            $table->enum('status', ['active', 'inactive'])->default('inactive'); // Status of the offer
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
