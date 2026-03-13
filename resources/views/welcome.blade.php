
  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ShopEasy | Online Store</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { background-color: #f8f9fa; }

        .hero {
            background: linear-gradient(rgba(13,110,253,0.85), rgba(13,110,253,0.85)),
            url('https://images.unsplash.com/photo-1606813902914-0d9c6e85c2bb?w=1600') center/cover no-repeat;
            color: white;
            padding: 120px 0;
        }

        .product-card img,
        .blog-card img {
            height: 220px;
            object-fit: cover;
        }

        .icon-box {
            font-size: 40px;
            color: #0d6efd;
        }
    </style>
</head>
<body>



<!-- 🔹 Hero -->
<section class="hero text-center">
    <div class="container">
        <h1 class="display-5 fw-bold">Smart Shopping Starts Here</h1>
        <p class="lead">Trusted products, fast delivery & best prices</p>
        @if(Auth::check())
              <a href="{{route('product.index')}}" class="btn btn-warning btn-lg">Shop Now</a>  
        @else
             <a href="{{route('login')}}" class="btn btn-warning btn-lg">Login</a>                
        @endif

    </div>
</section>

<!-- 🔹 About Us -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=900" class="img-fluid rounded">
            </div>
            <div class="col-md-6">
                <h2 class="fw-bold">About Us</h2>
                <p class="text-muted">
                    ShopEasy is a modern e-commerce platform providing quality products
                    at affordable prices. We focus on customer satisfaction and fast delivery.
                </p>
                <a href="#" class="btn btn-primary">Learn More</a>
            </div>
        </div>
    </div>
</section>

<!-- 🔹 Services -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center fw-bold mb-4">Our Services</h2>

        <div class="row text-center g-4">
            <div class="col-md-4">
                <div class="card shadow-sm p-4">
                    <div class="icon-box mb-3">🚚</div>
                    <h5>Fast Delivery</h5>
                    <p class="text-muted">Quick & safe delivery at your doorstep.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm p-4">
                    <div class="icon-box mb-3">💳</div>
                    <h5>Secure Payment</h5>
                    <p class="text-muted">100% secure online payment options.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm p-4">
                    <div class="icon-box mb-3">📞</div>
                    <h5>24/7 Support</h5>
                    <p class="text-muted">Always available for customer help.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 🔹 Products -->
<section class="py-5 bg-white">
    <div class="container">
        <h2 class="text-center fw-bold mb-4">Featured Products</h2>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card product-card shadow-sm">
                    <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=800">
                    <div class="card-body text-center">
                        <h5>Smart Watch</h5>
                        <p class="text-muted">₹2,999</p>
                        <a href="#" class="btn btn-primary btn-sm">View</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card product-card shadow-sm">
                    <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=800">
                    <div class="card-body text-center">
                        <h5>Headphones</h5>
                        <p class="text-muted">₹1,499</p>
                        <a href="#" class="btn btn-primary btn-sm">View</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card product-card shadow-sm">
                    <img src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?w=800">
                    <div class="card-body text-center">
                        <h5>Mobile Phone</h5>
                        <p class="text-muted">₹12,999</p>
                        <a href="#" class="btn btn-primary btn-sm">View</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 🔹 Blog -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center fw-bold mb-4">Latest Blogs</h2>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card blog-card shadow-sm">
                    <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?w=800">
                    <div class="card-body">
                        <h5>Online Shopping Tips</h5>
                        <p class="text-muted small">Save money & shop smart online.</p>
                        <a href="#" class="btn btn-outline-primary btn-sm">Read More</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card blog-card shadow-sm">
                    <img src="https://images.unsplash.com/photo-1492724441997-5dc865305da7?w=800">
                    <div class="card-body">
                        <h5>Best Gadgets 2026</h5>
                        <p class="text-muted small">Top trending gadgets you must try.</p>
                        <a href="#" class="btn btn-outline-primary btn-sm">Read More</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card blog-card shadow-sm">
                    <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=800">
                    <div class="card-body">
                        <h5>Secure Payments</h5>
                        <p class="text-muted small">How we keep your payments safe.</p>
                        <a href="#" class="btn btn-outline-primary btn-sm">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 🔹 Footer -->
<footer class="bg-dark text-white text-center py-3">
    <p class="mb-0">© 2026 ShopEasy. All Rights Reserved.</p>
</footer>

</body>
</html>

