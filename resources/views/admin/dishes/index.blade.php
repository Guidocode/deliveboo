@extends('layouts.app')

@section('content')
<div class="container">
    
    <h1>Menu</h1>
    @if(session('dish_cancellato'))
        <div class="alert alert-success" role="alert">
          <strong>{{ session('dish_cancellato') }}</strong>
        </div>
    @endif
    
    @foreach ($dishes as $dish)
    
    <h2>{{ $dish->name }}</h2>
    
    <a class="btn btn-primary" href="{{ route('admin.dishes.show', $dish) }}">SHOW</a>
    <a class="btn btn-warning" href="{{ route('admin.dishes.edit', $dish) }}">EDIT</a>

    <form   
    onsubmit="return confirm('confermi l\'eliminazione di: {{ $dish->name }}?')"
    action="{{ route('admin.dishes.destroy', $dish) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger" >DELETE </button></form>
    @endforeach
</div>


@endsection
