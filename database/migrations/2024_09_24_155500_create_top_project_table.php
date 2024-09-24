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
        Schema::create('top_project', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('projects_name_id');
$table->string('image');
$table->timestamps();
$table->softDeletes();
$table->foreign('projects_name_id')->references('id')->on('projects_name')->onDelete('cascade');

    });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('top_project');
    }
};
