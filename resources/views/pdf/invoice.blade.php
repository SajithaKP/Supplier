<!DOCTYPE html>
<html>
<head>
    <title>Purchase Order</title>
</head>
<body>

    <table border="1">
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

</body>
</html>
