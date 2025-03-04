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
        Schema::create('campus_life_categories', function (Blueprint $table) {
            $table->id();
            $table->text('thumbnail_img');
            $table->string('title');
            $table->text('short_desc')->nullable();
            $table->text('long_desc')->nullable();
            $table->string('type');
            $table->string('link')->nullable();
            $table->tinyInteger('status')->default(1)->comment('1=active, 0=inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campus_life_categories');
    }
};
