<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('store_listings', function (Blueprint $table) {
            $table->json('features')->nullable()->after('screenshots');
        });
    }

    public function down()
    {
        Schema::table('store_listings', function (Blueprint $table) {
            $table->dropColumn('features');
        });
    }
};
