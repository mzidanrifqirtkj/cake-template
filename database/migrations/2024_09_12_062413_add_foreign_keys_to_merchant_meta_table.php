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
        Schema::table('merchant_meta', function (Blueprint $table) {
            $table->foreign(['merchant_id'], 'FK__merchants')->references(['id'])->on('merchants')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('merchant_meta', function (Blueprint $table) {
            $table->dropForeign('FK__merchants');
        });
    }
};
