@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Home')

@section('content')
    {{-- <a href="{{ route('posts') }}">Posts</a> --}}

    <a href="{{ route('drivingSchool') }}">driving school</a>
@endsection
