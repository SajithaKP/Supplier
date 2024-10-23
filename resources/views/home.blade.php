
<x-layout>

<div class="container">
    <!-- Suppliers Section -->

    <div class="card mt-4">
      <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Suppliers</h5>
          <span class="badge badge-light">{{ $suppliers->count() }} Active</span>
      </div>
      <div class="card-body">
          @if($suppliers->count() > 0)
              <div class="table-responsive">
                  <table class="table table-striped">
                      <thead>
                          <tr>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Status</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($suppliers as $supplier)
                              <tr>
                                  <td>{{ $supplier->name }}</td>
                                  <td>{{ $supplier->email }}</td>
                                  <td>
                                      <span class="badge 
                                          @if($supplier->status == 'Active') 
                                              bg-success 
                                          @elseif($supplier->status == 'Inactive') 
                                              bg-warning 
                                          @else 
                                              bg-danger 
                                          @endif">
                                          {{ $supplier->status }}
                                      </span>
                                  </td>
                              </tr>
                          @endforeach
                      </tbody>
                  </table>
              </div>
          @else
              <p class="text-muted">No active suppliers available.</p>
          @endif
      </div>
  </div>
  

    <!-- Items Section -->
    <div class="card mt-4">
      <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Items</h5>
          <span class="badge badge-light">{{ $items->count() }} Available</span>
      </div>
      <div class="card-body">
          @if($items->count() > 0)
              <div class="table-responsive">
                  <table class="table table-striped">
                      <thead>
                          <tr>
                              <th>Name</th>
                              <th>Brand</th>
                              <th>Stock Unit</th>
                              <th>Unit Price</th>
                              <th>Status</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($items as $item)
                              <tr>
                                  <td>{{ $item->name }}</td>
                                  <td>{{ $item->brand }}</td>
                                  <td>{{ $item->stock_unit }}</td>
                                  <td>${{ number_format($item->unit_price, 2) }}</td>
                                  <td>
                                      <span class="badge 
                                          @if($item->status == 'Enabled') 
                                              bg-success 
                                          @else 
                                              bg-danger 
                                          @endif">
                                          {{ $item->status }}
                                      </span>
                                  </td>
                              </tr>
                          @endforeach
                      </tbody>
                  </table>
              </div>
          @else
              <p class="text-muted">No enabled items available.</p>
          @endif
      </div>
  </div>
  

    <!-- Purchase Orders Section -->
    {{-- <div class="card mt-4">
        <div class="card-header">Purchase Orders</div>
        <div class="card-body">
            @if($purchaseOrders->count() > 0)
                <ul>
                    @foreach($purchaseOrders as $purchaseOrder)
                        <li>Order #{{ $purchaseOrder->id }} - Supplier: {{ $purchaseOrder->supplier->name }} - Total: {{ $purchaseOrder->net_amount }}</li>
                    @endforeach
                </ul>
            @else
                <p>No purchase orders available.</p>
            @endif
        </div>
    </div> --}}
</div>


</x-layout>
