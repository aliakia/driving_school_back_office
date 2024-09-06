@php
    $customizerHidden = 'customizer-hide';
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Login Page')

@section('vendor-style')
    <!-- Vendor -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
@endsection

@section('page-style')
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}">
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}"></script>

@endsection

@section('page-script')
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
@endsection

@section('content')
    <div class="authentication-wrapper authentication-cover authentication-bg">
        <div class="authentication-inner row">
            <!-- /Left Text -->
            <div class="d-none d-lg-flex col-lg-8 p-0">
                <div class="auth-cover-bg">
                    <img src="{{ asset('assets/img/Banner.png') }}" alt="auth-login-cover" class="h-100 w-100">

                    <div class="img-logo">
                        <a class="" href="javascript:void(0);">
                            <img height="100" src="{{ asset('assets/img/harkonnen_logo_with_text.png') }}" alt="CALI logo"
                                class="me-3">
                            {{-- <img height="100" src="{{ asset('assets/img/voxdei_logo.png') }}" alt="Voxdei logo"
                    class=""> --}}
                        </a>
                    </div>

                    <div class="text-white w-100 position-absolute start-50 translate-middle py-4 title-middle">
                        <h1 class="text-white display-3 fw-bold text-center">DRIVING SCHOOL SYSTEM</h1>
                        <h3 class="text-white fs-4 fw-normal text-center me-3">BACKOFFICE MODULE</h3>
                    </div>
                </div>
            </div>
            <!-- /Left Text -->

            <!-- Login -->
            <div class="d-flex col-12 col-lg-4 align-items-center p-sm-5 p-4">
                <div class="w-px-400 mx-auto">
                    <!-- Logo -->
                    {{-- <div class="mb-4 px-auto">
                <a class="mx-auto" href="javascript:void(0);">
                    <img height="80" src="{{ asset('assets/img/cali_logo.png') }}" alt="CALI logo"
                        class="mr-1">
                    <img height="80" src="{{ asset('assets/img/voxdei_logo.png') }}" alt="Voxdei logo"
                        class="">
                </a>
                <a href="{{ url('/') }}" class="app-brand-link gap-2">
                    <span class="app-brand-logo demo">@include('_partials.macros', ['height' => 20, 'withbg' => 'fill: #fff;'])</span>
                </a>
            </div> --}}
                    <!-- /Logo -->
                    <h3 class="mb-1 fw-bold h1">Welcome!</h3>
                    <p class="mb-4">Please sign-in to your account</p>

                    <form id="formLogin" class="mb-3" method="POST" action="{{ route('loginAccount') }}" id="login_form">
                        @csrf
                        <div class="mb-3">
                            <label for="user_id" class="form-label">User Id</label>
                            <input type="text" class="form-control" id="user_id" name="user_id"
                                placeholder="Enter your User Id" tabindex="1" autofocus>
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="password">Password</label>
                                {{-- <a href="{{ url('auth/forgot-password-cover') }}">
                            <small>Forgot Password?</small>
                        </a> --}}
                            </div>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control" name="password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password" tabindex="2" />
                                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                            </div>
                        </div>
                        {{-- <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="remember-me">
                        <label class="form-check-label" for="remember-me">
                            Remember Me
                        </label>
                    </div>
                </div> --}}
                        <button type="submit" class="btn btn-lg btn-primary d-grid w-100" id="login" tabindex="3">
                            Sign in
                        </button>
                    </form>

                    {{-- <p class="text-center">
                <span>New on our platform?</span>
                <a href="{{ url('auth/register-cover') }}">
                    <span>Create an account</span>
                </a>
            </p>

            <div class="divider my-4">
                <div class="divider-text">or</div>
            </div>

            <div class="d-flex justify-content-center">
                <a href="javascript:;" class="btn btn-icon btn-label-facebook me-3">
                    <i class="tf-icons fa-brands fa-facebook-f fs-5"></i>
                </a>

                <a href="javascript:;" class="btn btn-icon btn-label-google-plus me-3">
                    <i class="tf-icons fa-brands fa-google fs-5"></i>
                </a>

                <a href="javascript:;" class="btn btn-icon btn-label-twitter">
                    <i class="tf-icons fa-brands fa-twitter fs-5"></i>
                </a>
            </div> --}}
                </div>
            </div>
            <!-- /Login -->
        </div>
    </div>
    <div class="modal fade text-left" id="biometrics_modal" tabindex="-3" role="dialog" aria-labelledby="myModalLabel6"
    aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel6">Biometrics Registration</h4>
          {{-- <button type="button" class="close" data-dismiss="modal" id="close_cam" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button> --}}
        </div>
        <div class="modal-body" id="bio_modal_body">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal" id="close_bio">Cancel</button>
          <button type="button" class="btn btn-success" id="verify">Login</button>
        </div>
      </div>
    </div>
  </div>
@endsection
