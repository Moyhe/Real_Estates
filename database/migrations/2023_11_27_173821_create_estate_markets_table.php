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
        Schema::create('estate_markets', function (Blueprint $table) {
            $table->id();
            $table->integer('number_of_deals');
            $table->integer('deal_value');
            $table->float('circulating_space');
            $table->float('max_price');
            $table->float('average_price');
            $table->float('min_price');
            $table->integer('best_order');
            $table->integer('best_supply');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estate_markets');
    }
};
