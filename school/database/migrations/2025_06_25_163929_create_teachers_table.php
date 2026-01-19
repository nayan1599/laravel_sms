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
  Schema::create('teachers', function (Blueprint $table) {
    $table->id();

    $table->unsignedBigInteger('user_id');

    $table->string('name', 150);
    $table->string('email', 150);
    $table->string('phone', 20)->nullable();

    $table->string('employee_id', 50)->unique();
    $table->string('designation', 100);
    $table->string('department', 100)->nullable();

    $table->enum('gender', ['male', 'female', 'other'])->nullable();
    $table->date('date_of_birth')->nullable();

    $table->string('qualification', 255)->nullable();
    $table->integer('experience_years')->default(0);

    // 🔹 NEW: Skills & Education
    $table->json('skills')->nullable();      
    $table->json('education')->nullable();   

    $table->date('date_of_joining');
    $table->date('date_of_leaving')->nullable();

    $table->string('subject_specialization', 255)->nullable();

    $table->decimal('salary', 10, 2)->default(0.00);

    $table->enum('employment_type', ['permanent', 'contract', 'part-time'])
          ->default('permanent');

    $table->string('photo')->nullable();

    $table->string('blood_group', 5)->nullable();

    $table->enum('status', ['active', 'on_leave', 'resigned', 'retired'])
          ->default('active');

    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
