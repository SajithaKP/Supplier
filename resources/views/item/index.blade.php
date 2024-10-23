<x-layout>
  <div class="container">
      <h1>Items</h1>
      <a href="{{ route('items.create') }}" class="btn btn-primary mb-3">Add New Item</a>
      <table class="table">
          <thead>
              <tr>
                  <th>Name</th>
                  <th>Location</th>
                  <th>Brand</th>
                  <th>Category</th>
                  <th>Supplier</th>
                  <th>Stock Unit</th>
                  <th>Unit Price</th>
                  <th>Status</th>
                  <th>Actions</th>
              </tr>
          </thead>
          <tbody>
              @foreach($items as $item)
              <tr>
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->inventory_location }}</td>
                  <td>{{ $item->brand }}</td>
                  <td>{{ $item->category }}</td>
                  <td>{{ $item->supplier->name }}</td>
                  <td>{{ $item->stock_unit }}</td>
                  <td>{{ $item->unit_price }}</td>
                  <td>{{ $item->status }}</td>
                  <td>
                    <a href="{{ route('items.show', $item->id) }}" class="btn btn-info">View</a>
                      <a href="{{ route('items.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                      <form action="{{ route('items.delete', $item->id) }}" method="POST" style="display:inline;">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger">Delete</button>
                      </form>
                  </td>
              </tr>
              @endforeach
          </tbody>
      </table>
  </div>
 
</x-layout>