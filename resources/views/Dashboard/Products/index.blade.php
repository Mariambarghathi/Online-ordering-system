<x-layout>


    <div class="text-center mb-4">
      
      <!--title-->
        <h2 class="mb-3 fw-bold">Product List</h2>
     
           <!--add button-->

        <a href="{{ url('/dashboard/products/create') }}" class="btn mt-3" style="background-color:  #34241d;  color:white;">
            <i class="bi bi-plus-circle me-1"></i> Add Product </a>
    </div>

    <!-- Product card -->
    <div class="row g-4">
        @foreach ($products as $product)
            <div class="col-md-4">
            <div class="card shadow-sm" style="height: 340px; overflow: hidden;"> 

          <!--img -->
    <div style="position: relative; height: 250px; width: 100%;">
        @if ($product->imgUrl)
            <img src="{{ asset('storage/' . $product->imgUrl) }}" alt="{{ $product->name }}" style="width: 100%; height: 250px; object-fit: cover;">
        @else
            <div style="height: 100%; width: 100%; background-color: #000;"></div>
        @endif

      <!--details-->
<div style="position: absolute; bottom: 0; width: 100%; background: rgba(0, 0, 0, 0.2);color: white; padding: 0.3rem 0.5rem; font-size: 0.85rem;box-sizing: border-box;display: flex;flex-direction: column;gap: 0.25rem;">
    <div style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;font-weight: bold;font-size: 1rem;">
        {{ $product->name }}
    </div>

   
    <div style="display: flex; justify-content: space-between; align-items: center; gap: 0.5rem;">
        <div style="flex: 1;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;font-size: 0.75rem;opacity: 0.75;font-weight: 400;">
            {{ $product->description }}
        </div>
       
       <div style="white-space: nowrap;font-size: 0.75rem;font-weight: 500;opacity: 0.85;">
            LYD {{ $product->price }}
        </div>
        
        <div style="white-space: nowrap; font-size: 0.7rem;font-weight: 400;color: {{ $product->isAvailable ? 'darkgreen' : '#ff8787' }};">
            {{ $product->isAvailable ? 'Available' : 'Not available' }}
        </div>
    </div>

</div>
    </div>

      <!--buttons-->
    <div class="card-body p-2" style="margin-top:18px; margin-left:12px; margin-right:12px ; ">
        <div class="d-flex justify-content-between">
            <a href="{{ route('dashboard.products.edit', $product->id) }}" class="btn btn-sm btn-outline" style="background-color:  #C9A66B; color:white;">
                <i class="bi bi-pencil"></i> Edit
            </a>
            <form action="{{ route('dashboard.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm " style="background-color: #8B2D28	; color :white;">
                    <i class="bi bi-trash"></i> Delete
                </button>
            </form>
        </div>
    </div>
</div>

     </div>
        @endforeach
    </div>


    <!--pagination-->
    <div class="d-flex justify-content-end mt-4">
    {{ $products->links() }}
</div>
</x-layout>
