<x-layout>
    <div class="container py-5">
        {{-- Back Button --}}
        <div class="mb-3">
            <a href="{{ route('dashboard.products.index') }}" class="btn">
                <i class="bi bi-arrow-left"></i> Back
            </a>
        </div>
        <h2 class="mb-4 text-center fw-bold">Add New Product</h2>

        <form action="{{ route('dashboard.products.store') }}" method="POST" enctype="multipart/form-data" style="max-width: 600px; margin: 0 auto;">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter product name" value="{{ old('name') }}" required>
                @error('name')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" rows="4" class="form-control" placeholder="Enter product description" required>{{ old('description') }}</textarea>
                @error('description')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price </label>
                <input type="number" name="price" id="price" class="form-control" min="0" step="0.01" placeholder="Enter price" value="{{ old('price') }}" required>
                @error('price')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 form-check">
<input type="checkbox" name="isAvailable" id="isAvailable" class="form-check-input" value="1" {{ old('isAvailable', true) ? 'checked' : '' }}>
                <label for="isAvailable" class="form-check-label">Available</label>
                @error('isAvailable')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="imgUrl" class="form-label">Product Image</label>
                <input type="file" name="imgUrl" id="imgUrl" class="form-control" accept="image/*">
                @error('imgUrl')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="text-center">
                <button type="submit" class="btn px-5" style="background-color:#34241d; color:white;">Add Product</button>
            </div>
        </form>
    </div>
</x-layout>
