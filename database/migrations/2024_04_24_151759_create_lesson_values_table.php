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
        Schema::create('lesson_values', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_learning');
            $table->unsignedBigInteger('id_student')->unsigned();
            $table->float('ko1')->nullable();
            $table->float('ko2')->nullable();
            $table->float('sub1')->nullable();
            $table->float('sub2')->nullable();
            $table->float('praktik')->nullable();
            $table->float('uts_uas')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lesson_values');
    }
};
