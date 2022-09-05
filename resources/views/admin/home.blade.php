
@extends('layouts.admin')


@section('content')

    <div>
        <div class="d-flex justify-content-between">
            <div>
                <h1>Dashboard</h1>
                <div class="date">
                    <input type="date">
                </div>
            </div>
            <div class="d-flex align-items-start pt-2">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div>
                    Ciao <strong>{{ Auth::user()->name }}</strong> sei loggato! <br>
                    L'Area privata

                </div>
    

                <img class="card-img-top" src="{{ Auth::user()->image }}" alt="Card image cap">
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
            {{-- END 3 --}}
        </div>

        {{-- RECENT_ORDERS --}}
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


    {{-- ===================================================== --}}

    {{-- <div class="row justify-content-center">
        <div class="col-md-8"> --}}

            {{-- <div class="card">
                <div class="card-header">{{ __('Benvenuto nella tua area personale!') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Ciao <span class=" text-success">{{ Auth::user()->name }}</span>, sei loggato!
                </div>
            </div>

        </div>
        <div class="card" style="width: 18rem;">

            @if (Auth::user()->image)
                <img class="card-img-top" src="{{ Auth::user()->image }}" alt="Card image cap">
            @else
                <img src="https://restaurants.mu/img/default.jpg" alt="default">
            @endif

            <div class="card-body">
                <h5 class="card-title">{{ Auth::user()->name }}</h5>
                <p class="card-text">Email: {{ Auth::user()->email }}</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Indirizzo: {{ Auth::user()->address }}</li>
                <li class="list-group-item">P. Iva: {{ Auth::user()->vat_number }}</li>
                <li class="list-group-item">Telefono: {{ Auth::user()->phone }}</li>
            </ul> --}}
            {{-- <div class="card-body">
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
            </div> --}}
        {{-- </div>
    </div> --}}


@endsection
@section('title', 'dashboard')