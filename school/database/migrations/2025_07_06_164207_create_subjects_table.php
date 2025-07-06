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
      Schema::create('subjects', function (Blueprint $table) {
    $table->id();
    $table->string('subject_name', 100);
    $table->string('subject_code', 20)->unique();

    $table->unsignedBigInteger('class_id');
    $table->enum('type', ['compulsory', 'optional'])->default('compulsory');

    $table->integer('full_marks')->default(100);
    $table->integer('pass_marks')->default(33);
    $table->integer('practical_marks')->default(0);

    $table->unsignedBigInteger('subject_teacher_id')->nullable();

    $table->enum('status', ['active', 'inactive'])->default('active');

    $table->timestamps();

    $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade');
    $table->foreign('subject_teacher_id')->references('id')->on('teachers')->onDelete('set null');
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};
