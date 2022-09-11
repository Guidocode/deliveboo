
@extends('layouts.admin')


@section('content')
{{-- MAIN  --}}
<div class="main-dashboard">

    <div class="left d-flex justify-content-center">
        <div class="cont">
            <div class="d-flex justify-content-between">
                <div>
                    <h1>Dashboard</h1>
                    <div class="date">
                        <input type="date">
                    </div>
                </div>

                <div class="top d-flex align-items-start pt-2">
                    <button id="menu-btn">
                        <span><i class="fa-solid fa-bars"></i></span>
                    </button>
                    {{-- <div class="theme-toggler">
                        <span class="active"><i class="fa-solid fa-sun"></i></span>
                        <span><i class="fa-solid fa-moon"></i></span>
                    </div> --}}

                    {{-- PROFILE --}}
                    <div class="profile d-flex">

                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif

                        <div class="info">
                            <p>Ciao <strong>{{ Auth::user()->name }}</strong> sei loggato!</p>
                            <small class="text-muted">Admin</small>
                        </div>

                        <div class="profile-photo">

                            @if (Auth::user()->image)
                            <img class="card-img-top round-image" src="{{ asset('storage/' . Auth::user()->image) }}" alt="Immagine utente">

                            @elseif (Auth::user()->image_db)
                            <img class="card-img-top round-image" src="{{ Auth::user()->image_db }}" alt="Immagine db">

                            @else
                            <img class="card-img-top round-image" src="{{ asset('storage/uploads/restaurant-default.jpg') }}" alt="immagine default ristorante">
                            @endif

                        </div>
                    </div>
                </div>
            </div>

            <div class="insights">
                <div class="sales">
                    <i class="fa-solid fa-chart-pie"></i>

                    <div class="middle">
                        <div class="left">
                            <h5>Vendite Totali</h5>
                            <h2>$25,000</h2>
                        </div>

                        <div class="progress">
                        <svg>
                            <circle cx="38" cy="38" r="36"></circle>
                        </svg>
                        {{-- <div class="number"><p>81%</p></div> --}}
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                    <small class="text-muted">Ultime 24 ore</small>
                    <p>81%</p>
                    </div>
                </div>
                {{-- END SALES --}}

                <div class="expenses">
                    <i class="fa-solid fa-chart-simple"></i>
                    <div class="middle">
                        <div class="left">
                            <h5>Spese Totali</h5>
                            <h2>$14,567</h2>
                        </div>
                        <div class="progress">
                            <svg>
                             <circle cx="38" cy="38" r="36"></circle>
                         </svg>
                         </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <small class="text-muted">Ultime 24 ore</small>
                        <p>62%</p>
                    </div>
                </div>
                {{-- END "2" --}}

                <div class="income">
                    <i class="fa-solid fa-chart-line"></i>
                    <div class="middle">
                     <div class="left">
                            <h5>Guadagno Totale</h5>
                            <h2>$10,000</h2>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <small class="text-muted">Ultime 24 ore</small>
                        <p>45%</p>
                    </div>
                </div>
            </div>

            {{-- END INSIGHTS --}}
            <div class="recent-orders">
                <H2>Nuovi Messaggi</H2>
                <table>
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Cognome</th>
                            <th>Data</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>John</td>
                            <td>Doe</td>
                            <td class="warning">12/02/2022</td>
                            <td class="primary">Unread</td>
                        </tr>
                        <tr>
                            <td>Jane</td>
                            <td>Doe</td>
                            <td class="warning">12/09/2022</td>
                            <td class="primary">Read</td>
                        </tr>
                        <tr>
                            <td>Mario</td>
                            <td>Rossi</td>
                            <td class="warning">11/08/21</td>
                            <td class="primary">Unread</td>
                        </tr>
                    </tbody>
                </table>
                <a href="#">Vedi tutto</a>
            </div>
        </div>
    </div>
</div>
    {{-- RECENT_ORDERS --}}

@endsection
@section('title', 'dashboard')
