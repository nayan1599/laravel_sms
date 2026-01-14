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
      Schema::create('fees', function (Blueprint $table) {
    $table->id();

    // Relations
    $table->unsignedBigInteger('student_id');   // students.id
    $table->unsignedBigInteger('fee_type_id');  // fee_types.id

    // Fee period
    $table->string('month_year', 7); // 2025-01, 2025-02

    // Amounts
    $table->decimal('amount_due', 10, 2);
    $table->decimal('amount_paid', 10, 2)->default(0.00);
    $table->decimal('discount', 10, 2)->default(0.00);
    $table->decimal('fine', 10, 2)->default(0.00);

    // Dates
    $table->date('due_date');
    $table->date('payment_date')->nullable();

    // Payment info
    $table->enum('payment_method', [
        'CASH',
        'BKASH',
        'NAGAD',
        'BANK',
        'CARD',
        'OTHER'
    ])->nullable();

    $table->string('transaction_id', 50)->nullable();

    // Status
    $table->enum('status', [
        'PENDING',
        'PARTIAL',
        'PAID',
        'OVERDUE'
    ])->default('PENDING');

    $table->string('remarks', 255)->nullable();

    $table->timestamps();

    // Index & Foreign keys
    $table->foreign('fee_type_id')
          ->references('id')
          ->on('fee_types')
          ->onDelete('cascade');

    $table->index(['student_id', 'month_year'], 'idx_student_month');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fees');
    }
};
