@extends('admin.main_design')

@section('addcategory')
    @if(session('category_message'))
        <div class="mb-4 bg-success border-green-400 text-white shadow-sm shadow-white px-4 py-3 rounded relative">
            {{ session('category_message') }}
        </div> 
    @endif

    <div class="container-fluid">
        <form action="{{ route('admin.post_add_category') }}" method="post">
            @csrf
            <input type="text" name="category" placeholder="Enter Category">
            <input type="submit" value="Add">
        </form> 
    </div>
@endsection
