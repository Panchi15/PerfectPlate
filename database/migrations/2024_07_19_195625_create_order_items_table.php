<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('OrderID');
            $table->unsignedBigInteger('ItemID');
            $table->string('Quantity');
            $table->string('Customization');
            $table->double('Price');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('OrderID')->references('id')->on('orders');
            $table->foreign('ItemID')->references('id')->on('items');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
