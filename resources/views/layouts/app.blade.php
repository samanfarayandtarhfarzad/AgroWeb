<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="icon" type="image/x-icon" href="{{ URL::to('AgroPersianLogo.ico') }}"><meta name="description" content="">
    <meta name="author" content="">

    <title>
        @yield('title')
    </title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="_token" content="{{csrf_token()}}">

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" id="theme" href="{{ asset('css/theme-default.css') }}" />
    @yield('styles')
    
</head>
<body>
    <!-- START PAGE CONTAINER -->
    <div class="page-container page-navigation-top-fixed">
            
        <!-- START PAGE SIDEBAR -->
        @include('partial/sidebar')
        
        <!-- PAGE CONTENT -->
        <div class="page-content">
            
            <!-- START X-NAVIGATION VERTICAL -->
            @include('partial/navigation')                    

            <!-- START BREADCRUMB -->
            @include('partial/breadcrumb') 

            <!-- START ALERT -->
            @include('partial/alert') 
            
            <!-- PAGE CONTENT WRAPPER -->
            @yield('content')

        </div>            
        <!-- END PAGE CONTENT -->

    </div>
    <!-- END PAGE CONTAINER -->

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
    <!-- END PLUGINS -->

    <!-- START THIS PAGE PLUGINS-->        
    <script type='text/javascript' src="{{ URL::to('js/plugins/icheck/icheck.min.js') }}"></script>        
    <script type="text/javascript" src="{{ URL::to('js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('js/plugins/scrolltotop/scrolltopcontrol.js') }}"></script>
    
    <script type="text/javascript" src="{{ URL::to('js/plugins/morris/raphael-min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('js/plugins/morris/morris.min.js') }}"></script>       
    <script type="text/javascript" src="{{ URL::to('js/plugins/rickshaw/d3.v3.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('js/plugins/rickshaw/rickshaw.min.js') }}"></script>
    <script type='text/javascript' src='{{ URL::to('js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}'></script>
    <script type='text/javascript' src='{{ URL::to('js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}'></script>                
    <script type='text/javascript' src='{{ URL::to('js/plugins/bootstrap/bootstrap-datepicker.js') }}'></script>                
    <script type="text/javascript" src="{{ URL::to('js/plugins/owl/owl.carousel.min.js') }}"></script>                 
    
    <script type="text/javascript" src="{{ URL::to('js/plugins/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('js/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- END THIS PAGE PLUGINS-->        

    <!-- START TEMPLATE -->
    
    <script type="text/javascript" src="{{ URL::to('js/plugins.js') }}"></script>        
    <script type="text/javascript" src="{{ URL::to('js/actions.js') }}"></script>
    
    <script type="text/javascript" src="{{ URL::to('js/demo_dashboard.js') }}"></script>
    <!-- END TEMPLATE -->
    @yield('scripts')
<!-- END SCRIPTS -->         
</body>
</html>
