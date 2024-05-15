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
            $table->decimal('ko1')->default(0);
            $table->decimal('ko2')->default(0);
            $table->decimal('sub1')->default(0);
            $table->decimal('sub2')->default(0);
            $table->decimal('praktik')->default(0);
            $table->decimal('uts_uas')->default(0);
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
