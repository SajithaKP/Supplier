<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PurchaseOrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $purchaseOrders = PurchaseOrder::all(); 
        $items = Item::all(); 
        if ($purchaseOrders->count() > 0 && $items->count() > 0) {
            foreach ($purchaseOrders as $purchaseOrder) {
                foreach ($items as $item) {
                    // Randomly generate order details
                    $unitPrice = $item->unit_price; 
                    $orderQty = rand(1, 50); 
                    $itemAmount = $orderQty * $unitPrice; 
                    $discount = rand(1, 20); 
                    $netAmount = $itemAmount - $discount; 
                    PurchaseOrderItem::create([
                        'purchase_order_id' => $purchaseOrder->id,
                        'item_id' => $item->id,
                        'stock_unit' => $item->stock_unit, 
                        'unit_price' => $unitPrice,
                        'packing_unit' => $this->getRandomPackingUnit(), 
                        'order_qty' => $orderQty,
                        'item_amount' => $itemAmount,
                        'discount' => $discount,
                        'net_amount' => $netAmount,
                    ]);
                }
            }
        }
    }
    private function getRandomPackingUnit(): string
    {
        // Define available packing units
        $packingUnits = ['Box', 'Carton', 'Bag', 'Pallet'];
        return $packingUnits[array_rand($packingUnits)];
    }
}
