@extends('maindesign')

@section('viewcart_products')
    <!-- <a href="{{ route('index') }}" class="btn btn-success mb-5">Back Products</a> -->
    <table style="width:100%; border-collapse: collapse; font-family: san-serif; " class="container">
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
    @if(session('comfirm_order'))
        <div class="container mb-4 bg-success border-blue-400 text-white shadow-sm shadow-white px-4 py-3 rounded relative">
            {{ session('comfirm_order') }}
        </div> 
    @endif

    <!-- form order -->
    <form style="margin-top: 20px;" class="container" action="{{ route('comfirm_order') }}" method="POST" class="needs-validation" novalidate>
    @csrf
    
    <div class="row g-4">
        <!-- Address Column -->
        <div class="col-md-6">
            <div class="h-100 p-4 rounded-3" style="background-color:#c4c4c4;">
                <h4 class="mb-4">
                    <span class="badge bg-primary me-2">1</span>
                    Delivery Address
                </h4>
                
                <div class="mb-3">
                    <label for="receiver_address" class="form-label">Full Address *</label>
                    <textarea name="receiver_address" 
                              id="receiver_address" 
                              class="form-control" 
                              rows="4" 
                              placeholder="Enter your complete address including apartment/suite number, street, city, and postal code"
                              required></textarea>
                    <div class="form-text mt-1">
                        <i class="bi bi-info-circle"></i>
                        Ensure the address is accurate for successful delivery
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Contact Column -->
        <div class="col-md-6">
            <div class="h-100 p-4 rounded-3" style="background-color:#c4c4c4;">
                <h4 class="mb-4">
                    <span class="badge bg-primary me-2">2</span>
                    Contact Information
                </h4>
                
                <div class="mb-3">
                    <label for="receiver_phone" class="form-label">Phone Number *</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-phone"></i>
                        </span>
                        <input type="tel" 
                               name="receiver_phone" 
                               id="receiver_phone" 
                               class="form-control" 
                               placeholder="Your 10-digit phone number" 
                               required
                               pattern="[0-9]{10,}">
                    </div>
                    <div class="form-text mt-1">
                        <i class="bi bi-info-circle"></i>
                        We'll send delivery notifications to this number
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Submit Section -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center p-3 bg-primary text-white rounded-3">
                <div>
                    <h5 class="mb-0">Ready to complete your order?</h5>
                    <small>Review your information before confirming</small>
                </div>
                <button type="submit" 
                        name="submit" 
                        class="btn btn-light btn-lg px-5">
                    <i class="bi bi-lock-fill me-2"></i>
                    Confirm Order
                </button>
            </div>
        </div>
    </div>
</form>
@endsection