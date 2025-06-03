<x-layout>
   
    <div class="container py-5" >

      <!--Back button-->
        <div class="mb-3">
            <a href="{{ route('dashboard.products.index') }}" class="btn">
                <i class="bi bi-arrow-left"></i> Back
            </a>
        </div>

    <!--title-->
        <h2 class="mb-4 text-center fw-bold">Edit Product</h2>
       
        <form action="{{ route('dashboard.products.update', $product->id) }}" method="POST" enctype="multipart/form-data"  style="max-width: 600px; margin: 0 auto;">
            @csrf
            @method('PUT')
          
            <!--error handling-->

            @if ($errors->any())
                 <div class="alert alert-danger">
       
       
            <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
             </ul>
             </div>
            @endif

            <!--edit form-->
            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input 
                    type="text" 
                    name="name" 
                    id="name" 
                    class="form-control @error('name') is-invalid @enderror" 
                    value="{{ old('name', $product->name) }}" 
                    required
                >
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea 
                    name="description" 
                    id="description" 
                    rows="4" 
                    class="form-control @error('description') is-invalid @enderror" 
                    required
                >{{ old('description', $product->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input 
                    type="number" 
                    name="price" 
                    id="price" 
                    class="form-control @error('price') is-invalid @enderror" 
                    min="0" step="0.01" 
                    value="{{ old('price', $product->price) }}" 
                    required
                >
                @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

<div class="form-check form-switch mb-3">
    <input 
        class="form-check-input @error('isAvailable') is-invalid @enderror" 
        type="checkbox" 
        id="isAvailable" 
        name="isAvailable" 
        value="1"
        {{ old('isAvailable', $product->isAvailable) ? 'checked' : '' }}>
    <label class="form-check-label" for="isAvailable">Available</label>
    @error('isAvailable')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>




            <div class="mb-4">
                <label for="imgUrl" class="form-label">Product Image</label>
                <input 
                    type="file" 
                    name="imgUrl" 
                    id="imgUrl" 
                    class="form-control @error('imgUrl') is-invalid @enderror" 
                    accept="image/*"
                >
                @error('imgUrl')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                @if($product->imgUrl)
                    <div class="mt-3">
                        <p>Current Image:</p>
                        <img src="{{ asset('storage/' . $product->imgUrl) }}" alt="Product Image" style="max-width: 200px; border-radius: 8px;">
                    </div>
                @endif
            </div>

            <div class="text-center">
                <button type="submit" class="btn px-5" style="background-color: #34241d; color:white;">Update Product</button>
                <a href="{{ route('dashboard.products.index') }}" class="btn ms-2" style="background-color: #b86437; color:white;">Cancel</a>
            </div>
        </form>
    </div>
</x-layout>
