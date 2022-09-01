
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
    </div>

@endsection
