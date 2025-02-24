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
        Schema::create('academic_categories', function (Blueprint $table) {
            $table->id();
            $table->text('thumbnail_img');
            $table->text('main_img')->nullable();
            $table->string('title');
            $table->text('short_desc');
            $table->text('long_desc');
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
        Schema::dropIfExists('academic_categories');
    }
};
