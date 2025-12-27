@extends('admin.main_design')

@section('add_category')
    @if(session('product_message'))
        <div class="mb-4 bg-success border-green-400 text-white shadow-sm shadow-white px-4 py-3 rounded relative">
            {{ session('product_message') }}
        </div> 
    @endif

    <div class="container-fluid">
        <form action="{{ route('admin.postaddproduct') }}" method="post" enctype="multipart/form-data" class="row g-3">
    @csrf
    
    <div class="col-12">
        <h3 class="mb-4 border-bottom pb-2">Add New Product</h3>
    </div>

    <!-- Product Name -->
    <div class="col-md-6">
        <label for="product_title" class="form-label">Product Name *</label>
        <input type="text" 
               name="product_name"
               id="product_name"
               class="form-control"
               required>
        <div class="form-text">Enter the full name of your product</div>
    </div>

    <!-- Product Category -->
    <div class="col-md-6">
        <label for="product_category" class="form-label">Category *</label>
        <select name="product_category" 
                id="product_category" 
                class="form-select" 
                required>
            <option value="" selected disabled>-- Select Category --</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">
                    {{ $category->category }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- Product Description -->
    <div class="col-12">
        <label for="product_description" class="form-label">Description</label>
        <textarea name="product_description" 
                  id="product_description" 
                  class="form-control" 
                  rows="4"
                  placeholder="Enter product description...">Product Descriptions...</textarea>
    </div>

    <!-- Quantity and Price -->
    <div class="col-md-6">
        <label for="product_qty" class="form-label">Quantity *</label>
        <div class="input-group">
            <span class="input-group-text">
                <i class="bi bi-box"></i>
            </span>
            <input type="number" 
                   name="product_qty" 
                   id="product_qty"
                   class="form-control"
                   placeholder="Enter quantity"
                   min="1"
                   required>
        </div>
    </div>

    <div class="col-md-6">
        <label for="product_price" class="form-label">Price *</label>
        <div class="input-group">
            <span class="input-group-text">$</span>
            <input type="number" 
                   name="product_price" 
                   id="product_price"
                   class="form-control"
                   placeholder="Enter price"
                   min="0"
                   step="0.01"
                   required>
        </div>
    </div>

    <!-- Product Image -->
    <div class="col-12">
        <label for="product_image" class="form-label">Product Image</label>
        <div class="mb-3">
            <input type="file" 
                   name="product_image" 
                   id="product_image"
                   class="form-control"
                   accept="image/*">
            <div class="form-text">
                Upload product image (JPG, PNG, GIF, SVG). Max size: 2MB
            </div>
        </div>
        
        <!-- Image preview placeholder -->
        <div class="mt-2 border rounded p-3 text-center d-none" id="imagePreviewContainer">
            <img id="imagePreview" class="img-fluid rounded" style="max-height: 200px;">
            <button type="button" class="btn btn-sm btn-danger mt-2" id="removeImage">
                <i class="bi bi-trash"></i> Remove Image
            </button>
        </div>
    </div>

    <!-- Submit Button -->
    <div class="col-12 mt-4">
        <div class="d-flex justify-content-end gap-2">
            <button type="reset" class="btn btn-outline-secondary">
                Clear Form
            </button>
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-plus-circle me-1"></i> Add Product
            </button>
        </div>
    </div>
</form>

<!-- Optional: Add image preview functionality -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const imageInput = document.getElementById('product_image');
    const previewContainer = document.getElementById('imagePreviewContainer');
    const previewImage = document.getElementById('imagePreview');
    const removeButton = document.getElementById('removeImage');
    
    if (imageInput && previewContainer && previewImage) {
        imageInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewContainer.classList.remove('d-none');
                }
                reader.readAsDataURL(file);
            }
        });
        
        removeButton.addEventListener('click', function() {
            imageInput.value = '';
            previewImage.src = '';
            previewContainer.classList.add('d-none');
        });
    }
});
</script>

<!-- Optional: Bootstrap Icons CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

<style>
    /* Custom styling */
    .form-label {
        font-weight: 500;
        margin-bottom: 0.5rem;
    }
    
    .form-control, .form-select {
        padding: 0.5rem 0.75rem;
    }
    
    #imagePreviewContainer {
        background-color: #f8f9fa;
        min-height: 100px;
    }
    
    .input-group-text {
        background-color: #f8f9fa;
    }
</style>
    </div>
@endsection
