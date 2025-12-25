@extends('admin.main_design')

@section('add_category')
    @if(session('category_message'))
        <div class="mb-4 bg-success border-green-400 text-white shadow-sm shadow-white px-4 py-3 rounded relative">
            {{ session('category_message') }}
        </div> 
    @endif

    <div class="container-fluid">
        <form action="{{ route('admin.postaddproduct') }}" method="post">
            @csrf
            <input type="text" name="product_title" placeholder="Enter Product Title...">
            <textarea name="product_description" id="">
                Product Descriptions...
            </textarea>
            <input type="number" name="product_qty" placeholder="Enter Quantity">
            <input type="number" name="product_price" placeholder="Enter Price">
            <input type="number" name="product_category" placeholder="Enter Category Name">
            <input type="submit" value="Add Product">
        </form> 
    </div>
@endsection
