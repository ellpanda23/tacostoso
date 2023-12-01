<?php

use App\Models\Product;
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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('slug');
            // TODO RELACION POLIMORFICA PARA GUARDAR MÁS IMAGENES (IF I NEED TO STORAGE MORE IMAGES)
            $table->string('image')->nullable();
            $table->text('description');
            $table->double('cost');
            $table->integer('stock')->nullable();
            $table->enum('status', [Product::AVAILABLE, Product::UNAVAILABLE])->default(Product::AVAILABLE);
            $table->enum('countable', [Product::COUNTABLE, Product::UNCOUNTABLE])->default(null)->nullable();
            $table->enum('metric', ['Kg', 'Gr', 'Lt', 'Ml'])->nullable();

            $table->unsignedBigInteger('category_id');

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
