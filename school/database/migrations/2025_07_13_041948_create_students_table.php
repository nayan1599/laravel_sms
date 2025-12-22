<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();

            // Personal Information
            $table->string('name', 100);
            $table->string('name_bn', 100)->nullable();
            $table->string('father_name', 100)->nullable();
            $table->string('father_name_bn', 100)->nullable();
            $table->string('mother_name', 100)->nullable();
            $table->string('mother_name_bn', 100)->nullable();

            // Guardian Information
            $table->string('guardian_name', 100)->nullable();
            $table->string('guardian_contact', 15)->nullable();
            $table->string('guardian_relation', 50)->nullable();

            // Contact & Address
            $table->string('contact', 15)->nullable();
            $table->string('present_address', 255)->nullable();
            $table->string('permanent_address', 255)->nullable();

            // Academic Information
            $table->unsignedBigInteger('class_id');
            $table->string('roll', 20)->nullable();  // Keep as STRING to match your form

            // Additional Details
            $table->date('date_of_birth');
            $table->string('blood_group', 5)->nullable();
            $table->string('religion', 50)->nullable();
            $table->string('gender', 10);
            $table->string('photo', 255)->nullable();

            $table->timestamps();

            // Foreign Key
         });
    }

    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
