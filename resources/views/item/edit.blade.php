<x-layout>
<div class="container">
    <h1>Edit Item</h1>

    <form action="{{ route('items.update',  $item->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH') 



        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ $item->name }}" required>
        </div>

        <div class="form-group">
            <label>Inventory Location</label>
            <input type="text" name="inventory_location" class="form-control" value="{{ $item->inventory_location }}" required>
        </div>

        <div class="form-group">
            <label>Brand</label>
            <input type="text" name="brand" class="form-control" value="{{ $item->brand }}" required>
        </div>

        <div class="form-group">
            <label>Category</label>
            <input type="text" name="category" class="form-control" value="{{ $item->category }}" required>
        </div>

        <div class="form-group">
            <label>Supplier</label>
            <select name="supplier_id" class="form-control" required>
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->id }}" {{ $supplier->id == $item->supplier_id ? 'selected' : '' }}>
                        {{ $supplier->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Stock Unit</label>
            <input type="text" name="stock_unit" class="form-control" value="{{ $item->stock_unit }}" required>
        </div>

        <div class="form-group">
            <label>Unit Price</label>
            <input type="number" step="0.01" name="unit_price" class="form-control" value="{{ $item->unit_price }}" required>
        </div>

        <div class="form-group">
            <label>Images</label>
            <input type="file" name="image[]" class="form-control" multiple>
            @if ($item->image && is_array($item->image))
                <div>
                    <strong>Existing Images:</strong>
                    <ul>
                        @foreach ($item->image as $image)
                            <li><img src="{{ asset('storage/' . $image) }}" alt="Item Image" width="100"></li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="Enabled" {{ $item->status == 'Enabled' ? 'selected' : '' }}>Enabled</option>
                <option value="Disabled" {{ $item->status == 'Disabled' ? 'selected' : '' }}>Disabled</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
</x-layout>
