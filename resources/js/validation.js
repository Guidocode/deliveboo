
let submit = document.getElementById('registration-submit');

submit.disabled = true;

function submitOn(){
    if(nameCheck && emailCheck && vatNumberCheck){
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
    if(reg.test(nameField.value)){
        nameFieldError.innerText = ''
        nameCheck = true
        submitOn()
    }else{
        nameFieldError.innerText = 'Il nome.....'
        nameCheck = false
        submitOn()
    }

})

let emailField = document.getElementById('email');
let emailError = document.getElementById('email-error')
let emailCheck = false

emailField.addEventListener('focusout', function(){
    let reg = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+$/
    if (reg.test(emailField.value)) {
        emailError.innerText = ''
        emailCheck = true
        submitOn()
    }else{
        emailError.innerText = 'La mail inserita non è valida'
        emailCheck = false
        submitOn()
    }


})

let vatNumberField = document.getElementById('vat_number');
let vatNumberError = document.getElementById('vat_number-error')
let vatNumberCheck = false


vatNumberField.addEventListener('focusout', function(){
    let reg = /^[0-9]{11}$/
    if (reg.test(vatNumberField.value)) {
        vatNumberError.innerText = ''
        vatNumberCheck = true
        submitOn()
    }else{
        vatNumberError.innerText = 'La partita Iva deve contenere solo numeri e deve contenere 11 caratteri.'
        vatNumberCheck = false
        submitOn()
    }


})

let addressField = document.getElementById('address');
let addressError = document.getElementById('address-error')
let addressCheck = false


addressField.addEventListener('focusout', function(){
    let reg = /[0-9a-zA-Z]{6,}/
    if (reg.test(addressField.value)) {
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



