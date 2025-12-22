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
        Schema::create('sections', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('class_id');
        $table->string('section_name', 10);
        $table->integer('section_capacity')->default(40);
        $table->unsignedBigInteger('section_teacher_id')->nullable();
        $table->enum('status', ['active', 'inactive'])->default('active');
        $table->timestamps();

      
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sections');
    }
};
