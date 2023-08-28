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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
						$table->string('invoice');
						$table->foreignId('user_id')->references('id')->on('users');
						$table->foreignId('product_id')->references('id')->on('products');
						$table->text('pesan')->nullable();
						$table->integer('quantity');
						$table->bigInteger('total_price');
						$table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
