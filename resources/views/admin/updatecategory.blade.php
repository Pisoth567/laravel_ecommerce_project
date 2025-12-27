@extends('admin.main_design')

<base href="/public">
@section('update_category')
    @if(session('category_updated_message'))
        <div class="mb-4 bg-success border-blue-400 text-white shadow-sm shadow-white px-4 py-3 rounded relative">
            {{ session('category_updated_message') }}
        </div> 
    @endif

    <div class="container-fluid">
        <div class="card shadow-lg border-0">
    <div class="card-header bg-gradient-primary text-white py-3">
        <div class="d-flex align-items-center">
            <div class="flex-shrink-0">
                <i class="fas fa-edit fa-2x"></i>
            </div>
            <div class="flex-grow-1 ms-3">
                <h4 class="mb-0">Edit Category</h4>
                <p class="mb-0 opacity-75">Update category details below</p>
            </div>
        </div>
    </div>
    
    <div class="card-body p-4">
        <form action="{{ route('admin.postupdatecategory', $category->id) }}" method="post" id="updateCategoryForm">
            @csrf
            
            <div class="mb-4">
                <label for="category" class="form-label fw-semibold">
                    <i class="fas fa-tag me-2 text-primary"></i>Category Name
                </label>
                <div class="input-group input-group-lg">
                    <span class="input-group-text bg-light border-end-0">
                        <i class="fas fa-folder text-muted"></i>
                    </span>
                    <input type="text" 
                           name="category" 
                           id="category"
                           class="form-control border-start-0 ps-0"
                           value="{{ old('category', $category->category) }}"
                           placeholder="Enter category name..."
                           required>
                </div>
                @error('category')
                    <div class="text-danger small mt-2">
                        <i class="fas fa-exclamation-circle me-1"></i> {{ $message }}
                    </div>
                @enderror
                <div class="form-text">
                    This will be updated immediately across all products in this category
                </div>
            </div>
            
            <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top">
                <div>
                    <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Back
                    </a>
                </div>
                <div class="d-flex gap-2">
                    <button type="reset" class="btn btn-outline-danger">
                        <i class="fas fa-redo me-2"></i>Reset
                    </button>
                    <button type="submit" name="submit" class="btn btn-primary px-4">
                        <i class="fas fa-save me-2"></i>Update Category
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
    </div>
@endsection