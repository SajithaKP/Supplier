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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('inventory_location');
            $table->string('brand');
            $table->string('category');
            $table->foreignId('supplier_id')->constrained('suppliers');
            $table->string('stock_unit');
            $table->decimal('unit_price',8,2);
            $table->json('image');
            $table->enum('status',['Enabled','Disabled'])->default('Enabled');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
