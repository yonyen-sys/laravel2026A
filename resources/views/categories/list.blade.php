@extends('layouts.admin')

@section('title')
    <title>List Categories</title>
@endsection

@section('page-title', 'Categories')

@section('content')
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('categoies.create') }}" class="btn btn-primary">
            <i class="fa-solid fa-plus me-1"></i> Create
        </a>
    </div>
    <div class="card stat-card">
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $index => $category)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td class="fw-semibold">{{ $category->name }}</td>
                            <td>{{ $category->dec }}</td>
                            <td class="text-end">
                                <a href="#" data-bs-toggle="modal"
                                   class="text-success me-2 text-decoration-none"
                                   data-bs-target="#category{{ $category->id }}">
                                    <i class="fa-regular fa-eye"></i> View
                                </a>
                                <a href="{{ route('categories.edit', $category->id) }}"
                                   class="text-info me-2 text-decoration-none">
                                    <i class="fa-regular fa-pen-to-square"></i> Edit
                                </a>
                                <a href="#" data-bs-toggle="modal"
                                   data-bs-target="#updatecategory{{ $category->id }}"
                                   class="text-danger text-decoration-none">
                                    <i class="fa-solid fa-trash"></i> Delete
                                </a>
                                @include('categories.show')
                                @include('categories.delete')
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
