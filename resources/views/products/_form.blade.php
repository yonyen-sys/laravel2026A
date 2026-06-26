@php
    /** @var \App\Models\Product|null $product */
    $isEdit = isset($product) && $product !== null;
    $action = $isEdit ? route('products.update', $product) : route('products.store');
    $method = $isEdit ? 'PUT' : 'POST';
    $title  = $isEdit ? 'Edit Product' : 'Create Product';
@endphp

<div class="row justify-content-center">
    <div class="col-md-10 col-lg-8">
        <div class="card stat-card">
            <div class="card-body">
                <h5 class="card-title mb-3">{{ $title }}</h5>

                <form action="{{ $action }}" method="POST" enctype="multipart/form-data" novalidate>
                    @csrf
                    @if ($isEdit)
                        @method('PUT')
                    @endif

                    <div class="row g-3">
                        <div class="col-md-8">
                            <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                            <input type="text"
                                   id="name"
                                   name="name"
                                   value="{{ old('name', $isEdit ? $product->name : '') }}"
                                   class="form-control @error('name') is-invalid @enderror"
                                   required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="category_id" class="form-label">Category <span class="text-danger">*</span></label>
                            <select id="category_id"
                                    name="category_id"
                                    class="form-select @error('category_id') is-invalid @enderror"
                                    required>
                                <option value="">Choose...</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ (string) old('category_id', $isEdit ? $product->category_id : '') === (string) $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="price" class="form-label">Price <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number"
                                       id="price"
                                       name="price"
                                       step="0.01"
                                       min="0"
                                       value="{{ old('price', $isEdit ? $product->price : '') }}"
                                       class="form-control @error('price') is-invalid @enderror"
                                       required>
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="stock" class="form-label">Stock <span class="text-danger">*</span></label>
                            <input type="number"
                                   id="stock"
                                   name="stock"
                                   min="0"
                                   value="{{ old('stock', $isEdit ? $product->stock : 0) }}"
                                   class="form-control @error('stock') is-invalid @enderror"
                                   required>
                            @error('stock')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4 d-flex align-items-end">
                            <div class="form-check form-switch mb-2">
                                <input type="checkbox"
                                       id="is_active"
                                       name="is_active"
                                       value="1"
                                       class="form-check-input"
                                       {{ old('is_active', $isEdit ? $product->is_active : true) ? 'checked' : '' }}>
                                <label for="is_active" class="form-check-label">Active</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="image" class="form-label">Image</label>
                            <input type="file"
                                   id="image"
                                   name="image"
                                   accept="image/*"
                                   class="form-control @error('image') is-invalid @enderror">
                            <small class="text-muted">JPG, PNG, or GIF. Max 2MB.</small>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            @if ($isEdit && $product->image_url)
                                <div class="mt-2 d-flex align-items-center gap-2">
                                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}"
                                         width="64" height="64"
                                         style="object-fit: cover; border-radius: .35rem;">
                                    <small class="text-muted">Current image — uploading a new one will replace it.</small>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="d-flex gap-2 mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa-solid fa-floppy-disk me-1"></i>
                            {{ $isEdit ? 'Update' : 'Create' }}
                        </button>
                        <a href="{{ route('products.index') }}" class="btn btn-light">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
