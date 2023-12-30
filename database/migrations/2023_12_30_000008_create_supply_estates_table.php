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
        Schema::create('supply_estates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('order_type_id');
            $table->boolean('active');
            $table->string('title')->unique();
            $table->longText('description');
            $table->text('address');
            $table->string('slug')->unique();
            $table->integer('number_of_rooms')->nullable();
            $table->integer('number_of_bathroom')->nullable();
            $table->float('area');
            $table->jsonb('thumbnails')->nullable();
            $table->date('estate_active_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supply_estates');
    }
};
