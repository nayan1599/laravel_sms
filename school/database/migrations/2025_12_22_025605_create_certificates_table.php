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
    Schema::create('certificates', function (Blueprint $table) {
        $table->id();
        $table->string('student_name');
        $table->string('father_name')->nullable();
        $table->string('class');
        $table->string('roll')->nullable();
        $table->string('certificate_type'); // bonafide, character, testimonial
        $table->date('issue_date');
        $table->text('remarks')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};
