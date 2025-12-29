  @extends('maindesign')
  @section('index')
      <div class="container">
        <div class="heading_container heading_center">
          <h2>
            Products
          </h2>
        </div> 
        <div class="container">
        <div class="row">
          @foreach ($products as $product)
            <div class="col-sm-6 col-md-4 col-lg-3">
              <div class="box" style="border-bottom: 3px solid brown;">
                <a href="{{ route('product_detail', $product->id) }}">
                  <div class="img-box">
                    <img src="{{ asset('products/'.$product->product_image) }}" alt="">
                  </div>
                  <div class="detail-box">
                    <h6>
                      {{$product->product_name}}
                    </h6>
                    <h6>
                      Price
                      <span>
                        ${{ $product->product_price }}
                      </span>
                    </h6>
                  </div>
                  <div class="new">
                    <span>
                      New
                    </span>
                  </div>
                </a>
              </div>
            </div>
          @endforeach
        </div>
      </div>
        
        <div class="btn-box">
          <a href="{{ route('viewallproduct') }}">
            View All Products
          </a>
        </div>
      </div>
  @endsection