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
         Schema::create('classes', function (Blueprint $table) {
        $table->id();
        $table->string('class_name', 50);
        $table->integer('class_numeric');
        $table->string('class_code', 10)->unique()->nullable();
        $table->enum('medium', ['bangla', 'english', 'bilingual'])->default('bangla');
        $table->enum('shift', ['morning', 'day', 'evening'])->default('morning');
        $table->unsignedBigInteger('class_teacher_id')->nullable();
        $table->enum('status', ['active', 'inactive'])->default('active');
        $table->timestamps();

        $table->foreign('class_teacher_id')->references('id')->on('teachers')->onDelete('set null');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};
