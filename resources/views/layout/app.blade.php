<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Rimix-icon -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.9.0/fonts/remixicon.css" rel="stylesheet"/>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap Icons -->
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    

    <title>@yield('title')</title>

    <style>
        body {
            background: #f4f6f9;
            min-height: 100vh;
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, Arial, sans-serif;
        }

        /* Sidebar */
        .sidebar {
            width: 260px;
            min-height: 100vh;
            background: #fcfcfc;
            position: sticky;
            top: 0;
        }

        .brand-box {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 14px;
            padding: 14px 16px;
        }

        .brand-title {
            font-size: 20px;
            font-weight: 800;
            letter-spacing: 1px;
        }

        .welcome-box {
            background: rgba(255, 255, 255, 0.06);
            border-radius: 14px;
            padding: 12px 14px;
        }

        .menu-title {
            font-size: 12px;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: #adb5bd;
            margin-top: 14px;
            margin-bottom: 8px;
            padding-left: 10px;
        }

        .nav-link {
            border-radius: 12px;
            padding: 10px 12px;
            transition: 0.2s;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .nav-link:hover {
            background: rgba(13, 110, 253, 0.15);
            color: #fff !important;
        }

        .nav-link.active {
            background: rgba(13, 110, 253, 0.25);
            border: 1px solid rgba(13, 110, 253, 0.35);
            color: #fff !important;
            font-weight: 600;
        }

        /* Main content */
        .main-area {
            padding: 20px;
        }

        .topbar {
            background: #fff;
            border-radius: 18px;
            padding: 14px 18px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06);
            margin-bottom: 18px;
        }

        .content-card {
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06);
            padding: 18px;
        }

        .logout-btn {
            border-radius: 12px;
            padding: 10px 12px;
        }
    </style>
</head>

<body>
    <div class="d-flex">

        <!-- Sidebar -->
        <aside class="sidebar p-3 border-end">

            <div class="brand-box mb-3">
                <div class="d-flex align-items-center gap-2">
                    <i class="bi bi-bag-check-fill text-primary fs-4"></i>
                    <span class="brand-title text-primary">MyShop</span>
                </div>
                <small class="text-muted">Admin Panel</small>
            </div>

            <div class="welcome-box mb-3">
                <div class="text-dark fw-semibold">
                    Welcome 👋
                    
                </div>
              
                
                <div class="text-warning fw-bold">
                    {{ Auth::user()->name }}
                </div>
               
                
            </div>

            <div class="menu-title">Navigation</div>

            <ul class="nav flex-column gap-1">

                {{-- Dashboard --}}
                @if(Auth::user()->hasRole('admin'))
                <li class="nav-item">
                    <a href="{{ route('admin') }}"
                        class="nav-link text-dark">
                        <i class="bi bi-speedometer2"></i>
                        Dashboard
                    </a>
                </li>
                @elseif(Auth::user()->hasRole('user'))
                <li class="nav-item">
                    <a href="{{ route('user.home') }}"
                        class="nav-link text-dark ">
                        <i class="bi bi-speedometer2"></i>
                        Dashboard
                    </a>
                </li>
                @endif


                @can('product.index')
                <li class="nav-item">
                    <a href="{{ route('product.index') }}"
                        class="nav-link text-dark ">
                        <i class="bi bi-box-seam"></i>
                        Products
                    </a>
                </li>
                @endcan
                @can('product.create')
                <li class="nav-item">
                    <a href="{{ route('product.create') }}"
                        class="nav-link text-dark ">
                        <i class="bi bi-box-seam"></i>
                        Products Create
                    </a>
                </li>
                @endcan


                @can('category.index')
                <li class="nav-item">
                    <a href="{{ route('category.index') }}"
                        class="nav-link text-dark">
                        <i class="bi bi-tags"></i>
                        Categories
                    </a>
                </li>
                @endcan
                 @can('category.create')
                <li class="nav-item">
                    <a href="{{ route('category.create') }}"
                        class="nav-link text-dark ">
                        <i class="bi bi-box-seam"></i>
                        Categorys Create
                    </a>
                </li>
                @endcan

                <div class="menu-title">Access Control</div>

                @can('user.index')
                <li class="nav-item">
                    <a href="{{ route('user.index') }}"
                        class="nav-link text-dark">
                        <i class="bi bi-people"></i>
                        Users
                    </a>
                </li>
                @endcan

                {{-- Roles --}}
                @can('role.index')
                <li class="nav-item">
                    <a href="{{ route('role.index') }}"
                        class="nav-link text-dark">
                        <i class="bi bi-person-badge"></i>
                        Roles
                    </a>
                </li>
                @endcan
                {{-- Permissions --}}
                @can('permission.index')
                <li class="nav-item">
                    <a href="{{ route('permission.index') }}"
                        class="nav-link text-dark">
                        <i class="bi bi-shield-lock"></i>
                        Permissions
                    </a>
                </li>
                @endcan

                @can('admin.pending-product')
                     <li class="nav-item">
                    <a href="{{route('admin.pending-product')}}"
                        class="nav-link text-dark">
                        <i class="bi bi-shield-lock"></i>
                        Pending Products
                    </a>
                </li>
                @endcan
                <div class="menu-title">Account</div>

                <li class="nav-item mt-1">
                    <a href="{{ route('logout') }}" class="btn btn-primary w-100 logout-btn">
                        <i class="bi bi-box-arrow-right"></i>
                        Logout
                    </a>
                </li>

            </ul>
        </aside>

        <!-- Main -->
        <main class="flex-fill main-area">

            <!-- Top Bar -->
            <div class="topbar d-flex justify-content-between align-items-center">

                <div>
                    <h5 class="mb-0 fw-bold">@yield('title')</h5>
                    <small class="text-muted">Manage your system easily</small>
                </div>

                <div class="dropdown d-flex align-items-center gap-2">
                    
                     <div class="fs-5" data-bs-toggle="dropdown"  style="cursor: pointer;">
                        <i class="ri-chat-unread-fill "></i>
                        <sup class="fs-6">{{Auth::user()->unreadNotifications()->count()}}</sup>
                    </div>
                    <ul class="dropdown-menu">
                       
                    </ul>
                   
                </div>
                 
            </div>

            <!-- Page Content -->
            <div class="content-card">
                @yield('content')
            </div>

        </main>

    </div>
    @stack('js')
</body>

</html>