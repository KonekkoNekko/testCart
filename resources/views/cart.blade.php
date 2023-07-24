<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Your head section content -->
</head>

<body>
    <div class="container">

        {{ $cartContent }}
        <h1>Shopping Cart</h1>
        <p>Total of the items you bought:
            @php
                $totalQuantity = 0;
                foreach ($cartContent as $item) {
                    $totalQuantity += $item->qty;
                }
                echo $totalQuantity;
            @endphp
        </p>
        @if ($cartContent->count() > 0)
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartContent as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>Rp. {{ number_format($item->price, 0, ',', '.') }}</td>
                            <td>
                                <form action="{{ route('cart.update', ['rowId' => $item->rowId]) }}" method="post">
                                    @csrf
                                    <input type="number" name="quantity" value="{{ $item->qty }}" min="1">
                                    <button type="submit">Update</button>
                                </form>
                            </td>
                            <td>Rp. {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                            <td>
                                <form action="{{ route('cart.delete', ['rowId' => $item->rowId]) }}" method="post">
                                    @csrf
                                    <button type="submit">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3">Total</td>
                        <td>Rp. {{ number_format(Cart::total(), 0, ',', '.') }}</td>
                        <td>
                            <form action="{{ route('cart.destroy') }}" method="post">
                                @csrf
                                <button type="submit">Clear Cart</button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <form action="{{ route('cart.store') }}" method="POST">
                            @csrf
                            <button type="submit">Store Cart</button>
                        </form>
                    </tr>
                </tfoot>
            </table>
        @else
            <p>Your cart is empty.</p>
        @endif
    </div>
</body>

</html>
