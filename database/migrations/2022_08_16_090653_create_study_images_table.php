<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('study_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('study_id')->references('id')->on('studies')->onDelete('cascade');
            $table->foreignId('image_id')->references('id')->on('images')->onDelete('cascade');
            $table->boolean('featured');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('study_images');
    }
};
