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
        Schema::create('about_translates', function (Blueprint $table) {
            $table->id();
            $table->integer('about_id')->default(1);
            $table->text('home_text')->nullable();
            $table->text('main_text')->nullable();
            $table->string('lang')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_translates');
    }
};
