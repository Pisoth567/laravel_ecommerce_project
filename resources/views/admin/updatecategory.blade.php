@extends('admin.main_design')

<base href="/public">
@section('update_category')
    @if(session('category_updated_message'))
        <div class="mb-4 bg-success border-blue-400 text-white shadow-sm shadow-white px-4 py-3 rounded relative">
            {{ session('category_updated_message') }}
        </div> 
    @endif

    <div class="container-fluid">
        <form action="{{  route('admin.postupdatecategory', $category->id) }}" method="post">
            @csrf
            <input type="text" name="category" value="{{ $category->category }}">
            <input type="submit" name="submit" value="update Category">
        </form> 
    </div>
@endsection