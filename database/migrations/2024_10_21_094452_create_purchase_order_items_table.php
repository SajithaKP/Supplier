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
        Schema::create('purchase_order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('purchase_order_id')->constrained('purchase_orders');
            $table->foreignId('item_id')->constrained('items');
            $table->string('stock_unit');
            $table->decimal('unit_price', 8, 2);
            $table->string('packing_unit');
            $table->integer('order_qty');
            $table->decimal('item_amount', 10, 2); 
            $table->decimal('discount', 10, 2)->default(0);
            $table->decimal('net_amount', 10, 2); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_order_items');
    }
};
