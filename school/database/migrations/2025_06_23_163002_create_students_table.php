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

//  Schema::create('students', function (Blueprint $table) {
//             $table->id();

//             $table->unsignedBigInteger('user_id');
//             $table->string('roll_number', 20)->unique();
//             $table->string('registration_no', 30)->unique();

//             $table->unsignedBigInteger('class_id');
//             $table->unsignedBigInteger('section_id')->nullable();

//             $table->date('admission_date');
//             $table->string('academic_year', 9);

//             $table->string('guardian_name', 100);
//             $table->string('guardian_relation', 50)->default('father');
//             $table->string('guardian_phone', 20)->nullable();
//             $table->string('guardian_email', 100)->nullable();
//             $table->text('guardian_address')->nullable();

//             $table->string('blood_group', 5)->nullable();
//             $table->text('medical_conditions')->nullable();

//             $table->string('previous_school', 100)->nullable();
//             $table->boolean('transfer_certificate')->default(false);

//           $table->string('photo')->nullable();
//             $table->enum('status', ['active', 'inactive', 'left', 'expelled'])->default('active');

//             $table->timestamps();

//             // Foreign keys
//             $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
//             $table->foreign('class_id')->references('id')->on('classes')->onDelete('restrict');
//             $table->foreign('section_id')->references('id')->on('sections')->onDelete('set null');
//         });



        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->date('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('class');
            $table->string('section')->nullable();
            $table->string('roll')->nullable();
            $table->string('address')->nullable();
            $table->string('photo')->nullable();
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
