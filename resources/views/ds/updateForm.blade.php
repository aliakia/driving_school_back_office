@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')
@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/dropzone/dropzone.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/dropzone/dropzone.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/forms-file-upload.js') }}"></script>
    <script src="{{ asset('assets/js/forms-selects.js') }}"></script>
@endsection
@section('title', 'DS List')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit Driving School</h5> <small class="text-muted float-end">Default
                        label</small>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('updateDs', [$selectedDs->ds_code]) }}">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-12 col-md-6 col-xl-3 mb-3">
                                <div class="form-group">
                                    <label class="form-label" for="ds_code">Driving School Code</label>
                                    <input type="text" id="ds_code"
                                        class="form-control @error('ds_code') is-invalid @enderror" placeholder="DS Code"
                                        value="{{ old('ds_code', $selectedDs->ds_code) }}" name="ds_code" />
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
                                        placeholder="School Name" value="{{ old('ds_name', $selectedDs->ds_name) }}" />
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
                                        placeholder="Contact No."
                                        value="{{ old('ds_contact_no', $selectedDs->ds_contact_no) }}" />
                                    @error('ds_contact_no')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 col-md-6 col-xl-3 mb-3">
                                <div class="form-group">
                                    <label class="form-label" for="business_type">Business Type</label>
                                    <input type="text" class="form-control @error('business_type') is-invalid @enderror"
                                        id="business_type" name="business_type" placeholder="Business Type"
                                        value="{{ old('business_type', $selectedDs->business_type) }}" />
                                    @error('business_type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6 col-md-12 col-xl-8 mb-3">
                                <div class="form-group">
                                    <label class="form-label" for="ds_address">Driving School Address</label>
                                    <input id="ds_address" name="ds_address"
                                        class="form-control @error('ds_address') is-invalid @enderror" placeholder="Address"
                                        value="{{ old('ds_address', $selectedDs->ds_address) }}">
                                    @error('ds_address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-12 col-md-6 col-xl-4 mb-3">
                                <div class="form-group">
                                    <label class="form-label" for="dti_accreditation_no">DTI Accreditation
                                        Number</label>
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
                                    <label class="form-label" for="lto_accreditation_no">LTO Accreditation
                                        Number</label>
                                    <input type="text" id="lto_accreditation_no" name="lto_accreditation_no"
                                        class="form-control @error('lto_accreditation_no') is-invalid @enderror"
                                        value="{{ old('lto_accreditation_no', $selectedDs->lto_accreditation_no) }}">
                                    @error('lto_accreditation_no')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-xl-3 mb-3">
                                <div class="form-group">
                                    <label class="form-label" for="date_it_started">Date It Started</label>
                                    <input type="text" id="date_it_started" name="date_it_started"
                                        class="form-control @error('date_it_started') is-invalid @enderror"
                                        value="{{ old('date_it_started', $selectedDs->date_it_started) }}">
                                    @error('date_it_started')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 col-md-6 col-xl-3 mb-3">
                                <div class="form-group">
                                    <label class="form-label" for="date_it_accredited">Date Accredited</label>
                                    <input type="text" id="date_it_accredited" name="date_it_accredited"
                                        class="form-control @error('date_it_accredited') is-invalid @enderror"
                                        value="{{ old('date_it_accredited', $selectedDs->date_it_accredited) }}">
                                    @error('date_it_accredited')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-xl-3 mb-3">
                                <div class="form-group">
                                    <label class="form-label" for="date_it_renewal">Date It Renewal</label>
                                    <input type="text" id="date_it_renewal" name="date_it_renewal"
                                        class="form-control @error('date_it_renewal') is-invalid @enderror"
                                        value="{{ old('date_it_renewal', $selectedDs->date_it_renewal) }}">
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
                                        data-allow-clear="true" value="{{ old('is_active', $selectedDs->is_active) }}">
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
                                    <label class="form-label" for="description">Description</label>
                                    <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror"
                                        placeholder="Description">{{ old('description', $selectedDs->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-xl-3 mb-3">
                                <div class="form-group">
                                    <label class="form-label" for="province">Province</label>
                                    <input type="text" id="province" name="province"
                                        class="form-control @error('province') is-invalid @enderror"
                                        value="{{ old('province', $selectedDs->province) }}">
                                    @error('province')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-xl-3 mb-3">
                                <div class="form-group">
                                    <label class="form-label" for="region">Region</label>
                                    <input type="text" id="region" name="region"
                                        class="form-control @error('region') is-invalid @enderror"
                                        value="{{ old('region', $selectedDs->region) }}">
                                    @error('region')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-xl-3 mb-3">
                                <div class="form-group">
                                    <label class="form-label" for="town_city">Town/City</label>
                                    <input type="text" id="town_city" name="town_city"
                                        class="form-control @error('town_city') is-invalid @enderror"
                                        value="{{ old('town_city', $selectedDs->town_city) }}">
                                    @error('town_city')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-xl-3 mb-3">
                                <div class="form-group">
                                    <label class="form-label" for="ds_fee_theoretical">Theoretical Fee</label>
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
                                    <label class="form-label" for="ds_fee_practical">Practical Fee</label>
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
                                    <label class="form-label" for="ds_fee_dep_cde">ds_fee_dep_cde</label>
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
                                    <label class="form-label" for="ds_fee_dep_drc">ds_fee_dep_drc</label>
                                    <input type="text" id="ds_fee_dep_drc" name="ds_fee_dep_drc"
                                        class="form-control @error('ds_fee_dep_drc') is-invalid @enderror"
                                        value="{{ old('ds_fee_dep_drc', $selectedDs->ds_fee_dep_drc) }}">
                                    @error('ds_fee_dep_drc')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-xl-3 mb-3">
                                <div class="form-group">
                                    <label class="form-label" for="server_location">server_location</label>
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
                                    <label class="form-label" for="is_live">Is Live</label>

                                    @php
                                        $oldVal = $selectedDs->ds_code ?? 'Live' || 'Not Live';
                                    @endphp
                                    <select id="is_live" class="select2 form-select form-select-lg" name="is_live"
                                        data-allow-clear="true" value="{{ old('is_live', $selectedDs->is_live) }}">
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
                                    <label class="form-label" for="is_with_pos">is_with_pos</label>
                                    <input type="text" id="is_with_pos" name="is_with_pos"
                                        class="form-control @error('is_with_pos') is-invalid @enderror"
                                        value="{{ old('is_with_pos', $selectedDs->is_with_pos) }}">
                                    @error('is_with_pos')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-xl-3 mb-3">
                                <div class="form-group">
                                    <label class="form-label"
                                        for="date_it_accreditation_renewal">date_it_accreditation_renewal</label>
                                    <input type="text" id="date_it_accreditation_renewal"
                                        name="date_it_accreditation_renewal"
                                        class="form-control @error('date_it_accreditation_renewal') is-invalid @enderror"
                                        value="{{ old('date_it_accreditation_renewal', $selectedDs->date_it_accreditation_renewal) }}">
                                    @error('date_it_accreditation_renewal')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-xl-3 mb-3">
                                <div class="form-group">
                                    <label class="form-label"
                                        for="date_it_authorization_renewal">date_it_authorization_renewal</label>
                                    <input type="text" id="date_it_authorization_renewal"
                                        name="date_it_authorization_renewal"
                                        class="form-control @error('date_it_authorization_renewal') is-invalid @enderror"
                                        value="{{ old('date_it_authorization_renewal', $selectedDs->date_it_authorization_renewal) }}">
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
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Settings</h5> <small class="text-muted float-end">Default
                        label</small>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="validity_theoretical">validity_theoretical</label>
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
                                <label class="form-label" for="validity_practical">validity_practical</label>
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
                                <label class="form-label" for="validity_dep_cde">validity_dep_cde
                                    Number</label>
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
                                <label class="form-label" for="validity_dep_drc">validity_dep_drc</label>
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
                                <label class="form-label" for="lto_fee_theoretical">lto_fee_theoretical</label>
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
                                <label class="form-label" for="lto_fee_practical">lto_fee_practical</label>
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
                                <label class="form-label" for="lto_fee_dep_cde">lto_fee_dep_cde
                                    Number</label>
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
                                <label class="form-label" for="lto_fee_dep_drc">lto_fee_dep_drc
                                    Number</label>
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
                                <label class="form-label" for="cdbs_fee_theoretical">cdbs_fee_theoretical
                                    Number</label>
                                <input type="number" id="cdbs_fee_theoretical" name="cdbs_fee_theoretical"
                                    class="form-control @error('cdbs_fee_theoretical') is-invalid @enderror"
                                    value="{{ old('cdbs_fee_theoretical', $dsSetting->cdbs_fee_theoretical) }}">
                                @error('cdbs_fee_theoretical')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="cdbs_fee_practical">cdbs_fee_practical</label>
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
                                <label class="form-label" for="cdbs_fee_dep_cde">cdbs_fee_dep_cde</label>
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
                                <label class="form-label" for="cdbs_fee_dep_drc">cdbs_fee_dep_drc</label>
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
                                <label class="form-label" for="it_fee_theoretical">it_fee_theoretical</label>
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
                                <label class="form-label" for="it_fee_practical">it_fee_practical</label>
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
                                <label class="form-label" for="it_fee_dep_cde">it_fee_dep_cde</label>
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
                                <label class="form-label" for="it_fee_dep_drc">it_fee_dep_drc</label>
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
                                <label class="form-label" for="others_fee_theoretical">others_fee_theoretical</label>
                                <input type="number" id="others_fee_theoretical" name="others_fee_theoretical"
                                    class="form-control @error('others_fee_theoretical') is-invalid @enderror"
                                    value="{{ old('others_fee_theoretical', $dsSetting->others_fee_theoretical) }}">
                                @error('others_fee_theoretical')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="others_fee_practical">others_fee_practical</label>
                                <input type="number" id="others_fee_practical" name="others_fee_practical"
                                    class="form-control @error('others_fee_practical') is-invalid @enderror"
                                    value="{{ old('others_fee_practical', $dsSetting->others_fee_practical) }}">
                                @error('others_fee_practical')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="others_fee_dep_cde">others_fee_dep_cde</label>
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
                                <label class="form-label" for="others_fee_dep_drc">others_fee_dep_drc</label>
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
                                <label class="form-label" for="mc_daily_upload_limit">mc_daily_upload_limit</label>
                                <input type="number" id="mc_daily_upload_limit" name="mc_daily_upload_limit"
                                    class="form-control @error('mc_daily_upload_limit') is-invalid @enderror"
                                    value="{{ old('mc_daily_upload_limit', $dsSetting->mc_daily_upload_limit) }}">
                                @error('mc_daily_upload_limit')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="lv_daily_upload_limit">lv_daily_upload_limit</label>
                                <input type="number" id="lv_daily_upload_limit" name="lv_daily_upload_limit"
                                    class="form-control @error('lv_daily_upload_limit') is-invalid @enderror"
                                    value="{{ old('lv_daily_upload_limit', $dsSetting->lv_daily_upload_limit) }}">
                                @error('lv_daily_upload_limit')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="weekly_upload_limit">weekly_upload_limit</label>
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
                                <label class="form-label" for="seating_capacity">seating_capacity</label>
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
                                <label class="form-label"
                                    for="accredited_classroom_count">accredited_classroom_count</label>
                                <input type="number" id="accredited_classroom_count" name="accredited_classroom_count"
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
                                    for="percentage_allowable_seating_capacity">percentage_allowable_seating_capacity</label>
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
                                    for="number_unique_classes_per_days_per_tdc">number_unique_classes_per_days_per_tdc</label>
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
                                    for="number_unique_classes_per_days_per_dep">number_unique_classes_per_days_per_dep</label>
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
                                    for="number_prescribed_days_per_instruction">number_prescribed_days_per_instruction</label>
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
                    <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection