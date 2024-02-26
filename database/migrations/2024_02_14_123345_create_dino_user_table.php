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
        Schema::create('dino_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dino_id')->index()->constrained('dinos');
            $table->foreignId('user_id')->index()->constrained('users');
            $table->unsignedBigInteger('qty')->default(1);
            $table->foreignId('order_id')->index()->constrained('orders');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dino_user');
    }
};
