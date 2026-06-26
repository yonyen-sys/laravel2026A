@extends('layouts.admin')

@section('title')
    <title>Edit Product</title>
@endsection

@section('page-title', 'Edit Product')

@section('content')
    @include('products._form')
@endsection
