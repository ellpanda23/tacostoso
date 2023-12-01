<?php

use App\Models\Order;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->string('quantity');
            $table->string('instruction')->nullable();
            $table->enum('status', [Order::PENDIENTE, Order::TERMINADO])->default(Order::PENDIENTE);

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('command_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('table_id');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('command_id')->references('id')->on('commands');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('table_id')->references('id')->on('tables');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
