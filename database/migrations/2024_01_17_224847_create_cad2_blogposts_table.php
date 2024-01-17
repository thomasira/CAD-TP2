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
        Schema::create('cad2_blogposts', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('article');
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('cad2_students');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cad2_blogposts');
    }
};
