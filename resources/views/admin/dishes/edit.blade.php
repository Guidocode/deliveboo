@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-6 offset-3">
        <h1 class="text-center my-5">Modifica piatto</h1>
        <form action ="{{ route('admin.dishes.update', $dish) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nome piatto*</label>

                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"  value='{{ old('name', $dish->name) }}' >
                    <div id="name-error" class=" text-danger"></div>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Ingredienti*</label>
                    <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" id="description"  value='{{ old('description', $dish->description) }}'>
                    <div id="description-error" class=" text-danger"></div>
                    @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">

                    <label for="price" class="form-label">Prezzo*</label>
                    <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" id="price"  value='{{ old('price', $dish->price) }}'>
                    <div id="price-error" class=" text-danger"></div>
                    @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">

                    {{-- @if ($dish->image)
                        <div class="image">
                            <img id="output-image" width="150" src="{{ asset('storage/' . $dish->image) }}" alt="{{ $dish->original_name_image }}">
                        </div>
                    @endif --}}

                    @if ($dish->image)
                        <img id="output-image" width="150" src="{{ asset('storage/' . $dish->image) }}" alt="{{ $dish->original_name_image }}">
                    @elseif ($dish->image_db)
                        <img id="output-image" width="150" src="{{ $dish->image_db }}" alt="Immagine db">
                    @else
                        <img id="output-image" width="150" src="{{ asset('storage/uploads/dish-default.jpg') }}" alt="{{ $dish->original_name_image }}">
                    @endif

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




            <button type="submit" id="edit-submit" class="btn btn-success">CONFERMA</button>
            <a class="btn btn-primary" href="{{ route('admin.dishes.show', $dish)}}"><< TORNA INDIETRO</a>
        </form>

        <script>
            var showImage = function(event) {
                const image = document.getElementById('output-image');
                image.src = URL.createObjectURL(event.target.files[0]);
            };


            let submit = document.getElementById('edit-submit');


            function submitOn(){
                if(nameCheck && ingredientsCheck && priceCheck){
                    submit.disabled = false
                }else{
                    submit.disabled = true
                }
            }


            let nameField = document.getElementById('name');
            let nameFieldError = document.getElementById('name-error');
            let nameCheck = true

            nameField.addEventListener('focusout', function(){
                let reg = /^[.@&]?[a-zA-Z0-9 ]+[ !.@&()]?[ a-zA-Z0-9!()]+/
                // let reg = /^([a-zA-Z0-9 ']*)$/
                if(reg.test(nameField.value.trim())){
                    nameFieldError.innerText = '';
                    nameCheck = true;
                    console.log(nameField.value.trim());
                }else{
                    nameFieldError.innerText = 'Il nome non è valido'
                    nameCheck = false

                }
                submitOn()
            })

            let ingredientsField = document.getElementById('description');
            let ingredientsFieldError = document.getElementById('description-error');
            let ingredientsCheck = true

            ingredientsField.addEventListener('focusout', function(){
                let reg = /^[.@&]?[a-zA-Z0-9 ]+[ !.@&()]?[ a-zA-Z0-9!()]+/
                // let reg = /^([a-zA-Z0-9 ']*)$/
                if(reg.test(ingredientsField.value.trim())){
                    ingredientsFieldError.innerText = '';
                    ingredientsCheck = true;
                    console.log(ingredientsField.value.trim());
                }else{
                    ingredientsFieldError.innerText = 'Ingredienti non validi'
                    ingredientsCheck = false

                }
                submitOn()
            })


            let priceField = document.getElementById('price');
            let priceError = document.getElementById('price-error');
            let priceCheck = true;


            priceField.addEventListener('focusout', function(){
                let reg = /\d+(?:[.,]\d{0,2})?/
                if (reg.test(priceField.value.trim())) {
                    priceError.innerText = '';
                    priceCheck = true;
                }else if(priceField.value.length == 0   ){
                    priceError.innerText = 'Compila questo campo';
                    priceCheck = false;
                }else {
                    priceError.innerText = 'Il prezzo non è valido';
                    priceCheck = false;
                    console.log('else ');
                }
                submitOn()

            })

        </script>

    </div>
</div>
@endsection
