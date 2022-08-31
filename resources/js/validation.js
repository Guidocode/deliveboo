
let submit = document.getElementById('registration-submit');

submit.disabled = true;

function submitOn(){
    if(nameCheck && emailCheck && vatNumberCheck && addressCheck && phoneCheck && checkboxsCheck){
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
    submitOn
})



let passwordConfField = document.getElementById('password-confirm');
let passwordConfError = document.getElementById('password-conf-error');
let passwordConfCheck = false;

function passwordMatch() {



    if(passwordConfField.value == passwordField.value){
        passwordConfError = '';
        passwordConfCheck = true;
        console.log('sono io', passwordConfField.value);
    }else{
        passwordConfError = 'Le password non coincidono';
        passwordConfCheck = false;
        console.log('sono io non ', passwordConfField.value);
    }
}

passwordConfField.addEventListener('focusout', passwordMatch)

// passwordField.addEventListener('focusout', function(){

//     let reg = /^(?!\S*\s)(?=.[0-9])(?=.[a-z]).{8,20}$/
//     let regw = /\s/
//     console.log(regw.test(passwordField.value));

//     if (reg.test(passwordField.value.trim())) {
//         passwordError.innerText = '';
//         passwordCheck = true;
//         console.log(passwordField.value.trim().length);
//     }else if(passwordField.value.length == 0   ){
//         passwordError.innerText = 'Compila questo campo';
//         passwordCheck = false;
//         console.log(passwordField.value.trim().length);
//     }else {
//         passwordError.innerText = 'La password inserita deve contenere almeno 8 caratteri e massimo 20';
//         passwordCheck = false;
//         console.log(passwordField.value.trim().length);
//     }
//     submitOn()

// })
