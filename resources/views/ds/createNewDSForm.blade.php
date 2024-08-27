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
    <script src="{{ asset('assets/js/form-wizard-numbered.js') }}"></script>
    <script src="{{ asset('js/form.js') }}"></script>
@endsection

@section('content')
    <div class="col-12 mb-4">
        <small class="text-light fw-semibold">Validation</small>
        <div id="wizard-validation" class="bs-stepper mt-2">
            <div class="bs-stepper-header">
                <div class="step" data-target="#ds-details-validation">
                    <button type="button" class="step-trigger">
                        <span class="bs-stepper-circle">1</span>
                        <span class="bs-stepper-label mt-1">
                            <span class="bs-stepper-title">Driving School Details</span>
                            <span class="bs-stepper-subtitle">Setup Driving School Details</span>
                        </span>
                    </button>
                </div>
                <div class="line">
                    <i class="ti ti-chevron-right"></i>
                </div>
                <div class="step" data-target="#fees-validation">
                    <button type="button" class="step-trigger">
                        <span class="bs-stepper-circle">2</span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-title">Fees</span>
                            <span class="bs-stepper-subtitle">Setup Fees</span>
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
                            <span class="bs-stepper-title">IT Config</span>
                            <span class="bs-stepper-subtitle">Setup IT Configs</span>
                        </span>
                    </button>
                </div>
                <div class="line">
                    <i class="ti ti-chevron-right"></i>
                </div>
                <div class="step" data-target="#social-links-validation">
                    <button type="button" class="step-trigger">
                        <span class="bs-stepper-circle">4</span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-title">Images</span>
                            <span class="bs-stepper-subtitle">Upload Images</span>
                        </span>
                    </button>
                </div>
                <div class="line">
                    <i class="ti ti-chevron-right"></i>
                </div>
                <div class="step" data-target="#social-links-validation">
                    <button type="button" class="step-trigger">
                        <span class="bs-stepper-circle">5</span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-title">Settings</span>
                            <span class="bs-stepper-subtitle">Configure Settings</span>
                        </span>
                    </button>
                </div>
                <div class="line">
                    <i class="ti ti-chevron-right"></i>
                </div>
                <div class="step" data-target="#social-links-validation">
                    <button type="button" class="step-trigger">
                        <span class="bs-stepper-circle">6</span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-title">Complete Form</span>
                            <span class="bs-stepper-subtitle">Confirmation</span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="bs-stepper-content">
                <form id="wizard-validation-form" onSubmit="return false">
                    <!-- Driving School Details -->
                    <div id="ds-details-validation" class="content">
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label class="form-label" for="ds_name">DRIVING SCHOOL NAME</label>
                                <input name="ds_name" type="text" id="ds_name"
                                    class="form-control @error('ds_name') is-invalid @enderror"
                                    placeholder="DRIVING SCHOOL NAME" />
                                @error('ds_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="ds_contact_no">DRIVING SCHOOL CONTACT NUMBER</label>
                                <input type="text" id="ds_contact_no" name="ds_contact_no"
                                    class="form-control phone-mask @error('ds_contact_no') is-invalid @enderror"
                                    placeholder="DRIVING SCHOOL CONTACT NUMBER" />
                                @error('ds_contact_no')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="business_type">BUSINESS TYPE</label>
                                <input type="text" class="form-control @error('business_type') is-invalid @enderror"
                                    id="business_type" name="business_type" placeholder="BUSINESS TYPE" />
                                @error('business_type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="ds_code">DRIVING SCHOOL CODE</label>
                                <input type="text" id="ds_code"
                                    class="form-control @error('ds_code') is-invalid @enderror"
                                    placeholder="DRIVING SCHOOL CODE" name="ds_code" />
                                @error('ds_code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 col-md-6 col-xl-4 mb-3">

                                <label class="form-label" for="dti_accreditation_no">DTI ACCREDITATION
                                    NUMBER</label>
                                <input type="number" id="dti_accreditation_no" name="dti_accreditation_no"
                                    class="form-control @error('dti_accreditation_no') is-invalid @enderror"
                                    placeholder="DTI ACCREDITATION NUMBER">
                                @error('dti_accreditation_no')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 col-md-6 col-xl-4 mb-3">

                                <label class="form-label" for="lto_accreditation_no">LTO ACCREDITATION
                                    NUMBER</label>
                                <input type="number" id="lto_accreditation_no" name="lto_accreditation_no"
                                    class="form-control @error('lto_accreditation_no') is-invalid @enderror"
                                    placeholder="LTO ACCREDITATION NUMBER">
                                @error('lto_accreditation_no')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 col-md-6 col-xl-12 mb-3 form-password-toggle">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label class="form-label" for="description">DESCRIPTION</label>
                                        <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror"
                                            placeholder="DESCRIPTION"></textarea>
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
                                        class="form-control @error('town_city') is-invalid @enderror"
                                        placeholder="TOWN/CITY">
                                    @error('town_city')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 col-md-6 col-xl-4 mb-3">
                                <div class="form-group">
                                    <label class="form-label" for="region">REGION</label>
                                    <input type="text" id="region" name="region"
                                        class="form-control @error('region') is-invalid @enderror" placeholder="REGION">
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
                                        placeholder="PROVINCE">
                                    @error('province')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-between">
                                <button class="btn btn-label-secondary btn-prev" disabled> <i
                                        class="ti ti-arrow-left me-sm-1 me-0"></i>
                                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                </button>
                                <button class="btn btn-primary btn-next"> <span
                                        class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i
                                        class="ti ti-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>
                    <!-- Personal Info -->
                    <div id="fees-validation" class="content">
                        <div class="content-header mb-3">
                            <h6 class="mb-0">Personal Info</h6>
                            <small>Enter Your Personal Info.</small>
                        </div>
                        <div class="row g-3">
                            <div class="col-12 col-md-6 col-xl-3 mb-3">
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
                            <div class="col-12 col-md-6 col-xl-3 mb-3">
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
                            <div class="col-12 col-md-6 col-xl-3 mb-3">
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
                            <div class="col-12 col-md-6 col-xl-3 mb-3">
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
                            <div class="col-12 col-md-6 col-xl-3 mb-3">
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

                            <div class="col-12 col-md-6 col-xl-3 mb-3">
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

                            <div class="col-12 col-md-6 col-xl-3 mb-3">
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
                            <div class="col-12 col-md-6 col-xl-3 mb-3">
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
                            <div class="col-12 col-md-6 col-xl-3 mb-3">
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
                            <div class="col-12 col-md-6 col-xl-3 mb-3">
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
                            <div class="col-12 col-md-6 col-xl-3 mb-3">
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
                            <div class="col-12 col-md-6 col-xl-3 mb-3">
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

                            <div class="col-12 col-md-6 col-xl-3 mb-3">
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

                            <div class="col-12 col-md-6 col-xl-3 mb-3">
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

                            <div class="col-12 col-md-6 col-xl-3 mb-3">
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
                            <div class="col-12 col-md-6 col-xl-3 mb-3">
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
                            <div class="col-12 col-md-6 col-xl-3 mb-3">
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
                            <div class="col-12 col-md-6 col-xl-3 mb-3">
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
                            <div class="col-12 col-md-6 col-xl-3 mb-3">
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
                            <div class="col-12 col-md-6 col-xl-3 mb-3">
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
                                <button class="btn btn-label-secondary btn-prev"> <i
                                        class="ti ti-arrow-left me-sm-1 me-0"></i>
                                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                </button>
                                <button class="btn btn-primary btn-next"> <span
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
                            <div class="col-12 col-md-6 col-xl-3 mb-3">
                                <div class="form-group">
                                    <label class="form-label" for="is_active">ACTIVITY STATUS</label>

                                    @php
                                        $oldVal = $selectedDs->ds_code ?? 'Active' || 'Inactive';
                                    @endphp
                                    <select id="is_active" class="select2 form-select form-select-lg" name="is_active"
                                        data-allow-clear="true">
                                        <option value="0">Inactive</option>
                                        <option value="1">Active</option>
                                    </select>

                                    @error('is_active')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
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
                            <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                                <div class="form-group">
                                    <label class="form-label" for="is_live">LIVE STATUS</label>

                                    @php
                                        $oldVal = $selectedDs->ds_code ?? 'Live' || 'Not Live';
                                    @endphp
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
                            <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                                <div class="form-group">
                                    <label class="form-label" for="is_with_pos">WITH POS STATUS</label>

                                    @php
                                        $oldVal = $selectedDs->ds_code ?? 'With Pos' || 'Not With Pos';
                                    @endphp
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
                            <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
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
                            <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
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
                            <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
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
                            <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
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
                            <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
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
                                <button class="btn btn-label-secondary btn-prev"> <i
                                        class="ti ti-arrow-left me-sm-1 me-0"></i>
                                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                </button>
                                <button class="btn btn-success btn-next btn-submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
