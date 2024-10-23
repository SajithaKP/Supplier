<?php

namespace Database\Seeders;

use App\Models\PurchaseOrder;
use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PurchaseOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $suppliers = Supplier::where('status', 'Active')->get();

        if ($suppliers->count() > 0) {
            foreach ($suppliers as $supplier) {
                $itemTotal = rand(100, 1000);  
                $discount = rand(10, 100);     
                $netAmount = $itemTotal - $discount; 
                PurchaseOrder::create([
                    'order_date' => now(),
                    'supplier_id' => $supplier->id, 
                    'item_count' => $itemTotal, 
                    'discount' => $discount, 
                    'net_amount' => $netAmount
                ]);
            }
        }
    }
}
