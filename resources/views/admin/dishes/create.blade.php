@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-6 offset-3">
        <h1 class="text-center my-5">ADD DISH</h1>
        <form action ="{{ route('admin.dishes.store') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Dish Name</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"  value='{{ old('name') }}' >
                @error('name')
                 <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
              <label for="description" class="form-label">Ingredients</label>
              <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" id="description"  value='{{ old('description') }}'>
                @error('description')
                 <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
              <label for="price" class="form-label">Price</label>
              <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" id="price"  value='{{ old('price') }}'>
                @error('price')
                 <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
             
            Disponibile: 
            <div class="form-check">
             
                <input class="form-check-input" type="radio" name="visible" id="visible" value="1" checked>
                <label class="form-check-label mr-4 mb-3" for="visible">
                  Si
                </label>
        
                <input class="form-check-input" type="radio" name="visible" id="not-visible" value="0">
                <label class="form-check-label" for="not-visible">
                  No
                </label>

            </div>
          

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

@endsection
