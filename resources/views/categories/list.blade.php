@extends('layouts.app')
@section('title')
    <title>List Categories</title>
@endsection
@section('content')
    <a href="{{ route('categoies.create') }}" class="btn btn-info">Create+</a>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $index => $category)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->dec }}</td>
                    <td>
                        <!-- Button trigger modal -->
                        <a href="" data-bs-toggle="modal" class="text-success"
                            data-bs-target="#category{{ $category->id }}">
                            <i class="fa-regular fa-eye"></i>
                        </a>

                        |
                        <a href="{{ route('categories.edit', $category->id) }}" class="text-info">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </a>
                        |
                        <a href="" data-bs-toggle="modal" data-bs-target="#updatecategory{{ $category->id }}"
                            class="text-danger">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                        <!-- Modal -->
                        @include('categories.show')
                        @include('categories.delete')
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
