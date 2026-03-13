@extends('layout.app')
@section('title','Admin Dashboard')

@section('content')

@auth
<div class="container-fluid">

    <!-- Welcome Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="p-4 bg-primary text-white rounded-4 shadow-sm">
                <h2 class="fw-bold mb-1">
                    Welcome, {{ Auth::user()->name }} 👋
                </h2>
                <p class="mb-0">
                    Manage your system easily from this admin panel.
                </p>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row g-4">

        <!-- Total Users -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 text-center p-4">
                <div class="mb-3">
                    <a href="{{route('user.index')}}">
                        <i class="bi bi-people-fill fs-2 text-primary"></i>
                    </a>

                </div>
                <h5 class="fw-semibold">Total Users</h5>
                <h4 class="fw-bold text-dark">{{Auth::user()->count()}}</h4>
            </div>
        </div>

        <!-- Notifications -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 text-center p-4">
                <div class="mb-3">
                    <a href="{{route('product.index')}}">
                        <i class="bi bi-box-seam-fill fs-2 text-danger"></i>
                    </a>
                </div>
                <h5 class="fw-semibold">Total Product</h5>
                <h4 class="fw-bold text-dark">
                    {{$totalpro}}
                </h4>
            </div>
        </div>

        <!-- category -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 text-center p-4">
                <div class="mb-3">

                    <a href="{{route('category.index')}}"><i class="bi bi-person-badge-fill fs-2 text-success"></i></a>
                </div>
                <h5 class="fw-semibold">Total Category</h5>
                <h4 class="fw-bold text-dark text-capitalize">
                    {{$totalCate }}
                </h4>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 text-center p-4">

                <!-- Notification Icon -->
                <div class="dropdown">
                    <div class="fs-5 position-relative"
                        data-bs-toggle="dropdown"
                        style="cursor: pointer;">

                        <i class="ri-chat-unread-fill fs-3"></i>
                        <sup class="text-danger f "> {{ Auth::user()->unreadNotifications->count() }}</sup>

                    </div>

                    <!-- Dropdown Menu -->
                    <ul class="dropdown-menu dropdown-menu-end p-0 shadow border-0" style="width: 350px; max-height: 400px; overflow-y: auto;">
                        <li class="dropdown-header bg-light fw-bold text-dark p-3 border-bottom d-flex justify-content-between align-items-center">
                            <span>Notifications</span>
                            <span class="badge bg-primary rounded-pill">{{ count($notification) }}</span>
                        </li>

                        <div class="list-group list-group-flush">
                            @foreach($notification as $notify)
                            <a href="#" class="list-group-item list-group-item-action p-3">
                                <div class="d-flex w-100 justify-content-between align-items-center mb-1">
                                    <h6 class="mb-0 text-primary fw-bold">
                                        <i class="bi bi-person-circle me-1"></i> {{ $notify->data['name'] }}
                                    </h6>
                                    <small class="text-muted" style="font-size: 0.75rem;">
                                        {{ $notify->created_at }}
                                    </small>
                                </div>

                                <p class="mb-1 text-dark small fw-medium">
                                    {{ $notify->data['message'] }}
                                </p>

                                <div class="text-muted small">
                                    <i class="bi bi-envelope me-1"></i> {{ $notify->data['email'] }}
                                </div>
                            </a>

                            @endforeach
                        </div>


                    </ul>
                </div>

            </div>
        
    </div>

</div>
@endauth

@endsection