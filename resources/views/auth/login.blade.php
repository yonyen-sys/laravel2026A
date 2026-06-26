@extends('layouts.guest')

@section('title', '<title>Login</title>')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5 col-xl-4">
            <div class="auth-card card">
                <div class="card-body p-4 p-md-5">
                    <div class="text-center mb-4">
                        <span class="auth-brand">
                            <i class="fa-solid fa-gauge-high"></i> Admin Panel
                        </span>
                        <p class="text-muted mt-2 mb-0">Sign in to continue</p>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger py-2">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <form action="{{ route('login.submit') }}" method="POST" novalidate>
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white">
                                    <i class="fa-regular fa-envelope text-muted"></i>
                                </span>
                                <input type="email"
                                       id="email"
                                       name="email"
                                       value="{{ old('email') }}"
                                       class="form-control @error('email') is-invalid @enderror"
                                       placeholder="you@example.com"
                                       required
                                       autofocus>
                            </div>
                            @error('email')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white">
                                    <i class="fa-solid fa-lock text-muted"></i>
                                </span>
                                <input type="password"
                                       id="password"
                                       name="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       placeholder="••••••••"
                                       required>
                            </div>
                            @error('password')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-check mb-4">
                            <input type="checkbox"
                                   id="remember"
                                   name="remember"
                                   value="1"
                                   class="form-check-input"
                                   {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember" class="form-check-label">Remember me</label>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa-solid fa-right-to-bracket me-1"></i> Sign in
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <p class="text-center text-white-50 mt-3 mb-0 small">
                &copy; {{ date('Y') }} Admin Panel
            </p>
        </div>
    </div>
@endsection
