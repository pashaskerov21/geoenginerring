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
        Schema::create('service_alt_contents', function (Blueprint $table) {
            $table->id();
            $table->integer('service_id');
            $table->string('image')->nullable();
            $table->string('image_old')->nullable();
            $table->integer('sort')->default(-1);
            $table->integer('destroy')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_alt_contents');
    }
};
