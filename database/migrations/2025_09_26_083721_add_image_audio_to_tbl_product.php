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
        Schema::table('tbl_product', function (Blueprint $table) {
            $table->string('category_image')->nullable();
            $table->string('category_audio')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_product', function (Blueprint $table) {
            $table->dropColumn(['category_image', 'category_audio']);
        });
    }
};
