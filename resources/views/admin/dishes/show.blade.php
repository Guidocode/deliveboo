@extends('layouts.app')

@section('content')

    <h1>Dish</h1>

    <h3>{{ $dish->name }}</h3>

    <h4>Ingredients</h4>
    <p>{{ $dish->description }}</p>

    <h3>Price: {{ $dish->price }}</h3>



@endsection
