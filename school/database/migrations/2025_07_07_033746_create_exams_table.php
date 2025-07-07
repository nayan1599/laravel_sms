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
      Schema::create('exams', function (Blueprint $table) {
        $table->id();
        $table->string('exam_name', 100);
        $table->unsignedBigInteger('class_id');
        $table->unsignedBigInteger('section_id')->nullable();
        $table->unsignedBigInteger('subject_id')->nullable();
        $table->date('exam_date');
        $table->time('start_time')->nullable();
        $table->time('end_time')->nullable();
        $table->integer('total_marks')->default(100);
        $table->integer('pass_marks')->default(33);
        $table->enum('exam_type', ['written', 'oral', 'practical', 'online'])->default('written');
        $table->enum('status', ['scheduled', 'completed', 'cancelled'])->default('scheduled');
        $table->timestamps();

        $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade');
        $table->foreign('section_id')->references('id')->on('sections')->onDelete('set null');
        $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('set null');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
};
