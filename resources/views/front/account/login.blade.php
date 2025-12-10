@extends('front.layouts.app')

@section('main')
    <section class="py-5 bg-light min-vh-100 d-flex align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5">
                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4"
                            style="border-radius: 12px; border-left: 4px solid var(--primary-blue) !important; background-color: var(--primary-blue-light); color: var(--primary-blue);">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-check-circle me-3 fs-4"></i>
                                <p class="mb-0">{{ Session::get('success') }}</p>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if (Session::has('error'))
                        <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm mb-4"
                            style="border-radius: 12px; border-left: 4px solid #ef4444 !important;">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-exclamation-circle me-3 fs-4"></i>
                                <p class="mb-0">{{ Session::get('error') }}</p>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="card border-0 shadow-lg" style="border-radius: 16px;">
                        <div class="card-body p-5">
                            <div class="text-center mb-4">
                                <div class="mb-3">
                                    <i class="fas fa-user-circle fa-4x text-primary"></i>
                                </div>
                                <h2 class="fw-bold mb-2">Welcome Back</h2>
                                <p class="text-muted">Sign in to your account</p>
                            </div>

                            <form action="{{ route('account.authenticate') }}" method="post">
                                @csrf
                                <div class="mb-4">
                                    <label for="email" class="form-label fw-semibold">Email Address</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="fas fa-envelope text-muted"></i>
                                        </span>
                                        <input type="text" value="{{ old('email') }}" name="email" id="email"
                                            class="form-control border-start-0 @error('email') is-invalid @enderror"
                                            placeholder="example@example.com">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="password" class="form-label fw-semibold">Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="fas fa-lock text-muted"></i>
                                        </span>
                                        <input type="password" name="password" id="password"
                                            class="form-control border-start-0 @error('password') is-invalid @enderror"
                                            placeholder="Enter your password">
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="rememberMe">
                                        <label class="form-check-label small" for="rememberMe">
                                            Remember me
                                        </label>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary w-100 py-3 mb-3">
                                    <i class="fas fa-sign-in-alt me-2"></i>Sign In
                                </button>

                                <div class="text-center">
                                    <span class="text-muted small">Don't have an account? </span>
                                    <a href="{{ route('account.registration') }}"
                                        class="text-primary fw-semibold text-decoration-none small">
                                        Create Account
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
