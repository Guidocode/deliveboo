@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrati') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}"  enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome*') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" >
                                <div id="name-error" class=" text-danger"></div>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo email*') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                <div id="email-error" class=" text-danger"></div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- aggiunta --}}

                         <div class="form-group row">
                            <label for="vat-number" class="col-md-4 col-form-label text-md-right">{{ __('Partita Iva*') }}</label>

                            <div class="col-md-6">
                                <input id="vat_number" type="text" class="form-control @error('vat_number') is-invalid @enderror" name="vat_number" value="{{ old('vat_number') }}" >
                                <div id="vat_number-error" class=" text-danger border-danger "></div>
                                @error('vat_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">Immagine</label>

                            <div class="col-md-6">
                                <input type="file" id="image" name="image"
                                value="{{ old('image') }}"
                                onchange="showImage(event)"
                                class="form-control @error('image') is-invalid @enderror">
                                @error('image')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                                {{-- <p class="invalid-feedback" id="error-image"></p> --}}
                            </div>
                        </div>

                        {{-- CHECK-BOX --}}
                        <div class="form-group row ">
                            <label for="types" class="col-md-4 col-form-label text-md-right">{{ __('Tipologia ristorante*') }}</label>


                            <div class="col-md-6 d-flex flex-wrap">
                                @foreach ($types as $type)
                                    <div class="form-check form-check-inline">
                                        <input @if ( in_array($type->id,old('types', [])) )
                                        checked
                                    @endif class="form-check-input" name="types[]" type="checkbox" id="{{ $type->id }}" value="{{ $type->id }}">
                                        <label class="form-check-label" for="{{ $type->id }}">{{ $type->name }}</label>
                                    </div>
                                @endforeach

                                <div id="checkbox-error" class=" text-danger"></div>


                            </div>
                        </div>




                        {{-- END CHECK-BOX --}}

                         <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo*') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" >
                                <div id="address-error" class=" text-danger"></div>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Telefono*') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" >
                                <div id="phone-error" class=" text-danger"></div>
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- fine aggiunta --}}

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password*') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                <div id="password-error" class=" text-danger"></div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Conferma Password*') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                <div id="confirm-error" class=" text-danger"></div>
                            </div>

                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" id="registration-submit" disabled class="btn btn-primary">
                                    {{ __('REGISTRATI') }}
                                </button>
                            </div>
                        </div>

                    </form>


                    <script>
                        var showImage = function(event) {
                            const image = document.getElementById('output-image');
                            image.src = URL.createObjectURL(event.target.files[0]);
                        };


                        let submit = document.getElementById('registration-submit');

                        // submit.disabled = true;

                        function submitOn(){
                            if(nameCheck && emailCheck && vatNumberCheck && addressCheck && phoneCheck && checkboxsCheck && passwordCheck &&passwordConfCheck){
                                submit.disabled = false
                            }else{
                                submit.disabled = true
                            }
                        }


                        let nameField = document.getElementById('name');
                        let nameFieldError = document.getElementById('name-error');
                        let nameCheck = false

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

                        let emailField = document.getElementById('email');
                        let emailError = document.getElementById('email-error')
                        let emailCheck = false

                        emailField.addEventListener('focusout', function(){
                            // let reg = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+.[a-zA-Z]+$/
                            let reg = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
                            if (reg.test(emailField.value.trim())) {
                                emailError.innerText = ''
                                emailCheck = true
                            }else{
                                emailError.innerText = 'La mail inserita non è valida'
                                emailCheck = false
                            }

                            submitOn()
                        })

                        let vatNumberField = document.getElementById('vat_number');
                        let vatNumberError = document.getElementById('vat_number-error')
                        let vatNumberCheck = false


                        vatNumberField.addEventListener('focusout', function(){
                            let reg = /^[0-9]{11}$/
                            if (reg.test(vatNumberField.value.trim())) {
                                vatNumberError.innerText = ''
                                vatNumberCheck = true;
                                // console.log(vatNumberField.value.trim().length);
                            }else{
                                vatNumberError.innerText = 'La partita Iva deve contenere solo numeri e deve contenere 11 caratteri.'
                                vatNumberCheck = false
                            }
                            submitOn()

                        })

                        let addressField = document.getElementById('address');
                        let addressError = document.getElementById('address-error')
                        let addressCheck = false


                        addressField.addEventListener('focusout', function(){
                            let reg = /^[.@&]?[a-zA-Z0-9 ]+[ !.@&()]?[ a-zA-Z0-9!()]+/
                            if (reg.test(addressField.value.trim())) {
                                addressError.innerText = ''
                                addressCheck = true
                            }else if(addressField.value.length == 0   ){
                                addressError.innerText = 'Compila questo campo'
                                addressCheck = false
                            }
                            else {
                                addressError.innerText = 'L\'indirizzo non è valido'
                                addressCheck = false

                            }
                            submitOn()

                        })



                        let phoneField = document.getElementById('phone');
                        let phoneError = document.getElementById('phone-error');
                        let phoneCheck = false;


                        phoneField.addEventListener('focusout', function(){
                            let reg = /^[0-9-+\s]{9,15}$/
                            if (reg.test(phoneField.value.trim())) {
                                phoneError.innerText = '';
                                phoneCheck = true;
                            }else if(phoneField.value.length == 0   ){
                                phoneError.innerText = 'Compila questo campo';
                                phoneCheck = false;
                            }else {
                                phoneError.innerText = 'Il numero non è valido';
                                phoneCheck = false;
                                console.log('else ');
                            }
                            submitOn()

                        })



                        let checkboxsField = document.getElementsByName('types[]');
                        let checkboxsError = document.getElementById('checkbox-error');
                        let checkboxsCheck = false;


                        let count = 0;

                        for(let i = 0; i < checkboxsField.length; i++){

                            checkboxsField[i].addEventListener('click', function(){



                                if(checkboxsField[i].checked){
                                    checkboxsCheck = true;
                                    count++;
                                    checkboxsError.innerText = '';
                                }else if(!checkboxsField[i].checked){
                                    count--;

                                    if (count == 0) {
                                        checkboxsError.innerText = 'Selezionare almeno un tipo';
                                    }
                                }


                                // else if(!checkboxsField[i].checked && count == 0){
                                //     checkboxsError.innerText = 'Selezionare almeno un tipo';
                                // }

                                console.log(count);
                            })
                            submitOn()

                        }


                        let passwordField = document.getElementById('password');
                        let passwordError = document.getElementById('password-error')
                        let passwordCheck = false


                        passwordField.addEventListener('focusout', function(){

                            // let reg = /^(?!.*\s)(?=.[0-9])(?=.[a-z]).{8,20}$
                            let reg = /\s/
                            if (reg.test(passwordField.value)) {
                                passwordError.innerText = 'La password non può contenere spazi';
                            } else {

                                if (passwordField.value.length >= 8 && passwordField.value.length < 20 ) {
                                    passwordError.innerText = '';
                                    passwordCheck = true;
                                    console.log(passwordField.value);
                                }else if(passwordField.value.length == 0   ){
                                    passwordError.innerText = 'Compila questo campo';
                                    passwordCheck = false;
                                    console.log(passwordField.value);
                                }else {
                                    passwordError.innerText = 'La password inserita deve contenere almeno 8 caratteri e massimo 20';
                                    passwordCheck = false;
                                    console.log(passwordField.value);
                                }
                            }
                            passwordMatch()
                            submitOn()
                        })



                        let passwordConfField = document.getElementById('password-confirm');
                        let confirmError = document.getElementById('confirm-error');
                        let passwordConfCheck = false;

                        function passwordMatch() {
                            if(passwordConfField.value == passwordField.value){
                                confirmError.innerText = '';
                                passwordConfCheck = true;
                                console.log('sono io', passwordConfField.value);
                            }else{
                                confirmError.innerText = 'Le password non coincidono';
                                passwordConfCheck = false;
                                console.log('sono io non ', passwordConfField.value);
                            }
                            submitOn()
                        }

                        passwordConfField.addEventListener('focusout', passwordMatch)
                    </script>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
