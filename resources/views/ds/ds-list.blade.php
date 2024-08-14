@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'DS List')

@section('content')
    @include('ds.createNewDS')
@endsection
