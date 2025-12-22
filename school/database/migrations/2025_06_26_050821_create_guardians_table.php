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
      Schema::create('guardians', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('user_id');
    $table->string('national_id', 30)->unique()->nullable();
    $table->enum('relation', ['father', 'mother', 'guardian']);
    $table->string('occupation', 100)->nullable();
    $table->string('education_level', 100)->nullable();
    $table->string('income_range', 50)->nullable();
    $table->text('address')->nullable();
    $table->boolean('emergency_contact')->default(false);
    $table->enum('status', ['active', 'inactive', 'deceased'])->default('active');
    $table->timestamps();

 });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guardians');
    }
};
