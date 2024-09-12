@php
    $containerNav = $containerNav ?? 'container-fluid';
    $navbarDetached = $navbarDetached ?? '';
@endphp

<!-- Navbar -->
@if (isset($navbarDetached) && $navbarDetached == 'navbar-detached')
    <nav class="layout-navbar {{ $containerNav }} navbar navbar-expand-xl {{ $navbarDetached }} align-items-center bg-navbar-theme"
        id="layout-navbar">
@endif
@if (isset($navbarDetached) && $navbarDetached == '')
    <nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
        <div class="{{ $containerNav }}">
@endif

<!--  Brand demo (display only for navbar-full and hide on below xl) -->
@if (isset($navbarFull))
    <div class="navbar-brand app-brand demo d-none d-xl-flex py-0 me-4">
        <a href="{{ url('/') }}" class="app-brand-link gap-2">
            {{-- <span class="app-brand-logo demo">
                @include('_partials.macros', ['height' => 20])
            </span> --}}
            <span class="app-brand-text demo menu-text fw-bold">Driving School</span>
        </a>
    </div>
@endif

<!-- ! Not required for layout-without-menu -->
@if (!isset($navbarHideToggle))
    <div
        class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0{{ isset($menuHorizontal) ? ' d-xl-none ' : '' }} {{ isset($contentNavbar) ? ' d-xl-none ' : '' }}">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="ti ti-menu-2 ti-sm"></i>
        </a>
    </div>
@endif

<div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

    @if (!isset($menuHorizontal))
        <!-- Search -->
        <div class="navbar-nav align-items-center">
            <div class="nav-item navbar-search-wrapper mb-0 fw-bold">
                Driving School Back Office Module
            </div>
        </div>
        <!-- /Search -->
    @endif
    <ul class="navbar-nav flex-row align-items-center ms-auto">
        <li class="nav-item text-end me-2">
            <small class="fw-semibold d-block">
                {{ Session('logged_in')->first_name }} {{ Session('logged_in')->last_name }}
            </small>
            @if (Session('logged_in')->user_type == 'tech_support')
                <small class="badge bg-label-success">Tech Support</small>
            @elseif (Session('logged_in')->user_type == 'instructor')
                <small class="badge bg-label-warning">Instructor</small>
            @elseif (Session('logged_in')->user_type == 'encoder')
                <small class="badge bg-label-info">Encoder</small>
            @elseif (Session('logged_in')->user_type == 'administrator')
                <small class="badge bg-label-danger">Administrator</small>
            @else
                User Type
            @endif
        </li>

        <!-- User -->
        <li class="nav-item navbar-dropdown dropdown-user dropdown ml-3">
            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                <div class="avatar avatar-online">
                    <img src="{{ Session('logged_in')->pic_id1 }}" alt="avatar" class="rounded-circle me-2">
                    {{-- @if (Session('logged_in')->pic_id1 == '')
                        <img class="rounded-circle me-2" src="{{ asset('images/default.png') }}" alt="avatar">
                    @else
                        <img class="rounded-circle me-2" src="{{ Session('logged_in')->pic_id1 }}" alt="avatar">
                    @endif --}}
                </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                {{-- <li>
                    <a class="dropdown-item">
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar avatar-online">
                                    <img src="{{ Session('logged_in')->pic_id1 ?? asset('assets/img/default.png') }}"
                                        alt class="rounded-circle">


                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <span class="fw-semibold d-block">
                                    {{ Session('logged_in')->first_name }} {{ Session('logged_in')->last_name }}
                                </span>
                                @if (Session('logged_in')->user_type == 'tech_support')
                                    <small class="badge bg-label-success">Tech Support</small>
                                @elseif (Session('logged_in')->user_type == 'instructor')
                                    <small class="badge bg-label-warning">Instructor</small>
                                @elseif (Session('logged_in')->user_type == 'encoder')
                                    <small class="badge bg-label-info">Encoder</small>
                                @elseif (Session('logged_in')->user_type == 'administrator')
                                    <small class="badge bg-label-danger">Administrator</small>
                                @else
                                    User Type
                                @endif
                            </div>
                        </div>
                    </a>
                </li> --}}

                <li>

                    <form method="POST" action="{{ route('logoutAccount') }}">
                        @csrf
                        <button class="dropdown-item" type="submit"> <i class='ti ti-login me-2'></i>Logout</button>
                    </form>
                </li>
            </ul>
        </li>
        <!--/ User -->
    </ul>
</div>

<!-- Search Small Screens -->
<div class="navbar-search-wrapper search-input-wrapper {{ isset($menuHorizontal) ? $containerNav : '' }} d-none">
    <input type="text" class="form-control search-input {{ isset($menuHorizontal) ? '' : $containerNav }} border-0"
        placeholder="Search..." aria-label="Search...">
    <i class="ti ti-x ti-sm search-toggler cursor-pointer"></i>
</div>
@if (isset($navbarDetached) && $navbarDetached == '')
    </div>
@endif
</nav>
<!-- / Navbar -->
