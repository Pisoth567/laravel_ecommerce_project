@extends('admin.main_design')



@section('view_product')

    @if(session('deleteproduct_message'))
    <div class="mb-4 bg-success border-green-400 text-white text-center shadow-sm shadow-white px-4 py-3 rounded ">
        {{ session('deleteproduct_message') }}
    </div> 
    @endif

    <table style="width:100%; border-collapse: collapse; font-family: san-serif; ">
        <thead>      
            <tr style="background-color: #f2f2f2;">
                <th style="padding: 12px; text-align: center; border-bottom: 1px solid #ddd;">Product Name</th>
                <th style="padding: 12px; text-align: center; border-bottom: 1px solid #ddd;">Description</th>
                <th style="padding: 12px; text-align: center; border-bottom: 1px solid #ddd;">Quantity</th>
                <th style="padding: 12px; text-align: center; border-bottom: 1px solid #ddd;">Price</th>
                <th style="padding: 12px; text-align: center; border-bottom: 1px solid #ddd;">Image</th>
                <th style="padding: 12px; text-align: center; border-bottom: 1px solid #ddd;">Category ID</th>
                <th style="padding: 12px; text-align: center; border-bottom: 1px solid #ddd;">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr style=" border-bottom: 1px solid #ddd;">
                    <td style="padding: 12px; text-align: center;">{{$product -> product_name}}</td>
                    <td style="padding: 12px; text-align: center;">{{$product -> product_description}}</td>
                    <td style="padding: 12px; text-align: center;">{{$product -> product_qty}}</td>
                    <td style="padding: 12px; text-align: center;">{{$product -> product_price}}</td>
                    <td style="padding: 12px; text-align: center;">
                        <img style="width: 100px;" src="{{ asset('products/'.$product -> product_image) }}" alt="">
                    </td>
                    <td style="padding: 12px; text-align: center;">{{$product -> category_id}}</td>
                    <td style="padding: 12px; text-align: center;">
                        <a href="{{ route('admin.updateproduct', $product-> id) }}" class="btn btn-info text-white">update</a>
                        <a href="{{ route('admin.deleteproduct', $product-> id) }}" class="btn btn-danger text-white" onclick=" return confirm('Are You Sure!')">Delete</a>
                    </td>
                </tr>
            @endforeach

            {{ $products->links() }}
        </tbody>    
    </table>
@endsection