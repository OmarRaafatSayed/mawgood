<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('vendor_order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vendor_order_id');
            // Use unsigned integer to match existing order_items.id column type (avoid FK type mismatch)
            $table->unsignedInteger('order_item_id');
            // Match `products.id` which is `increments` (unsigned integer)
            $table->unsignedInteger('product_id')->nullable();
            $table->integer('qty')->default(0);
            $table->decimal('price', 12, 4)->default(0);
            $table->decimal('total', 12, 4)->default(0);
            $table->timestamps();

            $table->foreign('vendor_order_id')->references('id')->on('vendor_orders')->onDelete('cascade');
            $table->foreign('order_item_id')->references('id')->on('order_items')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('vendor_order_items');
    }
};
