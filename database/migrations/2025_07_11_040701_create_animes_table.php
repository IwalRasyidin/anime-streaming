<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('animes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('producer');
            $table->string('duration');
            $table->date('release_date');
            $table->string('studio');
            $table->string('status');
            $table->string('slug')->unique();
            $table->text('description')->nullable(); // ✅ Revisi di sini
            $table->text('synopsis');
            $table->string('thumbnail')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animes');
    }
};
