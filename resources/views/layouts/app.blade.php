<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Kawal COVID-19</title>
        <!-- Favicon -->
        <link href="{{ asset('argon') }}/img/brand/kawal-covid-19.png" rel="icon" type="image/png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Icons -->
        <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        <!-- Argon CSS -->
        <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">
        <!-- MDBootstrap Datatables  -->
        <link href="{{ asset('argon') }}/css/addons/datatables.min.css" rel="stylesheet">
        

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        
    </head>
    <body class="{{ $class ?? '' }}">
        @auth()
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @include('layouts.navbars.sidebar')
            <script>

                $(document).ready(function(){
                    var firstName = "{{auth()->user()->name}}";
                    var intials = firstName.charAt(0);
                    var profileImage = $('#profileImage').text(intials);
                    var profileImageicon = $('#profileImage-icon').text(intials);
                    var profileImageicondrop = $('#profileImage-icon-dropdown').text(intials);
    
                });    
                
            </script>  
        @endauth
        
        <div class="main-content">
            @include('layouts.navbars.navbar')
            @yield('content')
            
        </div>

        @guest()
            @include('layouts.footers.guest')
        @endguest

        <style>
            table.dataTable thead .sorting:after,
            table.dataTable thead .sorting:before,
            table.dataTable thead .sorting_asc:after,
            table.dataTable thead .sorting_asc:before,
            table.dataTable thead .sorting_asc_disabled:after,
            table.dataTable thead .sorting_asc_disabled:before,
            table.dataTable thead .sorting_desc:after,
            table.dataTable thead .sorting_desc:before,
            table.dataTable thead .sorting_desc_disabled:after,
            table.dataTable thead .sorting_desc_disabled:before {
            bottom: .5em;
            }
        </style>

        <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        @stack('js')
        
        <!-- Argon JS -->
        <script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>
    </body>
</html>