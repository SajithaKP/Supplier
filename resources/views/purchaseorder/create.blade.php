<x-layout>


    <div class="container">
        <h1>Create Purchase Order</h1>

        <form action="{{ route('purchaseorders.store') }}" method="POST">
            @csrf

            <!-- Order Date (Current Date with Date Picker) -->
            <div class="form-group">
                <label for="order_date">Order Date:</label>
                <input type="date" name="order_date" id="order_date" class="form-control" value="{{ date('Y-m-d') }}">
            </div>

            <!-- Supplier Name (Dropdown of Active Suppliers) -->
            <div class="form-group">
                <label for="supplier_id">Supplier:</label>
                <select name="supplier_id" id="supplier_id" class="form-control">
                    @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Item Total (readonly) -->
            <div class="form-group">
                <label for="item_total">Item Total:</label>
                <input type="text" name="item_total" id="item_total" class="form-control" readonly>
            </div>

            <!-- Discount (readonly) -->
            <div class="form-group">
                <label for="discount">Discount:</label>
                <input type="text" name="discount" id="discount" class="form-control" readonly>
            </div>

            <!-- Net Amount (Item Total - Discount) -->
            <div class="form-group">
                <label for="net_amount">Net Amount:</label>
                <input type="text" name="net_amount" id="net_amount" class="form-control" readonly>
            </div>

            <!-- Item List Section -->
            <div id="item-list">
                <h4>Items</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Item No</th>
                            <th>Item Name</th>
                            <th>Stock Unit</th>
                            <th>Unit Price</th>
                            <th>Packing Unit</th>
                            <th>Order Qty</th>
                            <th>Item Amount</th>
                            <th>Discount</th>
                            <th>Net Amount</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="items">
                        <tr>
                            <!-- Item Selection -->
                            <td>
                                1
                            </td>
                            <td>
                                <select name="items[0][item_id]" class="form-control item-select" onchange="fetchItemDetails(this)">
                                    <option value="">Select Item</option>
                                    @foreach ($items as $item)
                                        <option value="{{ $item->id }}" data-stock-unit="{{ $item->stock_unit }}" data-unit-price="{{ $item->unit_price }}">
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>

                            <!-- Stock Unit (Auto-populated based on selected item) -->
                            <td>
                                <input type="text" class="form-control stock-unit" name="items[0][stock_unit]" readonly>
                            </td>

                            <!-- Unit Price (Auto-populated based on selected item) -->
                            <td>
                                <input type="number" step="0.01" class="form-control unit-price" name="items[0][unit_price]" readonly>
                            </td>

                            <!-- Packing Unit (Dropdown) -->
                            <td>
                                <select name="items[0][packing_unit]" class="form-control">
                                    <option value="box">Box</option>
                                    <option value="pallet">Pallet</option>
                                    <option value="bag">Bag</option>
                                </select>
                            </td>

                            <!-- Order Quantity -->
                            <td>
                                <input type="number" class="form-control" name="items[0][order_qty]" onchange="calculateItemTotal(this)">
                            </td>

                            <!-- Item Amount (Auto-calculated) -->
                            <td>
                                <input type="text" class="form-control item-amount" name="items[0][item_amount]" readonly>
                            </td>

                            <!-- Discount -->
                            <td>
                                <input type="number" step="0.01" class="form-control" name="items[0][discount]" onchange="calculateItemTotal(this)">
                            </td>

                            <!-- Net Amount (Auto-calculated) -->
                            <td>
                                <input type="text" class="form-control net-amount" name="items[0][net_amount]" readonly>
                            </td>

                            <!-- Remove Button -->
                            <td><button type="button" class="btn btn-danger" onclick="removeItem(this)">Remove</button></td>
                        </tr>
                    </tbody>
                </table>
                <button type="button" class="btn btn-primary" onclick="addItem()">Add Item</button>
            </div>

            <button type="submit" class="btn btn-success">Create Purchase Order</button>
        </form>
    </div>

    <script>
        // Fetch item details on selection
        function fetchItemDetails(select) {
            const selectedItem = select.options[select.selectedIndex];
            const row = select.closest('tr');
            const stockUnit = selectedItem.getAttribute('data-stock-unit');
            const unitPrice = selectedItem.getAttribute('data-unit-price');

            // Auto-populate stock unit and unit price
            row.querySelector('.stock-unit').value = stockUnit;
            row.querySelector('.unit-price').value = unitPrice;

            // Reset order qty, item amount, discount, and net amount
            row.querySelector('input[name$="[order_qty]"]').value = '';
            row.querySelector('.item-amount').value = '';
            row.querySelector('input[name$="[discount]"]').value = '';
            row.querySelector('.net-amount').value = '';
        }

        function calculateItemTotal(element) {
            const row = element.closest('tr');
            const unitPrice = parseFloat(row.querySelector('.unit-price').value) || 0;
            const orderQty = parseFloat(row.querySelector('input[name$="[order_qty]"]').value) || 0;
            const discount = parseFloat(row.querySelector('input[name$="[discount]"]').value) || 0;

            const itemAmount = unitPrice * orderQty;
            const netAmount = itemAmount - discount;

            row.querySelector('.item-amount').value = itemAmount.toFixed(2);
            row.querySelector('.net-amount').value = netAmount.toFixed(2);

            updateTotals();
        }

        function updateTotals() {
            let itemTotal = 0;
            let totalDiscount = 0;

            document.querySelectorAll('.item-amount').forEach(function (itemAmountInput) {
                itemTotal += parseFloat(itemAmountInput.value) || 0;
            });

            document.querySelectorAll('input[name$="[discount]"]').forEach(function (discountInput) {
                totalDiscount += parseFloat(discountInput.value) || 0;
            });

            const netAmount = itemTotal - totalDiscount;

            document.getElementById('item_total').value = itemTotal.toFixed(2);
            document.getElementById('discount').value = totalDiscount.toFixed(2);
            document.getElementById('net_amount').value = netAmount.toFixed(2);
        }

        function addItem() {
            const items = document.getElementById('items');
            const newItemRow = items.querySelector('tr').cloneNode(true);
            newItemRow.querySelectorAll('input').forEach(function (input) {
                input.value = '';
            });
            items.appendChild(newItemRow);
        }

        function removeItem(button) {
            const row = button.closest('tr');
            row.remove();
            updateTotals();
        }
    </script>


</x-layout>
