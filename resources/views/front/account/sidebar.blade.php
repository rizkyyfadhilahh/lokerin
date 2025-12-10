<!-- Profile Card -->
<div class="card border-0 shadow-sm mb-4" style="border-radius: 12px;">
    <div class="card-body p-4 text-center">
        <div class="position-relative d-inline-block mb-3">
            @if (Auth::user()->image != '')
                <img src="{{ Auth::user()->image }}" alt="avatar"
                    class="rounded-circle img-fluid border border-3 border-primary"
                    style="width: 120px; height: 120px; object-fit: cover;">
            @else
                <img src="{{ asset('assets/images/avatar7.png') }}" alt="avatar"
                    class="rounded-circle img-fluid border border-3 border-primary"
                    style="width: 120px; height: 120px; object-fit: cover;">
            @endif
            <span class="position-absolute bottom-0 end-0 bg-primary text-white rounded-circle"
                style="width: 32px; height: 32px; display: flex; align-items: center; justify-content: center;">
                <i class="fas fa-camera small"></i>
            </span>
        </div>
        <h5 class="fw-bold mb-1">{{ Auth::user()->name }}</h5>
        <p class="text-muted small mb-3">{{ Auth::user()->designation ?? '' }}</p>
        <button data-bs-toggle="modal" data-bs-target="#exampleModal" type="button"
            class="btn btn-primary btn-sm w-100">
            <i class="fas fa-camera me-2"></i>Change Picture
        </button>
    </div>
</div>

<!-- Navigation Menu -->
<div class="card border-0 shadow-sm" style="border-radius: 12px;">
    <div class="card-body p-0">
        <ul class="list-group list-group-flush">
            @if (auth()->user()->role === 'user')
                <li class="list-group-item border-0 p-0">
                    <a href="{{ route('account.profile') }}"
                        class="d-flex align-items-center text-decoration-none text-dark p-3 hover-bg-light">
                        <i class="fas fa-user-circle text-primary me-3" style="width: 20px;"></i>
                        <span class="fw-500">Account Settings</span>
                        <i class="fas fa-chevron-right ms-auto text-muted small"></i>
                    </a>
                </li>
                <li class="list-group-item border-0 p-0">
                    <a href="{{ route('account.createJob') }}"
                        class="d-flex align-items-center text-decoration-none text-dark p-3 hover-bg-light">
                        <i class="fas fa-plus-circle text-primary me-3" style="width: 20px;"></i>
                        <span class="fw-500">Post a Job</span>
                        <i class="fas fa-chevron-right ms-auto text-muted small"></i>
                    </a>
                </li>
                <li class="list-group-item border-0 p-0">
                    <a href="{{ route('account.myJobs') }}"
                        class="d-flex align-items-center text-decoration-none text-dark p-3 hover-bg-light">
                        <i class="fas fa-briefcase text-primary me-3" style="width: 20px;"></i>
                        <span class="fw-500">My Jobs</span>
                        <i class="fas fa-chevron-right ms-auto text-muted small"></i>
                    </a>
                </li>
                <li class="list-group-item border-0 p-0">
                    <a href="{{ route('account.myJobApplications') }}"
                        class="d-flex align-items-center text-decoration-none text-dark p-3 hover-bg-light">
                        <i class="fas fa-file-alt text-primary me-3" style="width: 20px;"></i>
                        <span class="fw-500">Jobs Applied</span>
                        <i class="fas fa-chevron-right ms-auto text-muted small"></i>
                    </a>
                </li>
                <li class="list-group-item border-0 p-0">
                    <a href="{{ route('account.savedJobs') }}"
                        class="d-flex align-items-center text-decoration-none text-dark p-3 hover-bg-light">
                        <i class="fas fa-bookmark text-primary me-3" style="width: 20px;"></i>
                        <span class="fw-500">Saved Jobs</span>
                        <i class="fas fa-chevron-right ms-auto text-muted small"></i>
                    </a>
                </li>
                <li class="list-group-item border-0 p-0">
                    <a href="{{ route('account.logout') }}"
                        class="d-flex align-items-center text-decoration-none text-danger p-3 hover-bg-light">
                        <i class="fas fa-sign-out-alt me-3" style="width: 20px;"></i>
                        <span class="fw-500">Logout</span>
                        <i class="fas fa-chevron-right ms-auto small"></i>
                    </a>
                </li>
            @endif

            @if (auth()->user()->role === 'admin')
                <li class="list-group-item border-0 p-0">
                    <a href="{{ route('account.profile') }}"
                        class="d-flex align-items-center text-decoration-none text-dark p-3 hover-bg-light">
                        <i class="fas fa-user-circle text-primary me-3" style="width: 20px;"></i>
                        <span class="fw-500">Account Settings</span>
                        <i class="fas fa-chevron-right ms-auto text-muted small"></i>
                    </a>
                </li>
                <li class="list-group-item border-0 p-0">
                    <a href="{{ route('account.createJob') }}"
                        class="d-flex align-items-center text-decoration-none text-dark p-3 hover-bg-light">
                        <i class="fas fa-plus-circle text-primary me-3" style="width: 20px;"></i>
                        <span class="fw-500">Post a Job</span>
                        <i class="fas fa-chevron-right ms-auto text-muted small"></i>
                    </a>
                </li>
                <li class="list-group-item border-0 p-0">
                    <a href="{{ route('account.myJobs') }}"
                        class="d-flex align-items-center text-decoration-none text-dark p-3 hover-bg-light">
                        <i class="fas fa-briefcase text-primary me-3" style="width: 20px;"></i>
                        <span class="fw-500">My Jobs</span>
                        <i class="fas fa-chevron-right ms-auto text-muted small"></i>
                    </a>
                </li>
                <li class="list-group-item border-0 p-0">
                    <a href="{{ route('account.logout') }}"
                        class="d-flex align-items-center text-decoration-none text-danger p-3 hover-bg-light">
                        <i class="fas fa-sign-out-alt me-3" style="width: 20px;"></i>
                        <span class="fw-500">Logout</span>
                        <i class="fas fa-chevron-right ms-auto small"></i>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</div>

<style>
    .hover-bg-light:hover {
        background-color: #f8fafc;
        transition: background-color 0.2s ease;
    }

    .fw-500 {
        font-weight: 500;
    }
</style>
