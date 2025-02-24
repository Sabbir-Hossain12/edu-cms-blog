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
        Schema::create('admissions', function (Blueprint $table) {
            $table->id();
            $table->string('title1')->nullable();
            $table->text('desc1')->nullable();
            $table->string('title2')->nullable();
            $table->text('desc2')->nullable();
            $table->string('title3')->nullable();
            $table->text('desc3')->nullable();
            $table->text('main_img');
            $table->text('short_desc')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admissions');
    }
};
