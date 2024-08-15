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
                    <form method="POST" action="{{ route('submitDS') }}">
                        @csrf
                        <div class="row">

                            <div class="col-12 col-md-9 col-lg-10">
                                <div class="row">
                                    <div class="col-12 col-md-6 col-xl-3 mb-3">
                                        <div class="form-group">
                                            <label class="form-label" for="ds_code">Driving School Code</label>
                                            <input type="text" id="ds_code"
                                                class="form-control @error('ds_code') is-invalid @enderror"
                                                placeholder="DS Code" name="ds_code" />
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
                                            <input type="text"
                                                class="form-control @error('business_type') is-invalid @enderror"
                                                id="business_type" name="business_type" placeholder="Business Type" />
                                            @error('business_type')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-12 col-xl-8 mb-3">
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


                                    <div class="col-12 col-md-6 col-xl-4 mb-3">
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
                                            <input type="text" id="date_it_started" name="date_it_started"
                                                class="form-control @error('date_it_started') is-invalid @enderror">
                                            @error('date_it_started')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 col-xl-3 mb-3">
                                        <div class="form-group">
                                            <label class="form-label" for="date_it_accredited">Date Accredited</label>
                                            <input type="text" id="date_it_accredited" name="date_it_accredited"
                                                class="form-control @error('date_it_accredited') is-invalid @enderror">
                                            @error('date_it_accredited')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-xl-3 mb-3">
                                        <div class="form-group">
                                            <label class="form-label" for="date_it_renewal">Date It Renewal</label>
                                            <input type="text" id="date_it_renewal" name="date_it_renewal"
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
                                            <select id="is_active" class="select2 form-select form-select-lg"
                                                name="is_active" data-allow-clear="true">
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
                                                placeholder="Description"></textarea>
                                            @error('description')
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
                                            <input type="text" id="ds_fee_theoretical" name="ds_fee_theoretical"
                                                class="form-control @error('ds_fee_theoretical') is-invalid @enderror">
                                            @error('ds_fee_theoretical')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-xl-3 mb-3">
                                        <div class="form-group">
                                            <label class="form-label" for="ds_fee_practical">Practical Fee</label>
                                            <input type="text" id="ds_fee_practical" name="ds_fee_practical"
                                                class="form-control @error('ds_fee_practical') is-invalid @enderror">
                                            @error('ds_fee_practical')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-xl-3 mb-3">
                                        <div class="form-group">
                                            <label class="form-label" for="ds_fee_dep_cde">ds_fee_dep_cde</label>
                                            <input type="text" id="ds_fee_dep_cde" name="ds_fee_dep_cde"
                                                class="form-control @error('ds_fee_dep_cde') is-invalid @enderror">
                                            @error('ds_fee_dep_cde')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-xl-3 mb-3">
                                        <div class="form-group">
                                            <label class="form-label" for="ds_fee_dep_drc">ds_fee_dep_drc</label>
                                            <input type="text" id="ds_fee_dep_drc" name="ds_fee_dep_drc"
                                                class="form-control @error('ds_fee_dep_drc') is-invalid @enderror">
                                            @error('ds_fee_dep_drc')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-xl-3 mb-3">
                                        <div class="form-group">
                                            <label class="form-label" for="server_location">server_location</label>
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
                                            <select id="is_live" class="select2 form-select form-select-lg"
                                                name="is_live" data-allow-clear="true">
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
                                                class="form-control @error('is_with_pos') is-invalid @enderror">
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
                                                class="form-control @error('date_it_accreditation_renewal') is-invalid @enderror">
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
                                                    <input name="file" type="file" name="logo_small"
                                                        id="logo_small" class="form-control" />
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
                            <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
