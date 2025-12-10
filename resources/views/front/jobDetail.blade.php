@extends('front.layouts.app')

@section('main')
    <section class="py-5 bg-light">
        <div class="container">
            <div class="mb-4">
                <a href="{{ route('jobs') }}" class="btn btn-outline-primary">
                    <i class="fas fa-arrow-left me-2"></i>Back to Jobs
                </a>
            </div>

            <div class="row g-4">
                <div class="col-lg-8">
                    @include('front.message')

                    <!-- Main Job Card -->
                    <div class="card border-0 shadow-sm mb-4" style="border-radius: 12px;">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-start mb-4">
                                <div>
                                    <h2 class="fw-bold mb-3">{{ $job->title }}</h2>
                                    <div class="d-flex flex-wrap gap-3">
                                        <span class="text-muted">
                                            <i class="fas fa-map-marker-alt text-primary me-2"></i>{{ $job->location }}
                                        </span>
                                        <span class="text-muted">
                                            <i class="fas fa-clock text-primary me-2"></i>{{ $job->jobType->name }}
                                        </span>
                                        <span class="text-muted">
                                            <i class="fas fa-briefcase text-primary me-2"></i>{{ $job->category->name }}
                                        </span>
                                    </div>
                                </div>
                                <button class="btn btn-outline-danger btn-lg {{ $count == 1 ? '' : 'opacity-50' }}"
                                    onclick="saveJob({{ $job->id }})">
                                    <i class="{{ $count == 1 ? 'fas' : 'far' }} fa-heart"></i>
                                </button>
                            </div>

                            <hr>

                            <!-- Job Description -->
                            <div class="mb-4">
                                <h5 class="fw-bold mb-3"><i class="fas fa-file-alt text-primary me-2"></i>Job Description
                                </h5>
                                <div class="text-muted">{!! nl2br($job->description) !!}</div>
                            </div>

                            @if (!empty($job->responsibility))
                                <div class="mb-4">
                                    <h5 class="fw-bold mb-3"><i class="fas fa-tasks text-primary me-2"></i>Responsibilities
                                    </h5>
                                    <div class="text-muted">{!! nl2br($job->responsibility) !!}</div>
                                </div>
                            @endif

                            @if (!empty($job->qualifications))
                                <div class="mb-4">
                                    <h5 class="fw-bold mb-3"><i
                                            class="fas fa-graduation-cap text-primary me-2"></i>Qualifications</h5>
                                    <div class="text-muted">{!! nl2br($job->qualifications) !!}</div>
                                </div>
                            @endif

                            @if (!empty($job->benefits))
                                <div class="mb-4">
                                    <h5 class="fw-bold mb-3"><i class="fas fa-gift text-primary me-2"></i>Benefits</h5>
                                    <div class="text-muted">{!! nl2br($job->benefits) !!}</div>
                                </div>
                            @endif

                            <hr>

                            <div class="d-flex gap-2 justify-content-end">
                                @if (Auth::check())
                                    <button onclick="saveJob({{ $job->id }});"
                                        class="btn btn-outline-primary btn-lg px-4">
                                        <i class="far fa-bookmark me-2"></i>Save Job
                                    </button>
                                    <button onclick="applyJob({{ $job->id }})" class="btn btn-primary btn-lg px-4">
                                        <i class="fas fa-paper-plane me-2"></i>Apply Now
                                    </button>
                                @else
                                    <a href="{{ route('account.login') }}" class="btn btn-outline-primary btn-lg px-4">
                                        <i class="fas fa-sign-in-alt me-2"></i>Login to Save
                                    </a>
                                    <a href="{{ route('account.login') }}" class="btn btn-primary btn-lg px-4">
                                        <i class="fas fa-sign-in-alt me-2"></i>Login to Apply
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Applicants Section (Only for Job Owner) -->
                    @if (Auth::user())
                        @if (Auth::user()->id == $job->user_id)
                            <div class="card border-0 shadow-sm" style="border-radius: 12px;">
                                <div class="card-body p-4">
                                    <h5 class="fw-bold mb-4">
                                        <i class="fas fa-users text-primary me-2"></i>Applicants
                                    </h5>
                                    <div class="table-responsive">
                                        <table class="table table-hover align-middle">
                                            <thead class="bg-light">
                                                <tr>
                                                    <th class="fw-semibold">Name</th>
                                                    <th class="fw-semibold">Email</th>
                                                    <th class="fw-semibold">Mobile</th>
                                                    <th class="fw-semibold">Applied Date</th>
                                                    <th class="fw-semibold">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($applications->isNotEmpty())
                                                    @foreach ($applications as $application)
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center me-2"
                                                                        style="width: 36px; height: 36px;">
                                                                        <i class="fas fa-user"></i>
                                                                    </div>
                                                                    <span
                                                                        class="fw-500">{{ $application->user->name }}</span>
                                                                </div>
                                                            </td>
                                                            <td class="text-muted">{{ $application->user->email }}</td>
                                                            <td class="text-muted">
                                                                {{ $application->user->mobile ?? 'N/A' }}</td>
                                                            <td>
                                                                <span class="badge bg-primary bg-opacity-10 text-light p-3">
                                                                    {{ \Carbon\Carbon::parse($application->applied_date)->format('d M, Y') }}
                                                                </span>
                                                            </td>
                                                            <td>
                                                                @if ($application->user->cv)
                                                                    <a href="{{ route('downloadApplicantCv', $application->id) }}"
                                                                        target="_blank" class="btn btn-sm btn-primary">
                                                                        <i class="fas fa-eye me-1"></i>View CV
                                                                    </a>
                                                                @else
                                                                    <span class="text-muted small">No CV</span>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="5" class="text-center text-muted py-4">
                                                            <i class="fas fa-inbox fa-2x mb-2 d-block"></i>
                                                            No applicants yet
                                                        </td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- Job Summary Card -->
                    <div class="card border-0 shadow-sm mb-4" style="border-radius: 12px;">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-4">
                                <i class="fas fa-info-circle text-primary me-2"></i>Job Summary
                            </h5>
                            <ul class="list-unstyled">
                                <li class="mb-3 d-flex justify-content-between">
                                    <span class="text-muted">
                                        <i class="fas fa-calendar text-primary me-2"></i>Published:
                                    </span>
                                    <span
                                        class="fw-500">{{ \Carbon\Carbon::parse($job->created_at)->format('d M, Y') }}</span>
                                </li>
                                <li class="mb-3 d-flex justify-content-between">
                                    <span class="text-muted">
                                        <i class="fas fa-users text-primary me-2"></i>Vacancy:
                                    </span>
                                    <span class="fw-500">{{ $job->vacancy }}
                                        Position{{ $job->vacancy > 1 ? 's' : '' }}</span>
                                </li>
                                @if (!empty($job->salary))
                                    <li class="mb-3 d-flex justify-content-between">
                                        <span class="text-muted">
                                            <i class="fas fa-dollar-sign text-primary me-2"></i>Salary:
                                        </span>
                                        <span class="fw-500">{{ $job->salary }}</span>
                                    </li>
                                @endif
                                <li class="mb-3 d-flex justify-content-between">
                                    <span class="text-muted">
                                        <i class="fas fa-map-marker-alt text-primary me-2"></i>Location:
                                    </span>
                                    <span class="fw-500">{{ $job->location }}</span>
                                </li>
                                <li class="d-flex justify-content-between">
                                    <span class="text-muted">
                                        <i class="fas fa-clock text-primary me-2"></i>Job Type:
                                    </span>
                                    <span class="badge bg-primary">{{ $job->jobType->name }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Company Details Card -->
                    <div class="card border-0 shadow-sm" style="border-radius: 12px;">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-4">
                                <i class="fas fa-building text-primary me-2"></i>Company Details
                            </h5>
                            <ul class="list-unstyled">
                                <li class="mb-3">
                                    <span class="text-muted d-block mb-1">
                                        <i class="fas fa-building text-primary me-2"></i>Company Name:
                                    </span>
                                    <span class="fw-500">{{ $job->company_name }}</span>
                                </li>
                                @if (!empty($job->company_location))
                                    <li class="mb-3">
                                        <span class="text-muted d-block mb-1">
                                            <i class="fas fa-map-marker-alt text-primary me-2"></i>Location:
                                        </span>
                                        <span class="fw-500">{{ $job->company_location }}</span>
                                    </li>
                                @endif
                                @if (!empty($job->company_website))
                                    <li>
                                        <span class="text-muted d-block mb-1">
                                            <i class="fas fa-globe text-primary me-2"></i>Website:
                                        </span>
                                        <a href="{{ $job->company_website }}" target="_blank"
                                            class="text-primary text-decoration-none">
                                            {{ $job->company_website }}
                                            <i class="fas fa-external-link-alt ms-1 small"></i>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('customJs')
    <script type="text/javascript">
        function applyJob(id) {
            if (confirm("Are you sure you want to apply on this job?")) {
                $.ajax({
                    url: '{{ route('applyJob') }}',
                    type: 'post',
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(response) {
                        window.location.href = "{{ url()->current() }}";
                    }
                });
            }
        }

        function saveJob(id) {
            $.ajax({
                url: '{{ route('saveJob') }}',
                type: 'post',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(response) {
                    window.location.href = "{{ url()->current() }}";
                }
            });
        }
    </script>
@endsection
