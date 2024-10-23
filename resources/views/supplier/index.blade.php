<x-layout>
  <h1>Suppliers</h1>
  <a href="{{ route('suppliers.create') }}" class="btn btn-primary">Add Supplier</a>
  @if (session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
  @endif
  <table class="table">
      <thead>
          <tr>
              <th>Supplier No</th>
              <th>Supplier Name</th>
              <th>Address</th>
              <th>TAX No</th>
              <th>Country</th>
              <th>Mobile No</th>
              <th>Email</th>
              <th>Status</th>
              <th>Actions</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($suppliers as $supplier)
              <tr>
                  <td>{{ $supplier->id }}</td>
                  <td>{{ $supplier->name }}</td>
                  <td>{{ $supplier->address }}</td>
                  <td>{{ $supplier->tax_no }}</td>
                  <td>{{ $supplier->country }}</td>
                  <td>{{ $supplier->mobile }}</td>
                  <td>{{ $supplier->email }}</td>
                  <td>{{ $supplier->status }}</td>
                  <td>
                      <a href="{{ route('suppliers.show', $supplier->id) }}" class="btn btn-info">View</a>
                      <a href="{{ route('suppliers.edit', $supplier->id) }}" class="btn btn-warning">Edit</a>
                      <form action="{{ route('suppliers.delete', $supplier->id) }}" method="POST" style="display:inline;">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger">Delete</button>
                      </form>
                  </td>
              </tr>
          @endforeach
      </tbody>
  </table>
  <div>{{ $suppliers->links() }}</div>
</x-layout>