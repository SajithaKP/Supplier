<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Supplier;
use App\Models\Item;
use App\Models\PurchaseOrder;

class HomeController extends Controller
{
    public function index()
    {
        // Get the latest suppliers, items, and purchase orders (for example)
        $suppliers = Supplier::where('status', 'Active')->get();
        $items = Item::where('status', 'Enabled')->get();
        $purchaseOrders = PurchaseOrder::with('items')->latest()->get();

        // Pass data to the view
        return view('home', compact('suppliers', 'items', 'purchaseOrders'));
    }
}


