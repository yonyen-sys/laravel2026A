@extends('layouts.app')
@section('title')
    <title>create category</title>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name = "name" class="form-control" id="name" aria-describedby="name">
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>

                        <div class="form-floating">
                            <textarea class="form-control" name = "dec" placeholder="Leave a dec here" id="description" style="height: 100px"></textarea>
                            {{-- <label for="floatingTextarea2">Comments</label> --}}
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
@endsection
