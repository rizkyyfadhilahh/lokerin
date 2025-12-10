@extends('front.layouts.app')

@section('main')
    <section class="py-5 bg-light">
        <div class="container">
            <div class="mb-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none"><i
                                    class="fas fa-home me-1"></i>Home</a></li>
                        <li class="breadcrumb-item active">Account Settings</li>
                    </ol>
                </nav>
            </div>

            <div class="row g-4">
                <div class="col-lg-3">
                    @include('front.account.sidebar')
                </div>
                <div class="col-lg-9">
                    @include('front.message')

                    <!-- Profile Information Card -->
                    <div class="card border-0 shadow-sm mb-4" style="border-radius: 12px;">
                        <form action="" method="post" id="userForm" name="userForm" enctype="multipart/form-data">
                            <div class="card-body p-4">
                                <h4 class="fw-bold mb-4">
                                    <i class="fas fa-user-edit text-primary me-2"></i>My Profile
                                </h4>
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label for="name" class="form-label fw-semibold">Full Name *</label>
                                        <input type="text" name="name" id="name" placeholder="Enter your name"
                                            class="form-control" value="{{ $user->name }}">
                                        <p class="text-danger small mt-1"></p>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="email" class="form-label fw-semibold">Email Address *</label>
                                        <input type="text" name="email" id="email" placeholder="Enter your email"
                                            class="form-control" value="{{ $user->email }}">
                                        <p class="text-danger small mt-1"></p>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="designation" class="form-label fw-semibold">Designation</label>
                                        <input type="text" name="designation" id="designation"
                                            placeholder="e.g. Software Engineer" class="form-control"
                                            value="{{ $user->designation }}">
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="mobile" class="form-label fw-semibold">Mobile Number</label>
                                        <input type="text" name="mobile" id="mobile"
                                            placeholder="Enter mobile number" class="form-control"
                                            value="{{ $user->mobile }}">
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="cv" class="form-label fw-semibold">CV (PDF) *</label>
                                        <input type="file" name="cv" id="cv" class="form-control"
                                            accept="application/pdf">
                                        @if ($user->cv)
                                            <div class="col-md-6 mt-2">
                                                <a href="{{ route('account.downloadCv') }}" target="_blank"
                                                    class="btn btn-primary px-3 py-1">
                                                    View CV
                                                </a>
                                            </div>
                                        @endif
                                        <p class="text-danger small mt-1"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-transparent border-0 p-4 pt-0">
                                <button type="submit" class="btn btn-primary px-4">
                                    <i class="fas fa-save me-2"></i>Update Profile
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Change Password Card -->
                    <div class="card border-0 shadow-sm" style="border-radius: 12px;">
                        <form action="" method="post" id="changePasswordForm" name="changePasswordForm">
                            <div class="card-body p-4">
                                <h4 class="fw-bold mb-4">
                                    <i class="fas fa-lock text-primary me-2"></i>Change Password
                                </h4>
                                <div class="row">
                                    <div class="col-md-12 mb-4">
                                        <label for="old_password" class="form-label fw-semibold">Current Password *</label>
                                        <input type="password" name="old_password" id="old_password"
                                            placeholder="Enter current password" class="form-control">
                                        <p class="text-danger small mt-1"></p>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="new_password" class="form-label fw-semibold">New Password *</label>
                                        <input type="password" name="new_password" id="new_password"
                                            placeholder="Enter new password" class="form-control">
                                        <p class="text-danger small mt-1"></p>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="confirm_password" class="form-label fw-semibold">Confirm Password
                                            *</label>
                                        <input type="password" name="confirm_password" id="confirm_password"
                                            placeholder="Confirm new password" class="form-control">
                                        <p class="text-danger small mt-1"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-transparent border-0 p-4 pt-0">
                                <button type="submit" class="btn btn-primary px-4">
                                    <i class="fas fa-key me-2"></i>Update Password
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection

@section('customJs')
    <script type="text/javascript">
        $("#userForm").submit(function(e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append('_method', 'PUT');

            $.ajax({
                url: '{{ route('account.updateProfile') }}',
                type: 'post',
                dataType: 'json',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {

                    if (response.status == true) {

                        $("#name").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('')

                        $("#email").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('')

                        window.location.href = "{{ route('account.profile') }}";

                    } else {
                        var errors = response.errors;

                        if (errors.name) {
                            $("#name").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.name)
                        } else {
                            $("#name").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }

                        if (errors.email) {
                            $("#email").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.email)
                        } else {
                            $("#email").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }

                        if (errors.cv) {
                            $("#cv").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.cv)
                        } else {
                            $("#cv").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }
                    }

                }
            });
        });


        $("#changePasswordForm").submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: '{{ route('account.updatePassword') }}',
                type: 'post',
                dataType: 'json',
                data: $("#changePasswordForm").serializeArray(),
                success: function(response) {

                    if (response.status == true) {

                        $("#name").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('')

                        $("#email").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('')

                        window.location.href = "{{ route('account.profile') }}";

                    } else {
                        var errors = response.errors;

                        if (errors.old_password) {
                            $("#old_password").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.old_password)
                        } else {
                            $("#old_password").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }

                        if (errors.new_password) {
                            $("#new_password").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.new_password)
                        } else {
                            $("#new_password").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }

                        if (errors.confirm_password) {
                            $("#confirm_password").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback')
                                .html(errors.confirm_password)
                        } else {
                            $("#confirm_password").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback')
                                .html('')
                        }
                    }

                }
            });
        });
    </script>
@endsection
