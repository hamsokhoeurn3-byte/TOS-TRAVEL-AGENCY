<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('slug')->unique();
            $table->string('name');
            $table->string('area');
            $table->text('description');

            $table->string('price_level', 20);
            $table->unsignedInteger('price_from');
            $table->decimal('rating', 2, 1);

            $table->string('style');
            $table->text('image_url');

            $table->json('room_types');
            $table->text('website_url')->nullable();

            $table->unsignedInteger('sort_order')->default(0);

            $table->timestamp('created_at')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};
