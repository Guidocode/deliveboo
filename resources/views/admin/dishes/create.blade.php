@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-6 offset-3">
        <h1 class="text-center my-5">AGGIUNGI PIATTO</h1>
        <form action ="{{ route('admin.dishes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Nome piatto*</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"  value='{{ old('name') }}' >
                @error('name')
                 <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
              <label for="description" class="form-label">Ingredienti*</label>
              {{-- <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" id="description"  value='{{ old('description') }}'> --}}
              <textarea name="description" class="form-control @error('description') is-invalid @enderror"" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
              @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="price" class="form-label">Prezzo*</label>
              <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" id="price"  value='{{ old('price') }}'>
                @error('price')
                 <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="image">
                <img id="output-image" width="150" src="{{ asset('storage/uploads/default-img.gif') }}" alt="placeholder image">
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Immagine</label>
                <input type="file" id="image" name="image"
                value="{{ old('image') }}"
                onchange="showImage(event)"
                class="form-control @error('image') is-invalid @enderror">
                @error('image')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
                {{-- <p class="invalid-feedback" id="error-image"></p> --}}
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

        <script>
            var showImage = function(event) {
                const image = document.getElementById('output-image');
                image.src = URL.createObjectURL(event.target.files[0]);
            };
        </script>

    </div>
</div>

@endsection
