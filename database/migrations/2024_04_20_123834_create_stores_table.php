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
        Schema::create('stores', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('name');
            $table->string('slug');
            $table->string('billboard_url')->nullable();
            $table->string('logo_url')->nullable();
            $table->string('email')->nullable();
            $table->string('tel')->nullable();
            $table->string('adresse')->nullable();
            $table->text('header')->nullable();
            $table->foreignId('store_categorie_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stores');
    }
};
