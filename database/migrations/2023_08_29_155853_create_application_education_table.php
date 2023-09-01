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
        Schema::create('application_education', function (Blueprint $table) {
            $table->id();
            $table->integer('application_id');
            $table->string('education_level')->nullable();
            $table->string('education_name')->nullable();
            $table->string('education_field')->nullable();
            $table->string('education_start_date')->nullable();
            $table->string('education_end_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('application_education');
    }
};
