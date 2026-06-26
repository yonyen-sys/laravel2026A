@extends('layouts.admin')

@section('title')
    <title>{{ $product->name }}</title>
@endsection

@section('page-title', 'Product Details')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
            <div class="card stat-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3 flex-wrap gap-2">
                        <div>
                            <h4 class="mb-1">{{ $product->name }}</h4>
                            <span class="text-muted small">
                                Category: {{ $product->category->name ?? '—' }}
                            </span>
                        </div>
                        <div class="d-flex gap-2">
                            <a href="{{ route('products.edit', $product) }}" class="btn btn-info btn-sm text-white">
                                <i class="fa-regular fa-pen-to-square me-1"></i> Edit
                            </a>
                            <a href="{{ route('products.index') }}" class="btn btn-light btn-sm">
                                <i class="fa-solid fa-arrow-left me-1"></i> Back
                            </a>
                        </div>
                    </div>

                    <div class="row g-4">
                        <div class="col-md-5 text-center">
                            @if ($product->image_url)
                                <img src="{{ $product->image_url }}" alt="{{ $product->name }}"
                                     class="img-fluid rounded border" style="max-height: 280px;">
                            @else
                                <div class="bg-light rounded d-flex align-items-center justify-content-center text-muted"
                                     style="height: 240px;">
                                    <span><i class="fa-regular fa-image fa-2x me-2"></i> No image</span>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-7">
                            <table class="table table-sm">
                                <tbody>
                                    <tr>
                                        <th class="w-50 text-muted">Price</th>
                                        <td class="fw-semibold">${{ number_format($product->price, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-muted">Stock</th>
                                        <td>
                                            <span class="badge {{ $product->stock < 10 ? 'bg-warning text-dark' : 'bg-success' }}">
                                                {{ $product->stock }}
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-muted">Status</th>
                                        <td>
                                            @if ($product->is_active)
                                                <span class="badge bg-success-subtle text-success">Active</span>
                                            @else
                                                <span class="badge bg-secondary-subtle text-secondary">Inactive</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-muted">Created</th>
                                        <td>{{ $product->created_at->format('M d, Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-muted">Updated</th>
                                        <td>{{ $product->updated_at->format('M d, Y H:i') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
