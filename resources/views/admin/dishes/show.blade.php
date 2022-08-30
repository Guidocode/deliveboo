@extends('layouts.admin')

@section('content')



    {{-- <h1>{{ $dish->name }}</h1>

    <span class="h5">Ingredients:</span>
    <span>{{ $dish->description }}</span>
    <p class="h5"> Disponibilità: {{  $dish->visible === 1 ? 'Si' : 'No' }}</p>

    <h5><strong>Price: </strong>{{ $dish->price }}&euro;</h5>
    <a class="btn btn-primary my-3" href="{{ route('admin.dishes.index') }}"><< Torna Indietro</a>
    <a class="btn btn-warning" href="{{ route('admin.dishes.edit', $dish) }}">Modifica</a> --}}

    <div class="card" style="width: 25rem;">

        @if ($dish->image)
            <img class="card-img-top" src="{{ asset('storage/' . $dish->image) }}" alt="{{ $dish->original_name_image }}">
        @else
            <img class="card-img-top" src="{{ asset('storage/uploads/default-img.gif') }}" alt="{{ $dish->original_name_image }}">
        @endif

        <div class="card-body">

            <h5 class="card-title">{{ $dish->name }}</h5>
            <p class="card-text"><span>Ingredients:</span>{{ $dish->description }}</p>
            <p class="h5"> Disponibilità: {{  $dish->visible === 1 ? 'Si' : 'No' }}</p>
            <h5><strong>Price: </strong>{{ $dish->price }}&euro;</h5>

            <a class="btn btn-primary my-3" href="{{ route('admin.dishes.index') }}"><< Torna Indietro</a>
            <a class="btn btn-warning" href="{{ route('admin.dishes.edit', $dish) }}">Modifica</a>

        </div>
    </div>







@endsection
