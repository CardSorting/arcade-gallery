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
        Schema::table('store_listings', function (Blueprint $table) {
            $table->string('developer')->nullable()->after('game_id');
        });
    }

    public function down(): void
    {
        Schema::table('store_listings', function (Blueprint $table) {
            $table->dropColumn('developer');
        });
    }
};
