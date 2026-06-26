@extends('layouts.admin')

@section('title')
    <title>Create Product</title>
@endsection

@section('page-title', 'Create Product')

@section('content')
    @include('products._form')
@endsection
