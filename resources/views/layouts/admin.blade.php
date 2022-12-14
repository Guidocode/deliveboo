<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>DeliverBoo | @yield('title')</title>

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
        @guest
        <div class="guest-header">

            <div class="logo">
                <img src="{{ asset('img/deliverboo_logo.png') }}" alt="Logo">
            </div>

            <div class="d-flex justify-content-between w-100 pt-2">
                <div>

                    <a class="about {{ Route::currentRouteName() === '/' ? 'active' : ''}}" href="{{ url('/') }}"> <i class="fa-solid fa-arrow-left"></i> Sito Pubblico</a>

                </div>

                <div class="d-flex">
                    <a class="mr-4 home {{ Route::currentRouteName() === 'login' ? 'active' : ''}}" href="{{ route('login') }}">Accedi</a>

                    @if (Route::has('register'))
                    <a class="about {{ Route::currentRouteName() === 'register' ? 'active' : ''}}" href="{{ route('register') }}">Registrati</a>
                    @endif
                </div>
            </div>


        </div>
        @endguest
        {{-- END GUEST --}}

     <div class="d-flex layout_wrapper">
        @auth
                <aside>
                    <div class="top d-flex align-items-center">
                        <div class="logo">
                            <img src='{{ asset('img/deliverboo_logo.png')}}' alt="Logo">
                        </div>
                        {{-- <div>
                            <i class="fa-solid fa-xmark"></i>
                        </div> --}}
                    </div>

                    {{-- sidebar --}}
                    <div class="sidebar">
                        <a class="{{ Route::currentRouteName() === 'admin.index' ? 'active' : ''}}" href="{{ route('admin.index')}}" class="active">
                            <i class="fa-solid fa-table-list"></i>
                            <h4>Dashboard</h4>
                        </a>
                        <a class="{{ Route::currentRouteName() === 'admin.profile' ? 'active' : ''}}"
                        href="{{ route('admin.profile') }}">
                            <i class="fa-regular fa-user"></i>
                            <h4>Profilo</h4>
                        </a>
                        <a class="{{ Route::currentRouteName() === 'admin.dishes.index' ? 'active' : ''}}" href="{{ route('admin.dishes.index')}}">
                            <i class="fa-solid fa-bowl-rice"></i>
                            <h4>Menu</h4>
                        </a>
                        <a class="{{ Route::currentRouteName() === 'admin.dishes.create' ? 'active' : ''}}" href="{{ route('admin.dishes.create')}}">
                            <i class="fa-solid fa-utensils"></i>
                            <h4>Aggiungi piatto</h4>
                        </a>
                        <a class="{{ Route::currentRouteName() === 'admin.order.index' ? 'active' : ''}}" href="{{ route('admin.order.index')}}">
                            <i class="fa-solid fa-money-bill-wheat"></i>
                            <h4>Ordini</h4>
                            {{-- <span class="message-count">2</span> --}}
                        </a>


                        <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="fa-solid fa-arrow-left"></i>
                        <h4>{{ __('Esci') }}</h4>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
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
