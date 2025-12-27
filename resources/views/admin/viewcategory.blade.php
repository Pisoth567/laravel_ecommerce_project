@extends('admin.main_design')



@section('view_category')

    @if(session('deletecategory_message'))
    <div class="mb-4 bg-warning border-green-400 text-white text-center shadow-sm shadow-white px-4 py-3 rounded ">
        {{ session('deletecategory_message') }}
    </div> 
    @endif

    <table style="width:100%; border-collapse: collapse; font-family: san-serif; ">
        <thead>      
            <tr style="background-color: #f2f2f2;">
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Category ID</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Category Name</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr style=" border-bottom: 1px solid #ddd;">
                    <td style="padding: 12px;">{{$category -> id}}</td>
                    <td style="padding: 12px;">{{$category -> category}}</td>
                    <td style="padding: 12px;">
                        <a href="{{ route('admin.updatecategory', $category -> id) }}" class="text-info">update</a>
                        <a href="{{ route('admin.deletecategory', $category -> id) }} " onclick=" return confirm('Are You Sure!')">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody> 
    </table>
@endsection