<?php

use App\Models\Transaction;
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
        Schema::create('movements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cash_id');
            $table->unsignedBigInteger('command_id')->nullable()->unique();
            $table->enum('type', [Transaction::INGRESS, Transaction::EGRESS])->default(Transaction::INGRESS);
            $table->double('amount');
            $table->text('description')->nullable();

            $table->foreign('cash_id')->references('id')->on('cashes');
            $table->foreign('command_id')->references('id')->on('commands');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movements');
    }
};
