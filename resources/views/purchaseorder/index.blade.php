<x-layout>
    <h1>Purchase Orders</h1>
    <a href="{{ route('purchaseorders.create') }}" class="btn btn-primary">Create Purchase Order</a>
    <a href="{{ route('purchaseorders.exportExcel') }}"class="btn btn-success">Export to Excel</a>
    <a href="{{ route('purchaseorders.print') }}"class="btn btn-info">Print</a>

    <table class="table">
        <thead>
            <tr>
                <th>Order No</th>
                <th>Supplier Name</th>
                <th>Order Date</th>
                <th>Item Total</th>
                <th>Discount</th>
                <th>Net Amount</th>

            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->supplier->name }}</td>
                <td>{{ $order->order_date }}</td>
                <td>{{ $order->item_total }}</td>
                <td>{{ $order->discount }}</td>
                <td>{{ $order->net_amount }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</x-layout>