@extends('layouts.admin')

@section('content')
<div class="container">
  <h1>My Menu</h1>
  @if(session('dish_cancellato'))
      <div class="alert alert-success" role="alert">
        <strong>{{ session('dish_cancellato') }}</strong>
      </div>
  @endif
  <table class="table">
    <thead>
      <tr>
        {{-- <th scope="col">ID</th> --}}
        <th scope="col">Name Of Dish</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>

    <tbody>

      @foreach ($dishes as $dish)
      <tr>
        {{-- <th scope="row">{{$dish->id}}</th> --}}
        <td>{{$dish->name}}</td>
        <td class="d-flex">
          
          <a class="btn btn-primary" href="{{ route('admin.dishes.show', $dish) }}">SHOW</a>
          <a class="btn btn-warning mx-3" href="{{ route('admin.dishes.edit', $dish) }}">EDIT</a>
        
          <form   
          onsubmit="return confirm('confermi l\'eliminazione di: {{ $dish->name }}?')"
          action="{{ route('admin.dishes.destroy', $dish) }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger" >DELETE </button></form>
          @endforeach

        </td>

      </tr>
    </tbody>
  </table>
</div>


@endsection
