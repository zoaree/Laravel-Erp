@extends('layouts.vertical', ['title' => 'EisenHower', 'sub_title' => 'Genel', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])
@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('css')
    <!--Swiper slider css-->
    @vite(['node_modules/tippy.js/dist/tippy.css'])
@endsection
@section('content')
    @livewire('live-eisenhover')
@endsection
@section('script')
    <!-- Tippy Demo js-->
    @vite(['resources/js/pages/extended-sweetalert.js'])
    @vite(['resources/js/pages/extended-tippy.js'])
    @vite(['resources/js/pages/highlight.js', 'resources/js/pages/form-select.js'])
@endsection
