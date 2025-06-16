<x-guestbar>

  <div style="position: relative; width: 100vw; height: 100vh; overflow: hidden;">
    <img src="{{ asset('neww.png') }}" alt="Background Image"      style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover;">
>

    <!-- Button centered at bottom -->
    <div style="position: absolute; bottom: 40%; left: 50%; transform: translateX(-50%);">
      <a  href="{{ url('/store/guest/shop') }}" class="btn btn-primary"style="background-color: #8B2D28; border: none; font-weight: bold; padding:1rem; border-radius: 12px;">
Shop Now     
 </a>
    </div>
  </div>

</x-guestbar>