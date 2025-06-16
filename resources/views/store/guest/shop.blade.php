<x-guestbar>
    <div class=" mb-4" style="margin: 2rem;">
      <div style="position: fixed; top: 2rem; width: 100%; height:18%; z-index: 1000; margin-bottom: 2rem; background-color: #fffaf5;">
  <h2 class="fw-bold text-center" style="margin-top:3rem;">Products Catalog</h2>
</div>

    

    <div class="row g-4" style="margin-top: 7rem;">
        @foreach ($products as $product)
            @if ($product->isAvailable)
                <div class="col-md-4">
                    <div class="card shadow-sm" style="height: 340px; overflow: hidden;"> 
                        <div style="position: relative; height: 250px; width: 100%;">
                            @if ($product->imgUrl)
                                <img src="{{ asset('storage/' . $product->imgUrl) }}" alt="{{ $product->name }}" style="width: 100%; height: 250px; object-fit: cover;">
                            @else
                                <div style="height: 100%; width: 100%; background-color: #000;"></div>
                            @endif

                            <div style="position: absolute; bottom: 0; width: 100%; background: rgba(0, 0, 0, 0.3); color: white; padding: 0.5rem; font-size: 0.85rem;">
                                <div style="font-weight: bold; font-size: 1rem; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                    {{ $product->name }}
                                </div>
                                <div style="font-size: 0.75rem; opacity: 0.9; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                    {{ $product->description }}
                                </div>
                                <div class="mt-1" style="font-weight: 500;">
                                    LYD {{ $product->price }}
                                </div>
                            </div>
                        </div>

                        <div class="card-body d-flex justify-content-between align-items-center px-3 py-2">
                            <form action="" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-sm" style="background-color: #34241d; color: white;">
                                    <i class="bi bi-cart-plus"></i> Add to Cart
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>

    <div class="d-flex justify-content-end mt-4">
        {{ $products->links() }}
    </div>
</div>
</x-guestbar>