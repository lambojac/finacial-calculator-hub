<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('calculators', function (Blueprint $table) {
            $table->id();
            $table->string('name');   // Name of the calculator
            $table->string('slug')->unique(); // URL slug
            $table->text('description')->nullable(); // Short description
            $table->json('default_values')->nullable(); // Default input values
            $table->json('constants')->nullable(); // Any constants like tax brackets
            $table->timestamps(); // created_at and updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('calculators');
    }
};
