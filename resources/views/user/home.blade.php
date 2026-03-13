@extends('layout.app')
@section('title','Welcome Back | MyShop')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">

<style>
body{
    font-family:'Plus Jakarta Sans',sans-serif;
    background:#f8fafc;
}

/* HERO */
.hero-card{
    background:linear-gradient(135deg,#4f46e5,#6d28d9);
    border-radius:28px;
    padding:55px;
    color:#fff;
    position:relative;
    overflow:hidden;
}
.hero-card::after{
    content:'';
    position:absolute;
    width:280px;height:280px;
    background:rgba(255,255,255,0.12);
    border-radius:50%;
    top:-80px;right:-80px;
}
.hero-card::before{
    content:'';
    position:absolute;
    width:160px;height:160px;
    background:rgba(255,255,255,0.08);
    border-radius:50%;
    bottom:-60px;left:20%;
}

/* CATEGORY */
.category-link{
    padding:10px 18px;
    border-radius:999px;
    background:#fff;
    border:1px solid #e5e7eb;
    font-weight:600;
    font-size:14px;
    color:#64748b;
    white-space:nowrap;
    transition:.3s;
}
.category-link:hover,
.category-link.active{
    background:#4f46e5;
    color:#fff;
    border-color:#4f46e5;
}

/* PRODUCT */
.product-card{
    border:none;
    border-radius:22px;
    transition:.3s;
}
.product-card:hover{
    transform:translateY(-8px);
    box-shadow:0 18px 35px rgba(0,0,0,.12);
}
.product-img{
    height:220px;
    object-fit:cover;
    border-radius:18px;
}
.btn-main{
    background:#4f46e5;
    color:#fff;
    border-radius:12px;
    padding:10px 18px;
    font-weight:600;
}
.btn-main:hover{
    background:#4338ca;
}

/* RIGHT CARDS */
.side-card{
    background:#fff;
    border-radius:22px;
    border:1px solid #e5e7eb;
    padding:22px;
}

</style>

<div class="container py-4">
<div class="row g-4">

<!-- LEFT -->
<div class="col-lg-9">

<!-- HERO -->
<div class="hero-card mb-5">
    <span class="badge bg-white text-primary fw-bold px-3 py-2 rounded-pill mb-3">Member Exclusive</span>
    <h2 class="fw-bold mb-2">Welcome back, {{ Auth::user()->name }} 👋</h2>
    <p class="opacity-75 mb-4">Special deals & recommendations just for you</p>
    <div class="d-flex gap-3">
        <a href="#" class="btn btn-light fw-bold rounded-pill px-4">Browse Deals</a>
        <a href="#" class="btn btn-outline-light rounded-pill px-4">Wishlist</a>
    </div>
</div>

<!-- CATEGORIES -->
<div class="mb-4">
    <h6 class="fw-bold text-secondary mb-3">Top Categories</h6>
    <div class="d-flex gap-3 overflow-auto pb-2">
        <a class="category-link active">All</a>
        <a class="category-link">Electronics</a>
        <a class="category-link">Fashion</a>
        <a class="category-link">Home</a>
        <a class="category-link">Beauty</a>
    </div>
</div>

<!-- PRODUCTS -->
<div class="d-flex justify-content-between mb-3">
    <h4 class="fw-bold">Recommended for You</h4>
    <a href="#" class="text-primary fw-bold small text-decoration-none">View all →</a>
</div>

<div class="row g-4">
@foreach([
['img'=>'1542291026-7eec264c27ff','title'=>'Nike Air Max','price'=>'7,999'],
['img'=>'1505740420928-5e560c06d30e','title'=>'Headphones','price'=>'4,499'],
['img'=>'1523275335684-37898b6baf30','title'=>'Smart Watch','price'=>'2,999'],
] as $p)
<div class="col-md-4">
<div class="card product-card h-100 p-3">
    <img src="https://images.unsplash.com/photo-{{ $p['img'] }}" class="w-100 product-img">
    <div class="pt-3">
        <h6 class="fw-bold mb-1">{{ $p['title'] }}</h6>
        <p class="text-muted small mb-2">Premium Quality</p>
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="fw-bold m-0">₹{{ $p['price'] }}</h5>
            <button class="btn btn-main btn-sm">Add</button>
        </div>
    </div>
</div>
</div>
@endforeach
</div>

</div>

<!-- RIGHT -->
<div class="col-lg-3">

<div class="side-card mb-4">
    <h6 class="fw-bold text-secondary mb-3">Active Order</h6>
    <div class="d-flex align-items-center mb-3">
        <div class="bg-primary bg-opacity-10 rounded-4 p-3 me-3">🚚</div>
        <div>
            <p class="fw-bold mb-0">Order #12903</p>
            <small class="text-success fw-bold">In Transit</small>
        </div>
    </div>
    <div class="progress mb-3" style="height:6px">
        <div class="progress-bar bg-success" style="width:65%"></div>
    </div>
    <button class="btn btn-light w-100 rounded-pill fw-bold btn-sm">Track Order</button>
</div>

<div class="side-card text-center mb-4">
    <div class="bg-light rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width:70px;height:70px">👤</div>
    <h6 class="fw-bold">{{ Auth::user()->name }}</h6>
    <small class="text-muted">Gold Member</small>
     <div class="row mt-3">
        <div class="col-6 border-end">
            <h6 class="fw-bold mb-0">12</h6>
            <small class="text-muted">Orders</small>
        </div>
        <div class="col-6">
            <h6 class="fw-bold mb-0">450</h6>
            <small class="text-muted">Points</small>
        </div>
    </div>
</div>

<div class="side-card bg-dark text-white text-center">
    <small class="opacity-75">Prime Upgrade</small>
    <h6 class="fw-bold my-2">Free Delivery</h6>
    <button class="btn btn-warning rounded-pill fw-bold w-100">Upgrade</button>
</div>

</div>

</div>
</div>

@endsection
