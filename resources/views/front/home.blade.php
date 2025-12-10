@extends('front.layouts.app')

@section('main')
    <!-- Hero Section with Animated Background -->
    <section class="hero-section position-relative overflow-hidden py-5"
        style="background: linear-gradient(135deg, #1e40af 0%, #3b82f6 50%, #60a5fa 100%); min-height: 600px;">
        <!-- Animated Background Elements -->
        <div class="hero-bg-animation">
            <div class="circle circle-1"></div>
            <div class="circle circle-2"></div>
            <div class="circle circle-3"></div>
            <div class="circle circle-4"></div>
        </div>

        <div class="container py-5 position-relative" style="z-index: 2;">
            <div class="row align-items-center min-vh-50">
                <div class="col-lg-7 col-xl-6">
                    <div class="hero-content animate-fade-in">
                        <span class="badge bg-white text-primary px-4 py-2 mb-3 shadow-sm"
                            style="border-radius: 50px; font-size: 0.9rem; font-weight: 600;">
                            <i class="fas fa-rocket me-2"></i>Your Career Starts Here
                        </span>
                        <h1 class="display-2 fw-bold text-white mb-3 animate-slide-up"
                            style="line-height: 1.2; text-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                            Find Your<br />
                            <span
                                style="background: linear-gradient(to right, #fbbf24, #f59e0b); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">Dream
                                Job</span>
                        </h1>
                        <p class="lead text-white mb-4 opacity-90 animate-slide-up"
                            style="font-size: 1.25rem; animation-delay: 0.2s;">
                            Connect with top employers. Explore thousands of opportunities.<br />
                            Start your journey to success today.
                        </p>
                        <div class="d-flex gap-3 flex-wrap animate-slide-up" style="animation-delay: 0.4s;">
                            <a href="{{ route('jobs') }}" class="btn btn-light btn-lg px-5 py-3 shadow-lg"
                                style="border-radius: 50px; font-weight: 600; transition: all 0.3s;">
                                <i class="fas fa-search me-2"></i>Explore Jobs Now
                            </a>
                            <a href="{{ route('account.createJob') }}" class="btn btn-outline-light btn-lg px-5 py-3"
                                style="border-radius: 50px; border-width: 2px; font-weight: 600; backdrop-filter: blur(10px); background: rgba(255,255,255,0.1);">
                                <i class="fas fa-plus-circle me-2"></i>Post a Job
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-xl-6 d-none d-lg-block">
                    <div class="hero-image text-center animate-float">
                        <div class="position-relative">
                            <div class="floating-card"
                                style="position: absolute; top: 20%; left: 10%; animation: float 3s ease-in-out infinite;">
                                <div class="bg-white rounded-4 shadow-lg p-3" style="width: 180px;">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-primary bg-opacity-10 rounded-circle p-2 me-2">
                                            <i class="fas fa-briefcase text-primary"></i>
                                        </div>
                                        <div class="text-start">
                                            <p class="mb-0 small fw-bold">New Jobs</p>
                                            <p class="mb-0 text-muted" style="font-size: 0.75rem;">+24 today</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="floating-card"
                                style="position: absolute; top: 50%; right: 5%; animation: float 3s ease-in-out infinite 1s;">
                                <div class="bg-white rounded-4 shadow-lg p-3" style="width: 200px;">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-success bg-opacity-10 rounded-circle p-2 me-2">
                                            <i class="fas fa-check text-success"></i>
                                        </div>
                                        <div class="text-start">
                                            <p class="mb-0 small fw-bold">Job Applied</p>
                                            <p class="mb-0 text-muted" style="font-size: 0.75rem;">Successfully sent</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- Popular Categories Section with Modern Design -->
    <section class="py-5" style="background: linear-gradient(180deg, #f8fafc 0%, #ffffff 100%);">
        <div class="container">
            <div class="text-center mb-5">
                <span class="badge bg-primary bg-opacity-10 text-primary px-4 py-2 mb-3"
                    style="border-radius: 50px; font-size: 0.9rem;">
                    <i class="fas fa-fire me-2"></i>Trending
                </span>
                <h2 class="fw-bold mb-3" style="font-size: 2.5rem;">Popular Categories</h2>
                <p class="text-muted" style="font-size: 1.1rem;">Explore jobs by your preferred industry</p>
            </div>
            <div class="row g-4">
                @if ($categories->isNotEmpty())
                    @php
                        $icons = ['fa-palette', 'fa-chart-line', 'fa-code', 'fa-bullhorn'];
                        $colors = ['#3b82f6', '#8b5cf6', '#ec4899', '#f59e0b'];
                    @endphp
                    @foreach ($categories as $index => $category)
                        <div class="col-lg-3 col-md-6">
                            <a href="{{ route('jobs') . '?category=' . $category->id }}"
                                class="text-decoration-none category-card-link">
                                <div class="card border-0 shadow-sm h-100 category-card"
                                    style="border-radius: 16px; transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); overflow: hidden;">
                                    <div class="card-body p-4 text-center position-relative">
                                        <div class="category-icon-wrapper mb-3 mx-auto d-flex align-items-center justify-content-center"
                                            style="width: 80px; height: 80px; background: linear-gradient(135deg, {{ $colors[$index % count($colors)] }}15 0%, {{ $colors[$index % count($colors)] }}25 100%); border-radius: 20px; transition: all 0.4s;">
                                            <i class="fas {{ $icons[$index % count($icons)] }} fa-2x"
                                                style="color: {{ $colors[$index % count($colors)] }}; transition: all 0.4s;"></i>
                                        </div>
                                        <h5 class="fw-bold text-dark mb-2" style="font-size: 1.1rem;">
                                            {{ $category->name }}</h5>
                                        <p class="text-muted small mb-0">
                                            <i class="fas fa-briefcase me-1"></i>{{ $category->jobs->count() }}
                                            position{{ $category->jobs->count() > 1 ? 's' : '' }}
                                        </p>
                                        <div class="position-absolute top-0 end-0 p-3">
                                            <i class="fas fa-arrow-right text-muted"
                                                style="font-size: 0.875rem; opacity: 0; transition: all 0.3s;"></i>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    <!-- Featured Jobs Section with Modern Cards -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <span class="badge px-4 py-2 mb-3"
                    style="background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%); color: white; border-radius: 50px; font-size: 0.9rem; font-weight: 600;">
                    <i class="fas fa-star me-2"></i>Featured Opportunities
                </span>
                <h2 class="fw-bold mb-3" style="font-size: 2.5rem;">Featured Jobs</h2>
                <p class="text-muted" style="font-size: 1.1rem;">Hand-picked premium opportunities just for you</p>
            </div>
            <div class="row g-4">
                @if ($featuredJobs->isNotEmpty())
                    @foreach ($featuredJobs as $featuredJob)
                        <div class="col-lg-4 col-md-6">
                            <div class="card border-0 shadow-sm h-100 job-card"
                                style="border-radius: 20px; transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); position: relative; overflow: hidden;">
                                <!-- Featured Badge Ribbon -->
                                <div class="position-absolute"
                                    style="top: 20px; right: -35px; transform: rotate(45deg); z-index: 1;">
                                    <div class="px-5 py-1"
                                        style="background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%); color: white; font-size: 0.75rem; font-weight: 700; letter-spacing: 0.5px;">
                                        FEATURED
                                    </div>
                                </div>

                                <div class="card-body p-4">
                                    <div class="d-flex align-items-start justify-content-between mb-3">
                                        <div class="company-logo bg-primary bg-opacity-10 rounded-3 p-3">
                                            <i class="fas fa-building text-primary fa-2x"></i>
                                        </div>
                                        <button class="btn btn-sm btn-light rounded-circle p-2"
                                            style="width: 40px; height: 40px;">
                                            <i class="far fa-bookmark"></i>
                                        </button>
                                    </div>

                                    <h5 class="fw-bold mb-2" style="font-size: 1.2rem; line-height: 1.4;">
                                        {{ $featuredJob->title }}</h5>
                                    <p class="text-muted mb-3" style="font-size: 0.95rem; line-height: 1.6;">
                                        {{ Str::words(strip_tags($featuredJob->description), 12) }}
                                    </p>

                                    <div class="mb-4">
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="icon-wrapper me-2 d-flex align-items-center justify-content-center"
                                                style="width: 32px; height: 32px; background: #dbeafe; border-radius: 8px;">
                                                <i class="fas fa-map-marker-alt text-primary"
                                                    style="font-size: 0.875rem;"></i>
                                            </div>
                                            <span class="text-black"
                                                style="font-size: 0.9rem; font-weight: 600;">{{ $featuredJob->location }}</span>
                                        </div>
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="icon-wrapper me-2 d-flex align-items-center justify-content-center"
                                                style="width: 32px; height: 32px; background: #dbeafe; border-radius: 8px;">
                                                <i class="fas fa-clock text-primary" style="font-size: 0.875rem;"></i>
                                            </div>
                                            <span class="text-black"
                                                style="font-size: 0.9rem; font-weight: 600;">{{ $featuredJob->jobType->name }}</span>
                                        </div>
                                        @if (!is_null($featuredJob->salary))
                                            <div class="d-flex align-items-center">
                                                <div class="icon-wrapper me-2 d-flex align-items-center justify-content-center"
                                                    style="width: 32px; height: 32px; background: #d1fae5; border-radius: 8px;">
                                                    <i class="fas fa-dollar-sign text-success"
                                                        style="font-size: 0.875rem;"></i>
                                                </div>
                                                <span class="text-dark fw-semibold"
                                                    style="font-size: 0.9rem;">{{ $featuredJob->salary }}</span>
                                            </div>
                                        @endif
                                    </div>

                                    <a href="{{ route('jobDetail', $featuredJob->id) }}" class="btn btn-primary w-100"
                                        style="border-radius: 12px; padding: 12px; font-weight: 600;">
                                        View Details <i class="fas fa-arrow-right ms-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12 text-center py-5">
                        <div class="empty-state">
                            <div class="mb-4">
                                <i class="fas fa-briefcase fa-4x text-muted opacity-50"></i>
                            </div>
                            <h5 class="text-muted mb-2">No Featured Jobs Available</h5>
                            <p class="text-muted">Check back later for new opportunities</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Latest Jobs Section with Timeline Design -->
    <section class="py-5" style="background: linear-gradient(180deg, #ffffff 0%, #f8faff 100%);">
        <div class="container">
            <div class="text-center mb-5">
                <span class="badge px-4 py-2 mb-3"
                    style="background: linear-gradient(135deg, #2563eb 0%, #3b82f6 100%); color: white; border-radius: 50px; font-size: 0.9rem; font-weight: 600;">
                    <i class="fas fa-clock me-2"></i>Just Posted
                </span>
                <h2 class="fw-bold mb-3" style="font-size: 2.5rem;">Latest Jobs</h2>
                <p class="text-muted" style="font-size: 1.1rem;">Fresh opportunities posted in the last 24 hours</p>
            </div>
            <div class="row g-4">
                @if ($latestJobs->isNotEmpty())
                    @foreach ($latestJobs as $latestJob)
                        <div class="col-lg-4 col-md-6">
                            <div class="card border-0 shadow-sm h-100 latest-job-card"
                                style="border-radius: 16px; transition: all 0.3s ease; background: white; border: 2px solid transparent;">
                                <div class="card-body p-4 d-flex flex-column">
                                    <div class="d-flex align-items-start justify-content-between mb-3">
                                        <span class="badge px-3 py-2"
                                            style="background: linear-gradient(135deg, #10b981 0%, #34d399 100%); color: white; border-radius: 20px; font-weight: 600; font-size: 0.8rem;">
                                            <i class="fas fa-bolt me-1"></i>NEW
                                        </span>
                                        <button class="btn btn-sm btn-light rounded-circle p-2"
                                            style="width: 36px; height: 36px;">
                                            <i class="far fa-bookmark" style="font-size: 0.875rem;"></i>
                                        </button>
                                    </div>

                                    <div class="mb-3">
                                        <div class="bg-primary bg-opacity-10 rounded-3 p-3 d-inline-block mb-3">
                                            <i class="fas fa-briefcase text-primary fa-2x"></i>
                                        </div>
                                    </div>

                                    <h5 class="fw-bold mb-2" style="font-size: 1.15rem; line-height: 1.4;">
                                        {{ $latestJob->title }}</h5>
                                    <p class="text-muted mb-3" style="font-size: 0.95rem; line-height: 1.6;">
                                        {{ Str::words(strip_tags($latestJob->description), 12) }}
                                    </p>

                                    <div class="mb-4">
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="icon-wrapper me-2 d-flex align-items-center justify-content-center"
                                                style="width: 32px; height: 32px; background: #dbeafe; border-radius: 8px;">
                                                <i class="fas fa-map-marker-alt text-primary"
                                                    style="font-size: 0.875rem;"></i>
                                            </div>
                                            <span class="text-black"
                                                style="font-size: 0.9rem; font-weight: 600;">{{ $latestJob->location }}</span>
                                        </div>
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="icon-wrapper me-2 d-flex align-items-center justify-content-center"
                                                style="width: 32px; height: 32px; background: #dbeafe; border-radius: 8px;">
                                                <i class="fas fa-clock text-primary" style="font-size: 0.875rem;"></i>
                                            </div>
                                            <span class="text-black"
                                                style="font-size: 0.9rem; font-weight: 600;">{{ $latestJob->jobType->name }}</span>
                                        </div>
                                        @if (!is_null($latestJob->salary))
                                            <div class="d-flex align-items-center">
                                                <div class="icon-wrapper me-2 d-flex align-items-center justify-content-center"
                                                    style="width: 32px; height: 32px; background: #d1fae5; border-radius: 8px;">
                                                    <i class="fas fa-dollar-sign text-success"
                                                        style="font-size: 0.875rem;"></i>
                                                </div>
                                                <span class="text-dark fw-semibold"
                                                    style="font-size: 0.9rem;">{{ $latestJob->salary }}</span>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="mt-auto">
                                        <a href="{{ route('jobDetail', $latestJob->id) }}" class="btn btn-primary w-100"
                                            style="border-radius: 12px; padding: 12px; font-weight: 600;">
                                            View Details <i class="fas fa-arrow-right ms-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12 text-center py-5">
                        <div class="empty-state">
                            <div class="mb-4">
                                <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-light"
                                    style="width: 100px; height: 100px;">
                                    <i class="fas fa-clock fa-3x text-muted opacity-50"></i>
                                </div>
                            </div>
                            <h5 class="text-muted mb-2">No Latest Jobs Available</h5>
                            <p class="text-muted">New opportunities are added regularly</p>
                        </div>
                    </div>
                @endif
            </div>

            <div class="text-center mt-5">
                <a href="{{ route('jobs') }}" class="btn btn-primary px-5 py-3"
                    style="border-radius: 50px; font-weight: 600; font-size: 1.05rem; box-shadow: 0 4px 15px rgba(37, 99, 235, 0.3);">
                    <i class="fas fa-search me-2"></i>Explore All Jobs <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </section>

@endsection
