@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-6 offset-3">
        <h1 class="text-center my-5">Update Dish</h1>
        <form action ="{{ route('admin.dishes.update', $dish) }}" method="POST">
            @method('PUT')
            @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Dish Name</label>

                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"  value='{{ old('name', $dish->name) }}' >
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Ingredients</label>
                    <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" id="description"  value='{{ old('description', $dish->description) }}'>
                    @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" id="price"  value='{{ old('price', $dish->price) }}'>
                    @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>




            <button type="submit" class="btn btn-success">Submit</button>
            <a class="btn btn-primary" href="{{ route('admin.dishes.show', $dish)}}"><< Torna indietro</a>
        </form>
    </div>
</div>
@endsection
