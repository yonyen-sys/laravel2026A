@extends('layouts.admin')

@section('title')
    <title>Dashboard</title>
@endsection

@section('page-title', 'Dashboard')

@section('content')
    {{-- Welcome banner --}}
    <div class="card stat-card mb-4">
        <div class="card-body d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
                <h5 class="mb-1">Welcome back, {{ auth()->user()->name }} 👋</h5>
                <p class="text-muted mb-0">Here's a quick overview of your store today.</p>
            </div>
            <a href="{{ route('categoies.create') }}" class="btn btn-primary">
                <i class="fa-solid fa-plus me-1"></i> New Category
            </a>
        </div>
    </div>

    {{-- Stat cards --}}
    <div class="row g-3 mb-4">
        <div class="col-md-6 col-xl-3">
            <div class="card stat-card h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="icon bg-primary-subtle text-primary">
                        <i class="fa-solid fa-users"></i>
                    </div>
                    <div>
                        <p class="stat-label">Total Users</p>
                        <p class="stat-value">{{ $stats['users'] }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card stat-card h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="icon bg-success-subtle text-success">
                        <i class="fa-solid fa-layer-group"></i>
                    </div>
                    <div>
                        <p class="stat-label">Categories</p>
                        <p class="stat-value">{{ $stats['categories'] }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card stat-card h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="icon bg-info-subtle text-info">
                        <i class="fa-solid fa-box"></i>
                    </div>
                    <div>
                        <p class="stat-label">Products</p>
                        <p class="stat-value">{{ $stats['products'] }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card stat-card h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="icon bg-warning-subtle text-warning">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                    </div>
                    <div>
                        <p class="stat-label">Low Stock (&lt; 10)</p>
                        <p class="stat-value">{{ $stats['low_stock'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Latest products --}}
    <div class="card stat-card">
        <div class="card-header bg-white border-0 d-flex align-items-center justify-content-between">
            <h6 class="mb-0 fw-semibold">Latest Products</h6>
            <div class="d-flex gap-2">
                <a href="{{ route('products.create') }}" class="small text-decoration-none">
                    <i class="fa-solid fa-plus me-1"></i> New
                </a>
                <a href="{{ route('products.index') }}" class="small text-decoration-none">View all</a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($latestProducts as $index => $product)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td class="fw-semibold">{{ $product->name }}</td>
                            <td>{{ $product->category->name ?? '—' }}</td>
                            <td>${{ number_format($product->price, 2) }}</td>
                            <td>
                                <span class="badge {{ $product->stock < 10 ? 'bg-warning text-dark' : 'bg-success' }}">
                                    {{ $product->stock }}
                                </span>
                            </td>
                            <td>
                                @if ($product->is_active)
                                    <span class="badge bg-success-subtle text-success">Active</span>
                                @else
                                    <span class="badge bg-secondary-subtle text-secondary">Inactive</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">No products yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
