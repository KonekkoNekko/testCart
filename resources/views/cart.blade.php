@extends('layouts.app')

@section('content')
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
                                <form action="{{ route('cart.update', ['rowId' => $item->rowId]) }}" method="post" class="updateForm">
                                    @csrf
                                    <div class="input-group">
                                        <button class="btn btn-outline-secondary minusBtn" type="button">-</button>
                                        <input type="number" class="form-control quantityInput" name="quantity" value="{{ $item->qty }}" min="0">
                                        <button class="btn btn-outline-secondary plusBtn" type="button">+</button>
                                    </div>
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
                        <a href="{{ route('product') }}" class="btn btn-primary">Produk</a>
                        <a href="{{ route('cart.show') }}" class="btn btn-primary">Cart</a>
                    </tr>
                </tfoot>
            </table>
        @else
            <p>Your cart is empty.</p>
        @endif
    </div>
    <script>
        // Get all the elements with the specified classes
        const quantityInputs = document.querySelectorAll('.quantityInput');
        const minusButtons = document.querySelectorAll('.minusBtn');
        const plusButtons = document.querySelectorAll('.plusBtn');

        // Loop through each row and add event listeners to buttons
        for (let i = 0; i < minusButtons.length; i++) {
            minusButtons[i].addEventListener('click', function () {
                updateQuantity(quantityInputs[i], -1);
            });

            plusButtons[i].addEventListener('click', function () {
                updateQuantity(quantityInputs[i], 1);
            });
        }

        // Function to update the quantity and submit the form
        function updateQuantity(quantityInput, change) {
            // Calculate the updated quantity
            let updatedQuantity = parseInt(quantityInput.value) + change;

            // Ensure the input value is non-negative
            if (updatedQuantity < 0) {
                updatedQuantity = 0;
            }

            // Update the input value
            quantityInput.value = updatedQuantity;

            // Submit the form with the updated quantity
            quantityInput.closest('.updateForm').submit();
        }
    </script>
@endsection
