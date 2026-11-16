<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('service_requests', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('category', 30);
            $table->string('service_name');
            $table->date('service_date');
            $table->unsignedInteger('guests');

            $table->string('full_name');
            $table->string('email');
            $table->string('phone', 50);

            $table->text('pickup_location')->nullable();
            $table->text('message')->nullable();

            $table->decimal('total_price', 10, 2);

            $table->timestamp('created_at')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_requests');
    }
};
