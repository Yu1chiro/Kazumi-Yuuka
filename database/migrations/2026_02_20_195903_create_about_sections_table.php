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
        Schema::create('about_sections', function (Blueprint $table) {
            $table->id(); // TAMBAHKAN INI
            $table->string('name');
            $table->string('role');
            $table->text('about_me')->nullable();
            $table->string('thumbnail')->nullable();
            $table->timestamps(); // TAMBAHKAN INI
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_sections');
    }
};
