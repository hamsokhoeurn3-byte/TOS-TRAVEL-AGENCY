<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('slug')->unique();
            $table->string('name');
            $table->string('tagline');
            $table->text('description');
            $table->unsignedInteger('price');
            $table->string('duration');
            $table->string('category');
            $table->unsignedInteger('group_size')->default(10);
            $table->text('image_url');
            $table->json('highlights');
            $table->boolean('featured')->default(false);
            $table->integer('sort_order')->default(0);
            $table->timestamp('created_at')->useCurrent();
        });

        Schema::create('bookings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('tour_id')
                ->constrained('tours')
                ->restrictOnDelete();

            $table->date('tour_date');
            $table->unsignedInteger('guests');
            $table->string('full_name');
            $table->string('email');
            $table->string('phone');
            $table->string('hotel_name')->nullable();
            $table->unsignedInteger('total_price');
            $table->string('status')->default('pending');
            $table->timestamp('created_at')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
        Schema::dropIfExists('tours');
    }
};
