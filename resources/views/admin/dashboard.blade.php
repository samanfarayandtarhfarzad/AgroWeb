@extends('layouts.app')


@section('title', 'Agro Persian | Dashboard')


@section('styles')

@endsection


@section('content')
<div class="page-content-wrap">



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

    <div onload="noty({text: 'Successful action{{ Auth::user()->username }}', layout: 'topRight', type: 'success'});"></div>

    @endguest


    <!-- START WIDGETS -->
    <div class="row">
        <div class="col-md-3">

            <!-- START WIDGET SLIDER -->
            <div class="widget widget-default widget-carousel">
                <div class="owl-carousel" id="owl-example">
                    <div>
                        <div class="widget-title">Total Visitors</div>
                        <div class="widget-subtitle">27/08/2014 15:23</div>
                        <div class="widget-int">3,548</div>
                    </div>
                    <div>
                        <div class="widget-title">Returned</div>
                        <div class="widget-subtitle">Visitors</div>
                        <div class="widget-int">1,695</div>
                    </div>
                    <div>
                        <div class="widget-title">New</div>
                        <div class="widget-subtitle">Visitors</div>
                        <div class="widget-int">1,977</div>
                    </div>
                </div>
                <div class="widget-controls">
                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top"
                        title="Remove Widget"><span class="fa fa-times"></span></a>
                </div>
            </div>
            <!-- END WIDGET SLIDER -->

        </div>
        <div class="col-md-3">

            <!-- START WIDGET MESSAGES -->
            <div class="widget widget-default widget-item-icon" onclick="location.href='pages-messages.html';">
                <div class="widget-item-left">
                    <span class="fa fa-envelope"></span>
                </div>
                <div class="widget-data">
                    <div class="widget-int num-count">48</div>
                    <div class="widget-title">New messages</div>
                    <div class="widget-subtitle">In your mailbox</div>
                </div>
                <div class="widget-controls">
                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top"
                        title="Remove Widget"><span class="fa fa-times"></span></a>
                </div>
            </div>
            <!-- END WIDGET MESSAGES -->

        </div>
        <div class="col-md-3">

            <!-- START WIDGET REGISTRED -->
            <div class="widget widget-default widget-item-icon" onclick="location.href='pages-address-book.html';">
                <div class="widget-item-left">
                    <span class="fa fa-user"></span>
                </div>
                <div class="widget-data">
                    <div class="widget-int num-count">375</div>
                    <div class="widget-title">Registred users</div>
                    <div class="widget-subtitle">On your website</div>
                </div>
                <div class="widget-controls">
                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top"
                        title="Remove Widget"><span class="fa fa-times"></span></a>
                </div>
            </div>
            <!-- END WIDGET REGISTRED -->

        </div>
        <div class="col-md-3">

            <!-- START WIDGET CLOCK -->
            <div class="widget widget-info widget-padding-sm">
                <div class="widget-big-int plugin-clock">00:00</div>
                <div class="widget-subtitle plugin-date">Loading...</div>
                <div class="widget-controls">
                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="left"
                        title="Remove Widget"><span class="fa fa-times"></span></a>
                </div>
                <div class="widget-buttons widget-c3">
                    <div class="col">
                        <a href="#"><span class="fa fa-clock-o"></span></a>
                    </div>
                    <div class="col">
                        <a href="#"><span class="fa fa-bell"></span></a>
                    </div>
                    <div class="col">
                        <a href="#"><span class="fa fa-calendar"></span></a>
                    </div>
                </div>
            </div>
            <!-- END WIDGET CLOCK -->

        </div>
    </div>
    <!-- END WIDGETS -->

</div>
@endsection


@section('scripts')

<script type='text/javascript' src='{{ URL::to('js/plugins/noty/jquery.noty.js') }}'></script>
<script type='text/javascript' src='{{ URL::to('js/plugins/noty/layouts/topCenter.js') }}'></script>
<script type='text/javascript' src='{{ URL::to('js/plugins/noty/layouts/topLeft.js') }}'></script>
<script type='text/javascript' src='{{ URL::to('js/plugins/noty/layouts/topRight.js') }}'></script>
<script type='text/javascript' src='{{ URL::to('js/plugins/noty/themes/default.js') }}'></script>

{{-- @guest
@else
<script>
    noty({text: 'Successful action{{ Auth::user()->username }}', layout: 'topRight', type: 'success'});
</script>
@endguest --}}

@endsection