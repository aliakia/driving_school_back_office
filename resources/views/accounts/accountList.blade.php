@extends('layouts/layoutMaster')

@section('title', 'DataTables - Tables')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />

    <!-- Row Group CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css') }}">
    <!-- Form Validation -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>

    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <!-- Flat Picker -->
    <script src="{{ asset('assets/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <!-- Form Validation -->
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}"></script>
@endsection

@section('page-script')
    <script>
        const adURL = "{{ route('accountsDataUrl') }}";
        const deleteFormBaseUrl = "{{ route('deleteAccount', ['user_id' => '__REPLACE__']) }}";
        const editFormBaseUrl = "{{ route('editAccForm', ['user_id' => '__REPLACE__']) }}";
        const csrfToken = '{{ csrf_token() }}';
    </script>
    <script src="{{ asset('js/accountList.js') }}"></script>
@endsection

@section('content')
    @if ($errors->any())
        {{ implode('', $errors->all('<div>:message</div>')) }}
    @endif
    <!-- DataTable with Buttons -->
    <div class="card">
        <div class="card-datatable table-responsive pt-0">
            <table class="datatables-basic table">
                <thead>
                    <tr>
                        <th>Employee ID</th>
                        <th>Name</th>
                        <th>DS Code</th>
                        <th>Active Status</th>
                        <th>User Type</th>
                        <th>Actions</th>

                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <!-- Modal to add new record -->
    <div class="modal fade" id="newAccount" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-simple modal-add-new-address">
            <div class="modal-content p-1 p-md-1">
                <div class="modal-body">
                    <button type="button" class="btn-close m-md-5" data-bs-dismiss="modal" aria-label="Close"></button>

                    <form action="{{ route('createAccount') }}" method="POST" id="newAccountForm" class="mt-1">
                        @csrf
                        <div class="col-12">
                            <div class="w-full mb-1 text-center">
                                <img src="{{ asset('assets/img/default.png') }}" id="picture_1" class="bg-secondary"
                                    alt="default.png" height="auto" width="70%" />
                            </div>
                            <button type="button" class="btn btn-primary mb-1 w-100" id="open_cam">Open Camera</button>
                            <input id="base_64" type="hidden" name="base_64" value="" />
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

                        <div class="form-group mb-2">
                            <label class="form-label" for="recno">Rec No</label>
                            <input type="number" id="recno" class="form-control" name="recno" placeholder="Rec No"
                                oninput="this.value = this.value.toUpperCase()" />
                        </div>
                        <div class="form-group mb-2">
                            <label class="form-label" for="user_id">User ID</label>
                            <input type="text" id="user_id" class="form-control" name="user_id"
                                placeholder="User ID" oninput="this.value = this.value.toUpperCase()" />
                        </div>
                        <div class="form-group mb-2">
                            <label class="form-label" for="employee_id">Employee ID</label>
                            <input type="text" id="employee_id" class="form-control" name="employee_id"
                                placeholder="Employee ID" oninput="this.value = this.value.toUpperCase()" />
                        </div>
                        <div class="form-group mb-2">
                            <label class="form-label" for="first_name">First Name</label>
                            <input type="text" id="first_name" class="form-control" name="first_name"
                                placeholder="First Name" oninput="this.value = this.value.toUpperCase()" />
                        </div>
                        <div class="form-group mb-2">
                            <label class="form-label" for="middle_name">Middle Name</label>
                            <input type="text" id="middle_name" class="form-control" name="middle_name"
                                placeholder="Middle Name" oninput="this.value = this.value.toUpperCase()" />
                        </div>
                        <div class="form-group mb-2">
                            <label class="form-label" for="last_name">Last Name</label>
                            <input type="text" id="last_name" class="form-control" name="last_name"
                                placeholder="Last Name" oninput="this.value = this.value.toUpperCase()" />
                        </div>

                        <div class="form-group mb-2">
                            <label class="form-label" for="gender">Gender</label>
                            <select id="gender" name="gender" class="form-select select2"
                                aria-label="Default select example">
                                <option selected disabled>Select Gender</option>
                                <option value="MALE">MALE</option>
                                <option value="FEMALE">FEMALE</option>
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
                            <label class="form-label" for="is_active">Activity Status</label>

                            <select id="is_active" class="select2 form-select form-select-lg" name="is_active">
                                <option selected disabled>Select Activity Status</option>
                                <option value="0">Inactive
                                </option>
                                <option value="1">Active
                                </option>
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label class="form-label" for="description">Description</label>
                            <textarea name="description" placeholder="Description" id="description" class="form-control"></textarea>
                        </div>
                        <div class="form-group mb-2">
                            <label class="form-label" for="ds_code">DS Code</label>
                            <input type="text" id="ds_code" class="form-control" name="ds_code"
                                placeholder="DS Code" oninput="this.value = this.value.toUpperCase()" />
                        </div>
                        <div class="form-group mb-2">
                            <label class="form-label" for="certificate_tesda">Tesda Certificate</label>
                            <input type="text" id="certificate_tesda" class="form-control" name="certificate_tesda"
                                placeholder="Tesda Certificate" />
                        </div>
                        <div class="form-group mb-2">
                            <label class="form-label" for="certificate_tesda_expiration">Tesda Certificate
                                Expiration</label>
                            <input type="date" class="form-control flatpickr-date" id="certificate_tesda_expiration"
                                placeholder="YYYY-MM-DD" name="certificate_tesda_expiration"
                                aria-describedby="certificate_tesda_expiration" value="" />
                        </div>
                        <div class="form-group mb-2">
                            <label class="form-label" for="user_expiration">User Expiration</label>
                            <input type="date" class="form-control flatpickr-date" id="user_expiration"
                                placeholder="YYYY-MM-DD" name="user_expiration" aria-describedby="user_expiration"
                                value="" />
                        </div>
                        <div class="col-12">
                            <div class="form-password-toggle">
                                <label class="form-label" for="password">Password</label>
                                <div class="input-group input-group-merge">
                                    <input id="password" class="form-control" type="password" name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="multicol-password2" />
                                    <span class="input-group-text cursor-pointer" id="multicol-password2"><i
                                            class="ti ti-eye-off"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-password-toggle">
                                <label class="form-label" for="formValidationConfirmPass">Confirm Password</label>
                                <div class="input-group input-group-merge">
                                    <input class="form-control" type="password" id="formValidationConfirmPass"
                                        name="formValidationConfirmPass"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="multicol-confirm-password2" />
                                    <span class="input-group-text cursor-pointer" id="multicol-confirm-password2"><i
                                            class="ti ti-eye-off"></i></span>
                                </div>
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-success btn-block" tabindex="3"id="confirm">Confirm</button> --}}
                    <button type="submit" class="btn btn-primary btn-block" id="confirm">Confirm</button>
                </div>
            </div>
            </form>
        </div>
    </div>

    <!-- Modal to view details -->
    <!-- Button to Trigger AJAX Request -->


    <!-- Modal to Display Account Details -->
    <div class="modal fade text-left" id="hand_modal" tabindex="-3" role="dialog" aria-labelledby="myModalLabel8"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel8">Biometrics Registration</h4>
                    {{-- <button type="button" class="close" data-dismiss="modal" id="close_cam" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button> --}}
                </div>

                {{-- @php
            $configData = Helper::applClasses();
          @endphp --}}
                <div class="modal-body">
                    <img src="{{ asset('assets/img/hand_logo_dark.png') }}" alt="hand" height="auto"
                        width="100%" class="border border-primary">
                    <button style="position: absolute; left: 7%; top: 25%; z-index: inherit;"
                        class="btn btn-icon rounded-circle btn-outline-primary fingers" value="1">
                        <i data-feather="circle" class="font-large-1 text-white"></i>
                    </button>
                    <button style="position: absolute; left: 15.5%; top: 14%; z-index: inherit;"
                        class="btn btn-icon rounded-circle btn-outline-primary fingers" value="2">
                        <i data-feather="circle" class="font-large-1 text-white"></i>
                    </button>
                    <button style="position: absolute; left: 25.5%; top: 11%; z-index: inherit;"
                        class="btn btn-icon rounded-circle btn-outline-primary fingers" value="3">
                        <i data-feather="circle" class="font-large-1 text-white"></i>
                    </button>
                    <button style="position: absolute; left: 33%; top: 15.5%; z-index: inherit;"
                        class="btn btn-icon rounded-circle btn-outline-primary fingers" value="4">
                        <i data-feather="circle" class="font-large-1 text-white"></i>
                    </button>
                    <button style="position: absolute; left: 42%; top: 59%; z-index: inherit;"
                        class="btn btn-icon rounded-circle btn-outline-primary fingers" value="5">
                        <i data-feather="circle" class="font-large-1 text-white"></i>
                    </button>
                    <button style="position: absolute; right: 42%; top: 59%; z-index: inherit;"
                        class="btn btn-icon rounded-circle btn-outline-primary fingers" value="6">
                        <i data-feather="circle" class="font-large-1 text-white"></i>
                    </button>
                    <button style="position: absolute; right: 33%; top: 15.5%;; z-index: inherit;"
                        class="btn btn-icon rounded-circle btn-outline-primary fingers" value="7">
                        <i data-feather="circle" class="font-large-1 text-white"></i>
                    </button>
                    <button style="position: absolute; right: 24.5%; top: 11%; z-index: inherit;"
                        class="btn btn-icon rounded-circle btn-outline-primary fingers" value="8">
                        <i data-feather="circle" class="font-large-1 text-white"></i>
                    </button>
                    <button style="position: absolute; right: 14.8%; top: 11%; z-index: inherit;"
                        class="btn btn-icon rounded-circle btn-outline-primary fingers" value="9">
                        <i data-feather="circle" class="font-large-1 text-white"></i>
                    </button>
                    <button style="position: absolute; right:  5.5%; top: 21%; z-index: inherit;"
                        class="btn btn-icon rounded-circle btn-outline-primary fingers" value="10">
                        <i data-feather="circle" class="font-large-1 text-white"></i>
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="close_fp">Cancel</button>
                    <button type="button" class="btn btn-success" id="save_fp">Save</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade text-left" id="hand_modal2" tabindex="-3" role="dialog" aria-labelledby="myModalLabel9"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel9">Biometrics Registration</h4>
                    {{-- <button type="button" class="close" data-dismiss="modal" id="close_cam" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button> --}}
                </div>
                <div class="modal-body">
                    <img src="{{ asset('assets/img/hand_logo.png') }}" alt="hand" height="auto" width="100%"
                        class="border border-primary">
                    <button style="position: absolute; left: 5.5%; top: 21%; z-index: inherit;"
                        class="btn btn-icon rounded-circle btn-outline-primary fingers2" value="1">
                        <i data-feather="circle" class="font-large-1 text-white"></i>
                    </button>
                    <button style="position: absolute; left: 14.5%; top: 11%; z-index: inherit;"
                        class="btn btn-icon rounded-circle btn-outline-primary fingers2" value="2">
                        <i data-feather="circle" class="font-large-1 text-white"></i>
                    </button>
                    <button style="position: absolute; left: 24%; top: 11%; z-index: inherit;"
                        class="btn btn-icon rounded-circle btn-outline-primary fingers2" value="3">
                        <i data-feather="circle" class="font-large-1 text-white"></i>
                    </button>
                    <button style="position: absolute; left: 33%; top: 15.5%; z-index: inherit;"
                        class="btn btn-icon rounded-circle btn-outline-primary fingers2" value="4">
                        <i data-feather="circle" class="font-large-1 text-white"></i>
                    </button>
                    <button style="position: absolute; left: 42%; top: 59%; z-index: inherit;"
                        class="btn btn-icon rounded-circle btn-outline-primary fingers2" value="5">
                        <i data-feather="circle" class="font-large-1 text-white"></i>
                    </button>
                    <button style="position: absolute; right: 42%; top: 59%; z-index: inherit;"
                        class="btn btn-icon rounded-circle btn-outline-primary fingers2" value="6">
                        <i data-feather="circle" class="font-large-1 text-white"></i>
                    </button>
                    <button style="position: absolute; right: 33%; top: 15.5%;; z-index: inherit;"
                        class="btn btn-icon rounded-circle btn-outline-primary fingers2" value="7">
                        <i data-feather="circle" class="font-large-1 text-white"></i>
                    </button>
                    <button style="position: absolute; right: 24.5%; top: 11%; z-index: inherit;"
                        class="btn btn-icon rounded-circle btn-outline-primary fingers2" value="8">
                        <i data-feather="circle" class="font-large-1 text-white"></i>
                    </button>
                    <button style="position: absolute; right: 14.8%; top: 11%; z-index: inherit;"
                        class="btn btn-icon rounded-circle btn-outline-primary fingers2" value="9">
                        <i data-feather="circle" class="font-large-1 text-white"></i>
                    </button>
                    <button style="position: absolute; right:  5.5%; top: 21%; z-index: inherit;"
                        class="btn btn-icon rounded-circle btn-outline-primary fingers2" value="10">
                        <i data-feather="circle" class="font-large-1 text-white"></i>
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="close_fp2">Cancel</button>
                    <button type="button" class="btn btn-success" id="save_fp2">Save</button>
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
                    {{-- <button type="button" class="close" data-dismiss="modal" id="close_cam" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button> --}}
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

    <div class="modal fade text-left" id="biometrics_modal2" tabindex="-3" role="dialog"
        aria-labelledby="myModalLabel7" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel7">Biometrics Registration</h4>
                    {{-- <button type="button" class="close" data-dismiss="modal" id="close_cam" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button> --}}
                </div>
                <div class="modal-body" id="bio_modal_body2">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                        id="close_bio2">Cancel</button>
                    <button type="button" class="btn btn-success" id="save_bio2">Save</button>
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
                    <button type="button" class="close" data-bs-dismiss="modal" id="close_cam" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
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


    <div class="modal fade text-left" id="camera2" tabindex="-2" role="dialog" aria-labelledby="myModalLabel5"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel5">Capture Image</h4>
                    <button type="button" class="close" data-dismiss="modal" id="close_cam" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="modal-body">
                        <div class="embed-responsive embed-responsive-4by3">
                            {{-- <iframe width="100%" frameborder="0" src="https://www.youtube-nocookie.com/embed/FdV_akxUnEM?controls=0&disablekb=1&modestbranding=1&rel=0&amp;showinfo=0&autoplay=1&loop=1" encrypted-media allowfullscreen></iframe> --}}
                            <video width="100%" height="100%" autoplay="true" id="video2"></video>
                        </div>
                        <button id="capture2" type="button" class="btn btn-primary w-100 my-1"><i
                                data-feather="camera" class="font-medium-4"></i></button>
                        <canvas id="canvas2" style="width:100%; height:auto;" class="hidden"></canvas>
                        <button id="saveImg2" type="button" class="btn btn-primary w-100 mt-1 hidden"
                            data-dismiss="modal" aria-label="Close">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
