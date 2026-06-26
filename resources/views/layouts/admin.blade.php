<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('title')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <style>
        body { background: #f4f6fa; }
        .admin-wrapper { display: flex; min-height: 100vh; }
        .admin-sidebar {
            width: 250px;
            background: linear-gradient(180deg, #1f2937 0%, #111827 100%);
            color: #e5e7eb;
            flex-shrink: 0;
        }
        .admin-sidebar .brand {
            padding: 1.25rem 1.5rem;
            font-size: 1.25rem;
            font-weight: 700;
            color: #fff;
            border-bottom: 1px solid rgba(255,255,255,0.08);
            display: flex; align-items: center; gap: .6rem;
        }
        .admin-sidebar .brand i { color: #60a5fa; }
        .admin-sidebar .nav-link {
            color: #cbd5e1;
            padding: .7rem 1.5rem;
            border-left: 3px solid transparent;
            display: flex; align-items: center; gap: .75rem;
            transition: background .15s, color .15s, border-color .15s;
        }
        .admin-sidebar .nav-link:hover {
            color: #fff;
            background: rgba(255,255,255,0.05);
        }
        .admin-sidebar .nav-link.active {
            color: #fff;
            background: rgba(96,165,250,0.12);
            border-left-color: #60a5fa;
        }
        .admin-sidebar .nav-link i { width: 18px; text-align: center; }
        .admin-sidebar .nav-section {
            padding: 1rem 1.5rem .35rem;
            font-size: .7rem;
            text-transform: uppercase;
            letter-spacing: .08em;
            color: #64748b;
        }
        .admin-main { flex: 1; display: flex; flex-direction: column; min-width: 0; }
        .admin-topbar {
            background: #fff;
            border-bottom: 1px solid #e5e7eb;
            padding: .75rem 1.5rem;
            display: flex; align-items: center; justify-content: space-between;
        }
        .admin-topbar .page-title { font-weight: 600; color: #111827; margin: 0; }
        .admin-topbar .user-chip {
            display: flex; align-items: center; gap: .6rem;
            color: #374151;
        }
        .admin-topbar .avatar {
            width: 36px; height: 36px; border-radius: 50%;
            background: #1f2937; color: #fff;
            display: inline-flex; align-items: center; justify-content: center;
            font-weight: 600;
        }
        .admin-content { padding: 1.5rem; flex: 1; }
        .stat-card {
            border: none; border-radius: .75rem;
            box-shadow: 0 1px 2px rgba(0,0,0,0.04);
        }
        .stat-card .icon {
            width: 48px; height: 48px; border-radius: .65rem;
            display: inline-flex; align-items: center; justify-content: center;
            font-size: 1.25rem;
        }
        .stat-card .stat-label { color: #6b7280; font-size: .85rem; margin: 0; }
        .stat-card .stat-value { font-size: 1.75rem; font-weight: 700; margin: 0; color: #111827; }
        @media (max-width: 768px) {
            .admin-wrapper { flex-direction: column; }
            .admin-sidebar { width: 100%; }
        }
    </style>
</head>
<body>
    <div class="admin-wrapper">
        <!-- Sidebar -->
        <aside class="admin-sidebar">
            <div class="brand">
                <i class="fa-solid fa-gauge-high"></i>
                <span>Admin Panel</span>
            </div>
            <nav class="mt-2">
                <div class="nav-section">Main</div>
                <a href="{{ route('dashboard') }}"
                   class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="fa-solid fa-house"></i> <span>Dashboard</span>
                </a>

                <div class="nav-section">Manage</div>
                <a href="{{ route('users.index') }}"
                   class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-users"></i> <span>Users</span>
                </a>
                <a href="{{ route('customers.index') }}"
                   class="nav-link {{ request()->routeIs('customers.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-user-tie"></i> <span>Customers</span>
                </a>
                <a href="{{ route('categoies.index') }}"
                   class="nav-link {{ request()->routeIs('categoies.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-layer-group"></i> <span>Categories</span>
                </a>
                <a href="{{ route('products.index') }}"
                   class="nav-link {{ request()->routeIs('products.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-box"></i> <span>Products</span>
                </a>
            </nav>
        </aside>

        <!-- Main column -->
        <div class="admin-main">
            <header class="admin-topbar">
                <h5 class="page-title">@yield('page-title', 'Dashboard')</h5>

                <div class="d-flex align-items-center gap-3">
                    <div class="user-chip">
                        <span class="avatar">
                            {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                        </span>
                        <div class="d-none d-sm-block">
                            <div class="fw-semibold">{{ auth()->user()->name ?? 'Admin' }}</div>
                            <small class="text-muted">{{ auth()->user()->email ?? '' }}</small>
                        </div>
                    </div>

                    <form action="{{ route('logout') }}" method="POST" class="m-0">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger btn-sm">
                            <i class="fa-solid fa-right-from-bracket me-1"></i> Logout
                        </button>
                    </form>
                </div>
            </header>

            <main class="admin-content">
                @if (session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif
                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>
</html>
