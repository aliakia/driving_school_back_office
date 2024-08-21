@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'DS List')

@section('content')

    @if (session('success'))
        <div class="alert alert-primary alert-dismissible" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">DRIVING SCHOOLS </h5>
            <button class="btn btn-sm btn-primary">
                <a class="m-0 d-flex justify-content-between align-items-center text-white"
                    href="{{ route('viewCreateForm') }}">
                    <span>Add</span>
                    <i class="ti ti-plus"></i>
                </a>
            </button>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>Driving School Code</th>
                        <th>Driving School Name</th>
                        <th>Activity Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">

                    {{-- <p>Logo Big URL: {{ $ds->logo_big_url }}</p>
                    <p>Logo Small URL: {{ $ds->logo_small_url }}</p> --}}

                    @foreach ($all_ds as $ds)
                        <tr>
                            <td>
                                {{-- @if ($ds->logo_small_base64)
                                    <img src="data:image/png;base64,{{ $ds->logo_small_base64 }}" alt="Logo Small" />
                                @endif --}}
                                <strong>{{ $ds->ds_code }}</strong>
                            </td>
                            <td>{{ $ds->ds_name }}</td>
                            <td>
                                @if ($ds->is_active == 1)
                                    <span class="badge bg-label-success me-1">Active</span>
                                @else
                                    <span class="badge bg-label-danger me-1">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item"
                                            href="{{ route('viewEditForm', ['ds_code' => $ds->ds_code]) }}"><i
                                                class="ti ti-pencil me-1"></i> Edit</a>
                                        <form method="POST" action="{{ route('deleteDs', $ds->ds_code) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="dropdown-item" type="submit"><i class="ti ti-trash me-1"></i>
                                                Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
