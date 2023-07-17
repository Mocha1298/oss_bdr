@extends('layout')
@section('title', 'Dashboard')
@section('home', 'active')
@section('isdash', 1)

@section('css')
    <!-- Library / Plugin Css Build -->
    <link rel="stylesheet" href="/assets/css/libs.min.css" />

    <!-- Hope Ui Design System Css -->
    <link rel="stylesheet" href="/assets/css/hope-ui.min.css?v=2.0.0" />

    <!-- Custom Css -->
    <link rel="stylesheet" href="/assets/css/custom.min.css?v=2.0.0" />
@endsection

@section('script')
    <!-- Library Bundle Script -->
    <script src="/assets/js/core/libs.min.js"></script>

    <!-- External Library Bundle Script -->
    <script src="/assets/js/core/external.min.js"></script>

    <!-- App Script -->
    <script src="/assets/js/hope-ui.js" defer></script>
@endsection

@section('welcome')
    <h1 class="text-light">Dashboard</h1>
@endsection
