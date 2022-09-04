<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/admin.js') }}" defer></script>
    <script src="{{ asset('js/validation.js') }}" defer></script>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" >

    <!-- Styles -->
    <link href="{{ asset('css/admin/style.css') }}" rel="stylesheet">


</head>
<body>
    <div id="app">      
     <div class="d-flex layout_wrapper">
        @auth
                <aside>
                    <div class="top">
                        <div class="logo">
                            <img src='img/deliverboo_logo.png' alt="Logo">
                        </div>
                        <div class="close" id="close-btn">
                            <i class="fa-solid fa-xmark"></i>
                        </div>
                    </div>

                    {{-- sidebar --}}
                    <div class="sidebar">
                        <a href="#" class="active">
                            <i class="fa-solid fa-table-list"></i>
                            <h4>Dashboard</h4>
                        </a>
                        <a href="#">
                            <i class="fa-regular fa-user"></i>
                            <h4>Profile</h4>
                        </a>
                        <a href="#">
                            <i class="fa-solid fa-bowl-rice"></i>
                            <h4>My menu</h4>
                        </a>
                        <a href="#">
                            <i class="fa-solid fa-money-bill-wheat"></i>
                            <h4>Orders</h4>
                            <span class="message-count">2</span>
                        </a>
                        <a href="#">
                            <i class="fa-solid fa-utensils"></i>
                            <h4>Add plate</h4>
                        </a>
                        <a href="#">
                            <i class="fa-solid fa-chart-line"></i>
                            <h4>Analytics</h4>
                        </a>
                        <a href="#">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            <h4>Reports</h4>
                        </a>

                        <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="fa-regular fa-user"></i>
                        <h4>{{ __('Logout') }}</h4>
                        </a>
                    </div>
                </aside>                   
        @endauth
        <main>
            @yield('content')
        </main>
    </div>
    </div>
</body>
</html>
