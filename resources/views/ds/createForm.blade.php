@php
    $configData = Helper::appClasses();
@endphp


@extends('layouts/layoutMaster')
@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/jquery-timepicker/jquery-timepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/pickr/pickr-themes.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/dropzone/dropzone.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/dropzone/dropzone.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/jquery-timepicker/jquery-timepicker.js') }}"></script>

@endsection

@section('page-script')
    <script src="{{ asset('assets/js/forms-file-upload.js') }}"></script>
    <script src="{{ asset('assets/js/forms-selects.js') }}"></script>
    <script src="{{ asset('assets/js/forms-pickers.js') }}"></script>
@endsection
@section('title', 'DS List')




@section('content')

    {{-- DS FORM --}}



    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Driving School Info</h5> <small class="text-muted float-end">Default
                        label</small>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('submitDS') }}">
                        @csrf

                        <div class="row">
                            <div class="col-12 col-md-6 col-xl-3 mb-3">
                                <div class="form-group">
                                    <label class="form-label" for="ds_code">Driving School Code</label>
                                    <input type="text" id="ds_code"
                                        class="form-control @error('ds_code') is-invalid @enderror" placeholder="DS Code"
                                        name="ds_code" />
                                    @error('ds_code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-12 col-md-6 col-xl-3 mb-3">
                                <div class="form-group">
                                    <label class="form-label" for="ds_name">Driving School Name</label>
                                    <input name="ds_name" type="text" id="ds_name"
                                        class="form-control @error('ds_name') is-invalid @enderror"
                                        placeholder="School Name" />
                                    @error('ds_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-xl-3 mb-3">
                                <div class="form-group">
                                    <label class="form-label" for="ds_contact_no">Driving School Phone
                                        Number</label>
                                    <input type="text" id="ds_contact_no" name="ds_contact_no"
                                        class="form-control phone-mask @error('ds_contact_no') is-invalid @enderror"
                                        placeholder="Contact No." />
                                    @error('ds_contact_no')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 col-md-6 col-xl-3 mb-3">
                                <div class="form-group">
                                    <label class="form-label" for="business_type">Business Type</label>
                                    <input type="text" class="form-control @error('business_type') is-invalid @enderror"
                                        id="business_type" name="business_type" placeholder="Business Type" />
                                    @error('business_type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-xl-7 mb-3">
                                <div class="form-group">
                                    <label class="form-label" for="description">Description</label>
                                    <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror"
                                        placeholder="Description"></textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6 col-md-12 col-xl-5 mb-3">
                                <div class="form-group">
                                    <label class="form-label" for="ds_address">Driving School Address</label>
                                    <input id="ds_address" name="ds_address"
                                        class="form-control @error('ds_address') is-invalid @enderror"
                                        placeholder="Address">
                                    @error('ds_address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>



                            <div class="col-12 col-md-6 col-xl-3 mb-3">
                                <div class="form-group">
                                    <label class="form-label" for="dti_accreditation_no">DTI Accreditation
                                        Number</label>
                                    <input type="text" id="dti_accreditation_no" name="dti_accreditation_no"
                                        class="form-control @error('dti_accreditation_no') is-invalid @enderror">
                                    @error('dti_accreditation_no')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-xl-3 mb-3">
                                <div class="form-group">
                                    <label class="form-label" for="lto_accreditation_no">LTO Accreditation
                                        Number</label>
                                    <input type="text" id="lto_accreditation_no" name="lto_accreditation_no"
                                        class="form-control @error('lto_accreditation_no') is-invalid @enderror">
                                    @error('lto_accreditation_no')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-xl-3 mb-3">
                                <div class="form-group">
                                    <label class="form-label" for="date_it_started">Date It Started</label>
                                    <input type="date" name="date_it_started"
                                        class="form-control @error('date_it_started') is-invalid @enderror"
                                        placeholder="YYYY-MM-DD" id="flatpickr-date">

                                    @error('date_it_started')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                </div>
                            </div>


                            <div class="col-12 col-md-6 col-xl-3 mb-3">
                                <div class="form-group">
                                    <label class="form-label" for="date_it_accredited">Date Accredited</label>
                                    <input type="date" id="flatpickr-date" name="date_it_accredited"
                                        class="form-control @error('date_it_accredited') is-invalid @enderror">
                                    @error('date_it_accredited')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-xl-3 mb-3">
                                <div class="form-group">
                                    <label class="form-label" for="date_it_renewal">Date It Renewal</label>
                                    <input type="text" id="flatpickr-date" name="date_it_renewal"
                                        class="form-control @error('date_it_renewal') is-invalid @enderror">
                                    @error('date_it_renewal')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-xl-3 mb-3">
                                <div class="form-group">
                                    <label class="form-label" for="is_active">Is Active</label>

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

                            <div class="col-12 col-md-6 col-xl-3 mb-3">
                                <div class="form-group">
                                    <label class="form-label" for="province">Province</label>
                                    <input type="text" id="province" name="province"
                                        class="form-control @error('province') is-invalid @enderror">
                                    @error('province')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-xl-3 mb-3">
                                <div class="form-group">
                                    <label class="form-label" for="region">Region</label>
                                    <input type="text" id="region" name="region"
                                        class="form-control @error('region') is-invalid @enderror">
                                    @error('region')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-xl-3 mb-3">
                                <div class="form-group">
                                    <label class="form-label" for="town_city">Town/City</label>
                                    <input type="text" id="town_city" name="town_city"
                                        class="form-control @error('town_city') is-invalid @enderror">
                                    @error('town_city')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-xl-3 mb-3">
                                <div class="form-group">
                                    <label class="form-label" for="ds_fee_theoretical">Theoretical Fee</label>
                                    <input type="number" id="ds_fee_theoretical" name="ds_fee_theoretical"
                                        class="form-control @error('ds_fee_theoretical') is-invalid @enderror">
                                    @error('ds_fee_theoretical')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-xl-3 mb-3">
                                <div class="form-group">
                                    <label class="form-label" for="ds_fee_practical">Practical Fee</label>
                                    <input type="number" id="ds_fee_practical" name="ds_fee_practical"
                                        class="form-control @error('ds_fee_practical') is-invalid @enderror">
                                    @error('ds_fee_practical')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-xl-3 mb-3">
                                <div class="form-group">
                                    <label class="form-label" for="ds_fee_dep_cde">DS Fee DEP CDE</label>
                                    <input type="number" id="ds_fee_dep_cde" name="ds_fee_dep_cde"
                                        class="form-control @error('ds_fee_dep_cde') is-invalid @enderror">
                                    @error('ds_fee_dep_cde')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-xl-3 mb-3">
                                <div class="form-group">
                                    <label class="form-label" for="ds_fee_dep_drc">DS Fee DEP DRC</label>
                                    <input type="number" id="ds_fee_dep_drc" name="ds_fee_dep_drc"
                                        class="form-control @error('ds_fee_dep_drc') is-invalid @enderror">
                                    @error('ds_fee_dep_drc')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-xl-3 mb-3">
                                <div class="form-group">
                                    <label class="form-label" for="server_location">SERVER LOCATION</label>
                                    <input type="text" id="server_location" name="server_location"
                                        class="form-control @error('server_location') is-invalid @enderror">
                                    @error('server_location')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-xl-3 mb-3">
                                <div class="form-group">
                                    <label class="form-label" for="is_live">Is Live</label>

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
                            <div class="col-12 col-md-6 col-xl-3 mb-3">
                                <div class="form-group">
                                    <label class="form-label" for="is_with_pos">Is With Pos</label>

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
                            <div class="col-12 col-md-6 col-xl-3 mb-3">
                                <div class="form-group">
                                    <label class="form-label" for="date_it_accreditation_renewal">Date IT
                                        Accreditation
                                        Renewal</label>
                                    <input type="text" id="flatpickr-date" name="date_it_accreditation_renewal"
                                        class="form-control @error('date_it_accreditation_renewal') is-invalid @enderror">
                                    @error('date_it_accreditation_renewal')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-xl-3 mb-3">
                                <div class="form-group">
                                    <label class="form-label" for="date_it_authorization_renewal">Date IT
                                        Authorization
                                        Renewal</label>
                                    <input type="text" id="flatpickr-date" name="date_it_authorization_renewal"
                                        class="form-control @error('date_it_authorization_renewal') is-invalid @enderror">
                                    @error('date_it_authorization_renewal')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-12 col-lg-6 mb-3">

                                    <div class="">
                                        <label class="form-label" for="logo_big">Logo Big</label>
                                        <div class="me-2 mb2">
                                            <input name="file" type="file" name="logo_big" id="logo_big"
                                                class="form-control" />
                                        </div>
                                    </div>
                                    <div class="">
                                        <label class="form-label" for="logo_small">Logo Small</label>
                                        <div class="me-2 mb2">
                                            <input name="file" type="file" name="logo_small" id="logo_small"
                                                class="form-control" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-12 col-lg-6 mb-3">

                                    <div class="">
                                        <label class="form-label">DS Pictures</label>
                                        <div class="d-flex flex-wrap">
                                            <div class="me-2 mb-2">
                                                <input type="file" name="ds_pic1" id="ds_pic1"
                                                    class="form-control" />
                                            </div>
                                            <div class="me-2 mb-2">
                                                <input type="file" name="ds_pic2" id="ds_pic2"
                                                    class="form-control" />
                                            </div>
                                            <div class="me-2 mb-2">
                                                <input type="file" name="ds_pic3" id="ds_pic3"
                                                    class="form-control" />
                                            </div>
                                            <div class="me-2 mb-2">
                                                <input type="file" name="ds_pic4" id="ds_pic4"
                                                    class="form-control" />
                                            </div>
                                            <div class="me-2 mb-2">
                                                <input type="file" name="ds_pic5" id="ds_pic5"
                                                    class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>



    {{-- SETTINGS FORM --}}
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Settings</h5> <small class="text-muted float-end">Default
                        label</small>
                </div>
                <div class="card-body">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="validity_theoretical">Validity Theoretical</label>
                                <input type="number" id="validity_theoretical"
                                    class="form-control @error('validity_theoretical') is-invalid @enderror"
                                    placeholder="DS Code" name="validity_theoretical" />
                                @error('validity_theoretical')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="validity_practical">Validity Practical</label>
                                <input name="validity_practical" type="number" id="validity_practical"
                                    class="form-control @error('validity_practical') is-invalid @enderror"
                                    placeholder="School Name" />
                                @error('validity_practical')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="validity_dep_cde">Validity Dep Code
                                    Number</label>
                                <input type="number" id="validity_dep_cde" name="validity_dep_cde"
                                    class="form-control phone-mask @error('validity_dep_cde') is-invalid @enderror"
                                    placeholder="Contact No." />
                                @error('validity_dep_cde')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="validity_dep_drc">Validity Dep DRC</label>
                                <input type="number"
                                    class="form-control @error('validity_dep_drc') is-invalid @enderror"
                                    id="validity_dep_drc" name="validity_dep_drc" placeholder="Business Type" />
                                @error('validity_dep_drc')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="lto_fee_theoretical">LTO Fee Theoretical</label>
                                <input id="lto_fee_theoretical" name="lto_fee_theoretical" type="number"
                                    class="form-control @error('lto_fee_theoretical') is-invalid @enderror"
                                    placeholder="Address">
                                @error('lto_fee_theoretical')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="lto_fee_practical">lto_fee_practical</label>
                                <input id="lto_fee_practical" name="lto_fee_practical"
                                    class="form-control @error('lto_fee_practical') is-invalid @enderror"
                                    placeholder="lto_fee_practical">
                                @error('lto_fee_practical')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="lto_fee_dep_cde">LTO Fee Dep Cde
                                    Number</label>
                                <input type="number" id="lto_fee_dep_cde" name="lto_fee_dep_cde"
                                    class="form-control @error('lto_fee_dep_cde') is-invalid @enderror">
                                @error('lto_fee_dep_cde')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="lto_fee_dep_drc">LTO Fee DEP DRC</label>
                                <input type="number" id="lto_fee_dep_drc" name="lto_fee_dep_drc"
                                    class="form-control @error('lto_fee_dep_drc') is-invalid @enderror">
                                @error('lto_fee_dep_drc')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="cdbs_fee_theoretical">CDBS FEE THEORITICAL</label>
                                <input type="number" id="cdbs_fee_theoretical" name="cdbs_fee_theoretical"
                                    class="form-control @error('cdbs_fee_theoretical') is-invalid @enderror">
                                @error('cdbs_fee_theoretical')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="cdbs_fee_practical">CDBS FEE PRACTICAL</label>
                                <input type="number" id="cdbs_fee_practical" name="cdbs_fee_practical"
                                    class="form-control @error('cdbs_fee_practical') is-invalid @enderror">
                                @error('cdbs_fee_practical')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="cdbs_fee_dep_cde">CDBS FEE DEP CDE</label>
                                <input type="number" id="cdbs_fee_dep_cde" name="cdbs_fee_dep_cde"
                                    class="form-control @error('cdbs_fee_dep_cde') is-invalid @enderror">
                                @error('cdbs_fee_dep_cde')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="cdbs_fee_dep_drc">CDBS FEE DEP DRC</label>
                                <input type="number" id="cdbs_fee_dep_drc" name="cdbs_fee_dep_drc"
                                    class="form-control @error('cdbs_fee_dep_drc') is-invalid @enderror">
                                @error('cdbs_fee_dep_drc')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="it_fee_theoretical">IT FEE THEORETICAL</label>
                                <input type="number" id="it_fee_theoretical" name="it_fee_theoretical"
                                    class="form-control @error('it_fee_theoretical') is-invalid @enderror">
                                @error('it_fee_theoretical')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="it_fee_practical">IT FEE PRACTICAL</label>
                                <input type="number" id="it_fee_practical" name="it_fee_practical"
                                    class="form-control @error('it_fee_practical') is-invalid @enderror">
                                @error('it_fee_practical')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="it_fee_dep_cde">IT FEE DEP CDE</label>
                                <input type="number" id="it_fee_dep_cde" name="it_fee_dep_cde"
                                    class="form-control @error('it_fee_dep_cde') is-invalid @enderror">
                                @error('it_fee_dep_cde')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="it_fee_dep_drc">IT FEE DEP DRC</label>
                                <input type="number" id="it_fee_dep_drc" name="it_fee_dep_drc"
                                    class="form-control @error('it_fee_dep_drc') is-invalid @enderror">
                                @error('it_fee_dep_drc')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="others_fee_theoretical">OTHERS FEE THEORETICAL</label>
                                <input type="number" id="others_fee_theoretical" name="others_fee_theoretical"
                                    class="form-control @error('others_fee_theoretical') is-invalid @enderror">
                                @error('others_fee_theoretical')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="others_fee_practical">OTHERS FEE </label>
                                <input type="number" id="others_fee_practical" name="others_fee_practical"
                                    class="form-control @error('others_fee_practical') is-invalid @enderror">
                                @error('others_fee_practical')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="others_fee_dep_cde">others_fee_dep_cde</label>
                                <input type="number" id="others_fee_dep_cde" name="others_fee_dep_cde"
                                    class="form-control @error('others_fee_dep_cde') is-invalid @enderror">
                                @error('others_fee_dep_cde')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="others_fee_dep_drc">others_fee_dep_drc</label>
                                <input type="number" id="others_fee_dep_drc" name="others_fee_dep_drc"
                                    class="form-control @error('others_fee_dep_drc') is-invalid @enderror">
                                @error('others_fee_dep_drc')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="mc_daily_upload_limit">mc_daily_upload_limit</label>
                                <input type="number" id="mc_daily_upload_limit" name="mc_daily_upload_limit"
                                    class="form-control @error('mc_daily_upload_limit') is-invalid @enderror">
                                @error('mc_daily_upload_limit')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="lv_daily_upload_limit">lv_daily_upload_limit</label>
                                <input type="number" id="lv_daily_upload_limit" name="lv_daily_upload_limit"
                                    class="form-control @error('lv_daily_upload_limit') is-invalid @enderror">
                                @error('lv_daily_upload_limit')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="weekly_upload_limit">weekly_upload_limit</label>
                                <input type="number" id="weekly_upload_limit" name="weekly_upload_limit"
                                    class="form-control @error('weekly_upload_limit') is-invalid @enderror">
                                @error('weekly_upload_limit')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="seating_capacity">seating_capacity</label>
                                <input type="number" id="seating_capacity" name="seating_capacity"
                                    class="form-control @error('seating_capacity') is-invalid @enderror">
                                @error('seating_capacity')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                            <div class="form-group">
                                <label class="form-label"
                                    for="accredited_classroom_count">accredited_classroom_count</label>
                                <input type="number" id="accredited_classroom_count" name="accredited_classroom_count"
                                    class="form-control @error('accredited_classroom_count') is-invalid @enderror">
                                @error('accredited_classroom_count')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                            <div class="form-group">
                                <label class="form-label"
                                    for="percentage_allowable_seating_capacity">percentage_allowable_seating_capacity</label>
                                <input type="number" id="percentage_allowable_seating_capacity"
                                    name="percentage_allowable_seating_capacity"
                                    class="form-control @error('percentage_allowable_seating_capacity') is-invalid @enderror">
                                @error('percentage_allowable_seating_capacity')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                            <div class="form-group">
                                <label class="form-label"
                                    for="number_unique_classes_per_days_per_tdc">number_unique_classes_per_days_per_tdc</label>
                                <input type="number" id="number_unique_classes_per_days_per_tdc"
                                    name="number_unique_classes_per_days_per_tdc"
                                    class="form-control @error('number_unique_classes_per_days_per_tdc') is-invalid @enderror">
                                @error('number_unique_classes_per_days_per_tdc')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                            <div class="form-group">
                                <label class="form-label"
                                    for="number_unique_classes_per_days_per_dep">number_unique_classes_per_days_per_dep</label>
                                <input type="number" id="number_unique_classes_per_days_per_dep"
                                    name="number_unique_classes_per_days_per_dep"
                                    class="form-control @error('number_unique_classes_per_days_per_dep') is-invalid @enderror">
                                @error('number_unique_classes_per_days_per_dep')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                            <div class="form-group">
                                <label class="form-label"
                                    for="number_prescribed_days_per_instruction">number_prescribed_days_per_instruction</label>
                                <input type="number" id="number_prescribed_days_per_instruction"
                                    name="number_prescribed_days_per_instruction"
                                    class="form-control @error('number_prescribed_days_per_instruction') is-invalid @enderror">
                                @error('number_prescribed_days_per_instruction')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@section('scripts')
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script>
        $(document).ready(function() {
            var basicPickr = $('.flatpickr-basic');

            if (basicPickr.length) {
                basicPickr.flatpickr({
                    dateFormat: 'Y-m-d', // Format the date as you need
                });
            }
        });
    </script>
@endsection

@endsection
