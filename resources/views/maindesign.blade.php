<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="front_end/images/favicon.png" type="image/x-icon">

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="front_end/css/bootstrap.css" />

  <!-- Custom styles for this template -->
  <link href="{{ asset('front_end/css/style.css') }}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="front_end/css/responsive.css" rel="stylesheet" />
</head>

<body>

  <header class=" header-style" style="margin-top: -100px; position: sticky;
  top: 0%;
  z-index: 9999;">
    <nav class="container navigetion">
      <ul class="container-list">
        <li style="display: inline-block;">
          <a href="{{ route('index') }}">
            
            <img style="width: 80px;" src="{{ asset('front_end/images/logo-ms.png') }}" alt="">
          </a>
        </li>
        <li class="list-menu">
          <a class="nav-link" href="{{ route('index') }}">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="list-menu">
          <a class="nav-link" href="front_end/shop.html">
            Shop
          </a>
        </li>
        <li class="list-menu">
          <a class="nav-link" href="front_end/testimonial.html">
            Testimonial
          </a>
        </li>
        <li class="list-menu">
          <a class="nav-link" href="front_end/contact.html">Contact Us</a>
        </li>
      </ul>

      <div class="user_option">
    <a href="{{ route('cartproducts') }}">
        <i class="fa fa-shopping-bag" style="margin-right: 25px;font-size:20px; position: relative;">
                <span style="width: 25px; height: 25px; text-align: center; display: flex; justify-content: center; align-items: center;
                 color:aliceblue; background-color:brown; position: absolute; top: -80%; right: -12px; border-radius: 50%; border: 1px solid #c4c4c4">{{ $count ?? 0 }}</span>            
        </i>
    </a>

    @if(Auth::check() && Auth::user()->user_type === 'admin')
    <a href="{{ route('dashboard') }}" class="btn btn-dark">
        Dashboard
    </a>

@elseif(Auth::check())
    {{-- logged in user (not admin) --}}
    <div class="list-inline-item logout">
                <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();" class="btn btn-danger">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
            </div>

@else
    {{-- guest --}}
    <a class="btn btn-secondary" href="{{ route('login') }}">Login</a>
    <a class="btn btn-primary" href="{{ route('register') }}">Register</a>
@endif

</div>

    </nav>
  </header>

  <!-- old header -->
  <!-- <header class="header_section rounded-none bg-gradient overflow-hidden">
      <nav class="navbar navbar-expand-lg custom_nav-container" style="width: 100%;">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav  ">
            <li class="nav-item active">
              <a class="nav-link" href="front_end/index.html">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="front_end/shop.html">
                Shop
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="front_end/testimonial.html">
                Testimonial
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="front_end/contact.html">Contact Us</a>
            </li>
            <li class="nav-item pt-1">
                <a href="">
                  <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                </a>
            </li>
            <li class="nav-item px-4 pt-1">     
              <form class="form-inline ">
                <button class="btn nav_search-btn" type="submit">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </button>
              </form>
            </li>
          </ul>
          <div class="user_option">
            @if(Auth::check())
              <a href="{{ route('dashboard') }}">
                <i class="fa fa-user" aria-hidden="true"></i>
                <span>
                  Dashboard
                </span>
              </a>
            @else
                <a class="btn btn-secondary" href="{{ route('login') }}">
                <i class="fa fa-user" aria-hidden="true"></i>
                <span>
                  Login
                </span>
              </a>
              <a class="btn btn-primary" href="{{ route('register') }}">
                <i class="fa fa-user" aria-hidden="true"></i>
                <span>
                  Register
                </span>
              </a>
            @endif

          </div>
        </div>
      </nav>
  </header> -->
  <div class="hero_area">

    <!-- slider section -->
    <section class="slider_section" style="margin-top: 10%;">
      <div class="container slider_container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-7">
                    <div class="detail-box"> 
                      <h1>
                        Welcome To Our <br>
                        Mobile <span class="text-info">Store</span>
                      </h1>
                      <p style="color:black">
                        Sequi perspiciatis nulla reiciendis, rem, tenetur impedit, eveniet non necessitatibus error distinctio mollitia suscipit. Nostrum fugit doloribus consequatur distinctio esse, possimus maiores aliquid repellat beatae cum, perspiciatis enim, accusantium perferendis.
                      </p>
                      <a href="">
                        Contact Us
                      </a>
                    </div>
                  </div>
                  <div class="col-md-5 ">
                    <div class="img-box">
                      <!-- note -->
                      <img style="width:500px; height: 400px; object-fit: cover; " src="front_end\images\mobile_phone.jpg" alt="" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
          
        </div>
      </div>
    </section>

  </div>

  <section class="shop_section layout_padding">
    @yield('index')
    @yield('product_detail')
    @yield('all_products')
    @yield('viewcart_products')
  </section>

  <!-- end shop section -->


  <!-- contact section -->

  <section class="contact_section ">
    <div class="container px-0">
      <div class="heading_container ">
        <h2 class="">
          Contact Us
        </h2>
      </div>
    </div>
    <div class="container container-bg">
      <div class="row">
        <div class="col-lg-7 col-md-6 px-0">
          <div class="map_container">
            <div class="map-responsive">
              <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=Eiffel+Tower+Paris+France" width="600" height="300" frameborder="0" style="border:0; width: 100%; height:100%" allowfullscreen></iframe>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-5 px-0">
          <form action="#">
            <div>
              <input type="text" placeholder="Name" />
            </div>
            <div>
              <input type="email" placeholder="Email" />
            </div>
            <div>
              <input type="text" placeholder="Phone" />
            </div>
            <div>
              <input type="text" class="message-box" placeholder="Message" />
            </div>
            <div class="d-flex ">
              <button>
                SEND
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <br><br><br>

  <!-- end contact section -->

   

  <!-- info section -->

  <section class="info_section  layout_padding2-top">
    <div class="social_container">
      <div class="social_box">
        <a href="">
          <i class="fa fa-facebook" aria-hidden="true"></i>
        </a>
        <a href="">
          <i class="fa fa-twitter" aria-hidden="true"></i>
        </a>
        <a href="">
          <i class="fa fa-instagram" aria-hidden="true"></i>
        </a>
        <a href="">
          <i class="fa fa-youtube" aria-hidden="true"></i>
        </a>
      </div>
    </div>
    <div class="info_container ">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-3">
            <h6>
              ABOUT US
            </h6>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet,
            </p>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="info_form ">
              <h5>
                Newsletter
              </h5>
              <form action="#">
                <input type="email" placeholder="Enter your email">
                <button>
                  Subscribe
                </button>
              </form>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <h6>
              NEED HELP
            </h6>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet,
            </p>
          </div>
          <div class="col-md-6 col-lg-3">
            <h6>
              CONTACT US
            </h6>
            <div class="info_link-box">
              <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span> Gb road 123 london Uk </span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>+01 12345678901</span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span> demo@gmail.com</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- footer section -->
    <footer class=" footer_section">
      <div class="container">
        <p>
          &copy; <span id="displayYear"></span> All Rights Reserved By
          <a href="https://html.design/">Web Tech Knowledge</a>
        </p>
      </div>
    </footer>
    <!-- footer section -->

  </section>

  <!-- end info section -->


  <script src="front_end/js/jquery-3.4.1.min.js"></script>
  <script src="front_end/js/bootstrap.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="front_end/js/custom.js"></script>

</body>

</html>