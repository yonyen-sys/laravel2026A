@extends('layouts.app')
@section('title')
    <title>Update Category</title>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form action="{{ route('categories.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" value= "{{ $category->name }}" name = "name" class="form-control" id="name"
                        aria-describedby="name">
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>

                        <div class="form-floating">
                            <textarea class="form-control" name = "dec" placeholder="Leave a dec here" id="description" style="height: 100px">{{ $category->dec }}</textarea>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
@endsection
