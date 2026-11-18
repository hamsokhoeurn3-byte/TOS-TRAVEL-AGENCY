<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tours', function (Blueprint $table): void {
            $table->string('price_basis')->default('person');
            $table->text('capacity_note')->nullable();
            $table->json('vehicle_options')->nullable();
            $table->unsignedInteger('group_size')->nullable()->change();
        });

        Schema::table('bookings', function (Blueprint $table): void {
            $table->string('vehicle_option')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table): void {
            $table->dropColumn('vehicle_option');
        });

        Schema::table('tours', function (Blueprint $table): void {
            $table->dropColumn(['price_basis', 'capacity_note', 'vehicle_options']);
            $table->unsignedInteger('group_size')->default(10)->nullable(false)->change();
        });
    }
};
