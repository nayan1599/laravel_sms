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
    Schema::create('marks', function (Blueprint $table) {
        $table->id();

        $table->unsignedBigInteger('student_id');
        $table->unsignedBigInteger('exam_id');
        $table->unsignedBigInteger('subject_id');

        $table->decimal('marks_obtained', 5, 2);
        $table->integer('total_marks')->default(100);
        $table->string('grade', 5)->nullable();
        $table->string('remarks')->nullable();

        $table->unsignedBigInteger('recorded_by')->nullable();
        $table->timestamp('created_at')->useCurrent();
        $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

        $table->unique(['student_id', 'exam_id', 'subject_id']);

       
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marks');
    }
};
