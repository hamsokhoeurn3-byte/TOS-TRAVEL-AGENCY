<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('stay_bookings', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->foreignUuid('hotel_id')
                ->constrained('hotels')
                ->restrictOnDelete();

            $table->string('room_type')->nullable();

            $table->date('check_in');
            $table->date('check_out');

            $table->unsignedInteger('guests')->default(2);
            $table->unsignedInteger('rooms')->default(1);

            $table->string('full_name');
            $table->string('email');
            $table->string('phone', 50);

            $table->text('message')->nullable();

            $table->timestamp('created_at')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stay_bookings');
    }
};
