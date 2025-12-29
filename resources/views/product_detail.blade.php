@extends('maindesign')
<base href="/public">
@section('product_detail')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #4a6fa5;
            --secondary-color: #166088;
            --accent-color: #ff6b6b;
            --light-color: #f8f9fa;
            --dark-color: #343a40;
            --gray-color: #6c757d;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            padding-top: 20px;
            background-color: #f9f9f9;
        }
        
        .product-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 20px 0;
            border-radius: 10px;
            margin-bottom: 30px;
        }
        
        .product-images {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            margin-bottom: 20px;
        }
        
        .main-image {
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 15px;
        }
        
        .thumbnails img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 5px;
            margin-right: 10px;
            margin-bottom: 10px;
            cursor: pointer;
            border: 2px solid transparent;
            transition: all 0.3s;
        }
        
        .thumbnails img:hover, .thumbnails img.active {
            border-color: var(--accent-color);
        }
        
        .product-info {
            background-color: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
        
        .product-title {
            color: var(--dark-color);
            margin-bottom: 15px;
            font-weight: 700;
        }
        
        .product-price {
            font-size: 2rem;
            font-weight: 700;
            color: var(--accent-color);
            margin-bottom: 20px;
        }
        
        .product-price .old-price {
            font-size: 1.2rem;
            color: var(--gray-color);
            text-decoration: line-through;
            margin-left: 10px;
        }
        
        .product-rating {
            color: #ffc107;
            margin-bottom: 15px;
        }
        
        .product-rating .rating-count {
            color: var(--gray-color);
            font-size: 0.9rem;
            margin-left: 10px;
        }
        
        .product-description {
            line-height: 1.6;
            margin-bottom: 25px;
            color: #555;
        }
        
        .product-options {
            margin-bottom: 25px;
        }
        
        .option-label {
            font-weight: 600;
            margin-bottom: 8px;
            color: var(--dark-color);
        }
        
        .option-buttons .btn {
            margin-right: 10px;
            margin-bottom: 10px;
            border: 1px solid #dee2e6;
        }
        
        .option-buttons .btn.active {
            background-color: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }
        
        .quantity-selector {
            display: flex;
            align-items: center;
            margin-bottom: 25px;
        }
        
        .quantity-btn {
            width: 40px;
            height: 40px;
            background-color: #f1f3f5;
            border: none;
            border-radius: 5px;
            font-size: 1.2rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .quantity-input {
            width: 70px;
            height: 40px;
            text-align: center;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            margin: 0 10px;
            font-weight: 600;
        }
        
        .action-buttons .btn {
            padding: 12px 25px;
            font-weight: 600;
            margin-right: 10px;
            margin-bottom: 10px;
        }
        
        .btn-cart {
            background-color: var(--primary-color);
            color: white;
            border: none;
        }
        
        .btn-cart:hover {
            background-color: var(--secondary-color);
            color: white;
        }
        
        .btn-wishlist {
            background-color: white;
            color: var(--dark-color);
            border: 1px solid #dee2e6;
        }
        
        .btn-wishlist:hover {
            background-color: #f8f9fa;
            border-color: var(--primary-color);
        }
        
        .product-details {
            background-color: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            margin-top: 30px;
        }
        
        .specs-table td {
            padding: 12px 0;
            border-bottom: 1px solid #e9ecef;
        }
        
        .specs-table td:first-child {
            font-weight: 600;
            color: var(--dark-color);
            width: 40%;
        }
        
        .review-item {
            border-bottom: 1px solid #e9ecef;
            padding: 20px 0;
        }
        
        .review-item:last-child {
            border-bottom: none;
        }
        
        .review-author {
            font-weight: 600;
            margin-bottom: 5px;
        }
        
        .review-date {
            color: var(--gray-color);
            font-size: 0.9rem;
        }
        
        .product-tags .badge {
            margin-right: 8px;
            margin-bottom: 8px;
            padding: 8px 12px;
            font-weight: 500;
            background-color: #e9ecef;
            color: var(--dark-color);
        }
        
        .stock-status {
            display: inline-flex;
            align-items: center;
            padding: 5px 15px;
            border-radius: 50px;
            font-weight: 600;
            margin-bottom: 20px;
        }
        
        .in-stock {
            background-color: rgba(40, 167, 69, 0.1);
            color: #28a745;
        }
        
        .delivery-info {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 15px;
            margin-top: 20px;
        }
        
        .delivery-info i {
            color: var(--primary-color);
            margin-right: 10px;
        }
        
        @media (max-width: 768px) {
            .action-buttons .btn {
                width: 100%;
                margin-right: 0;
            }
            
            .product-price {
                font-size: 1.8rem;
            }
        }
        
        .breadcrumb {
            background-color: transparent;
            padding: 0;
            margin-bottom: 20px;
        }
        
        .breadcrumb-item a {
            color: var(--primary-color);
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">        
        
        <!-- Product Header -->
        <!-- <div class="product-header text-center">
            <h1>Premium Wireless Headphones</h1>
            <p class="lead">Experience immersive sound with industry-leading noise cancellation</p>
        </div> -->
        <a href="{{ route('index') }}" style="display: inline-block; margin-bottom: 20px; color: #2a5885; text-decoration: none; " class="btn btn-secondary text-white">&larr; Back Product</a>
        <div class="row">
            <!-- Product Images -->
            <div class="col-lg-6" >
                <div class="product-images" >
                    <!-- Main Product Image -->
                    <div class="main-image" style="border-bottom: 3px solid brown;">
                        <img id="mainProductImage" src="{{ asset('products/'.$product->product_image) }}" class="img-fluid rounded" alt="">
                    </div>
                    
                    <!-- Thumbnail Images
                    <div class="thumbnails">
                        <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80" class="active" onclick="changeImage(this)" alt="Headphone front view">
                        <img src="https://images.unsplash.com/photo-1583394838336-acd977736f90?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80" onclick="changeImage(this)" alt="Headphone side view">
                        <img src="https://images.unsplash.com/photo-1484704849700-f032a568e944?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80" onclick="changeImage(this)" alt="Headphone in case">
                        <img src="https://images.unsplash.com/photo-1546435770-a3e426bf472b?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80" onclick="changeImage(this)" alt="Person wearing headphones">
                    </div> -->
                </div>
                
                <!-- Product Tags
                <div class="product-tags mt-4">
                    <span class="badge">Wireless</span>
                    <span class="badge">Noise Cancelling</span>
                    <span class="badge">Bluetooth 5.2</span>
                    <span class="badge">30-hour battery</span>
                    <span class="badge">Premium Sound</span>
                </div> -->
            </div>
            
            <!-- Product Information -->
            <div class="col-lg-6" >
                <div class="product-info" style="background-color:#c4c4c4;" >
                    <div class="stock-status in-stock">
                        <i class="fas fa-check-circle me-2"></i> In Stock
                    </div>
                    
                    <h2 class="product-title">{{ $product->product_name }}</h2>
                    
                    <div class="product-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <span class="rating-count">(4.5/5 based on 128 reviews)</span>
                    </div>
                    
                    <div class="product-price">
                        ${{ $product->product_price }}
                    </div>
                    
                    <p class="product-description">
                        {{ $product->product_description }}
                    </p>
                    
                    <!-- Color Options
                    <div class="product-options">
                        <div class="option-label">Color:</div>
                        <div class="option-buttons">
                            <button type="button" class="btn btn-outline-secondary active" data-option="color" data-value="black">Black</button>
                            <button type="button" class="btn btn-outline-secondary" data-option="color" data-value="silver">Silver</button>
                            <button type="button" class="btn btn-outline-secondary" data-option="color" data-value="blue">Navy Blue</button>
                        </div>
                    </div> -->
                    
                    <!-- Quantity Selector -->
                    <div class="option-label">Quantity:</div>
                    <div class="quantity-selector">
                        <button class="quantity-btn" id="decreaseQty"><i class="fas fa-minus"></i></button>
                        <input type="text" class="quantity-input" value="1" id="quantityInput">
                        <button class="quantity-btn" id="increaseQty"><i class="fas fa-plus"></i></button>
                        <span class="ms-3">Only {{ $product->product_qty }} items left!</span>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="action-buttons">
                        <a href="{{ route('add_to_card',$product-> id) }}" class="btn btn-cart btn-lg"><i class="fas fa-shopping-cart me-2"></i> Add to Cart</a>
                    </div>
                    
                    <!-- Delivery Information -->
                    <div class="delivery-info">
                        <p><i class="fas fa-shipping-fast"></i> <strong>Free delivery</strong> on orders over $50. Expected delivery: 2-3 business days.</p>
                        <p><i class="fas fa-undo-alt"></i> <strong>30-day return policy</strong> if you're not completely satisfied.</p>
                        <p><i class="fas fa-shield-alt"></i> <strong>2-year warranty</strong> included with purchase.</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Product Details Tabs -->
        
        
        <!-- Related Products (simulated) -->
        
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Product image switcher
        function changeImage(element) {
            const mainImage = document.getElementById('mainProductImage');
            mainImage.src = element.src.replace('&w=200', '&w=1000');
            
            // Update active thumbnail
            document.querySelectorAll('.thumbnails img').forEach(img => {
                img.classList.remove('active');
            });
            element.classList.add('active');
        }
        
        // Quantity selector functionality
        document.getElementById('increaseQty').addEventListener('click', function() {
            const quantityInput = document.getElementById('quantityInput');
            let currentValue = parseInt(quantityInput.value);
            quantityInput.value = currentValue + 1;
        });
        
        document.getElementById('decreaseQty').addEventListener('click', function() {
            const quantityInput = document.getElementById('quantityInput');
            let currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
            }
        });
        
        // Option button selection
        document.querySelectorAll('.option-buttons .btn').forEach(button => {
            button.addEventListener('click', function() {
                const optionType = this.getAttribute('data-option');
                const optionValue = this.getAttribute('data-value');
                
                // Remove active class from all buttons in this option group
                document.querySelectorAll(`.option-buttons .btn[data-option="${optionType}"]`).forEach(btn => {
                    btn.classList.remove('active');
                });
                
                // Add active class to clicked button
                this.classList.add('active');
                
                console.log(`Selected ${optionType}: ${optionValue}`);
                // In a real application, you would update the product variant here
            });
        });
        
        // Add to cart functionality
        document.querySelector('.btn-cart').addEventListener('click', function() {
            const quantity = document.getElementById('quantityInput').value;
            const selectedColor = document.querySelector('.option-buttons .btn[data-option="color"].active').getAttribute('data-value');
            
            // Show alert (in a real app, this would add to cart)
            alert(`Added ${quantity} ${selectedColor} headphones to cart!`);
            
            // Button feedback
            const originalText = this.innerHTML;
            this.innerHTML = '<i class="fas fa-check me-2"></i> Added to Cart';
            this.style.backgroundColor = '#28a745';
            
            setTimeout(() => {
                this.innerHTML = originalText;
                this.style.backgroundColor = '';
            }, 2000);
        });
        
        // Add to wishlist functionality
        document.querySelector('.btn-wishlist').addEventListener('click', function() {
            const icon = this.querySelector('i');
            
            if (icon.classList.contains('far')) {
                icon.classList.remove('far');
                icon.classList.add('fas');
                this.innerHTML = '<i class="fas fa-heart me-2"></i> In Wishlist';
                this.style.borderColor = '#ff6b6b';
                this.style.color = '#ff6b6b';
            } else {
                icon.classList.remove('fas');
                icon.classList.add('far');
                this.innerHTML = '<i class="far fa-heart me-2"></i> Add to Wishlist';
                this.style.borderColor = '';
                this.style.color = '';
            }
        });
    </script>
</body>
</html>
@endsection