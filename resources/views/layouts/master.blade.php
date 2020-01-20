<!DOCTYPE html>
<html class="body-full-height" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- META SECTION -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="icon" type="image/x-icon" href="{{ URL::to('AgroPersianLogo.ico') }}">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>
        @yield('title')
    </title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="_token" content="{{csrf_token()}}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- CSS INCLUDE -->
    <link rel="stylesheet" type="text/css" id="theme" href="{{ asset('css/theme-default.css') }}" />

    <!-- Styles -->
    @yield('styles')
</head>

<body>
    @yield('content')
    
    <!-- MESSAGE BOX-->
    @include('partial/messagebox')
    
    <!-- START PRELOADS -->
    <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
    <audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
    <!-- END PRELOADS -->
    
    <!-- START SCRIPTS -->

    <!-- START PLUGINS -->
    <script type="text/javascript" src="{{ URL::to('js/plugins/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('js/plugins/jquery/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('js/plugins/bootstrap/bootstrap.min.js') }}"></script>

    <!-- START THIS PAGE PLUGINS-->        
    <script type='text/javascript' src="{{ URL::to('js/plugins/icheck/icheck.min.js') }}"></script>        
    <script type="text/javascript" src="{{ URL::to('js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('js/plugins/scrolltotop/scrolltopcontrol.js') }}"></script>
    
    <!-- START TEMPLATE -->
    <script type="text/javascript" src="{{ URL::to('js/plugins.js') }}"></script>        
    <script type="text/javascript" src="{{ URL::to('js/actions.js') }}"></script>
    
    <!-- END SCRIPTS -->   
</body>

</html>