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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('icon')->nullable();
            $table->string('card_img_1')->nullable();
            $table->string('card_img_2')->nullable();
            $table->string('text_img')->nullable();
            $table->string('catalog_pdf')->nullable();
            $table->integer('header_status')->default(0);
            $table->integer('home_status')->default(0);
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
        Schema::dropIfExists('services');
    }
};
