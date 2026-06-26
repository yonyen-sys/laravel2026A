@extends('layouts.admin')

@section('title')
    <title>Products</title>
@endsection

@section('page-title', 'Products')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <p class="text-muted mb-0">Manage your store products.</p>
        <a href="{{ route('products.create') }}" class="btn btn-primary">
            <i class="fa-solid fa-plus me-1"></i> New Product
        </a>
    </div>

    <div class="card stat-card">
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Status</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $index => $product)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                @if ($product->image_url)
                                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}"
                                         width="44" height="44"
                                         style="object-fit: cover; border-radius: .35rem;">
                                @else
                                    <span class="d-inline-block bg-light text-muted text-center"
                                          style="width:44px;height:44px;line-height:44px;border-radius:.35rem;">
                                        <i class="fa-regular fa-image"></i>
                                    </span>
                                @endif
                            </td>
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
                            <td class="text-end">
                                <a href="{{ route('products.show', $product) }}"
                                   class="btn btn-sm btn-light text-success" title="View">
                                    <i class="fa-regular fa-eye"></i>
                                </a>
                                <a href="{{ route('products.edit', $product) }}"
                                   class="btn btn-sm btn-light text-info" title="Edit">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>
                                <button type="button"
                                        class="btn btn-sm btn-light text-danger"
                                        data-bs-toggle="modal"
                                        data-bs-target="#deleteProduct{{ $product->id }}"
                                        title="Delete">
                                    <i class="fa-solid fa-trash"></i>
                                </button>

                                {{-- Delete confirm modal --}}
                                <div class="modal fade" id="deleteProduct{{ $product->id }}" tabindex="-1"
                                     aria-labelledby="deleteProductLabel{{ $product->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <form action="{{ route('products.destroy', $product) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteProductLabel{{ $product->id }}">
                                                        Delete product
                                                    </h5>
                                                    <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-start">
                                                    Are you sure you want to delete
                                                    <strong>{{ $product->name }}</strong>? This cannot be undone.
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light"
                                                            data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fa-solid fa-trash me-1"></i> Delete
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted py-4">
                                No products yet. Click <strong>New Product</strong> to add one.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
