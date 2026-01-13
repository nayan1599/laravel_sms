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

        Schema::create('salaries', function (Blueprint $table) {
    $table->id();
    $table->foreignId('employee_id')->constrained('users')->cascadeOnDelete();
    $table->date('salary_month');
    $table->decimal('amount', 12, 2);
    $table->enum('status', ['pending', 'paid'])->default('pending');
    $table->date('paid_at')->nullable();
    $table->text('description')->nullable();
    $table->foreignId('created_by')->nullable()->constrained('users');
    $table->timestamps();
});
        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
