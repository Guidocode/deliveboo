@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Accedi') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <div id="email-error" class=" text-danger"></div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                <div id="password-error" class=" text-danger"></div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Ricordami') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" id="login-submit" disabled class="btn btn-primary">
                                    {{ __('ACCEDI') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Hai dimenticato la Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>

                    <script>
                        let submit = document.getElementById('login-submit');

                        // submit.disabled = true;

                        function submitOn(){
                            if(emailCheck && passwordCheck){
                                submit.disabled = false
                            }else{
                                submit.disabled = true
                            }
                        }

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

                            submitOn()
                        })

                    </script>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
