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
        Schema::create('service_translates', function (Blueprint $table) {
            $table->id();
            $table->integer('service_id');
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->text('card_text')->nullable();
            $table->text('main_text')->nullable();
            $table->string('lang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_translates');
    }
};
