@extends('layouts/layoutMaster')

@section('title', 'Wizard Numbered - Forms')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}"></script>
@endsection

@section('page-script')
    <script>
        var homeUrl = "{{ route('accounts') }}"
    </script>
    {{-- <script src="{{ asset('assets/js/form-wizard-numbered.js') }}"></script> --}}
    <script src="{{ asset('js/accForm.js') }}"></script>
@endsection

@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Form Wizard/</span> Numbered
    </h4>
    <!-- Default -->
    <div class="row">
        <div class="col-12">
            <h5>Default</h5>
        </div>

        <div class="col-12 mb-4">
            <small class="text-light fw-semibold">Validation</small>
            <div id="wizard-validation" class="bs-stepper mt-2">
                <div class="bs-stepper-header">
                    <div class="step" data-target="#account-details-validation">
                        <button type="button" class="step-trigger">
                            <span class="bs-stepper-circle">1</span>
                            <span class="bs-stepper-label mt-1">
                                <span class="bs-stepper-title">Account Details</span>
                                <span class="bs-stepper-subtitle">Setup Account Details</span>
                            </span>
                        </button>
                    </div>
                    <div class="line">
                        <i class="ti ti-chevron-right"></i>
                    </div>
                    <div class="step" data-target="#personal-info-validation">
                        <button type="button" class="step-trigger">
                            <span class="bs-stepper-circle">2</span>
                            <span class="bs-stepper-label">
                                <span class="bs-stepper-title">Personal Info</span>
                                <span class="bs-stepper-subtitle">Add personal info</span>
                            </span>
                        </button>
                    </div>
                    <div class="line">
                        <i class="ti ti-chevron-right"></i>
                    </div>
                    <div class="step" data-target="#social-links-validation">
                        <button type="button" class="step-trigger">
                            <span class="bs-stepper-circle">3</span>
                            <span class="bs-stepper-label">
                                <span class="bs-stepper-title">Social Links</span>
                                <span class="bs-stepper-subtitle">Add social links</span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="bs-stepper-content">
                    <form id="wizard-validation-form" action="{{ route('editAccount', [$selectedAcc->user_id]) }}"
                        enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                        <!-- Account Details -->
                        <div id="account-details-validation" class="content">
                            <div class="content-header mb-3">
                                <h6 class="mb-0">Account Details</h6>
                                <small>Enter Your Account Details.</small>
                            </div>
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label class="form-label" for="recno">recno</label>
                                    <input type="text" name="recno" id="recno" class="form-control"
                                        placeholder="johndoe" value="{{ old('recno', $selectedAcc->recno) }}" />
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="user_id">user_id</label>
                                    <input type="text" name="user_id" id="user_id" class="form-control"
                                        placeholder="johndoe" value="{{ old('user_id', $selectedAcc->user_id) }}" />
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="employee_id">emplo
                                        yee_id</label>
                                    <input type="text" name="employee_id" id="employee_id" class="form-control"
                                        placeholder="johndoe"
                                        value="{{ old('employee_id', $selectedAcc->employee_id) }}" />
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="ds_code">ds_code</label>
                                    <input type="text" name="ds_code" id="ds_code" class="form-control"
                                        placeholder="johndoe" value="{{ old('ds_code', $selectedAcc->ds_code) }}" />
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="certificate_tesda">certificate_tesda</label>
                                    <input type="text" name="certificate_tesda" id="certificate_tesda"
                                        class="form-control" placeholder="johndoe"
                                        value="{{ old('certificate_tesda', $selectedAcc->certificate_tesda) }}" />
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                                    <div class="form-group">
                                        <label class="form-label"
                                            for="certificate_tesda_expiration">certificate_tesda_expiration</label>
                                        <input type="date" name="certificate_tesda_expiration"
                                            class="flatpickr-date form-control @error('certificate_tesda_expiration') is-invalid @enderror"
                                            placeholder="YYYY-MM-DD" id="certificate_tesda_expiration"
                                            value="{{ old('certificate_tesda_expiration', $selectedAcc->certificate_tesda_expiration) }}">

                                        @error('certificate_tesda_expiration')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="user_expiration">user_expiration</label>
                                        <input type="date" name="user_expiration"
                                            class="flatpickr-date form-control @error('user_expiration') is-invalid @enderror"
                                            placeholder="YYYY-MM-DD" id="user_expiration"
                                            value="{{ old('user_expiration', $selectedAcc->user_expiration) }}">

                                        @error('user_expiration')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="form-label" for="is_active">Activity Status</label>

                                    <select id="is_active" class="select2 form-select form-select-lg" name="is_active">
                                        <option selected disabled>Select Activity Status</option>
                                        <option value="0">Inactive
                                        </option>
                                        <option value="1">Active
                                        </option>
                                    </select>
                                </div>

                                {{-- <div class="col-sm-6 form-password-toggle">
                                    <label class="form-label" for="password">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" name="password" class="form-control"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            aria-describedby="password" />
                                        <span class="input-group-text cursor-pointer" id="password2"><i
                                                class="ti ti-eye-off"></i></span>
                                    </div>
                                </div>
                                <div class="col-sm-6 form-password-toggle">
                                    <label class="form-label" for="formValidationConfirmPass">Confirm Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="formValidationConfirmPass"
                                            name="formValidationConfirmPass" class="form-control"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            aria-describedby="formValidationConfirmPass2" />
                                        <span class="input-group-text cursor-pointer" id="formValidationConfirmPass2"><i
                                                class="ti ti-eye-off"></i></span>
                                    </div>
                                </div> --}}
                                <div class="col-12 d-flex justify-content-between">
                                    <button type="button" class="btn btn-label-secondary btn-prev" disabled> <i
                                            class="ti ti-arrow-left me-sm-1 me-0"></i>
                                        <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                    </button>
                                    <button type="button" class="btn btn-primary btn-next"> <span
                                            class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i
                                            class="ti ti-arrow-right"></i></button>
                                </div>
                            </div>
                        </div>
                        <!-- Personal Info -->
                        <div id="personal-info-validation" class="content">
                            <div class="content-header mb-3">
                                <h6 class="mb-0">Personal Info</h6>
                                <small>Enter Your Personal Info.</small>
                            </div>
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label class="form-label" for="first_name">First Name</label>
                                    <input type="text" id="first_name" name="first_name" class="form-control"
                                        value="{{ old('first_name', $selectedAcc->first_name) }}" />
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="middle_name">First Name</label>
                                    <input type="text" id="middle_name" name="middle_name" class="form-control"
                                        value="{{ old('middle_name', $selectedAcc->middle_name) }}" />
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="last_name">Last Name</label>
                                    <input type="text" id="last_name" name="last_name" class="form-control"
                                        value="{{ old('last_name', $selectedAcc->last_name) }}" />
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="gender">gender</label>
                                    <select class="select2" id="gender" name="gender">
                                        <option label=""></option>
                                        <option>Female</option>
                                        <option>Male</option>
                                    </select>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="form-label" for="user_type">User Type</label>
                                    <select id="user_type" name="user_type" class="form-control select2">
                                        <option selected disabled>Select User Type</option>
                                        <option value="administrator">Administrator</option>
                                        <option value="instructor">Instructor</option>
                                        <option value="encoder">Encoder</option>
                                    </select>
                                </div>

                                <div class="form-group mb-2">
                                    <label class="form-label" for="description">Description</label>
                                    <textarea name="description" placeholder="Description" id="description" class="form-control">{{ old('description', $selectedAcc->description) }}</textarea>
                                </div>
                                <div class="col-12 d-flex justify-content-between">
                                    <button type="button" class="btn btn-label-secondary btn-prev"> <i
                                            class="ti ti-arrow-left me-sm-1 me-0"></i>
                                        <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                    </button>
                                    <button type="button" class="btn btn-primary btn-next"> <span
                                            class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i
                                            class="ti ti-arrow-right"></i></button>
                                </div>
                            </div>
                        </div>
                        <!-- Social Links -->
                        <div id="social-links-validation" class="content">
                            <div class="content-header mb-3">
                                <h6 class="mb-0">Social Links</h6>
                                <small>Enter Your Social Links.</small>
                            </div>
                            <div class="row g-3">
                                {{--  --}}
                                <div class="col-12 d-flex justify-content-between">
                                    <button type="button" class="btn btn-label-secondary btn-prev"> <i
                                            class="ti ti-arrow-left me-sm-1 me-0"></i>
                                        <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                    </button>
                                    <button type="submit" class="btn btn-success btn-next btn-submit">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
