<x-layout>

    <h1>Edit Supplier</h1>
    <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST">
        @csrf
        @method('PATCH') 
        <div class="form-group">
            <label for="name">Supplier Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $supplier->name }}" required>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ $supplier->address }}" required>
        </div>
        <div class="form-group">
            <label for="tax_no">TAX No</label>
            <input type="text" class="form-control" id="tax_no" name="tax_no" value="{{ $supplier->tax_no }}" required>
        </div>
        <div class="form-group">
            <label for="country">Country</label>
            <select class="form-control" id="country" name="country" required>
                <option value="{{ $supplier->country }}">{{ $supplier->country }}</option>
                <option value="Afghanistan">Afghanistan</option>
                <option value="Argentina">Argentina</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Brazil">Brazil</option>
                <option value="China">China</option>
                <option value="Pakistan">Pakistan</option>
                <option value="Russia">Russia</option>
                <option value="Saudi Arabia">Saudi Arabia</option>
                <option value="Singapore">Singapore</option>
                <option value="South Africa">South Africa</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="India">India</option>
                <option value="Iran">Iran</option>
                <option value="USA">USA</option>
                <option value="UK">UK</option>
                <option value="Korea">Korea</option>
                <option value="Turkey">Turkey</option>
            </select>
        </div>
        <div class="form-group">
            <label for="mobile">Mobile No</label>
            <input type="text" class="form-control" id="mobile" name="mobile" value="{{ $supplier->mobile }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $supplier->email }}" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="Active" {{ $supplier->status == 'Active' ? 'selected' : '' }}>Active</option>
                <option value="Inactive" {{ $supplier->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                <option value="Blocked" {{ $supplier->status == 'Blocked' ? 'selected' : '' }}>Blocked</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Supplier</button>
    </form>

</x-layout>
