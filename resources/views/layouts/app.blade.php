<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Budget') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles de Inspinia template -->
    <link href="{{ asset('inspinia/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('inspinia/font-awesome/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('inspinia/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('inspinia/css/style.css') }}" rel="stylesheet">


    @stack('styles')

</head>
<body class="top-navigation">
    @yield('content')
</body>
<!-- Scripts -->

<script src="{{ mix('js/app.js') }}"></script>
{{--<script src="{{ mix('inspinia/font-awesome/js/all.min.js')}}"></script>--}}

<!-- Mainly scripts -->
<script src="{{ asset('inspinia/js/jquery-3.1.1.min.js')}}"></script>
<script src="{{ asset('inspinia/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('inspinia/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
<script src="{{ asset('inspinia/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{ asset('inspinia/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{ asset('inspinia/js/inspinia.js')}}"></script>
<script src="{{ asset('inspinia/js/plugins/pace/pace.min.js')}}"></script>

<!-- Flot -->
<script src="{{ asset('inspinia/js/plugins/flot/jquery.flot.js')}}"></script>
<script src="{{ asset('inspinia/js/plugins/flot/jquery.flot.tooltip.min.js')}}"></script>
<script src="{{ asset('inspinia/js/plugins/flot/jquery.flot.resize.js')}}"></script>

<!-- ChartJS-->
<script src="{{ asset('inspinia/js/plugins/chartJs/Chart.min.js')}}"></script>

<!-- Peity -->
<script src="{{ asset('inspinia/js/plugins/peity/jquery.peity.min.js')}}"></script>

<!-- Peity demo -->
<script src="{{ asset('inspinia/js/demo/peity-demo.js')}}"></script>

@stack('scripts')
</html>
