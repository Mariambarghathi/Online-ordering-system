<x-navbar>
    <div class="container mt-5">
        <a href="{{ route('store.registered.orders.index') }}" class="btn mb-4">
            <i class="bi bi-arrow-left"></i> Back
        </a>

        <h1>Order Details #{{ $order->id }}</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <h4>Total: {{ $order->total_price }} LYD</h4>

        <div class="row g-4 mt-3">
            @foreach ($order->items as $item)
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        @if ($item->product->imgUrl)
                            <img src="{{ asset('storage/' . $item->product->imgUrl) }}" class="card-img-top" style="height: 250px; object-fit: cover;">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->product->name }}</h5>
                            <p>{{ $item->product->description }}</p>
                            <p>Price: {{ $item->product->price }} LYD</p>
                            <p>Quantity: {{ $item->quantity }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
<!-- Only show cancel button if order is NOT rejected or delivered -->
@if (!in_array($order->status, ['rejected', 'delivered']))
    <form action="{{ route('store.registered.orders.cancel', $order->id) }}" method="POST" style="margin-top: 2rem;">
        @csrf
        @method('PUT')
        <button type="submit" class="btn btn-danger">Cancel this order?</button>
    </form>
@else
    <!-- Nothing here. No nagging messages, just silence 😌 -->
@endif

    </div>
</x-navbar>
