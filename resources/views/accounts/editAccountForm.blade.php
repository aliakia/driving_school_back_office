@extends('layouts/layoutMaster')

@section('title', 'Edit Account')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
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
    <!-- Default -->
    <div class="row">

        <div class="col-12 mb-4">
            <small class="text-muted fw-semibold">Editing <span>{{ $selectedAcc->user_id }}</span></small>
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
                    <div class="step" data-target="#review-submit">
                        <button type="button" class="step-trigger">
                            <span class="bs-stepper-circle">3</span>
                            <span class="bs-stepper-label">
                                <span class="bs-stepper-title">Complete Form</span>
                                <span class="bs-stepper-subtitle">Review</span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="bs-stepper-content">
                    <form id="wizard-validation-form" method="POST"
                        action="{{ route('editAccount', [$selectedAcc->user_id]) }}" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                        <!-- Account Details -->
                        <div id="account-details-validation" class="content">
                            <div class="content-header mb-3">
                                <h6 class="mb-0">Account Details</h6>
                                <small>Enter Your Account Details.</small>
                            </div>
                            <div class="row g-3">
                                <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                                    <label class="form-label" for="recno">Rec No</label>
                                    <input type="text" name="recno" id="recno" class="form-control"
                                        value="{{ old('recno', $selectedAcc->recno) }}"
                                        oninput="this.value = this.value.toUpperCase()" />
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                                    <label class="form-label" for="user_id">User ID</label>
                                    <input type="text" name="user_id" id="user_id" class="form-control"
                                        value="{{ old('user_id', $selectedAcc->user_id) }}" />
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                                    <label class="form-label" for="employee_id">Employee ID</label>
                                    <input type="text" name="employee_id" id="employee_id" class="form-control"
                                        value="{{ old('employee_id', $selectedAcc->employee_id) }}"
                                        oninput="this.value = this.value.toUpperCase()" />
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                                    <label class="form-label" for="ds_code">DS Code</label>
                                    <input type="text" name="ds_code" id="ds_code" class="form-control"
                                        value="{{ old('ds_code', $selectedAcc->ds_code) }}"
                                        oninput="this.value = this.value.toUpperCase()" />
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                                    <label class="form-label" for="certificate_tesda">Tesda Certificate</label>
                                    <input type="text" name="certificate_tesda" id="certificate_tesda"
                                        class="form-control"
                                        value="{{ old('certificate_tesda', $selectedAcc->certificate_tesda) }}"
                                        oninput="this.value = this.value.toUpperCase()" />
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="certificate_tesda_expiration">Tesda Certificate
                                            Expiration</label>
                                        <input type="date" name="certificate_tesda_expiration"
                                            class="flatpickr-date form-control" placeholder="YYYY-MM-DD"
                                            id="certificate_tesda_expiration"
                                            value="{{ old('certificate_tesda_expiration', $selectedAcc->certificate_tesda_expiration) }}">

                                        @error('certificate_tesda_expiration')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="user_expiration">User Expiration</label>
                                        <input type="date" name="user_expiration" class="flatpickr-date form-control "
                                            placeholder="YYYY-MM-DD" id="user_expiration"
                                            value="{{ old('user_expiration', $selectedAcc->user_expiration) }}">

                                        @error('user_expiration')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                                    <div class="form-group mb-2">
                                        <label class="form-label" for="is_active">Activity Status</label>

                                        <select id="is_active" class="select2 form-select form-select-lg"
                                            name="is_active">
                                            <option selected disabled>Select Activity Status</option>
                                            <option value="0"
                                                {{ old('is_active', $selectedAcc->is_active) == '0' ? 'selected' : '' }}>
                                                Inactive
                                            </option>
                                            <option value="1"
                                                {{ old('is_active', $selectedAcc->is_active) == '1' ? 'selected' : '' }}>
                                                Active
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3 form-password-toggle">
                                    <label class="form-label" for="old_password">Old Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="old_password" name="old_password"
                                            class="form-control" placeholder="Enter Old Password"
                                            aria-describedby="password" />
                                        <span class="input-group-text cursor-pointer" id="password2"><i
                                                class="ti ti-eye-off"></i></span>
                                    </div>
                                    @error('old_password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3 form-password-toggle">
                                    <label class="form-label" for="password">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" name="password" class="form-control"
                                            placeholder="Enter New Password" aria-describedby="password" />
                                        <span class="input-group-text cursor-pointer" id="password2"><i
                                                class="ti ti-eye-off"></i></span>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3 form-password-toggle">
                                    <label class="form-label" for="formValidationConfirmPass">Confirm Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="formValidationConfirmPass"
                                            name="formValidationConfirmPass" class="form-control"
                                            placeholder="Confirm New Password"
                                            aria-describedby="formValidationConfirmPass2" />
                                        <span class="input-group-text cursor-pointer" id="formValidationConfirmPass2"><i
                                                class="ti ti-eye-off"></i></span>
                                    </div>
                                </div>
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
                                <div class="col-12 col-md-6 col-lg-4 col-xl-5 mb-3">
                                    <label class="form-label" for="first_name">First Name</label>
                                    <input type="text" id="first_name" name="first_name" class="form-control"
                                        value="{{ old('first_name', $selectedAcc->first_name) }}" />
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 col-xl-2 mb-3">
                                    <label class="form-label" for="middle_name">Middle Name</label>
                                    <input type="text" id="middle_name" name="middle_name" class="form-control"
                                        value="{{ old('middle_name', $selectedAcc->middle_name) }}" />
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 col-xl-5 mb-3">
                                    <label class="form-label" for="last_name">Last Name</label>
                                    <input type="text" id="last_name" name="last_name" class="form-control"
                                        value="{{ old('last_name', $selectedAcc->last_name) }}" />
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                                    <label class="form-label" for="gender">Gender</label>
                                    <select id="gender" name="gender" class="form-select select2"
                                        aria-label="Default select example">
                                        <option selected disabled>Select Gender</option>
                                        <option value="MALE"
                                            {{ old('gender', $selectedAcc->gender) == 'MALE' ? 'selected' : '' }}>MALE
                                        </option>
                                        <option value="FEMALE"
                                            {{ old('gender', $selectedAcc->gender) == 'FEMALE' ? 'selected' : '' }}>FEMALE
                                        </option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                                    <label class="form-label" for="user_type">User Type</label>
                                    <select id="user_type" name="user_type" class="form-control select2">
                                        <option selected disabled>Select User Type</option>
                                        <option value="administrator"
                                            {{ old('user_type', $selectedAcc->user_type) == 'administrator' ? 'selected' : '' }}>
                                            Administrator</option>
                                        <option value="instructor"
                                            {{ old('user_type', $selectedAcc->user_type) == 'instructor' ? 'selected' : '' }}>
                                            Instructor</option>
                                        <option value="encoder"
                                            {{ old('user_type', $selectedAcc->user_type) == 'encoder' ? 'selected' : '' }}>
                                            Encoder</option>
                                        <option value="tech_support"
                                            {{ old('user_type', $selectedAcc->user_type) == 'tech_support' ? 'selected' : '' }}>
                                            Tech Support</option>
                                    </select>
                                </div>

                                <div class="col-12 col-xl-6 mb-3">
                                    <label class="form-label" for="description">Description</label>
                                    <textarea name="description" placeholder="Description" id="description" class="form-control">{{ old('description', $selectedAcc->description) }}</textarea>
                                </div>
                                <div class="col-12 col-xl-6 mb-3">

                                    <button type="button" class="btn btn-primary mb-1 w-100" id="open_cam">Open
                                        Camera</button>
                                    <input id="base_64" type="hidden" name="base_64" value="" />
                                </div>
                                <div class="col-12 col-xl-6 mb-3">
                                    <button type="button" class="btn btn-primary mb-1 w-100" id="open_bio">Register
                                        fingerprint</button>
                                    <input id="fp_idl5" type="hidden" name="fp_idl5" value="" />
                                    <input id="fp_idl4" type="hidden" name="fp_idl4" value="" />
                                    <input id="fp_idl3" type="hidden" name="fp_idl3" value="" />
                                    <input id="fp_idl2" type="hidden" name="fp_idl2" value="" />
                                    <input id="fp_idl1" type="hidden" name="fp_idl1" value="" />
                                    <input id="fp_idr1" type="hidden" name="fp_idr1" value="" />
                                    <input id="fp_idr2" type="hidden" name="fp_idr2" value="" />
                                    <input id="fp_idr3" type="hidden" name="fp_idr3" value="" />
                                    <input id="fp_idr4" type="hidden" name="fp_idr4" value="" />
                                    <input id="fp_idr5" type="hidden" name="fp_idr5" value="" />
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
                        <div id="review-submit" class="content">

                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                    <p class="fw-semibold mb-2">Account Info</p>
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <ul class="list-unstyled">
                                                <li class="row">
                                                    <strong class="col-xl-5 col-6">Rec No:</strong>
                                                    <span class="col-xl-7 col-6"
                                                        id="preview-recno">{{ $selectedAcc->recno }}</span>
                                                </li>
                                                <li class="row">
                                                    <strong class="col-xl-5 col-6">User ID:</strong>
                                                    <span class="col-xl-7 col-6"
                                                        id="preview-user_id">{{ $selectedAcc->user_id }}</span>
                                                </li>
                                                <li class="row">
                                                    <strong class="col-xl-5 col-6">Employee ID:</strong>
                                                    <span class="col-xl-7 col-6"
                                                        id="preview-employee_id">{{ $selectedAcc->employee_id }}</span>
                                                </li>
                                                <li class="row">
                                                    <strong class="col-xl-5 col-6">DS Code:</strong>
                                                    <span class="col-xl-7 col-6"
                                                        id="preview-ds_code">{{ $selectedAcc->ds_code }}</span>
                                                </li>
                                                <li class="row">
                                                    <strong class="col-xl-5 col-6">Tesda Certificate:</strong>
                                                    <span class="col-xl-7 col-6"
                                                        id="preview-certificate_tesda">{{ $selectedAcc->certificate_tesda }}</span>
                                                </li>
                                                <li class="row">
                                                    <strong class="col-xl-5 col-6">Tesda Certificate Expiration:</strong>
                                                    <span class="col-xl-7 col-6"
                                                        id="preview-certificate_tesda_expiration">{{ $selectedAcc->certificate_tesda_expiration }}</span>
                                                </li>
                                                <li class="row">
                                                    <strong class="col-xl-5 col-6">User Expiration:</strong>
                                                    <span class="col-xl-7 col-6"
                                                        id="preview-user_expiration">{{ $selectedAcc->user_expiration }}</span>
                                                </li>
                                                <li class="row">
                                                    <strong class="col-xl-5 col-6">Activity Status:</strong>
                                                    <span class="col-xl-7 col-6"
                                                        id="preview-is_active">{{ $selectedAcc->is_active }}</span>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">

                                    <p class="fw-semibold mb-2">Personal Info</p>
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <ul class="list-unstyled">
                                                <li class="row">
                                                    <strong class="col-xl-7 col-6">First Namel:</strong>
                                                    <span class="col-xl-5 col-6"
                                                        id="preview-first_name">{{ $selectedAcc->first_name }}</span>
                                                </li>
                                                <li class="row">
                                                    <strong class="col-xl-7 col-6">Middle Name:</strong>
                                                    <span class="col-xl-5 col-6"
                                                        id="preview-middle_name">{{ $selectedAcc->middle_name }}</span>
                                                </li>
                                                <li class="row">
                                                    <strong class="col-xl-7 col-6">Last Name:</strong>
                                                    <span class="col-xl-5 col-6"
                                                        id="preview-last_name">{{ $selectedAcc->last_name }}</span>
                                                </li>
                                                <li class="row">
                                                    <strong class="col-xl-7 col-6">Gender:</strong>
                                                    <span class="col-xl-5 col-6"
                                                        id="preview-gender">{{ $selectedAcc->gender }}</span>
                                                </li>
                                                <li class="row">
                                                    <strong class="col-xl-7 col-6">User Type:</strong>
                                                    <span class="col-xl-5 col-6"
                                                        id="preview-user_type">{{ $selectedAcc->user_type }}</span>
                                                </li>
                                                <li class="row">
                                                    <strong class="col-xl-7 col-6">Description:</strong>
                                                    <span class="col-xl-5 col-6"
                                                        id="preview-description">{{ $selectedAcc->description }}</span>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="checkBox" required />
                                    <label class="form-check-label text-red" for="checkBox">Check the box if all info is
                                        correct.</label>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-between">
                                <button type="button" class="btn btn-label-secondary btn-prev">
                                    <i class="ti ti-arrow-left me-sm-1"></i>
                                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                </button>
                                <button type="submit" class="btn btn-success btn-submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <div class="modal fade text-left" id="hand_modal" tabindex="-3" role="dialog" aria-labelledby="myModalLabel8"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-simple" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel8">Biometrics Registration</h4>

                </div>

                <div class="modal-body">
                    <img src="{{ asset('assets/img/hand_logo_dark.png') }}" alt="hand" height="auto"
                        width="100%" class="border border-primary">
                    <button style="position: absolute; left: 7%; top: 25%; z-index: inherit;"
                        class="btn btn-icon rounded-circle btn-outline-primary fingers" value="1">
                        <i
                            class="ti ti-circle"style="font-size: 30px; color: white; border: 2px solid white; border-radius: 50%; padding: 10px;"></i>
                    </button>
                    <button style="position: absolute; left: 15.5%; top: 14%; z-index: inherit;"
                        class="btn btn-icon rounded-circle btn-outline-primary fingers" value="2">
                        <i
                            class="ti ti-circle"style="font-size: 30px; color: white; border: 2px solid white; border-radius: 50%; padding: 10px;"></i>
                    </button>
                    <button style="position: absolute; left: 25.5%; top: 13.5%; z-index: inherit;"
                        class="btn btn-icon rounded-circle btn-outline-primary fingers" value="3">
                        <i
                            class="ti ti-circle"style="font-size: 30px; color: white; border: 2px solid white; border-radius: 50%; padding: 10px;"></i>
                    </button>
                    <button style="position: absolute; left: 34%; top: 17.5%; z-index: inherit;"
                        class="btn btn-icon rounded-circle btn-outline-primary fingers" value="4">
                        <i
                            class="ti ti-circle"style="font-size: 30px; color: white; border: 2px solid white; border-radius: 50%; padding: 10px;"></i>
                    </button>
                    <button style="position: absolute; left: 42%; top: 59%; z-index: inherit;"
                        class="btn btn-icon rounded-circle btn-outline-primary fingers" value="5">
                        <i
                            class="ti ti-circle"style="font-size: 30px; color: white; border: 2px solid white; border-radius: 50%; padding: 10px;"></i>
                    </button>
                    <button style="position: absolute; right: 42%; top: 59%; z-index: inherit;"
                        class="btn btn-icon rounded-circle btn-outline-primary fingers" value="6">
                        <i
                            class="ti ti-circle"style="font-size: 30px; color: white; border: 2px solid white; border-radius: 50%; padding: 10px;"></i>
                    </button>
                    <button style="position: absolute; right: 34%; top: 17.5%;; z-index: inherit;"
                        class="btn btn-icon rounded-circle btn-outline-primary fingers" value="7">
                        <i
                            class="ti ti-circle"style="font-size: 30px; color: white; border: 2px solid white; border-radius: 50%; padding: 10px;"></i>
                    </button>
                    <button style="position: absolute; right: 25.5%; top: 13.5%; z-index: inherit;"
                        class="btn btn-icon rounded-circle btn-outline-primary fingers" value="8">
                        <i
                            class="ti ti-circle"style="font-size: 30px; color: white; border: 2px solid white; border-radius: 50%; padding: 10px;"></i>
                    </button>
                    <button style="position: absolute; right: 15.5%; top: 14%; z-index: inherit;"
                        class="btn btn-icon rounded-circle btn-outline-primary fingers" value="9">
                        <i
                            class="ti ti-circle"style="font-size: 30px; color: white; border: 2px solid white; border-radius: 50%; padding: 10px;"></i>
                    </button>
                    <button style="position: absolute; right:  7%; top: 25%; z-index: inherit;"
                        class="btn btn-icon rounded-circle btn-outline-primary fingers" value="10">
                        <i
                            class="ti ti-circle"style="font-size: 30px; color: white; border: 2px solid white; border-radius: 50%; padding: 10px;"></i>
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="close_fp">Cancel</button>
                    <button type="button" class="btn btn-success" id="save_fp">Save</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade text-left" id="biometrics_modal" tabindex="-3" role="dialog"
        aria-labelledby="myModalLabel6" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel6">Biometrics Registration</h4>
                </div>
                <div class="modal-body" id="bio_modal_body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="close_bio">Cancel</button>
                    <button type="button" class="btn btn-success" id="save_bio">Save</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade text-left" id="camera" tabindex="-2" role="dialog" aria-labelledby="myModalLabel4"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel4">Capture Image</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="embed-responsive embed-responsive-4by3">
                        <video width="100%" height="100%" autoplay="true" id="video"></video>
                        <canvas id="canvas" style="width:100%; height:auto;" class="hidden"></canvas>
                    </div>
                    <button id="capture" type="button" class="btn btn-primary w-100 my-1">
                        <i data-feather="camera" class="font-medium-4"></i> Capture
                    </button>
                    <button id="saveImg" type="button" class="btn btn-primary w-100 mt-1 hidden" data-dismiss="modal"
                        aria-label="Close">Save</button>
                </div>
            </div>
        </div>
    </div>


@endsection
