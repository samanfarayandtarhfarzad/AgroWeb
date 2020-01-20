@extends('layouts.master')

@section('title', 'Agro Persian')

@section('styles')
<!-- Styles -->
<link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css" />
@endsection

@section('content')

<!-- START PAGE CONTAINER -->
<div class="page-container page-navigation-top">
    <!-- PAGE CONTENT -->
    <div class="page-content">

        <!-- START X-NAVIGATION VERTICAL -->
        <ul class="x-navigation x-navigation-horizontal">
            <li class="xn-logo">
                <a href="index.html">Agro Persian</a>
                <a href="#" class="x-navigation-control"></a>
            </li>
            @guest
            <li class="xn-openable">
                <a href="#"><span class="fa fa-user"></span> My Account</a>
                <ul>
                    <li class="xn-openable">
                        <a href="{{ route('login') }}">Login</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="xn-openable">
                        <a href="{{ route('register') }}">Register</a>
                    </li>
                    @endif
                </ul>
            </li>
            @else
            <li class="xn-openable">
                <a href="#"><span class="fa fa-user"></span>{{ Auth::user()->username }}</a>
                <ul>
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-user"></span>Profile</a>
                    </li>
                </ul>
            </li>
            <!-- SIGN OUT -->
            <li class="xn-icon-button pull-right">
                <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>
            </li>
            <!-- END SIGN OUT -->
            @endguest
        </ul>
        <!-- END X-NAVIGATION VERTICAL -->

        {{-- <div class="page-title">
            <h2>Agro Persian</h2>
        </div> --}}

        <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">

{{--            <div class="row">--}}
{{--                <div class="col-md-12">--}}
{{--                    <div class="panel panel-default">--}}
{{--                        <div class="panel-body">--}}

{{--                            @if (session('status'))--}}
{{--                            <div class="alert alert-success" role="alert">--}}
{{--                                {{ session('status') }}--}}
{{--                            </div>--}}
{{--                            @endif--}}

{{--                            <div class="title m-b-md">--}}
{{--                                @if (Route::has('login'))--}}
{{--                                <div class="top-right links">--}}
{{--                                    @auth--}}

{{--                                    <a href="{{ url('/') }}">--}}
{{--                                        <h3>Welcome to Agro Persian</h3>--}}
{{--                                    </a>--}}
{{--                                    --}}{{-- @else--}}
{{--                                    <a href="{{ route('login') }}">Login</a>--}}

{{--                                    @if (Route::has('register'))--}}
{{--                                    <a href="{{ route('register') }}">Register</a>--}}
{{--                                    @endif --}}
{{--                                    @endauth--}}
{{--                                </div>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                            --}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

        </div>
        <!-- PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
@endsection
