<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tours', function (Blueprint $table): void {
            $table->json('itinerary')->nullable();
            $table->json('included_items')->nullable();
            $table->json('excluded_items')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('tours', function (Blueprint $table): void {
            $table->dropColumn(['itinerary', 'included_items', 'excluded_items']);
        });
    }
};
