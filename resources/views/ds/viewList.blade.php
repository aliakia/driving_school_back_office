@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'DS List')

@section('content')
    @if (session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div style="color: red;">
            {{ session('error') }}
        </div>
    @endif

    <div class="card">
        <h5 class="card-header">Table Basic</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>Driving School Code</th>
                        <th>Driving School Name</th>
                        <th>Is Active</th>
                        <th><a class="btn btn-sm btn-primary" href="{{ route('viewCreateForm') }}">Add</a></th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">

                    @foreach ($all_ds as $ds)
                        <tr>
                            <td><i class="ti ti-brand-angular ti-lg text-danger me-3"></i>
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
