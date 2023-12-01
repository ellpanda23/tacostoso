<?php

use App\Models\Cash;
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
        Schema::create('cashes', function (Blueprint $table) {
            $table->id();

            $table->double('initial_balance')->default(0);
            $table->double('final_balance')->nullable();
            $table->double('partial_cut')->nullable();
            $table->enum('status', [Cash::ACTIVE, Cash::CLOSED])->default(Cash::ACTIVE);
            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cashes');
    }
};
