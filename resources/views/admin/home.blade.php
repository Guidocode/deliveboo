
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
                    <div class="theme-toggler">
                        <span class="active"><i class="fa-solid fa-sun"></i></span>
                        <span><i class="fa-solid fa-moon"></i></span>
                    </div>
        
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
                            <img class="card-img-top" src="{{ asset('storage/' . Auth::user()->image) }}" alt="Immagine utente">
        
                            @elseif (Auth::user()->image_db)
                            <img class="card-img-top" src="{{ Auth::user()->image_db }}" alt="Immagine db">
        
                            @else
                            <img class="card-img-top" src="{{ asset('storage/uploads/restaurant-default.jpg') }}" alt="immagine default ristorante">
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
                            <h5>Total Sales</h5>
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
                    <small class="text-muted">Last 24 hours</small>
                    <p>81%</p>
                    </div>
                </div>
                {{-- END SALES --}}

                <div class="expenses">
                    <i class="fa-solid fa-chart-simple"></i>
                    <div class="middle">
                        <div class="left">
                            <h5>Total Expenses</h5>
                            <h2>$14,567</h2>
                        </div>
                        <div class="progress">
                            <svg>
                             <circle cx="38" cy="38" r="36"></circle>
                         </svg>
                         </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <small class="text-muted">Last 24 hours</small>
                        <p>62%</p>
                    </div>
                </div>
                {{-- END "2" --}}

                <div class="income">
                    <i class="fa-solid fa-chart-line"></i>
                    <div class="middle">
                     <div class="left">
                            <h5>Total Income</h5>
                            <h2>$10,000</h2>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <small class="text-muted">Last 24 hours</small>
                        <p>45%</p>
                    </div>
                </div>
            </div>

            {{-- END INSIGHTS --}}
            <div class="recent-orders">
                <H2>Recent Orders</H2>
                <table>
                    <thead>
                        <tr>
                            <th>Order Number</th>
                            <th>Payment</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>12356</td>
                            <td>Due</td>
                            <td class="warning">Pending</td>
                            <td class="primary">Details</td>
                        </tr>
                        <tr>
                            <td>12356</td>
                            <td>Due</td>
                            <td class="warning">Pending</td>
                            <td class="primary">Details</td>
                        </tr>
                        <tr>
                            <td>12356</td>
                            <td>Due</td>
                            <td class="warning">Pending</td>
                            <td class="primary">Details</td>
                        </tr>
                    </tbody>
                </table>
                <a href="#">Show all</a>
            </div>
        </div>
    </div>
</div>
    {{-- RECENT_ORDERS --}}

@endsection
@section('title', 'dashboard')
