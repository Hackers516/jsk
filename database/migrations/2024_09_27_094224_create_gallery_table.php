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
        Schema::create('gallery', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('name_id');
           $table->text('image');
             $table->timestamps();
           $table->softDeletes();
           $table->foreign('name_id')->references('id')->on('gallery_category')->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('gallery');
    }
};
