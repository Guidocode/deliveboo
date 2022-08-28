@extends('layouts.app')

@section('content')
<div class="container">

    
    <h1>{{ $dish->name }}</h1>
    
    <span class="h5">Ingredients:</span>
    <span>{{ $dish->description }}</span>
    
    <h5><strong>Price: </strong>{{ $dish->price }}&euro;</h5>
    <a class="btn btn-primary my-3" href="{{ route('admin.dishes.index') }}"><< Torna Indietro</a>
    <a class="btn btn-warning" href="{{ route('admin.dishes.edit', $dish) }}">Modifica</a>
</div>




@endsection
