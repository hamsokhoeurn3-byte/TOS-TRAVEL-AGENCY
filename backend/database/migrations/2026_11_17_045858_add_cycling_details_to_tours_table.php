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
        Schema::table('tours', function (Blueprint $table): void {
            $table->string('tour_type')->nullable();
            $table->decimal('distance_km', 7, 2)->nullable();
            $table->string('difficulty_level')->nullable();
            $table->time('starting_time')->nullable();
            $table->string('bicycle_type')->nullable();
            $table->string('tour_guide')->nullable();
            $table->boolean('hotel_pickup')->nullable();
            $table->json('included_meals')->nullable();
            $table->json('included_drinks')->nullable();
            $table->string('meeting_point')->nullable();
            $table->unsignedInteger('available_seats')->nullable();
            $table->text('booking_requirements')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tours', function (Blueprint $table): void {
            $table->dropColumn([
                'tour_type',
                'distance_km',
                'difficulty_level',
                'starting_time',
                'bicycle_type',
                'tour_guide',
                'hotel_pickup',
                'included_meals',
                'included_drinks',
                'meeting_point',
                'available_seats',
                'booking_requirements',
            ]);
        });
    }
};
