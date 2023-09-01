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
        Schema::create('application_works', function (Blueprint $table) {
            $table->id();
            $table->integer('application_id');
            $table->string('company_name')->nullable();
            $table->string('position')->nullable();
            $table->string('work_start_date')->nullable();
            $table->string('work_end_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('application_works');
    }
};
