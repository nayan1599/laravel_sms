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
        Schema::create('periods', function (Blueprint $table) {
            $table->id();  // BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY

            $table->unsignedTinyInteger('period_number');  // 0 = Assembly, 1,2,3...
            $table->string('name', 50)->nullable();        // '1st Period', 'Lunch Break' ইত্যাদি

            $table->time('start_time');                    // TIME type
            $table->time('end_time');

            // Generated column - duration in minutes (signed যাতে negative হলেও error না হয়)
            $table->smallInteger('duration_min')
                ->generatedAs('TIMESTAMPDIFF(MINUTE, start_time, end_time)')
                ->stored()
                ->nullable();  // optional: যদি invalid time হয় তাহলে null

            $table->boolean('is_break')->default(false);   // true = break/lunch/assembly

            $table->unsignedTinyInteger('sort_order')->default(99);

            $table->timestamps();  // created_at, updated_at (TIMESTAMP)

            // Indexes for faster queries
            $table->index('period_number');
            $table->index('is_break');
            $table->index('sort_order');

            // Unique constraint যাতে duplicate period time না হয়
            $table->unique(['period_number', 'start_time', 'end_time'], 'unique_period_time');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('periods');
    }
};