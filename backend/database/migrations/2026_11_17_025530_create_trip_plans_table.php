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
        Schema::create('trip_plans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('trip_name');
            $table->json('days');
            $table->unsignedInteger('total_price')->default(0);
            $table->unsignedInteger('travelers')->default(2);
            $table->string('pace', 20)->default('balanced');
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trip_plans');
    }
};
