<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderItem;
use App\Models\Supplier;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;

class PurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = PurchaseOrder::with('supplier')->get();
        return view('purchaseorder.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $suppliers = Supplier::where('status', 'Active')->get();
        $items = Item::where('status', 'Enabled')->get();
        return view('purchaseorder.create', compact('suppliers', 'items'));
    }

   

    public function store(Request $request)
    {
        // Validate the form data
        $data = $request->validate([
            'order_date' => 'required|date',
            'supplier_id' => 'required|exists:suppliers,id',
            'items' => 'required|array',
            'items.*.item_id' => 'required|exists:items,id',
            'items.*.order_qty' => 'required|integer|min:1',
            'items.*.discount' => 'nullable|numeric|min:0',
            'items.*.packing_unit' => 'required|string',
        ]);
    
        // Create the purchase order
        $purchaseOrder = PurchaseOrder::create([
            'order_date' => $data['order_date'],
            'supplier_id' => $data['supplier_id'],
            'item_total' => 0,
            'discount' => 0,
            'net_amount' => 0, 
        ]);
    
        $itemTotal = 0;
        $totalDiscount = 0;
    
        // Process each item
        foreach ($data['items'] as $itemData) {
            $item = Item::find($itemData['item_id']);
            $itemAmount = $item->unit_price * $itemData['order_qty'];
            $discount = $itemData['discount'] ?? 0;
            $netAmount = $itemAmount - $discount;
    
            $purchaseOrder->items()->create([
                'item_id' => $itemData['item_id'],
                'stock_unit' => $item->stock_unit,
                'unit_price' => $item->unit_price,
                'packing_unit' => $itemData['packing_unit'],
                'order_qty' => $itemData['order_qty'],
                'item_amount' => $itemAmount,
                'discount' => $discount,
                'net_amount' => $netAmount,
            ]);
    
            $itemTotal += $itemAmount;
            $totalDiscount += $discount;
        }
    
        // Update purchase order totals
        $purchaseOrder->update([
            'item_total' => $itemTotal,
            'discount' => $totalDiscount,
            'net_amount' => $itemTotal - $totalDiscount,
        ]);
    
        return redirect()->route('purchaseorders.index')->with('success', 'Purchase order created successfully.');
    }
    


    public function exportExcel()
    {
        $orders = PurchaseOrder::with('supplier')->get();
        return (new FastExcel($orders))->download('file.xlsx');
        
    }

    public function print()
    {
        $orders = PurchaseOrder::with('supplier')->get();
        $pdf = Pdf::loadView('pdf.invoice',['orders'=>$orders] );
        return $pdf->download('invoice.pdf');
        
    }
}
