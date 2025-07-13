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

            // Personal Information
            $table->string('name');
            $table->date('dob')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->default('male');
            $table->string('blood_group', 10)->nullable();
            $table->string('religion', 50)->nullable();
            $table->string('nationality', 50)->default('Bangladeshi');
            $table->string('birth_cert_no', 30)->nullable();

            // Contact Info
            $table->string('phone', 20)->nullable();
            $table->string('email', 100)->nullable();
            $table->text('present_address')->nullable();
            $table->text('permanent_address')->nullable();

            // Guardian Info
            $table->string('father_name', 100)->nullable();
            $table->string('mother_name', 100)->nullable();
            $table->string('guardian_phone', 20)->nullable();
            $table->string('guardian_occupation', 100)->nullable();

            // Academic Info
            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('section_id')->nullable();
            $table->string('roll', 20)->nullable();
            $table->string('previous_school', 150)->nullable();
            $table->string('last_exam_result', 50)->nullable();

            // Other
            $table->date('admission_date')->nullable();
            $table->string('photo')->nullable();
            $table->text('remarks')->nullable();

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
