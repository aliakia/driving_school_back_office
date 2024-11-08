@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Create Driving School')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}"></script>
@endsection

@section('content')
    @if ($errors->any())
        <div class="bs-toast toast fade show" role="alert" aria-live="assertive" aria-atomic="true"
            style="position: fixed; top: 20px; right: 20px; z-index: 1050;">
            <div class="toast-header">
                <i class="ti ti-bell ti-xs me-2 text-danger"></i>
                <div class="me-auto fw-semibold">Account not created!</div>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        </div>
    @endif

    <div class="row">

        <div class="col-12 mb-4">
            <div id="wizard-validation" class="bs-stepper mt-2">
                <div class="bs-stepper-header">
                    <div class="step" data-target="#ds-details-validation">
                        <button type="button" class="step-trigger">
                            <span class="bs-stepper-label mt-1">
                                <span class="bs-stepper-title text-primary">Driving School Details</span>
                            </span>
                        </button>
                    </div>
                    <div class="line">
                        <i class="ti ti-chevron-right"></i>
                    </div>
                    <div class="step" data-target="#fees-validation">
                        <button type="button" class="step-trigger">
                            <span class="bs-stepper-label">
                                <span class="bs-stepper-title text-primary">Fees</span>
                            </span>
                        </button>
                    </div>
                    <div class="line">
                        <i class="ti ti-chevron-right"></i>
                    </div>
                    <div class="step" data-target="#it-validation">
                        <button type="button" class="step-trigger">
                            <span class="bs-stepper-label">
                                <span class="bs-stepper-title text-primary">IT</span>
                            </span>
                        </button>
                    </div>

                    <div class="line">
                        <i class="ti ti-chevron-right"></i>
                    </div>
                    <div class="step" data-target="#images-validation">
                        <button type="button" class="step-trigger">
                            <span class="bs-stepper-label">
                                <span class="bs-stepper-title text-primary">Images</span>
                            </span>
                        </button>
                    </div>
                    <div class="line">
                        <i class="ti ti-chevron-right"></i>
                    </div>
                    <div class="step" data-target="#settings-validation">
                        <button type="button" class="step-trigger">
                            <span class="bs-stepper-label">
                                <span class="bs-stepper-title text-primary">Settings</span>
                            </span>
                        </button>
                    </div>
                    <div class="line">
                        <i class="ti ti-chevron-right"></i>
                    </div>
                    <div class="step" data-target="#review-submit">
                        <button type="button" class="step-trigger">
                            <span class="bs-stepper-label">
                                <span class="bs-stepper-title text-primary">Complete Form</span>
                            </span>
                        </button>
                    </div>

                </div>
                <div class="bs-stepper-content">
                    <form id="wizard-validation-form" method="POST" action="{{ route('submitDS') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <!-- Driving School Details -->
                        <div id="ds-details-validation" class="content">
                            <div class="content-header mb-3">
                                <h6 class="mb-0">Driver School Details</h6>
                            </div>
                            <div class="row g-3">
                                <div class="col-12 col-md-6 col-xl-6">
                                    <label class="form-label" for="ds_name">DRIVING SCHOOL NAME</label>
                                    <input name="ds_name" type="text" id="ds_name"
                                        oninput="this.value = this.value.toUpperCase()"
                                        class="form-control @error('ds_name') is-invalid @enderror"
                                        placeholder="DRIVING SCHOOL NAME" />
                                    @error('ds_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-6 col-xl-3 form-password-toggle">
                                    <label class="form-label" for="ds_contact_no">CONTACT NUMBER</label>
                                    <input type="text" id="ds_contact_no" name="ds_contact_no"
                                        class="form-control phone-mask @error('ds_contact_no') is-invalid @enderror"
                                        placeholder="DRIVING SCHOOL CONTACT NUMBER" />
                                    @error('ds_contact_no')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-6 col-xl-3">
                                    <div class="form-group">
                                        <label class="form-label" for="business_type">BUSINESS TYPE</label>
                                        <input type="text"
                                            class="form-control @error('business_type') is-invalid @enderror auto-caps"
                                            id="business_type" name="business_type"
                                            oninput="this.value = this.value.toUpperCase()" placeholder="BUSINESS TYPE" />
                                        @error('business_type')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-4">
                                    <label class="form-label" for="ds_code">DRIVING SCHOOL CODE</label>
                                    <input type="text" id="ds_code"
                                        class="form-control @error('ds_code') is-invalid @enderror auto-caps"
                                        oninput="this.value = this.value.toUpperCase()" placeholder="DRIVING SCHOOL CODE"
                                        name="ds_code" />
                                    @error('ds_code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-6 col-xl-4 mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="dti_accreditation_no">DTI ACCREDITATION
                                            NUMBER</label>
                                        <input type="text" id="dti_accreditation_no" name="dti_accreditation_no"
                                            class="form-control @error('dti_accreditation_no') is-invalid @enderror auto-caps"
                                            oninput="this.value = this.value.toUpperCase()"
                                            placeholder="DTI ACCREDITATION NUMBER">
                                        @error('dti_accreditation_no')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-4 mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="lto_accreditation_no">LTO ACCREDITATION
                                            NUMBER</label>
                                        <input type="text" id="lto_accreditation_no" name="lto_accreditation_no"
                                            class="form-control @error('lto_accreditation_no') is-invalid @enderror auto-caps"
                                            oninput="this.value = this.value.toUpperCase()"
                                            placeholder="LTO ACCREDITATION NUMBER">
                                        @error('lto_accreditation_no')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 mb-3 form-password-toggle">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label class="form-label" for="description">DESCRIPTION</label>
                                            <textarea id="description" name="description"
                                                class="form-control @error('description') is-invalid @enderror auto-caps"
                                                oninput="this.value = this.value.toUpperCase()" placeholder="DESCRIPTION"></textarea>
                                            @error('description')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-4 mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="town_city">TOWN/CITY</label>
                                        <input type="text" id="town_city" name="town_city"
                                            class="form-control @error('town_city') is-invalid @enderror auto-caps"
                                            oninput="this.value = this.value.toUpperCase()" placeholder="TOWN/CITY">
                                        @error('town_city')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-xl-4 mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="region">REGION</label>
                                        <input type="text" id="region" name="region"
                                            class="form-control @error('region') is-invalid @enderror auto-caps"
                                            oninput="this.value = this.value.toUpperCase()" placeholder="REGION">
                                        @error('region')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-xl-4 mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="province">PROVINCE</label>
                                        <input type="text" id="province" name="province"
                                            class="form-control @error('province') is-invalid @enderror auto-caps"
                                            oninput="this.value = this.value.toUpperCase()" placeholder="PROVINCE">
                                        @error('province')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 d-flex justify-content-between">
                                    <button type="button" class="btn btn-label-secondary btn-prev" disabled> <i
                                            class="ti ti-arrow-left me-sm-1"></i>
                                        <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                    </button>
                                    <button type="button" class="btn btn-primary btn-next"> <span
                                            class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i
                                            class="ti ti-arrow-right"></i></button>
                                </div>
                            </div>
                        </div>
                        <!-- Fees -->
                        <div id="fees-validation" class="content">
                            <div class="content-header mb-3">
                                <h6 class="mb-0">Driving School Fees</h6>
                            </div>
                            <div class="row g-3">
                                <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="ds_fee_theoretical">THEORETICAL FEE</label>
                                        <input type="number" id="ds_fee_theoretical" name="ds_fee_theoretical"
                                            class="form-control @error('ds_fee_theoretical') is-invalid @enderror"
                                            placeholder="THEORETICAL FEE">
                                        @error('ds_fee_theoretical')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="ds_fee_practical">PRACTICAL FEE</label>
                                        <input type="number" id="ds_fee_practical" name="ds_fee_practical"
                                            class="form-control @error('ds_fee_practical') is-invalid @enderror"
                                            placeholder="PRACTICAL FEE">
                                        @error('ds_fee_practical')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="ds_fee_dep_cde">DS FEE DEP CDE</label>
                                        <input type="number" id="ds_fee_dep_cde" name="ds_fee_dep_cde"
                                            class="form-control @error('ds_fee_dep_cde') is-invalid @enderror"
                                            placeholder="DS FEE DEP CDE">
                                        @error('ds_fee_dep_cde')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="ds_fee_dep_drc">DS FEE DEP DRC</label>
                                        <input type="number" id="ds_fee_dep_drc" name="ds_fee_dep_drc"
                                            class="form-control @error('ds_fee_dep_drc') is-invalid @enderror"
                                            placeholder="DS FEE DEP DRC">
                                        @error('ds_fee_dep_drc')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="lto_fee_theoretical">LTO FEE
                                            THEORETICAL</label>
                                        <input type="number" id="lto_fee_theoretical" name="lto_fee_theoretical"
                                            class="form-control @error('lto_fee_theoretical') is-invalid @enderror"
                                            placeholder="LTO FEE THEORETICAL">
                                        @error('lto_fee_theoretical')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="lto_fee_practical">LTO FEE
                                            PRACTICAL</label>
                                        <input id="lto_fee_practical" name="lto_fee_practical" type="number"
                                            class="form-control @error('lto_fee_practical') is-invalid @enderror"
                                            placeholder="LTO FEE PRACTICAL">
                                        @error('lto_fee_practical')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="lto_fee_dep_cde">LTO FEE DEP
                                            CDE</label>
                                        <input type="number" id="lto_fee_dep_cde" name="lto_fee_dep_cde"
                                            class="form-control @error('lto_fee_dep_cde') is-invalid @enderror"
                                            placeholder="LTO FEE DEP CDE">
                                        @error('lto_fee_dep_cde')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="lto_fee_dep_drc">LTO FEE DEP
                                            DRC</label>
                                        <input type="number" id="lto_fee_dep_drc" name="lto_fee_dep_drc"
                                            class="form-control @error('lto_fee_dep_drc') is-invalid @enderror"
                                            placeholder="LTO FEE DEP DRC">
                                        @error('lto_fee_dep_drc')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="cdbs_fee_theoretical">CDBS FEE
                                            THEORITICAL</label>
                                        <input type="number" id="cdbs_fee_theoretical" name="cdbs_fee_theoretical"
                                            class="form-control @error('cdbs_fee_theoretical') is-invalid @enderror"
                                            placeholder="CDBS FEE THEORITICAL">
                                        @error('cdbs_fee_theoretical')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="cdbs_fee_practical">CDBS FEE
                                            PRACTICAL</label>
                                        <input type="number" id="cdbs_fee_practical" name="cdbs_fee_practical"
                                            class="form-control @error('cdbs_fee_practical') is-invalid @enderror"
                                            placeholder="CDBS FEE PRACTICAL">
                                        @error('cdbs_fee_practical')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="cdbs_fee_dep_cde">CDBS FEE DEP
                                            CDE</label>
                                        <input type="number" id="cdbs_fee_dep_cde" name="cdbs_fee_dep_cde"
                                            class="form-control @error('cdbs_fee_dep_cde') is-invalid @enderror"
                                            placeholder="CDBS FEE DEP CDE">
                                        @error('cdbs_fee_dep_cde')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="cdbs_fee_dep_drc">CDBS FEE DEP
                                            DRC</label>
                                        <input type="number" id="cdbs_fee_dep_drc" name="cdbs_fee_dep_drc"
                                            class="form-control @error('cdbs_fee_dep_drc') is-invalid @enderror"
                                            placeholder="CDBS FEE DEP DRC">
                                        @error('cdbs_fee_dep_drc')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="it_fee_theoretical">IT FEE
                                            THEORETICAL</label>
                                        <input type="number" id="it_fee_theoretical" name="it_fee_theoretical"
                                            class="form-control @error('it_fee_theoretical') is-invalid @enderror"
                                            placeholder="IT FEE THEORETICAL">
                                        @error('it_fee_theoretical')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="it_fee_practical">IT FEE
                                            PRACTICAL</label>
                                        <input type="number" id="it_fee_practical" name="it_fee_practical"
                                            class="form-control @error('it_fee_practical') is-invalid @enderror"
                                            placeholder="IT FEE PRACTICAL">
                                        @error('it_fee_practical')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="it_fee_dep_cde">IT FEE DEP
                                            CDE</label>
                                        <input type="number" id="it_fee_dep_cde" name="it_fee_dep_cde"
                                            class="form-control @error('it_fee_dep_cde') is-invalid @enderror"
                                            placeholder="IT FEE DEP CDE">
                                        @error('it_fee_dep_cde')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="it_fee_dep_drc">IT FEE DEP
                                            DRC</label>
                                        <input type="number" id="it_fee_dep_drc" name="it_fee_dep_drc"
                                            class="form-control @error('it_fee_dep_drc') is-invalid @enderror"
                                            placeholder="IT FEE DEP DRC">
                                        @error('it_fee_dep_drc')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="others_fee_theoretical">OTHERS FEE
                                            THEORETICAL</label>
                                        <input type="number" id="others_fee_theoretical" name="others_fee_theoretical"
                                            class="form-control @error('others_fee_theoretical') is-invalid @enderror"
                                            placeholder="OTHERS FEE THEORETICAL">
                                        @error('others_fee_theoretical')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="others_fee_practical">OTHERS FEE
                                            PRACTICAL</label>
                                        <input type="number" id="others_fee_practical" name="others_fee_practical"
                                            class="form-control @error('others_fee_practical') is-invalid @enderror"
                                            placeholder="OTHERS FEE PRACTICAL">
                                        @error('others_fee_practical')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="others_fee_dep_cde">OTHERS FEE DEP
                                            CDE</label>
                                        <input type="number" id="others_fee_dep_cde" name="others_fee_dep_cde"
                                            class="form-control @error('others_fee_dep_cde') is-invalid @enderror"
                                            placeholder="OTHERS FEE DEP CDE">
                                        @error('others_fee_dep_cde')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="others_fee_dep_drc">OTHERS FEE DEP
                                            DRC</label>
                                        <input type="number" id="others_fee_dep_drc" name="others_fee_dep_drc"
                                            class="form-control @error('others_fee_dep_drc') is-invalid @enderror"
                                            placeholder="OTHERS FEE DEP DRC">
                                        @error('others_fee_dep_drc')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-between">
                                    <button type="button" class="btn btn-label-secondary btn-prev"> <i
                                            class="ti ti-arrow-left me-sm-1"></i>
                                        <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                    </button>
                                    <button type="button" class="btn btn-primary btn-next"> <span
                                            class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i
                                            class="ti ti-arrow-right"></i></button>
                                </div>
                            </div>
                        </div>
                        <!-- IT -->
                        <div id="it-validation" class="content">
                            <div class="content-header mb-3">
                                <h6 class="mb-0">IT</h6>
                            </div>
                            <div class="row g-3">
                                <div class="col-12 col-md-6 col-lg-4 col-xl-4 mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="is_active">ACTIVITY STATUS</label>

                                        <select id="is_active" class="select2 form-select form-select-lg"
                                            name="is_active" data-allow-clear="true">
                                            <option value="0">Inactive
                                            </option>
                                            <option value="1">Active
                                            </option>
                                        </select>

                                        @error('is_active')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                        {{-- <label for="gender">Gender</label>
                                        <select name="gender" id="gender" class="select2 form-contol hide-search">
                                            <option selected disabled>Select Gender</option>
                                            <option value="MALE">Male</option>
                                            <option value="FEMALE">Female</option>
                                        </select> --}}
                                    </div>

                                </div>
                                <div class="col-12 col-md-6 col-lg-4 col-xl-4 mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="server_location">SERVER LOCATION</label>
                                        <input type="text" id="server_location" name="server_location"
                                            class="form-control @error('server_location') is-invalid @enderror"
                                            placeholder="SERVER LOCATION">
                                        @error('server_location')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 col-xl-4 mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="is_live">LIVE STATUS</label>
                                        <select id="is_live" class="select2 form-select form-select-lg" name="is_live"
                                            data-allow-clear="true">
                                            <option value="0">Not Live</option>
                                            <option value="1">Live</option>
                                        </select>

                                        @error('is_live')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 col-xl-4 mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="is_with_pos">WITH POS STATUS</label>


                                        <select id="is_with_pos" class="select2 form-select form-select-lg"
                                            name="is_with_pos" data-allow-clear="true">
                                            <option value="0">Not With Pos</option>
                                            <option value="1">With Pos</option>
                                        </select>

                                        @error('is_live')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 col-xl-4 mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="date_it_started">DATE IT STARTED</label>
                                        <input type="date" name="date_it_started"
                                            class="flatpickr-date form-control @error('date_it_started') is-invalid @enderror"
                                            placeholder="YYYY-MM-DD" id="date_it_started">

                                        @error('date_it_started')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 col-xl-4 mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="date_it_renewal">DATE IT RENEWAL</label>
                                        <input type="date" id="date_it_renewal" name="date_it_renewal"
                                            placeholder="YYYY-MM-DD"
                                            class="flatpickr-date form-control @error('date_it_renewal') is-invalid @enderror">
                                        @error('date_it_renewal')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 col-xl-4 mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="date_it_authorization_renewal">DATE IT
                                            AUTHORIZATION
                                            RENEWAL</label>
                                        <input type="date" id="date_it_authorization_renewal"
                                            name="date_it_authorization_renewal" placeholder="YYYY-MM-DD"
                                            class="flatpickr-date form-control @error('date_it_authorization_renewal') is-invalid @enderror">
                                        @error('date_it_authorization_renewal')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 col-xl-4 mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="date_it_accredited">DATE IT ACCREDITED</label>
                                        <input type="date" id="date_it_accredited" name="date_it_accredited"
                                            class="flatpickr-date form-control @error('date_it_accredited') is-invalid @enderror"
                                            placeholder="YYYY-MM-DD">
                                        @error('date_it_accredited')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 col-xl-4 mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="date_it_accreditation_renewal">DATE IT
                                            ACCREDITATION
                                            RENEWAL</label>
                                        <input type="date" id="date_it_accreditation_renewal"
                                            name="date_it_accreditation_renewal" placeholder="YYYY-MM-DD"
                                            class="flatpickr-date form-control @error('date_it_accreditation_renewal') is-invalid @enderror">
                                        @error('date_it_accreditation_renewal')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-between">
                                    <button type="button" class="btn btn-label-secondary btn-prev"> <i
                                            class="ti ti-arrow-left me-sm-1"></i>
                                        <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                    </button>
                                    <button type="button" class="btn btn-primary btn-next"> <span
                                            class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i
                                            class="ti ti-arrow-right"></i></button>
                                </div>
                            </div>
                        </div>

                        <!-- Images -->
                        <div id="images-validation" class="content">
                            <div class="content-header mb-3">
                                <h6 class="mb-0">Images</h6>
                            </div>
                            <div class="row g-3">

                                <div class="col-12 col-md-6 col-lg-6 col-xl-6 mb-3">
                                    <div class="form-group">

                                        <label class="form-label" for="logo_big">LOGO BIG</label>
                                        <input type="file" name="logo_big" id="logo_big" class="form-control" value=""/>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 col-xl-6 mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="logo_small">LOGO SMALL</label>
                                        <input type="file" name="logo_small" id="logo_small" class="form-control" />
                                    </div>
                                </div>


                                <div class="col-12 col-md-6 col-lg-4 col-xl-4 mb-3">
                                    <div class="form-group">

                                        <label class="form-label" for="ds_pic1">DS PICTURE 1</label>
                                        <input type="file" name="ds_pic1" id="ds_pic1" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 col-xl-4 mb-3">
                                    <div class="form-group">

                                        <label class="form-label" for="ds_pic2">DS PICTURE 2</label>
                                        <input type="file" name="ds_pic2" id="ds_pic2" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 col-xl-4 mb-3">
                                    <label class="form-label" for="ds_pic3">DS PICTURE 3</label>
                                    <input type="file" name="ds_pic3" id="ds_pic3" class="form-control" />
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 col-xl-4 mb-3">
                                    <label class="form-label" for="ds_pic4">DS PICTURE 4</label>
                                    <input type="file" name="ds_pic4" id="ds_pic4" class="form-control" />
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 col-xl-4 mb-3">
                                    <label class="form-label" for="ds_pic5">DS PICTURE 5</label>
                                    <input type="file" name="ds_pic5" id="ds_pic5" class="form-control" />
                                </div>
                                <div class="col-12 d-flex justify-content-between">
                                    <button type="button" class="btn btn-label-secondary btn-prev"> <i
                                            class="ti ti-arrow-left me-sm-1"></i>
                                        <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                    </button>
                                    <button type="button" class="btn btn-primary btn-next"> <span
                                            class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i
                                            class="ti ti-arrow-right"></i></button>
                                </div>
                            </div>
                        </div>

                        <!-- Settings -->
                        <div id="settings-validation" class="content">
                            <div class="content-header mb-3">
                                <h6 class="mb-0">Driving School Settings</h6>
                            </div>
                            <div class="row">
                                <div class="col-xl">
                                    <div class="row">
                                        <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                                            <div class="form-group">
                                                <label class="form-label" for="validity_theoretical">VALIDITY
                                                    THEORETICAL</label>
                                                <input type="number" id="validity_theoretical"
                                                    class="form-control @error('validity_theoretical') is-invalid @enderror"
                                                    placeholder="VALIDITY THEORETICAL" name="validity_theoretical" />
                                                @error('validity_theoretical')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                                            <div class="form-group">
                                                <label class="form-label" for="validity_practical">VALIDITY
                                                    PRACTICAL</label>
                                                <input name="validity_practical" type="number" id="validity_practical"
                                                    class="form-control @error('validity_practical') is-invalid @enderror"
                                                    placeholder="VALIDITY PRACTICAL" />
                                                @error('validity_practical')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                                            <div class="form-group">
                                                <label class="form-label" for="validity_dep_cde">VALIDITY DEP
                                                    CODE</label>
                                                <input type="number" id="validity_dep_cde" name="validity_dep_cde"
                                                    class="form-control phone-mask @error('validity_dep_cde') is-invalid @enderror"
                                                    placeholder="VALIDITY DEP CODE" />
                                                @error('validity_dep_cde')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                                            <div class="form-group">
                                                <label class="form-label" for="validity_dep_drc">VALIDITY DEP
                                                    DRC</label>
                                                <input type="number"
                                                    class="form-control @error('validity_dep_drc') is-invalid @enderror"
                                                    id="validity_dep_drc" name="validity_dep_drc"
                                                    placeholder="VALIDITY DEP DRC" />
                                                @error('validity_dep_drc')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                                            <div class="form-group">
                                                <label class="form-label" for="mc_daily_upload_limit">MC DAILY
                                                    UPLOAD LIMIT</label>
                                                <input type="number" id="mc_daily_upload_limit"
                                                    name="mc_daily_upload_limit"
                                                    class="form-control @error('mc_daily_upload_limit') is-invalid @enderror"
                                                    placeholder="MC DAILY UPLOAD LIMIT">
                                                @error('mc_daily_upload_limit')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                                            <div class="form-group">
                                                <label class="form-label" for="lv_daily_upload_limit">LV DAILY
                                                    UPLOAD LIMIT</label>
                                                <input type="number" id="lv_daily_upload_limit"
                                                    name="lv_daily_upload_limit"
                                                    class="form-control @error('lv_daily_upload_limit') is-invalid @enderror"
                                                    placeholder="LV DAILY UPLOAD LIMIT">
                                                @error('lv_daily_upload_limit')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                                            <div class="form-group">
                                                <label class="form-label" for="weekly_upload_limit">WEEKLY UPLOAD
                                                    LIMIT</label>
                                                <input type="number" id="weekly_upload_limit" name="weekly_upload_limit"
                                                    class="form-control @error('weekly_upload_limit') is-invalid @enderror"
                                                    placeholder="WEEKLY UPLOAD LIMIT">
                                                @error('weekly_upload_limit')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                                            <div class="form-group">
                                                <label class="form-label" for="seating_capacity">SEATING
                                                    CAPACITY</label>
                                                <input type="number" id="seating_capacity" name="seating_capacity"
                                                    class="form-control @error('seating_capacity') is-invalid @enderror"
                                                    placeholder="SEATING CAPACITY">
                                                @error('seating_capacity')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                                            <div class="form-group">
                                                <label class="form-label" for="accredited_classroom_count">ACCREDITED
                                                    CLASSROOM
                                                    COUNT</label>
                                                <input type="number" id="accredited_classroom_count"
                                                    name="accredited_classroom_count"
                                                    class="form-control @error('accredited_classroom_count') is-invalid @enderror"
                                                    placeholder="ACCREDITED CLASSROOM COUNT">
                                                @error('accredited_classroom_count')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                                            <div class="form-group">
                                                <label class="form-label"
                                                    for="percentage_allowable_seating_capacity">PERCENTAGE
                                                    ALLOWABLE
                                                    SEATING CAPACITY</label>
                                                <input type="number" id="percentage_allowable_seating_capacity"
                                                    name="percentage_allowable_seating_capacity"
                                                    class="form-control @error('percentage_allowable_seating_capacity') is-invalid @enderror"
                                                    placeholder="PERCENTAGE ALLOWABLE SEATING CAPACITY">
                                                @error('percentage_allowable_seating_capacity')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                                            <div class="form-group">
                                                <label class="form-label"
                                                    for="number_unique_classes_per_days_per_tdc">NUMBER
                                                    UNIQUE
                                                    CLASSES PER DAYS PER TDC</label>
                                                <input type="number" id="number_unique_classes_per_days_per_tdc"
                                                    name="number_unique_classes_per_days_per_tdc"
                                                    class="form-control @error('number_unique_classes_per_days_per_tdc') is-invalid @enderror"
                                                    placeholder="NUMBER UNIQUE CLASSES PER DAYS PER TDC">
                                                @error('number_unique_classes_per_days_per_tdc')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                                            <div class="form-group">
                                                <label class="form-label"
                                                    for="number_unique_classes_per_days_per_dep">NUMBER OF
                                                    UNIQUE CLASSES
                                                    PER DAYS
                                                    PER
                                                    DEP</label>
                                                <input type="number" id="number_unique_classes_per_days_per_dep"
                                                    name="number_unique_classes_per_days_per_dep"
                                                    class="form-control @error('number_unique_classes_per_days_per_dep') is-invalid @enderror"
                                                    placeholder="NUMBER PER DAYS PER DEP">
                                                @error('number_unique_classes_per_days_per_dep')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                                            <div class="form-group">
                                                <label class="form-label"
                                                    for="number_prescribed_days_per_instruction">NUMBER
                                                    PRESCRIBED
                                                    DAYS PER INSTRUCTION</label>
                                                <input type="number" id="number_prescribed_days_per_instruction"
                                                    name="number_prescribed_days_per_instruction"
                                                    class="form-control @error('number_prescribed_days_per_instruction') is-invalid @enderror"
                                                    placeholder="NUMBER PRESCRIBED
                                                        DAYS PER INSTRUCTION">
                                                @error('number_prescribed_days_per_instruction')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-between">
                                <button type="button" class="btn btn-label-secondary btn-prev"> <i
                                        class="ti ti-arrow-left me-sm-1"></i>
                                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                </button>
                                <button type="button" class="btn btn-primary btn-next"> <span
                                        class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i
                                        class="ti ti-arrow-right"></i></button>
                            </div>
                        </div>

                        <!-- Review -->
                        <div id="review-submit" class="content">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                    <p class="fw-semibold mb-2">Driving School Details</p>
                                    <div class="row">
                                        <div class="col-12">
                                            <ul class="list-unstyled">
                                                <li class="row">
                                                    <strong class="col-xl-7 col-6">Driving School Name:</strong>
                                                    <span class="col-xl-5 col-6" id="preview-ds_name"></span>
                                                </li>
                                                <li class="row">
                                                    <strong class="col-xl-7 col-6">Contact Number:</strong>
                                                    <span class="col-xl-5 col-6" id="preview-ds_contact_no"></span>
                                                </li>
                                                <li class="row">
                                                    <strong class="col-xl-7 col-6">Business Type:</strong>
                                                    <span class="col-xl-5 col-6" id="preview-business_type"></span>
                                                </li>
                                                <li class="row">
                                                    <strong class="col-xl-7 col-6">Driving School Code:</strong>
                                                    <span class="col-xl-5 col-6" id="preview-ds_code"></span>
                                                </li>
                                                <li class="row">
                                                    <strong class="col-xl-7 col-6">DTI Accreditation Number:</strong>
                                                    <span class="col-xl-5 col-6" id="preview-dti_accreditation_no"></span>
                                                </li>
                                                <li class="row">
                                                    <strong class="col-xl-7 col-6">LTO Accreditation Number:</strong>
                                                    <span class="col-xl-5 col-6" id="preview-lto_accreditation_no"></span>
                                                </li>
                                                <li class="row">
                                                    <strong class="col-xl-7 col-6">Description:</strong>
                                                    <span class="col-xl-5 col-6" id="preview-description"></span>
                                                </li>
                                                <li class="row">
                                                    <strong class="col-xl-7 col-6">Town/City:</strong>
                                                    <span class="col-xl-5 col-6" id="preview-town_city"></span>
                                                </li>
                                                <li class="row">
                                                    <strong class="col-xl-7 col-6">Region:</strong>
                                                    <span class="col-xl-5 col-6" id="preview-region"></span>
                                                </li>
                                                <li class="row">
                                                    <strong class="col-xl-7 col-6">Province:</strong>
                                                    <span class="col-xl-5 col-6" id="preview-province"></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                    <p class="fw-semibold mb-2">IT</p>
                                    <div class="row">
                                        <div class="col-12">
                                            <ul class="list-unstyled">
                                                <li class="row">
                                                    <strong class="col-xl-7 col-6">Activity Status:</strong>
                                                    <span class="col-xl-5 col-6" id="preview-is_active"></span>
                                                </li>
                                                <li class="row">
                                                    <strong class="col-xl-7 col-6">Server Location:</strong>
                                                    <span class="col-xl-5 col-6" id="preview-server_location"></span>
                                                </li>
                                                <li class="row">
                                                    <strong class="col-xl-7 col-6">Live Status:</strong>
                                                    <span class="col-xl-5 col-6" id="preview-is_live"></span>
                                                </li>
                                                <li class="row">
                                                    <strong class="col-xl-7 col-6">POS Status:</strong>
                                                    <span class="col-xl-5 col-6" id="preview-is_with_pos"></span>
                                                </li>
                                                <li class="row">
                                                    <strong class="col-xl-7 col-6">Date IT Started:</strong>
                                                    <span class="col-xl-5 col-6" id="preview-date_it_started"></span>
                                                </li>
                                                <li class="row">
                                                    <strong class="col-xl-7 col-6">Date IT Renewal:</strong>
                                                    <span class="col-xl-5 col-6" id="preview-date_it_renewal"></span>
                                                </li>
                                                <li class="row">
                                                    <strong class="col-xl-7 col-6">Date IT Authorization Renewal:</strong>
                                                    <span class="col-xl-5 col-6"
                                                        id="preview-date_it_authorization_renewal"></span>
                                                </li>
                                                <li class="row">
                                                    <strong class="col-xl-7 col-6">Date IT Accredited:</strong>
                                                    <span class="col-xl-5 col-6" id="preview-date_it_accredited"></span>
                                                </li>
                                                <li class="row">
                                                    <strong class="col-xl-7 col-6">Date IT Accreditation Renewal:</strong>
                                                    <span class="col-xl-5 col-6"
                                                        id="preview-date_it_accreditation_renewal"></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                    <p class="fw-semibold mb-2">Fees</p>
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <ul class="list-unstyled">
                                                <li class="row">
                                                    <strong class="col-xl-7 col-6">Theoretical Fee:</strong>
                                                    <span class="col-xl-5 col-6" id="preview-ds_fee_theoretical"></span>
                                                </li>
                                                <li class="row">
                                                    <strong class="col-xl-7 col-6">Practical Fee:</strong>
                                                    <span class="col-xl-5 col-6" id="preview-ds_fee_practical"></span>
                                                </li>
                                                <li class="row">
                                                    <strong class="col-xl-7 col-6">DS Fee DEP CDE:</strong>
                                                    <span class="col-xl-5 col-6" id="preview-ds_fee_dep_cde"></span>
                                                </li>
                                                <li class="row">
                                                    <strong class="col-xl-7 col-6">DS Fee DEP DRC:</strong>
                                                    <span class="col-xl-5 col-6" id="preview-ds_fee_dep_drc"></span>
                                                </li>
                                                <li class="row">
                                                    <strong class="col-xl-7 col-6">LTO Fee Theoretical:</strong>
                                                    <span class="col-xl-5 col-6" id="preview-lto_fee_theoretical"></span>
                                                </li>
                                                <li class="row">
                                                    <strong class="col-xl-7 col-6">LTO Fee Practical:</strong>
                                                    <span class="col-xl-5 col-6" id="preview-lto_fee_practical"></span>
                                                </li>
                                                <li class="row">
                                                    <strong class="col-xl-7 col-6">LTO Fee DEP CDE:</strong>
                                                    <span class="col-xl-5 col-6" id="preview-lto_fee_dep_cde"></span>
                                                </li>
                                                <li class="row">
                                                    <strong class="col-xl-7 col-6">LTO Fee DEP DRC:</strong>
                                                    <span class="col-xl-5 col-6" id="preview-lto_fee_dep_drc"></span>
                                                </li>
                                                <li class="row">
                                                    <strong class="col-xl-7 col-6">CDBS Fee Theoretical:</strong>
                                                    <span class="col-xl-5 col-6" id="preview-cdbs_fee_theoretical"></span>
                                                </li>
                                                <li class="row">
                                                    <strong class="col-xl-7 col-6">CDBS Fee Practical:</strong>
                                                    <span class="col-xl-5 col-6" id="preview-cdbs_fee_practical"></span>
                                                </li>
                                                <li class="row">
                                                    <strong class="col-xl-7 col-6">CDBS Fee DEP CDE:</strong>
                                                    <span class="col-xl-5 col-6" id="preview-cdbs_fee_dep_cde"></span>
                                                </li>
                                                <li class="row">
                                                    <strong class="col-xl-7 col-6">CDBS Fee DEP DRC:</strong>
                                                    <span class="col-xl-5 col-6" id="preview-cdbs_fee_dep_drc"></span>
                                                </li>
                                                <li class="row">
                                                    <strong class="col-xl-7 col-6">IT Fee Theoretical:</strong>
                                                    <span class="col-xl-5 col-6" id="preview-it_fee_theoretical"></span>
                                                </li>
                                                <li class="row">
                                                    <strong class="col-xl-7 col-6">IT Fee Practical:</strong>
                                                    <span class="col-xl-5 col-6" id="preview-it_fee_practical"></span>
                                                </li>
                                                <li class="row">
                                                    <strong class="col-xl-7 col-6">IT Fee DEP CDE:</strong>
                                                    <span class="col-xl-5 col-6" id="preview-it_fee_dep_cde"></span>
                                                </li>
                                                <li class="row">
                                                    <strong class="col-xl-7 col-6">IT Fee DEP DRC:</strong>
                                                    <span class="col-xl-5 col-6" id="preview-it_fee_dep_drc"></span>
                                                </li>
                                                <li class="row">
                                                    <strong class="col-xl-7 col-6">Others Fee Theoretical:</strong>
                                                    <span class="col-xl-5 col-6"
                                                        id="preview-others_fee_theoretical"></span>
                                                </li>
                                                <li class="row">
                                                    <strong class="col-xl-7 col-6">Others Fee Practical:</strong>
                                                    <span class="col-xl-5 col-6" id="preview-others_fee_practical"></span>
                                                </li>
                                                <li class="row">
                                                    <strong class="col-xl-7 col-6">Others Fee DEP CDE:</strong>
                                                    <span class="col-xl-5 col-6" id="preview-others_fee_dep_cde"></span>
                                                </li>
                                                <li class="row">
                                                    <strong class="col-xl-7 col-6">Others Fee DEP DRC:</strong>
                                                    <span class="col-xl-5 col-6" id="preview-others_fee_dep_drc"></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">

                                    <p class="fw-semibold mb-2">Settings</p>
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <ul class="list-unstyled">
                                                <li class="row">
                                                    <strong class="col-xl-7 col-6">Validity Theoretical:</strong>
                                                    <span class="col-xl-5 col-6" id="preview-validity_theoretical"></span>
                                                </li>
                                                <li class="row">
                                                    <strong class="col-xl-7 col-6">Validity Practical:</strong>
                                                    <span class="col-xl-5 col-6" id="preview-validity_practical"></span>
                                                </li>
                                                <li class="row">
                                                    <strong class="col-xl-7 col-6">Validity DEP CDE:</strong>
                                                    <span class="col-xl-5 col-6" id="preview-validity_dep_cde"></span>
                                                </li>
                                                <li class="row">
                                                    <strong class="col-xl-7 col-6">Validity DEP DRC:</strong>
                                                    <span class="col-xl-5 col-6" id="preview-validity_dep_drc"></span>
                                                </li>
                                                <li class="row">
                                                    <strong class="col-xl-7 col-6">MC Daily Upload Limit:</strong>
                                                    <span class="col-xl-5 col-6"
                                                        id="preview-mc_daily_upload_limit"></span>
                                                </li>
                                                <li class="row">
                                                    <strong class="col-xl-7 col-6">LV Daily Upload Limit:</strong>
                                                    <span class="col-xl-5 col-6"
                                                        id="preview-lv_daily_upload_limit"></span>
                                                </li>
                                                <li class="row">
                                                    <strong class="col-xl-7 col-6">Weekly Upload Limit:</strong>
                                                    <span class="col-xl-5 col-6" id="preview-weekly_upload_limit"></span>
                                                </li>
                                                <li class="row">
                                                    <strong class="col-xl-7 col-6">Seating Capacity:</strong>
                                                    <span class="col-xl-5 col-6" id="preview-seating_capacity"></span>
                                                </li>
                                                <li class="row">
                                                    <strong class="col-xl-7 col-6">Accredited Classroom Count:</strong>
                                                    <span class="col-xl-5 col-6"
                                                        id="preview-accredited_classroom_count"></span>
                                                </li>
                                                <li class="row">
                                                    <strong class="col-xl-7 col-6">Percentage Allowable Seating
                                                        Capacity:</strong>
                                                    <span class="col-xl-5 col-6"
                                                        id="preview-percentage_allowable_seating_capacity"></span>
                                                </li>
                                                <li class="row">
                                                    <strong class="col-xl-7 col-6">No. Of Unique Classes per Days per
                                                        TDC:</strong>
                                                    <span class="col-xl-5 col-6"
                                                        id="preview-number_unique_classes_per_days_per_tdc"></span>
                                                </li>
                                                <li class="row">
                                                    <strong class="col-xl-7 col-6">No. Of Unique Classes per Days per
                                                        DEP:</strong>
                                                    <span class="col-xl-5 col-6"
                                                        id="preview-number_unique_classes_per_days_per_dep"></span>
                                                </li>
                                                <li class="row">
                                                    <strong class="col-xl-7 col-6">No. Of Prescribed Days per
                                                        Instruction:</strong>
                                                    <span class="col-xl-5 col-6"
                                                        id="preview-number_prescribed_days_per_instruction"></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Final Check and Submit Buttons -->
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
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('page-script')
    <script>
        const homeUrl = "{{ route('drivingSchool') }}"

        // function uploadFile() {
        //     const form = document.getElementById('uploadForm');
        //     const formData = new FormData(form);

        //     fetch('{{ route('submitDS') }}', {
        //             method: 'POST',
        //             body: formData,
        //             headers: {
        //                 'Accept': 'application/json',
        //                 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        //             }
        //         })
        //         .then(response => {
        //             if (!response.ok) {
        //                 return response.text().then(text => {
        //                     throw new Error(text);
        //                 });
        //             }
        //             return response.json();
        //         })
        //         .then(data => {
        //             if (data.success) {
        //                 alert('Form submitted successfully');
        //                 window.location.href = homeUrl;
        //             } else {
        //                 alert('Submission failed: ' + data.message);
        //             }
        //         })
        //         .catch(error => {
        //             console.error('Error:', error);
        //             alert('An error occurred: ' + error.message);
        //         });

        //     console.log(response.json());

        // }
    </script>

    <script src="{{ asset('js/form.js') }}"></script>
@endsection
