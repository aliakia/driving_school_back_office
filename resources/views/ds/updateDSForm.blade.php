@php
    $configData = Helper::appClasses();
@endphp
@extends('layouts/layoutMaster')

@section('title', 'Create New Driving School')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/dropzone/dropzone.css') }}" />
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/dropzone/dropzone.js') }}"></script>
@endsection

@section('content')

    <div class="row">
        <div class="col-12 mb-4">
            <div class="bs-stepper wizard-icons wizard-icons-example mt-2">
                <div class="bs-stepper-header">
                    <div class="step" data-target="#ds_info">
                        <button type="button" class="step-trigger">
                            <span class="bs-stepper-label">Driving School Details</span>
                        </button>
                    </div>
                    <div class="line">
                        <i class="ti ti-chevron-right"></i>
                    </div>
                    <div class="step" data-target="#ds_fees">
                        <button type="button" class="step-trigger">
                            <span class="bs-stepper-label">Fees</span>
                        </button>
                    </div>
                    <div class="line">
                        <i class="ti ti-chevron-right"></i>
                    </div>
                    <div class="step" data-target="#ds_it">
                        <button type="button" class="step-trigger">
                            <span class="bs-stepper-label">IT</span>
                        </button>
                    </div>

                    <div class="line">
                        <i class="ti ti-chevron-right"></i>
                    </div>
                    <div class="step" data-target="#ds_images">
                        <button type="button" class="step-trigger">
                            <span class="bs-stepper-label">Images</span>
                        </button>
                    </div>

                    <div class="line">
                        <i class="ti ti-chevron-right"></i>
                    </div>
                    <div class="step" data-target="#ds_settings">
                        <button type="button" class="step-trigger">
                            <span class="bs-stepper-label">Settings</span>
                        </button>
                    </div>
                    <div class="line">
                        <i class="ti ti-chevron-right"></i>
                    </div>
                    <div class="step" data-target="#review-submit">
                        <button type="button" class="step-trigger">
                            <span class="bs-stepper-label">Complete Driving School</span>
                        </button>
                    </div>

                </div>
                <div class="bs-stepper-content">
                    <form method="POST" action="{{ route('updateDs', [$selectedDs->ds_code]) }}">
                        @csrf
                        @method('PUT')
                        <!-- Driving School Details -->
                        <div id="ds_info" class="content">
                            <div class="content-header mb-3">
                                <h6 class="mb-0">Driver School Details</h6>
                            </div>
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label class="form-label" for="ds_code">DRIVING SCHOOL CODE</label>
                                    <input type="text" id="ds_code"
                                        class="form-control @error('ds_code') is-invalid @enderror" placeholder="DS Code"
                                        value="{{ old('ds_code', $selectedDs->ds_code) }}" name="ds_code" />
                                    @error('ds_code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="ds_name">DRIVING SCHOOL NAME</label>
                                    <input name="ds_name" type="text" id="ds_name"
                                        class="form-control @error('ds_name') is-invalid @enderror"
                                        placeholder="School Name" value="{{ old('ds_name', $selectedDs->ds_name) }}" />
                                    @error('ds_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-6 form-password-toggle">
                                    <label class="form-label" for="ds_contact_no">DRIVING SCHOOL CONTACT NUMBER</label>
                                    <input type="text" id="ds_contact_no" name="ds_contact_no"
                                        class="form-control phone-mask @error('ds_contact_no') is-invalid @enderror"
                                        placeholder="Contact No."
                                        value="{{ old('ds_contact_no', $selectedDs->ds_contact_no) }}" />
                                    @error('ds_contact_no')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-6 form-password-toggle">
                                    <label class="form-label" for="business_type">BUSINESS TYPE</label>
                                    <input type="text" class="form-control @error('business_type') is-invalid @enderror"
                                        id="business_type" name="business_type" placeholder="Business Type"
                                        value="{{ old('business_type', $selectedDs->business_type) }}" />
                                    @error('business_type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-6 col-xl-12 mb-3 form-password-toggle">
                                    <div class="form-group">
                                        <label class="form-label" for="description">DESCRIPTION</label>
                                        <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror"
                                            placeholder="DESCRIPTION">{{ old('description', $selectedDs->description) }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-4 mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="town_city">TOWN/CITY</label>
                                        <input type="text" id="town_city" name="town_city"
                                            class="form-control @error('town_city') is-invalid @enderror"
                                            value="{{ old('town_city', $selectedDs->town_city) }}">
                                        @error('town_city')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-xl-4 mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="region">REGION</label>
                                        <input type="text" id="region" name="region"
                                            class="form-control @error('region') is-invalid @enderror"
                                            value="{{ old('region', $selectedDs->region) }}">
                                        @error('region')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-xl-4 mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="province">PROVINCE</label>
                                        <input type="text" id="province" name="province"
                                            class="form-control @error('province') is-invalid @enderror"
                                            value="{{ old('province', $selectedDs->province) }}">
                                        @error('province')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <hr class="my-4" />
                                <div class="col-12 col-md-6 col-xl-3 mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="dti_accreditation_no">DTI ACCREDITATION
                                            NUMBER</label>
                                        <input type="text" id="dti_accreditation_no" name="dti_accreditation_no"
                                            class="form-control @error('dti_accreditation_no') is-invalid @enderror"
                                            value="{{ old('dti_accreditation_no', $selectedDs->dti_accreditation_no) }}">
                                        @error('dti_accreditation_no')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-3 mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="lto_accreditation_no">LTO ACCREDITATION
                                            NUMBER</label>
                                        <input type="text" id="lto_accreditation_no" name="lto_accreditation_no"
                                            class="form-control @error('lto_accreditation_no') is-invalid @enderror"
                                            value="{{ old('lto_accreditation_no', $selectedDs->lto_accreditation_no) }}">
                                        @error('lto_accreditation_no')
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
                        <!-- DS Fees -->
                        <div id="ds_fees" class="content">
                            <div class="content-header mb-3">
                                <h6 class="mb-0">Driving School Fees</h6>
                            </div>
                            <div class="row g-3">
                                <div class="col-12 col-md-6 col-xl-3 mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="ds_fee_theoretical">THEORETICAL FEE</label>
                                        <input type="text" id="ds_fee_theoretical" name="ds_fee_theoretical"
                                            class="form-control @error('ds_fee_theoretical') is-invalid @enderror"
                                            value="{{ old('ds_fee_theoretical', $selectedDs->ds_fee_theoretical) }}">
                                        @error('ds_fee_theoretical')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-3 mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="ds_fee_practical">PRACTICAL FEE</label>
                                        <input type="text" id="ds_fee_practical" name="ds_fee_practical"
                                            class="form-control @error('ds_fee_practical') is-invalid @enderror"
                                            value="{{ old('ds_fee_practical', $selectedDs->ds_fee_practical) }}">
                                        @error('ds_fee_practical')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-3 mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="ds_fee_dep_cde">DS FEE DEP CDE</label>
                                        <input type="text" id="ds_fee_dep_cde" name="ds_fee_dep_cde"
                                            class="form-control @error('ds_fee_dep_cde') is-invalid @enderror"
                                            value="{{ old('ds_fee_dep_cde', $selectedDs->ds_fee_dep_cde) }}">
                                        @error('ds_fee_dep_cde')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-3 mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="ds_fee_dep_drc">DS FEE DEP DRC</label>
                                        <input type="text" id="ds_fee_dep_drc" name="ds_fee_dep_drc"
                                            class="form-control @error('ds_fee_dep_drc') is-invalid @enderror"
                                            value="{{ old('ds_fee_dep_drc', $selectedDs->ds_fee_dep_drc) }}">
                                        @error('ds_fee_dep_drc')
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
                        <!-- DS IT -->
                        <div id="ds_it" class="content">
                            <div class="content-header mb-3">
                                <h6 class="mb-0">IT</h6>
                            </div>
                            <div class="row g-3">
                                <div class="col-12 col-md-6 col-xl-3 mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="is_active">ACTIVITY STATUS</label>

                                        @php
                                            $oldVal = $selectedDs->ds_code ?? 'Active' || 'Inactive';
                                        @endphp
                                        <select id="is_active" class="select2 form-select form-select-lg"
                                            name="is_active" data-allow-clear="true"
                                            value="{{ old('is_active', $selectedDs->is_active) }}">
                                            <option value="0">Inactive</option>
                                            <option value="1">Active</option>
                                        </select>

                                        @error('is_active')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-3 mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="server_location">SERVER LOCATION</label>
                                        <input type="text" id="server_location" name="server_location"
                                            class="form-control @error('server_location') is-invalid @enderror"
                                            value="{{ old('server_location', $selectedDs->server_location) }}">
                                        @error('server_location')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-3 mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="is_live">LIVE STATUS</label>

                                        @php
                                            $oldVal = $selectedDs->ds_code ?? 'Live' || 'Not Live';
                                        @endphp
                                        <select id="is_live" class="select2 form-select form-select-lg" name="is_live"
                                            value="{{ old('is_live', $selectedDs->is_live) }}">
                                            <option value="0">Not Live</option>
                                            <option value="1">Live</option>
                                        </select>

                                        @error('is_live')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-3 mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="is_with_pos">WITH POST STATUS</label>

                                        @php
                                            $oldVal = $selectedDs->ds_code ?? 'With Pos' || 'Not with Pos';
                                        @endphp
                                        <select id="is_with_pos" class="select2 form-select form-select-lg"
                                            name="is_with_pos" data-allow-clear="true"
                                            value="{{ old('is_with_pos', $selectedDs->is_with_pos) }}">
                                            <option value="0">Not with Pos</option>
                                            <option value="1">With Pos</option>
                                        </select>

                                        @error('is_with_pos')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-4 mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="date_it_started">DATE IT
                                            STARTED</label>
                                        <input type="date" id="date_it_started" name="date_it_started"
                                            class="flatpickr-date form-control @error('date_it_started') is-invalid @enderror"
                                            value="{{ old('date_it_started', $selectedDs->date_it_started) }}">
                                        @error('date_it_started')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-4 mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="date_it_renewal">DATE IT
                                            RENEWAL</label>
                                        <input type="date" id="date_it_renewal" name="date_it_renewal"
                                            class="flatpickr-date form-control @error('date_it_renewal') is-invalid @enderror"
                                            value="{{ old('date_it_renewal', $selectedDs->date_it_renewal) }}">
                                        @error('date_it_renewal')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-4 mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="date_it_authorization_renewal">DATE IT
                                            AUTHORIZATION
                                            RENEWAL</label>
                                        <input type="date" id="date_it_authorization_renewal"
                                            name="date_it_authorization_renewal"
                                            class="flatpickr-date form-control @error('date_it_authorization_renewal') is-invalid @enderror"
                                            value="{{ old('date_it_authorization_renewal', $selectedDs->date_it_authorization_renewal) }}">
                                        @error('date_it_authorization_renewal')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-6 mb-3">
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
                                <div class="col-12 col-md-6 col-xl-6 mb-3">
                                    <div class="form-group">
                                        <label class="form-label" for="date_it_accreditation_renewal">DATE IT
                                            ACCREDITATION
                                            RENEWAL</label>
                                        <input type="date" id="date_it_accreditation_renewal"
                                            name="date_it_accreditation_renewal"
                                            class="flatpickr-date form-control @error('date_it_accreditation_renewal') is-invalid @enderror"
                                            value="{{ old('date_it_accreditation_renewal', $selectedDs->date_it_accreditation_renewal) }}">
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
                        <!-- DS Images -->
                        <div id="ds_images" class="content">
                            <div class="content-header mb-3">
                                <h6 class="mb-0">Images</h6>
                            </div>
                            <div class="row g-3">
                                <div class="col-12 col-md-12 col-lg-5 mb-3">

                                    <div class="form-group">
                                        <label class="form-label" for="logo_big">LOGO BIG</label>
                                        <div class="me-2 mb2">
                                            <input type="file" name="logo_big" id="logo_big" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="logo_small">LOGO SMALL</label>
                                        <div class="me-2 mb2">
                                            <input type="file" name="logo_small" id="logo_small"
                                                class="form-control" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-12 col-lg-7 mb-3">
                                    {{-- <div class="card">
                                        <h5 class="card-header">Multiple</h5>
                                        <div class="card-body">
                                            <form action="/upload" class="dropzone needsclick" id="dropzone-multi">
                                                <div class="dz-message needsclick">
                                                    Drop files here or click to upload
                                                    <span class="note needsclick">(This is just a demo dropzone. Selected
                                                        files are
                                                        <strong>not</strong> actually uploaded.)</span>
                                                </div>
                                                <div class="fallback">
                                                    <input name="file" type="file" />
                                                </div>
                                            </form>
                                        </div>
                                    </div> --}}
                                    <div class="form-group">
                                        <div class="d-flex flex-wrap">
                                            <div class="me-2 mb-2">
                                                <label class="form-label" for="ds_pic1">DS PICTURE 1</label>
                                                <input type="file" name="ds_pic1" id="ds_pic1"
                                                    class="form-control" />
                                            </div>
                                            <div class="me-2 mb-2">
                                                <label class="form-label" for="ds_pic2">DS PICTURE 2</label>
                                                <input type="file" name="ds_pic2" id="ds_pic2"
                                                    class="form-control" />
                                            </div>
                                            <div class="me-2 mb-2">
                                                <label class="form-label" for="ds_pic3">DS PICTURE 3</label>
                                                <input type="file" name="ds_pic3" id="ds_pic3"
                                                    class="form-control" />
                                            </div>
                                            <div class="me-2 mb-2">
                                                <label class="form-label" for="ds_pic4">DS PICTURE 4</label>
                                                <input type="file" name="ds_pic4" id="ds_pic4"
                                                    class="form-control" />
                                            </div>
                                            <div class="me-2 mb-2">
                                                <label class="form-label" for="ds_pic5">DS PICTURE 5</label>
                                                <input type="file" name="ds_pic5" id="ds_pic5"
                                                    class="form-control" />
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
                        </div>
                        <!-- DS Settings -->
                        <div id="ds_settings" class="content">
                            <div class="content-header mb-3">
                                <h6 class="mb-0">Driving School Settings</h6>
                            </div>
                            <div class="row">
                                <div class="col-xl">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                                            <div class="form-group">
                                                <label class="form-label" for="validity_theoretical">VALIDITY
                                                    THEORETHICAL</label>
                                                <input type="number" id="validity_theoretical"
                                                    class="form-control @error('validity_theoretical') is-invalid @enderror"
                                                    placeholder="DS Code" name="validity_theoretical"
                                                    value="{{ old('validity_theoretical', $dsSetting->validity_theoretical) }}" />
                                                @error('validity_theoretical')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                                            <div class="form-group">
                                                <label class="form-label" for="validity_practical">VALIDITY
                                                    PRACTICAL</label>
                                                <input name="validity_practical" type="number" id="validity_practical"
                                                    class="form-control @error('validity_practical') is-invalid @enderror"
                                                    value="{{ old('validity_practical', $dsSetting->validity_practical) }}" />
                                                @error('validity_practical')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                                            <div class="form-group">
                                                <label class="form-label" for="validity_dep_cde">VALIDITY DEP CDE</label>
                                                <input type="number" id="validity_dep_cde" name="validity_dep_cde"
                                                    class="form-control phone-mask @error('validity_dep_cde') is-invalid @enderror"
                                                    value="{{ old('validity_dep_cde', $dsSetting->validity_dep_cde) }}" />
                                                @error('validity_dep_cde')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                                            <div class="form-group">
                                                <label class="form-label" for="validity_dep_drc">VALIDITY DEP DRC</label>
                                                <input type="number"
                                                    class="form-control @error('validity_dep_drc') is-invalid @enderror"
                                                    id="validity_dep_drc" name="validity_dep_drc"
                                                    value="{{ old('validity_dep_drc', $dsSetting->validity_dep_drc) }}" />
                                                @error('validity_dep_drc')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                                            <div class="form-group">
                                                <label class="form-label" for="lto_fee_theoretical">LTO FEE
                                                    THEORETICAL</label>
                                                <input id="lto_fee_theoretical" name="lto_fee_theoretical"
                                                    class="form-control @error('lto_fee_theoretical') is-invalid @enderror"
                                                    value="{{ old('lto_fee_theoretical', $dsSetting->lto_fee_theoretical) }}">
                                                @error('lto_fee_theoretical')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                                            <div class="form-group">
                                                <label class="form-label" for="lto_fee_practical">LTO FEE
                                                    PRACTICAL</label>
                                                <input id="lto_fee_practical" name="lto_fee_practical"
                                                    class="form-control @error('lto_fee_practical') is-invalid @enderror"
                                                    value="{{ old('lto_fee_practical', $dsSetting->lto_fee_practical) }}">
                                                @error('lto_fee_practical')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                                            <div class="form-group">
                                                <label class="form-label" for="lto_fee_dep_cde">LTO FEE DEP CDE</label>
                                                <input type="number" id="lto_fee_dep_cde" name="lto_fee_dep_cde"
                                                    class="form-control @error('lto_fee_dep_cde') is-invalid @enderror"
                                                    value="{{ old('lto_fee_dep_cde', $dsSetting->lto_fee_dep_cde) }}">
                                                @error('lto_fee_dep_cde')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                                            <div class="form-group">
                                                <label class="form-label" for="lto_fee_dep_drc">LTO FEE DEP DRC</label>
                                                <input type="number" id="lto_fee_dep_drc" name="lto_fee_dep_drc"
                                                    class="form-control @error('lto_fee_dep_drc') is-invalid @enderror"
                                                    value="{{ old('lto_fee_dep_drc', $dsSetting->lto_fee_dep_drc) }}">
                                                @error('lto_fee_dep_drc')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                                            <div class="form-group">
                                                <label class="form-label" for="cdbs_fee_theoretical">CDBS FEE
                                                    THEORETHICAL</label>
                                                <input type="number" id="cdbs_fee_theoretical"
                                                    name="cdbs_fee_theoretical"
                                                    class="form-control @error('cdbs_fee_theoretical') is-invalid @enderror"
                                                    value="{{ old('cdbs_fee_theoretical', $dsSetting->cdbs_fee_theoretical) }}">
                                                @error('cdbs_fee_theoretical')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                                            <div class="form-group">
                                                <label class="form-label" for="cdbs_fee_practical">CDBS FEE
                                                    PRACTICAL</label>
                                                <input type="number" id="cdbs_fee_practical" name="cdbs_fee_practical"
                                                    class="form-control @error('cdbs_fee_practical') is-invalid @enderror"
                                                    value="{{ old('cdbs_fee_practical', $dsSetting->cdbs_fee_practical) }}">
                                                @error('cdbs_fee_practical')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                                            <div class="form-group">
                                                <label class="form-label" for="cdbs_fee_dep_cde">CDBS FEE DEP CDE</label>
                                                <input type="number" id="cdbs_fee_dep_cde" name="cdbs_fee_dep_cde"
                                                    class="form-control @error('cdbs_fee_dep_cde') is-invalid @enderror"
                                                    value="{{ old('cdbs_fee_dep_cde', $dsSetting->cdbs_fee_dep_cde) }}">
                                                @error('cdbs_fee_dep_cde')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                                            <div class="form-group">
                                                <label class="form-label" for="cdbs_fee_dep_drc">CDBS FEE DEP DRC</label>
                                                <input type="number" id="cdbs_fee_dep_drc" name="cdbs_fee_dep_drc"
                                                    class="form-control @error('cdbs_fee_dep_drc') is-invalid @enderror"
                                                    value="{{ old('cdbs_fee_dep_drc', $dsSetting->cdbs_fee_dep_drc) }}">
                                                @error('cdbs_fee_dep_drc')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                                            <div class="form-group">
                                                <label class="form-label" for="it_fee_theoretical">IT FEE
                                                    THEORETHICAL</label>
                                                <input type="number" id="it_fee_theoretical" name="it_fee_theoretical"
                                                    class="form-control @error('it_fee_theoretical') is-invalid @enderror"
                                                    value="{{ old('it_fee_theoretical', $dsSetting->it_fee_theoretical) }}">
                                                @error('it_fee_theoretical')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                                            <div class="form-group">
                                                <label class="form-label" for="it_fee_practical">IT FEE PRACTICAL</label>
                                                <input type="number" id="it_fee_practical" name="it_fee_practical"
                                                    class="form-control @error('it_fee_practical') is-invalid @enderror"
                                                    value="{{ old('it_fee_practical', $dsSetting->it_fee_practical) }}">
                                                @error('it_fee_practical')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                                            <div class="form-group">
                                                <label class="form-label" for="it_fee_dep_cde">IT FEE DEP CDE</label>
                                                <input type="number" id="it_fee_dep_cde" name="it_fee_dep_cde"
                                                    class="form-control @error('it_fee_dep_cde') is-invalid @enderror"
                                                    value="{{ old('it_fee_dep_cde', $dsSetting->it_fee_dep_cde) }}">
                                                @error('it_fee_dep_cde')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                                            <div class="form-group">
                                                <label class="form-label" for="it_fee_dep_drc">IT FEE DEP DRC</label>
                                                <input type="number" id="it_fee_dep_drc" name="it_fee_dep_drc"
                                                    class="form-control @error('it_fee_dep_drc') is-invalid @enderror"
                                                    value="{{ old('it_fee_dep_drc', $dsSetting->it_fee_dep_drc) }}">
                                                @error('it_fee_dep_drc')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                                            <div class="form-group">
                                                <label class="form-label" for="others_fee_theoretical">OTHERS FEE
                                                    THEORETICAL</label>
                                                <input type="number" id="others_fee_theoretical"
                                                    name="others_fee_theoretical"
                                                    class="form-control @error('others_fee_theoretical') is-invalid @enderror"
                                                    value="{{ old('others_fee_theoretical', $dsSetting->others_fee_theoretical) }}">
                                                @error('others_fee_theoretical')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                                            <div class="form-group">
                                                <label class="form-label" for="others_fee_practical">OTHERS FEE
                                                    PRACTICAL</label>
                                                <input type="number" id="others_fee_practical"
                                                    name="others_fee_practical"
                                                    class="form-control @error('others_fee_practical') is-invalid @enderror"
                                                    value="{{ old('others_fee_practical', $dsSetting->others_fee_practical) }}">
                                                @error('others_fee_practical')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                                            <div class="form-group">
                                                <label class="form-label" for="others_fee_dep_cde">OTHER FEE DEP
                                                    CDE</label>
                                                <input type="number" id="others_fee_dep_cde" name="others_fee_dep_cde"
                                                    class="form-control @error('others_fee_dep_cde') is-invalid @enderror"
                                                    value="{{ old('others_fee_dep_cde', $dsSetting->others_fee_dep_cde) }}">
                                                @error('others_fee_dep_cde')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                                            <div class="form-group">
                                                <label class="form-label" for="others_fee_dep_drc">OTHERS FEE DEP
                                                    DRC</label>
                                                <input type="number" id="others_fee_dep_drc" name="others_fee_dep_drc"
                                                    class="form-control @error('others_fee_dep_drc') is-invalid @enderror"
                                                    value="{{ old('others_fee_dep_drc', $dsSetting->others_fee_dep_drc) }}">
                                                @error('others_fee_dep_drc')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                                            <div class="form-group">
                                                <label class="form-label" for="mc_daily_upload_limit">MC DAILY UPLOAD
                                                    LIMITS</label>
                                                <input type="number" id="mc_daily_upload_limit"
                                                    name="mc_daily_upload_limit"
                                                    class="form-control @error('mc_daily_upload_limit') is-invalid @enderror"
                                                    value="{{ old('mc_daily_upload_limit', $dsSetting->mc_daily_upload_limit) }}">
                                                @error('mc_daily_upload_limit')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                                            <div class="form-group">
                                                <label class="form-label" for="lv_daily_upload_limit">LV DAILY UPLOAD
                                                    LIMIT</label>
                                                <input type="number" id="lv_daily_upload_limit"
                                                    name="lv_daily_upload_limit"
                                                    class="form-control @error('lv_daily_upload_limit') is-invalid @enderror"
                                                    value="{{ old('lv_daily_upload_limit', $dsSetting->lv_daily_upload_limit) }}">
                                                @error('lv_daily_upload_limit')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                                            <div class="form-group">
                                                <label class="form-label" for="weekly_upload_limit">WEEKLY UPLOAD
                                                    LIMIT</label>
                                                <input type="number" id="weekly_upload_limit" name="weekly_upload_limit"
                                                    class="form-control @error('weekly_upload_limit') is-invalid @enderror"
                                                    value="{{ old('weekly_upload_limit', $dsSetting->weekly_upload_limit) }}">
                                                @error('weekly_upload_limit')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                                            <div class="form-group">
                                                <label class="form-label" for="seating_capacity">SEATING CAPACITY</label>
                                                <input type="number" id="seating_capacity" name="seating_capacity"
                                                    class="form-control @error('seating_capacity') is-invalid @enderror"
                                                    value="{{ old('seating_capacity', $dsSetting->seating_capacity) }}">
                                                @error('seating_capacity')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                                            <div class="form-group">
                                                <label class="form-label" for="accredited_classroom_count">ACCREDITATED
                                                    CLASSROOM
                                                    COUNT</label>
                                                <input type="number" id="accredited_classroom_count"
                                                    name="accredited_classroom_count"
                                                    class="form-control @error('accredited_classroom_count') is-invalid @enderror"
                                                    value="{{ old('accredited_classroom_count', $dsSetting->accredited_classroom_count) }}">
                                                @error('accredited_classroom_count')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                                            <div class="form-group">
                                                <label class="form-label"
                                                    for="percentage_allowable_seating_capacity">PERCENTAGE ALLOWABLE
                                                    SEATING CAPACITY</label>
                                                <input type="number" id="percentage_allowable_seating_capacity"
                                                    name="percentage_allowable_seating_capacity"
                                                    class="form-control @error('percentage_allowable_seating_capacity') is-invalid @enderror"
                                                    value="{{ old('percentage_allowable_seating_capacity', $dsSetting->percentage_allowable_seating_capacity) }}">
                                                @error('percentage_allowable_seating_capacity')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                                            <div class="form-group">
                                                <label class="form-label"
                                                    for="number_unique_classes_per_days_per_tdc">NUMBER OF UNIQUE
                                                    CLASSES PER DAYS PER TDC</label>
                                                <input type="number" id="number_unique_classes_per_days_per_tdc"
                                                    name="number_unique_classes_per_days_per_tdc"
                                                    class="form-control @error('number_unique_classes_per_days_per_tdc') is-invalid @enderror"
                                                    value="{{ old('number_unique_classes_per_days_per_tdc', $dsSetting->number_unique_classes_per_days_per_tdc) }}">
                                                @error('number_unique_classes_per_days_per_tdc')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                                            <div class="form-group">
                                                <label class="form-label"
                                                    for="number_unique_classes_per_days_per_dep">NUMBER OF UNIQUE
                                                    CLASSES PER DAYS PER DEP</label>
                                                <input type="number" id="number_unique_classes_per_days_per_dep"
                                                    name="number_unique_classes_per_days_per_dep"
                                                    class="form-control @error('number_unique_classes_per_days_per_dep') is-invalid @enderror"
                                                    value="{{ old('number_unique_classes_per_days_per_dep', $dsSetting->number_unique_classes_per_days_per_dep) }}">
                                                @error('number_unique_classes_per_days_per_dep')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                                            <div class="form-group">
                                                <label class="form-label"
                                                    for="number_prescribed_days_per_instruction">NUMBER OF
                                                    PRESCRIBED DAYS PER INSTRUCTION</label>
                                                <input type="number" id="number_prescribed_days_per_instruction"
                                                    name="number_prescribed_days_per_instruction"
                                                    class="form-control @error('number_prescribed_days_per_instruction') is-invalid @enderror"
                                                    value="{{ old('number_prescribed_days_per_instruction', $dsSetting->number_prescribed_days_per_instruction) }}">
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

                            <p class="fw-semibold mb-2">Driver School Details</p>
                            <ul class="list-unstyled">
                                <li>Driving School Code</li>
                                <li>Driving School Name</li>
                                <li>Driving School Contact Number</li>
                                <li>Business Type</li>
                                <li>Description</li>
                                <li>Address</li>
                                <li>DTI Accreditation Number</li>
                                <li>LTO Accreditation Number</li>
                                <li>Date Accredited</li>
                                <li>Date Accreditation Renewal</li>
                            </ul>
                            <hr>
                            <p class="fw-semibold mb-2">Fees</p>
                            <ul class="list-unstyled">
                                <li>Theoretical Fee</li>
                                <li>Practical Fee</li>
                                <li>DS FEE DEP CDE</li>
                                <li>DS FEE DEP DRC</li>
                            </ul>
                            <hr>
                            <p class="fw-semibold mb-2">IT</p>
                            <ul class="list-unstyled">
                                <li>Server Location</li>
                                <li>Live Status</li>
                                <li>With Pos Status</li>
                                <li>Date IT Started</li>
                                <li>Date IT Renewal</li>
                                <li>Date IT Authorization Renewal</li>
                            </ul>
                            <hr>
                            <p class="fw-semibold mb-2">Social Links</p>
                            <ul class="list-unstyled">
                                <li>https://twitter.com/abc</li>
                                <li>https://facebook.com/abc</li>
                                <li>https://plus.google.com/abc</li>
                                <li>https://linkedin.com/abc</li>
                            </ul>
                            <div class="col-12 d-flex justify-content-between">
                                <button type="button" class="btn btn-label-secondary btn-prev"> <i
                                        class="ti ti-arrow-left me-sm-1"></i>
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
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/form-wizard-icons.js') }}"></script>
    <script src="{{ asset('js/form.js') }}"></script>
    <script>
        function uploadFile() {
            const form = document.getElementById('uploadForm');
            const formData = new FormData(form);

            fetch('{{ route('submitDS') }}', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        return response.text().then(text => {
                            throw new Error(text);
                        });
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        alert('Form submitted successfully');
                        window.location.href = '{{ url('/') }}'; // Redirect to homepage
                    } else {
                        alert('Submission failed: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred: ' + error.message);
                });

            console.log(response.json());

        }
    </script>
@endsection