@extends('layouts/layoutMaster')

@section('title', 'Test')

{{-- @section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/swiper/swiper.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}" />
@endsection

@section('page-style')
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/cards-advance.css') }}">
@endsection --}}

{{-- @section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/swiper/swiper.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
@endsection --}}

{{-- @section('page-script')
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
@endsection --}}


@section('page-script')
    <script src="{{ asset('assets/js/modal-add-new-cc.js') }}"></script>
    <script src="{{ asset('assets/js/modal-add-new-address.js') }}"></script>
    <script src="{{ asset('assets/js/modal-create-app.js') }}"></script>
    <script src="{{ asset('assets/js/modal-edit-user.js') }}"></script>
    <script src="{{ asset('assets/js/modal-enable-otp.js') }}"></script>
    <script src="{{ asset('assets/js/modal-share-project.js') }}"></script>
    <script src="{{ asset('assets/js/modal-two-factor-auth.js') }}"></script>
@endsection

@section('content')



    {{-- Modals --}}
    <div class="modal fade" id="newTransaction" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-simple">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h3 class="mb-2">Select Course or Program</h3>
                    </div>
                    <div class="form-check custom-option custom-option-basic mb-3 btn-primary">
                        <label class="form-check-label custom-option-content ps-3" for="customRadioTemp1"
                            data-bs-target="#twoFactorAuthOne" data-bs-toggle="modal">
                            <input name="customRadioTemp" class="form-check-input d-none" type="radio" value=""
                                id="customRadioTemp1" />
                            <span class="h4" style="color: #fff;">Theoretical Driving Course</span>
                        </label>
                    </div>
                    <div class="form-check custom-option custom-option-basic btn-primary">
                        <label class="form-check-label custom-option-content ps-3" for="customRadioTemp2"
                            data-bs-target="#twoFactorAuthTwo" data-bs-toggle="modal">
                            <input name="customRadioTemp" class="form-check-input d-none" type="radio" value=""
                                id="customRadioTemp2" />
                            <span class="h4 text-purple-50" style="color: #fff;">Practical Driving Course</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- End Modals --}}


    <div class="row mb-4">
        <div class="col-12 col-sm-6 col-lg-4">
            <div class="card" style="cursor: pointer;">
                <a class="card-body text-center" href="">
                    <i class="mb-3 ti ti-plus ti-lg"></i>
                    <h5>New Transaction</h5>

                </a>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-lg-4 mb-4">
            <div class="card" style="cursor: pointer;">
                <div class="card-body text-center" data-bs-toggle="modal" data-bs-target="#newTransaction">
                    <i class="mb-3 ti ti-bookmark ti-lg"></i>
                    <h5 class="purple">Saved Transactions</h5>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-lg-4 mb-4">
            <div class="card">
                <div class="card-body text-center">
                    <i class="mb-3 ti ti-home ti-lg"></i>
                    <h5>Add New Address</h5>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-lg-4 mb-4">
            <div class="card">
                <div class="card-body text-center">
                    <i class="mb-3 ti ti-gift ti-lg"></i>
                    <h5>Refer & Earn</h5>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-lg-4 mb-4">
            <div class="card">
                <div class="card-body text-center">
                    <i class="mb-3 ti ti-user ti-lg"></i>
                    <h5>Edit User</h5>
                </div>
            </div>
        </div>

    </div>

@endsection
