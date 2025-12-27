@extends('admin.main_design')

@section('addcategory')
    @if(session('category_message'))
        <div class="mb-4 bg-success border-green-400 text-white shadow-sm shadow-white px-4 py-3 rounded relative">
            {{ session('category_message') }}
        </div> 
    @endif

    <div class="container-fluid">
        <div class="card shadow-sm border-0">
    <div class="card-header bg-white border-bottom">
        <h5 class="mb-0 fw-semibold">
            <i class="bi bi-plus-circle me-2 text-primary"></i>Add New Category
        </h5>
    </div>
    <div class="card-body p-4">
        <form action="{{ route('admin.post_add_category') }}" method="post" class="row g-3 align-items-center">
            @csrf
            <div class="col-md-8">
                <label for="category" class="form-label visually-hidden">Category Name</label>
                <input type="text" 
                       name="category" 
                       id="category"
                       class="form-control form-control-lg"
                       placeholder="Enter category name..."
                       aria-label="Category name"
                       required>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary btn-lg w-100">
                    <i class="bi bi-check-lg me-2"></i>Add Category
                </button>
            </div>
        </form>
    </div>
</div>
    </div>
@endsection
