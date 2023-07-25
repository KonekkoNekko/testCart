<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
    @vite('resources/sass/app.scss')
</head>

<body>
    <div class="container justify-content-between mt-5">
        <p>Total of the items you bought: {{ Cart::instance(auth()->user()->name)->count() }}</p>
        <div class="row mx-3 p-5">
            @foreach ($products as $product)
                <div class="col-md-4 my-3">
                    <div class="card text-center" style="width: 18rem;">
                        <img class="img-thumbnail"
                            src="{{ Vite::asset('resources/images/' . $product->product_photo_filename) }}"
                            alt="image" class="img-fluid">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->product_album }}</h5>
                            <p class="card-text">{{ $product->product_artist }}</p>
                            <form action="{{ route('cart.add', ['id' => $product->id]) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-primary">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @vite('resources/js/app.js')
</body>

</html>
