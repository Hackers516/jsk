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
        Schema::create('complete_projects', function (Blueprint $table) {
            $table->id();
            $table->text('card_image');
$table->string('date');
$table->string('title');
$table->string('desc');
$table->string('images');
$table->timestamps();
$table->softDeletes();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('complete_projects');
    }
};
