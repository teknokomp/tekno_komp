<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id'); // BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT
            $table->string('name', 255); // VARCHAR(255) NOT NULL
            $table->string('email', 255)->unique(); // VARCHAR(255) UNIQUE NOT NULL
            $table->text('address')->nullable(); // TEXT NULLABLE
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
