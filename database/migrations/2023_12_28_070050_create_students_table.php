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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('password');
            $table->string('nis');
            $table->string('name');
            $table->integer('gender');
            $table->date('birthday');
            $table->string('address');
            $table->string('image');
            $table->string('role');
            $table->unsignedBigInteger('id_class');

            $table->foreign('id_class')->references('id')->on('class_names');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
