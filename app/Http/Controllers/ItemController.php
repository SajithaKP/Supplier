<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::with('supplier')->get();
        return view('item.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $suppliers = Supplier::all(); 
        return view('item.create', compact('suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'inventory_location' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'supplier_id' => 'required|integer',
            'stock_unit' => 'required|string|max:255',
            'unit_price' => 'required|numeric',
            'image' => 'nullable|array', 
            'status' => 'required|in:Enabled,Disabled',
        ]);

        if ($request->hasFile('image')) {
            $imagePaths = [];
            foreach ($request->file('image') as $file) {
                $imagePaths[] = $file->store('images', 'public');
            }
            $validated['image'] = json_encode($imagePaths);
        }
        
        Item::create($validated);

        return redirect()->route('items.index')->with('success', 'Item created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        return view('item.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        $suppliers = Supplier::all(); 
        return view('item.edit', compact('item', 'suppliers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Item $item)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'inventory_location' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'supplier_id' => 'required|integer',
            'stock_unit' => 'required|string|max:255',
            'unit_price' => 'required|numeric',
            'image' => 'nullable|array',
            'status' => 'required|in:Enabled,Disabled',
        ]);

        if ($request->hasFile('image')) {
            $imagePaths = [];
            foreach ($request->file('image') as $file) {
                $imagePaths[] = $file->store('images', 'public');
            }
            $validated['image'] = $imagePaths;
        }

        $item->update($validated);

        return redirect()->route('items.index')->with('success', 'Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();
        return redirect()->route('items.index')->with('success', 'Item deleted successfully.');
    }
}
