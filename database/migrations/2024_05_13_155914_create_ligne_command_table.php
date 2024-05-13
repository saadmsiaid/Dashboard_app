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
        Schema::create('ligne_command', function (Blueprint $table) {
            $table->unsignedBigInteger('command_id');
            $table->unsignedBigInteger('product_id');
            $table->foreign('command_id')->references("id")->on("commands");
            $table->foreign('product_id')->references("id")->on("products");
            $table->integer('quantity');
            $table->decimal('price_per_unit', 8, 2);
            $table->decimal('total_price', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ligne_command');
    }
};
