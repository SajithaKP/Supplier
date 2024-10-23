<x-layout>
    <div class="container">
        <h1>Item Details</h1>

        <div class="card">
            <div class="card-body">
                <h1 class="card-title">{{ $item->name }}</h1>
                <p class="card-text"><strong>Brand:</strong> {{ $item->brand }}</p>
                <p class="card-text"><strong>Category:</strong> {{ $item->category }}</p>
                <p class="card-text"><strong>Supplier:</strong> {{ $item->supplier->name }}</p>
                <p class="card-text"><strong>Stock Unit:</strong> {{ $item->stock_unit }}</p>
                <p class="card-text"><strong>Unit Price:</strong> ${{ $item->unit_price }}</p>
                <p class="card-text"><strong>Status:</strong> {{ $item->status }}</p>
                <p class="card-text"><strong>Inventory Location:</strong> {{ $item->inventory_location }}</p>

                <!-- Display images if available -->
                @if ($item->image && !empty(json_decode($item->image)))
                <div>
                    <strong>Images:</strong>
                    <ul>
                        @foreach (json_decode($item->image) as $image)
                            <li><img src="{{ asset('storage/' . $image) }}" alt="Item Image" width="100"></li>
                        @endforeach
                    </ul>
                </div>
            @else
                <p>No images available.</p>
            @endif
                

            </div> <a href="{{ route('items.index') }}" class="btn btn-primary">Back to List</a>
        </div>
    </div>
</x-layout>
