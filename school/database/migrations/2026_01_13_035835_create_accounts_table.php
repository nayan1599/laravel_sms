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
 Schema::create('accounts', function (Blueprint $table) {
    $table->id();

    // Income / Expense category
    $table->foreignId('category_id')
          ->constrained('account_categories')
          ->cascadeOnDelete();

    // Transaction type
    $table->enum('transaction_type', ['income', 'expense']);

    // Basic info
    $table->string('title', 255);
    $table->decimal('amount', 12, 2);

    // Accounting info
    $table->date('transaction_date');
    $table->string('reference_no')->nullable();

    // Extra
    $table->text('description')->nullable();
    $table->foreignId('created_by')->nullable()->constrained('users');

    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
