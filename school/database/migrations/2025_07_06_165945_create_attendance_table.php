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
     Schema::create('attendance', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('section_id')->nullable();
            $table->unsignedBigInteger('subject_id')->nullable();
            $table->date('attendance_date');

            $table->enum('status', ['present', 'absent', 'late', 'leave'])->default('present');
            $table->string('remarks', 255)->nullable();

            $table->unsignedBigInteger('recorded_by')->nullable();
            $table->timestamp('recorded_at')->useCurrent();

            $table->timestamps();

            $table->unique(['student_id', 'attendance_date', 'subject_id']);

          
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendance');
    }
};
