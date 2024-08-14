@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Post')

@section('content')
    <table class="datatables-users table">
        <thead class="table-light">
            <tr>
                <th></th>
                <th>ds_code</th>
                <th>ds_name</th>
                <th>ds_address</th>
                <th>ds_contact_no</th>
                <th>Actions</th>
                <th>Actions</th>
                <th>Actions</th>
                <th>Actions</th>
                <th>Actions</th>
                <th>Actions</th>
            </tr>
        </thead>
    </table>
@endsection
