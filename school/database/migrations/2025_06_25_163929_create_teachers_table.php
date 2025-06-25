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

            $table->string('employee_id', 50)->unique();
            $table->string('designation', 100);
            $table->string('department', 100)->nullable();

            $table->string('qualification', 255)->nullable();
            $table->integer('experience_years')->default(0);

            $table->date('date_of_joining');
            $table->date('date_of_leaving')->nullable();

            $table->string('subject_specialization', 255)->nullable();

            $table->decimal('salary', 10, 2)->default(0.00);
            $table->enum('employment_type', ['permanent', 'contract', 'part-time'])->default('permanent');

            $table->string('blood_group', 5)->nullable();
            $table->string('emergency_contact_name', 100)->nullable();
            $table->string('emergency_contact_phone', 20)->nullable();

            $table->enum('status', ['active', 'on_leave', 'resigned', 'retired'])->default('active');

            $table->timestamps();

            // Foreign key
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
