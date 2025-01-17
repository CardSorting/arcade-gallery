<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('games', function (Blueprint $table) {
            $table->string('store_title')->nullable()->after('title');
            $table->text('store_description')->nullable()->after('description');
            $table->string('store_icon')->nullable()->after('store_description');
            $table->json('store_screenshots')->nullable()->after('store_icon');
            $table->string('store_category')->nullable()->after('store_screenshots');
            $table->decimal('store_price', 8, 2)->nullable()->after('store_category');
            $table->boolean('store_featured')->default(false)->after('store_price');
            $table->timestamp('store_published_at')->nullable()->after('store_featured');
        });
    }

    public function down()
    {
        Schema::table('games', function (Blueprint $table) {
            $table->dropColumn([
                'store_title',
                'store_description',
                'store_icon',
                'store_screenshots',
                'store_category',
                'store_price',
                'store_featured',
                'store_published_at'
            ]);
        });
    }
};
