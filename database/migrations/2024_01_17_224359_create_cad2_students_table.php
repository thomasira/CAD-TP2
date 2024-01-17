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
        Schema::create('cad2_students', function (Blueprint $table) {
            $table->id();
            $table->text('adress');
            $table->string('phone', 20);
            $table->string('d_o_b', 12);
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('city_id')->references('id')->on('cad2_cities');
            $table->foreign('user_id')->references('id')->on('cad2_users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cad2_students');
    }
};
