
@extends('layouts.admin')


@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
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
            <img class="card-img-top" src="{{ Auth::user()->image }}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{ Auth::user()->name }}</h5>
                <p class="card-text">Email: {{ Auth::user()->email }}</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Indirizzo: {{ Auth::user()->address }}</li>
                <li class="list-group-item">P. Iva: {{ Auth::user()->vat_number }}</li>
                <li class="list-group-item">Telefono: {{ Auth::user()->phone }}</li>
            </ul>
            {{-- <div class="card-body">
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
            </div> --}}
        </div>
    </div>


@endsection
