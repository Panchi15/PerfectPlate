<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->string('Quantity');
            $table->double('TotalPrice');
            $table->unsignedBigInteger('UserID')->default(0);
            $table->unsignedBigInteger('ItemID')->default(0);
            $table->string('customization')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('UserID')->references('id')->on('users');
            $table->foreign('ItemID')->references('id')->on('items');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
