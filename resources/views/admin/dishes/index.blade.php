@extends('layouts.app')

@section('content')

    <h1>Menu</h1>

    @foreach ($dishes as $dish)

    <h2>{{ $dish->name }}</h2>
    @endforeach

@endsection
