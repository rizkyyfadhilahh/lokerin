<!DOCTYPE html>
<html class="no-js" lang="en_AU" />

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Lokerin | Find Best Jobs</title>
    <meta name="description" content="" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1, user-scalable=no" />
    <meta name="HandheldFriendly" content="True" />
    <meta name="pinterest" content="nopin" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/ui/trumbowyg.min.css"
        integrity="sha512-Fm8kRNVGCBZn0sPmwJbVXlqfJmPC13zRsMElZenX6v721g/H7OukJd8XzDEBRQ2FSATK8xNF9UYvzsCtUpfeJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/theme.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/home.css') }}" />
    <!-- Fav Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="#" />
</head>

<body data-instant-intensity="mousedown">
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="container">

                <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                    <i class="fas fa-briefcase me-2"></i>
                    Lokerin
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">

                    <!-- Middle navigation -->
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">
                                <i class="fas fa-home me-1"></i> Home
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('jobs') }}">
                                <i class="fas fa-search me-1"></i> Find Jobs
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('account.createJob') }}">
                                <i class="fas fa-plus-circle me-1"></i> Post a Job
                            </a>
                        </li>

                    </ul>

                    <!-- Right side -->
                    <div class="d-flex align-items-center gap-2">
                        @if (Auth::check() && Auth::user()->role == 'admin')
                            <a class="btn btn-outline-primary" href="{{ route('admin.dashboard') }}">
                                <i class="fas fa-user-shield me-1"></i> Admin Panel
                            </a>
                        @endif

                        @if (!Auth::check())
                            <a class="btn btn-outline-primary" href="{{ route('account.login') }}">
                                <i class="fas fa-sign-in-alt me-1"></i> Login
                            </a>
                        @else
                            <!-- Rounded account circle -->
                            <a href="{{ route('account.profile') }}"
                                class="d-flex align-items-center text-decoration-none">
                                @if (Auth::user()->role == 'user')
                                    <span
                                        class="me-2 fw-bold text-dark">{{ explode(' ', Auth::user()->name)[0] }}</span>
                                @endif
                                @if (Auth::user()->image)
                                    <img src="{{ Auth::user()->image }}" alt="avatar"
                                        class="rounded-circle border border-1 border-secondary"
                                        style="width: 40px; height: 40px; object-fit: cover;">
                                @else
                                    <div class="profile-circle d-flex align-items-center justify-content-center rounded-circle bg-light border"
                                        style="width: 40px; height: 40px;">
                                        <i class="fas fa-user text-secondary"></i>
                                    </div>
                                @endif
                            </a>
                        @endif


                    </div>

                </div>
            </div>
        </nav>
    </header>

    @yield('main')

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 16px;">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title fw-bold" id="exampleModalLabel">
                        <i class="fas fa-camera text-primary me-2"></i>Change Profile Picture
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-4 py-4">
                    <form id="profilePicForm" name="profilePicForm" action="" method="post">
                        <div class="mb-4">
                            <label for="image" class="form-label">Select New Profile Image</label>
                            <input type="file" class="form-control" id="image" name="image"
                                accept="image/*">
                            <p class="text-danger small mt-2 mb-0" id="image-error"></p>
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                                <i class="fas fa-times me-1"></i> Cancel
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-check me-1"></i> Update Picture
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if (!isset($hideFooter))
        @include('front.layouts.footer')
    @endif

    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.5.1.3.min.js') }}"></script>
    <script src="{{ asset('assets/js/instantpages.5.1.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/lazyload.17.6.0.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/trumbowyg.min.js"
        integrity="sha512-YJgZG+6o3xSc0k5wv774GS+W1gx0vuSI/kr0E0UylL/Qg/noNspPtYwHPN9q6n59CTR/uhgXfjDXLTRI+uIryg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    <script>
        $('.textarea').trumbowyg();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#profilePicForm").submit(function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                url: '{{ route('account.updateProfilePic') }}',
                type: 'post',
                data: formData,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status == false) {
                        var errors = response.errors;
                        if (errors.image) {
                            $("#image-error").html(errors.image)
                        }
                    } else {
                        window.location.href = '{{ url()->current() }}';
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert("An error occurred while uploading the image. Please try again.");
                }
            });
        });
    </script>

    @yield('customJs')
</body>

</html>
