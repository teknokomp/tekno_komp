<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{public function up()
    {
    Schema::table('products', function (Blueprint $table) {
        $table->renameColumn('category_id', 'product_category_id');
    });
}

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->renameColumn('product_category_id', 'category_id');
        });
    }};
