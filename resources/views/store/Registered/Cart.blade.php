<x-navbar>
    <div class="mb-4" style="margin: 2rem;">
        <div style="position: fixed; top: 2rem; width: 100%; height:18%; z-index: 1000; background-color: #fffaf5;">
            <h2 class="fw-bold text-center" style="margin-top:3rem;">My Cart</h2>
        </div>

        @if(session('success'))
            <div class="alert alert-success text-center" style="margin-top: 7rem;">
                {{ session('success') }}
            </div>
        @endif

        @if($cartItems->isEmpty())
            <div class="text-center mt-5" style="margin-top: 10rem;">
                <h5>Your cart is empty.</h5>
            </div>
        @else
            <div class="row g-4" style="margin-top: 8rem;">
                @foreach ($cartItems as $item)
                    <div class="col-md-4">
                        <div class="card shadow-sm">
                            @if ($item->product->imgUrl)
                                <img src="{{ asset('storage/' . $item->product->imgUrl) }}" class="card-img-top" alt="{{ $item->product->name }}" style="height: 250px; object-fit: cover;">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->product->name }}</h5>
                                <p class="card-text">{{ $item->product->description }}</p>
                                <p class="fw-bold">LYD {{ $item->product->price }}</p>
                                <p>Quantity: {{ $item->quantity }}</p>

                                <div class="d-flex justify-content-between">
                                    <form action="{{ route('cart.increase', $item->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-success">+</button>
                                    </form>

                                    <form action="{{ route('cart.decrease', $item->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-warning">−</button>
                                    </form>

                                    <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Confirm Order Button -->
            <div class="text-end mt-5">
                <button class="btn"style="background-color: #5C4033; color:white;" data-bs-toggle="modal" data-bs-target="#confirmOrderModal">
                    Submit Order
                </button>
            </div>
        @endif
    </div>

    <!-- Confirm Order Modal -->
    <form id="confirm-order-form" action="{{ route('cart.submitOrder') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <div class="modal fade" id="confirmOrderModal" tabindex="-1" aria-labelledby="confirmOrderModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-3 shadow">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmOrderModalLabel">Confirm Order</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to place this order?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" style="background-color: #C9A66B; color:white;" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn" style="background-color: #8B2D28; color:white;" onclick="document.getElementById('confirm-order-form').submit();">
                        Yes, Place Order
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-navbar>
