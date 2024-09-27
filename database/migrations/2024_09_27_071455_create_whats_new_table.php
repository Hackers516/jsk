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
        Schema::create('whats_new', function (Blueprint $table) {
            $table->id();
            $table->text('card_image');
$table->string('date');
$table->string('name');
$table->text('bio');
$table->string('organizer')->nullable();
$table->text('location')->nullable();
$table->text('Detail');
$table->timestamps();
$table->softDeletes();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('whats_new');
    }
};
