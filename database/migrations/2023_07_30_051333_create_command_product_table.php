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
        Schema::create('command_product', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('command_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('quantity');
            $table->text('instruction')->nullable();

            // Agregar relación con la tabla de commands
            $table->foreign('command_id')->references('id')->on('commands');

            // Agregar relación con la tabla de products
            $table->foreign('product_id')->references('id')->on('products');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('command_product');
    }
};
