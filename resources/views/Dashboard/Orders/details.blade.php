<x-layout>

     <div class="mb-3">

        <!--Back-->
    <a href="{{ route('dashboard.orders.index') }}" class="btn">
     <i class="bi bi-arrow-left"></i> Back
            </a>

    <!--Title-->
    <h1>Order Details #{{ $order->id }}</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('orders.updateStatus', $order->id) }}" method="POST">
        @csrf
        @method('PUT')
      
<!--Total pice-->
        <h3>Total price : {{ $order->total_price }}</h3>
        <div class="row g-4" style="margin-top: 2rem">

            <!--Products-->
         @foreach ($order->items as $item)
        <div class="col-md-4">
         <div class="card shadow-sm" style="height: 340px; overflow: hidden; position: relative;">
        <!--Img-->
            @if ($item->product->imgUrl)
             <img  src="{{ asset('storage/' . $item->product->imgUrl) }}" alt="{{ $item->product->name }}"  style="width: 100%; height: 250px; object-fit: cover;">
                @else
                 <div style="height: 250px; width: 100%; background-color: #000;"></div>
                @endif

        <!-- details -->
        <div style="position: absolute;  bottom: 0; width: 100%;  color: black;  padding: 0.5rem; box-sizing: border-box; display: flex;flex-direction: column;gap: 0.25rem;">
        <div style="  white-space: nowrap; overflow: hidden;text-overflow: ellipsis; font-weight: bold; font-size: 1rem;">
         {{ $item->product->name }}
        </div>

         <div style="display: flex; justify-content: space-between; align-items: center; gap: 0.5rem;">
        <div style="flex: 1; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;font-size: 0.75rem;opacity: 0.75;font-weight: 400; ">
         {{ $item->product->description }}
        </div>
                                
        
        <div style="white-space: nowrap;  font-size: 0.75rem;  font-weight: 500;  opacity: 0.85; ">
         LYD {{ $item->product->price }}
        </div>
                                 
                                 
        <div style=" white-space: nowrap; font-size: 0.75rem; font-weight: 500; opacity: 0.85;">
         Quantity : {{ $item->quantity }}
         </div>



</div>
     </div>
         </div>
             </div>
             @endforeach
                     </div>


<!--Edit status-->
 <select name="status" class="form-select" style="width: 200px; margin-top:2rem;" 
    {{ in_array($order->status, ['cancelled', 'rejected', 'delivered']) ? 'disabled' : '' }}>
    @foreach ($statuses as $status)
        <option value="{{ $status }}" {{ $order->status === $status ? 'selected' : '' }}>
            {{ ucfirst($status) }}
        </option>
    @endforeach
</select>

<!--Submit change-->
        <button type="submit" class="btn mt-3" style="background-color: #34241d; color:white; margin-top:2rem;">Update Status</button>
    </form>
</x-layout>
