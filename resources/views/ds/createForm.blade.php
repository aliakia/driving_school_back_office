@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')
@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
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



    {{-- DS FORM --}}
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">CREATE DRIVING SCHOOL </h5> <small class="text-muted float-end">Default
                        label</small>
                </div>
                <hr class="my-4 mx-3" />
                <div class="card-body">
                    <form method="POST" action="{{ route('submitDS') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-12 col-md-6 col-xl-3 mb-3">
                                <div class="form-group">
                                    <label class="form-label" for="ds_code">DRIVING SCHOOL CODE</label>
                                    <input type="text" id="ds_code"
                                        class="form-control @error('ds_code') is-invalid @enderror"
                                        placeholder="DRIVING SCHOOL CODE" name="ds_code" />
                                    @error('ds_code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-12 col-md-6 col-xl-3 mb-3">
                                <div class="form-group">
                                    <label class="form-label" for="ds_name">DRIVING SCHOOL NAME</label>
                                    <input name="ds_name" type="text" id="ds_name"
                                        class="form-control @error('ds_name') is-invalid @enderror"
                                        placeholder="DRIVING SCHOOL NAME" />
                                    @error('ds_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-xl-3 mb-3">
                                <div class="form-group">
                                    <label class="form-label" for="ds_contact_no">DRIVING SCHOOL CONTACT NUMBER</label>
                                    <input type="text" id="ds_contact_no" name="ds_contact_no"
                                        class="form-control phone-mask @error('ds_contact_no') is-invalid @enderror"
                                        placeholder="DRIVING SCHOOL CONTACT NUMBER" />
                                    @error('ds_contact_no')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 col-md-6 col-xl-3 mb-3">
                                <div class="form-group">
                                    <label class="form-label" for="business_type">BUSINESS TYPE</label>
                                    <input type="text" class="form-control @error('business_type') is-invalid @enderror"
                                        id="business_type" name="business_type" placeholder="BUSINESS TYPE" />
                                    @error('business_type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-xl-9 mb-3">
                                <div class="form-group">
                                    <label class="form-label" for="description">DESCRIPTION</label>
                                    <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror"
                                        placeholder="DESCRIPTION"></textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
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
                            <hr class="my-4" />
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
                            <hr class="my-4" />
                            <div class="col-12 col-md-6 col-xl-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label" for="dti_accreditation_no">DTI ACCREDITATION NUMBER</label>
                                    <input type="number" id="dti_accreditation_no" name="dti_accreditation_no"
                                        class="form-control @error('dti_accreditation_no') is-invalid @enderror"
                                        placeholder="DTI ACCREDITATION NUMBER">
                                    @error('dti_accreditation_no')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-xl-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label" for="lto_accreditation_no">LTO ACCREDITATION NUMBER</label>
                                    <input type="number" id="lto_accreditation_no" name="lto_accreditation_no"
                                        class="form-control @error('lto_accreditation_no') is-invalid @enderror"
                                        placeholder="LTO ACCREDITATION NUMBER">
                                    @error('lto_accreditation_no')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

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
                            <hr class="my-4" />
                            <div class="col-12 col-md-6 col-xl-3 mb-3">
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


                            <div class="col-12 col-md-6 col-xl-3 mb-3">
                                <div class="form-group">
                                    <label class="form-label" for="date_it_accredited">DATE ACCREDITED</label>
                                    <input type="date" id="date_it_accredited" name="date_it_accredited"
                                        class="flatpickr-date form-control @error('date_it_accredited') is-invalid @enderror"
                                        placeholder="YYYY-MM-DD">
                                    @error('date_it_accredited')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-xl-3 mb-3">
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

                            <div class="col-12 col-md-6 col-xl-3 mb-3">
                                <div class="form-group">
                                    <label class="form-label" for="date_it_accreditation_renewal">DATE ACCREDITATION
                                        RENEWAL</label>
                                    <input type="date" id="date_it_accreditation_renewal"
                                        name="date_it_accreditation_renewal" placeholder="YYYY-MM-DD"
                                        class="flatpickr-date form-control @error('date_it_accreditation_renewal') is-invalid @enderror">
                                    @error('date_it_accreditation_renewal')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-xl-3 mb-3">
                                <div class="form-group">
                                    <label class="form-label" for="date_it_authorization_renewal">DATE IT AUTHORIZATION
                                        RENEWAL</label>
                                    <input type="date" id="date_it_authorization_renewal"
                                        name="date_it_authorization_renewal" placeholder="YYYY-MM-DD"
                                        class="flatpickr-date form-control @error('date_it_authorization_renewal') is-invalid @enderror">
                                    @error('date_it_authorization_renewal')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <hr class="my-4" />
                            <div class="col-12 col-md-6 col-xl-6 mb-3">
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
                            <div class="col-12 col-md-6 col-xl-3 mb-3">
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
                            <div class="col-12 col-md-6 col-xl-3 mb-3">
                                <div class="form-group">
                                    <label class="form-label" for="is_with_pos">WITH POST STATUS</label>

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
                            <hr class="my-4" />
                            <div class="row">
                                <div class="col-12 col-md-12 col-lg-5 mb-3">

                                    <div class="form-group">
                                        <label class="form-label" for="logo_big">LOGO BIG</label>
                                        <div class="me-2 mb2">
                                            <input name="file" type="file" name="logo_big" id="logo_big"
                                                class="form-control" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="logo_small">LOGO SMALL</label>
                                        <div class="me-2 mb2">
                                            <input name="file" type="file" name="logo_small" id="logo_small"
                                                class="form-control" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-12 col-lg-7 mb-3">
                                    <div class="form-group">
                                        <div class="d-flex flex-wrap">
                                            <div class="me-2 mb-2">
                                                <label class="form-label" for="ds_pic1">DS PICTURES</label>
                                                <input type="file" name="ds_pic1" id="ds_pic1"
                                                    class="form-control" />
                                            </div>
                                            <div class="me-2 mb-2">
                                                <label class="form-label" for="ds_pic2">DS PICTURES</label>
                                                <input type="file" name="ds_pic2" id="ds_pic2"
                                                    class="form-control" />
                                            </div>
                                            <div class="me-2 mb-2">
                                                <label class="form-label" for="ds_pic3">DS PICTURES</label>
                                                <input type="file" name="ds_pic3" id="ds_pic3"
                                                    class="form-control" />
                                            </div>
                                            <div class="me-2 mb-2">
                                                <label class="form-label" for="ds_pic4">DS PICTURES</label>
                                                <input type="file" name="ds_pic4" id="ds_pic4"
                                                    class="form-control" />
                                            </div>
                                            <div class="me-2 mb-2">
                                                <label class="form-label" for="ds_pic5">DS PICTURES</label>
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
                    <h5 class="mb-0">SETTINGS</h5> <small class="text-muted float-end">Default
                        label</small>
                </div>
                <div class="card-body">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="validity_theoretical">VALIDITY THEORETICAL</label>
                                <input type="number" id="validity_theoretical"
                                    class="form-control @error('validity_theoretical') is-invalid @enderror"
                                    placeholder="VALIDITY THEORETICAL" name="validity_theoretical" />
                                @error('validity_theoretical')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="validity_practical">VALIDITY PRACTICAL</label>
                                <input name="validity_practical" type="number" id="validity_practical"
                                    class="form-control @error('validity_practical') is-invalid @enderror"
                                    placeholder="VALIDITY PRACTICAL" />
                                @error('validity_practical')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="validity_dep_cde">VALIDITY DEP CODE</label>
                                <input type="number" id="validity_dep_cde" name="validity_dep_cde"
                                    class="form-control phone-mask @error('validity_dep_cde') is-invalid @enderror"
                                    placeholder="VALIDITY DEP CODE" />
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
                                    id="validity_dep_drc" name="validity_dep_drc" placeholder="VALIDITY DEP DRC" />
                                @error('validity_dep_drc')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="lto_fee_theoretical">LTO FEE THEORETICAL</label>
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
                                <label class="form-label" for="lto_fee_practical">LTO FEE PRACTICAL</label>
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
                                <label class="form-label" for="lto_fee_dep_cde">LTO FEE DEP CDE</label>
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
                                <label class="form-label" for="lto_fee_dep_drc">LTO FEE DEP DRC</label>
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
                                <label class="form-label" for="cdbs_fee_theoretical">CDBS FEE THEORITICAL</label>
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
                                <label class="form-label" for="cdbs_fee_practical">CDBS FEE PRACTICAL</label>
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
                                <label class="form-label" for="cdbs_fee_dep_cde">CDBS FEE DEP CDE</label>
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
                                <label class="form-label" for="cdbs_fee_dep_drc">CDBS FEE DEP DRC</label>
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
                                <label class="form-label" for="it_fee_theoretical">IT FEE THEORETICAL</label>
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
                                <label class="form-label" for="it_fee_practical">IT FEE PRACTICAL</label>
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
                                <label class="form-label" for="it_fee_dep_cde">IT FEE DEP CDE</label>
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
                                <label class="form-label" for="it_fee_dep_drc">IT FEE DEP DRC</label>
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
                                <label class="form-label" for="others_fee_theoretical">OTHERS FEE THEORETICAL</label>
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
                                <label class="form-label" for="others_fee_practical">OTHERS FEE PRACTICAL</label>
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
                                <label class="form-label" for="others_fee_dep_cde">OTHERS FEE DEP CDE</label>
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
                                <label class="form-label" for="others_fee_dep_drc">OTHERS FEE DEP DRC</label>
                                <input type="number" id="others_fee_dep_drc" name="others_fee_dep_drc"
                                    class="form-control @error('others_fee_dep_drc') is-invalid @enderror"
                                    placeholder="OTHERS FEE DEP DRC">
                                @error('others_fee_dep_drc')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="mc_daily_upload_limit">MC DAILY UPLOAD LIMIT</label>
                                <input type="number" id="mc_daily_upload_limit" name="mc_daily_upload_limit"
                                    class="form-control @error('mc_daily_upload_limit') is-invalid @enderror"
                                    placeholder="MC DAILY UPLOAD LIMIT">
                                @error('mc_daily_upload_limit')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="lv_daily_upload_limit">LV DAILY UPLOAD LIMIT</label>
                                <input type="number" id="lv_daily_upload_limit" name="lv_daily_upload_limit"
                                    class="form-control @error('lv_daily_upload_limit') is-invalid @enderror"
                                    placeholder="LV DAILY UPLOAD LIMIT">
                                @error('lv_daily_upload_limit')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="weekly_upload_limit">WEEKLY UPLOAD LIMIT</label>
                                <input type="number" id="weekly_upload_limit" name="weekly_upload_limit"
                                    class="form-control @error('weekly_upload_limit') is-invalid @enderror"
                                    placeholder="WEEKLY UPLOAD LIMIT">
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
                                    placeholder="SEATING CAPACITY">
                                @error('seating_capacity')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="accredited_classroom_count">ACCREDITED CLASSROOM
                                    COUNT</label>
                                <input type="number" id="accredited_classroom_count" name="accredited_classroom_count"
                                    class="form-control @error('accredited_classroom_count') is-invalid @enderror"
                                    placeholder="ACCREDITED CLASSROOM COUNT">
                                @error('accredited_classroom_count')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="percentage_allowable_seating_capacity">PERCENTAGE ALLOWABLE
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
                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="number_unique_classes_per_days_per_tdc">NUMBER UNIQUE
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
                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="number_unique_classes_per_days_per_dep">NUMBER PER DAYS PER
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
                        <div class="col-12 col-md-6 col-xl-3 mb-3">
                            <div class="form-group">
                                <label class="form-label" for="number_prescribed_days_per_instruction">NUMBER PRESCRIBED
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
                    <button type="submit" class="btn btn-primary" onclick="uploadFile()">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('page-script')
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
        }
    </script>
@endsection
