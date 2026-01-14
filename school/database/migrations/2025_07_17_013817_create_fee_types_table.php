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
        Schema::create('fee_types', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->unique();          // Admission Fee, Tuition Fee
            $table->string('name_bn', 100)->nullable();     // বাংলা নাম
            $table->string('code', 20)->nullable()->unique(); // ADM, TUI
            $table->boolean('is_recurring')->default(false); // 0 = One-time, 1 = Recurring
            $table->enum('frequency', [
                'ONE_TIME',
                'MONTHLY',
                'QUARTERLY',
                'ANNUAL',
                'PER_TERM',
                'AS_NEEDED'
            ])->default('ONE_TIME');
            $table->boolean('is_refundable')->default(false); // Security deposit etc.
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fee_types');
    }
};
