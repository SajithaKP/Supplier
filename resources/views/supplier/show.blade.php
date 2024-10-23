<x-layout>
    <h1>Supplier Details</h1>
    <p><strong>Supplier No:</strong> {{ $supplier->id }}</p>
    <p><strong>Supplier Name:</strong> {{ $supplier->name }}</p>
    <p><strong>Address:</strong> {{ $supplier->address }}</p>
    <p><strong>TAX No:</strong> {{ $supplier->tax_no }}</p>
    <p><strong>Country:</strong> {{ $supplier->country }}</p>
    <p><strong>Mobile No:</strong> {{ $supplier->mobile }}</p>
    <p><strong>Email:</strong> {{ $supplier->email }}</p>
    <p><strong>Status:</strong> {{ $supplier->status }}</p>
    <a href="{{ route('suppliers.index') }}" class="btn btn-primary">Back to List</a>
</x-layout>