<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('timetables', function (Blueprint $table) {
            $table->id();

            $table->foreignId('academic_year_id')->constrained();
            $table->foreignId('class_id')->constrained();
            $table->unsignedTinyInteger('day_of_week');

            $table->foreignId('period_id')->constrained();
            $table->foreignId('subject_id')->constrained();
            $table->foreignId('teacher_id')->constrained();
            $table->foreignId('room_id')->nullable()->constrained();

            $table->boolean('is_active')->default(true);
            $table->text('notes')->nullable();

            $table->timestamps();

            // Prevent duplicate routine
            $table->unique(
                ['academic_year_id', 'class_id', 'day_of_week', 'period_id'],
                'uq_class_day_period'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('timetables');
    }
};
