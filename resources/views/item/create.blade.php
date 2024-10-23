<x-layout>
    <div class="container">
        <h1>Create Item</h1>
    
        <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
    
            <div class="form-group">
                <label>Inventory Location</label>
                <input type="text" name="inventory_location" class="form-control" required>
            </div>
    
            <div class="form-group">
                <label>Brand</label>
                <input type="text" name="brand" class="form-control" required>
            </div>
    
            <div class="form-group">
                <label>Category</label>
                <input type="text" name="category" class="form-control" required>
            </div>
    
            <div class="form-group">
                <label>Supplier</label>
                <select name="supplier_id" class="form-control" required>
                    @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                    @endforeach
                </select>
            </div>
    
            <div class="form-group">
                <label>Stock Unit</label>
                <input type="text" name="stock_unit" class="form-control" required>
            </div>
    
            <div class="form-group">
                <label>Unit Price</label>
                <input type="number" step="0.01" name="unit_price" class="form-control" required>
            </div>
    
            <div class="form-group">
                <label>Image</label>
                <input type="file" name="image[]" class="form-control" multiple>
            </div>
    
            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="Enabled">Enabled</option>
                    <option value="Disabled">Disabled</option>
                </select>
            </div>
    
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>

</x-layout>