@extends('maindesign')

@section('viewcart_products')
    <!-- <a href="{{ route('index') }}" class="btn btn-success mb-5">Back Products</a> -->
    <table style="width:100%; border-collapse: collapse; font-family: san-serif; ">
        <thead class="bg-danger">      
            <tr style="background-color: #f2f2f2;">
                <th style="padding: 12px; text-align: center; border-bottom: 1px solid #ddd;">Product Name</th>
                <th style="padding: 12px; text-align: center; border-bottom: 1px solid #ddd;">Price</th>
                <th style="padding: 12px; text-align: center; border-bottom: 1px solid #ddd;">Image</th>
                <th style="padding: 12px; text-align: center; border-bottom: 1px solid #ddd;">Action</th>
                
            </tr>
        </thead>
        <tbody>
            @php
                $price = 0;
            @endphp

            @foreach ($cart as $cart_product)
                <tr style=" border-bottom: 1px solid #ddd;">
                    <td style="padding: 12px; text-align: center;">{{$cart_product -> product -> product_name}}</td>
                    <td style="padding: 12px; text-align: center;">${{$cart_product -> product -> product_price}}</td>
                    <td style="padding: 12px; text-align: center;">
                        <img style="width: 100px;" src="{{ asset('products/'.$cart_product -> product -> product_image) }}" alt="">
                    </td>                    
                    <td style="padding: 12px; text-align: center;">
                        <a href="{{ route('removecartproduct',$cart_product->id) }}" class="btn btn-danger">Remove</a>
                    </td>                    
                </tr>

                @php
                    $price = $price + $cart_product -> product-> product_price;
                @endphp
            @endforeach
                <tr style=" border-bottom: 1px solid #ddd; background-color: #ddd;">
                    <td style="padding: 12px; text-align: center;"><strong> Total Price: </strong></td>
                    <td style="padding: 12px; text-align: center;">${{ $price }}</td>
                    <td style="padding: 12px; text-align: center;"> </td>                    
                    <td style="padding: 12px; text-align: center;"></td>   
                </tr>
        </tbody>    
    </table>
@endsection