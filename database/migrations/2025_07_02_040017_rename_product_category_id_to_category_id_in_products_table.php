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
        Schema::table('products', function (Blueprint $table) {
            // Mengubah nama kolom dari 'product_category_id' menjadi 'category_id'
            $table->renameColumn('product_category_id', 'category_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Mengembalikan nama kolom dari 'category_id' menjadi 'product_category_id'
            $table->renameColumn('category_id', 'product_category_id');
        });
    }
};
