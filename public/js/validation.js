/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/validation.js":
/*!************************************!*\
  !*** ./resources/js/validation.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// let submit = document.getElementById('registration-submit');
// submit.disabled = true;
// function submitOn(){
//     if(nameCheck && emailCheck && vatNumberCheck && addressCheck && phoneCheck && checkboxsCheck && passwordCheck &&passwordConfCheck){
//         submit.disabled = false
//     }else{
//         submit.disabled = true
//     }
// }
// let nameField = document.getElementById('name');
// let nameFieldError = document.getElementById('name-error');
// let nameCheck = false
// nameField.addEventListener('focusout', function(){
//     let reg = /^[.@&]?[a-zA-Z0-9 ]+[ !.@&()]?[ a-zA-Z0-9!()]+/
//     // let reg = /^([a-zA-Z0-9 ']*)$/
//     if(reg.test(nameField.value.trim())){
//         nameFieldError.innerText = '';
//         nameCheck = true;
//         console.log(nameField.value.trim());
//     }else{
//         nameFieldError.innerText = 'Il nome non è valido'
//         nameCheck = false
//     }
//     submitOn()
// })
// let emailField = document.getElementById('email');
// let emailError = document.getElementById('email-error')
// let emailCheck = false
// emailField.addEventListener('focusout', function(){
//     // let reg = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+.[a-zA-Z]+$/
//     let reg = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
//     if (reg.test(emailField.value.trim())) {
//         emailError.innerText = ''
//         emailCheck = true
//     }else{
//         emailError.innerText = 'La mail inserita non è valida'
//         emailCheck = false
//     }
//     submitOn()
// })
// let vatNumberField = document.getElementById('vat_number');
// let vatNumberError = document.getElementById('vat_number-error')
// let vatNumberCheck = false
// vatNumberField.addEventListener('focusout', function(){
//     let reg = /^[0-9]{11}$/
//     if (reg.test(vatNumberField.value.trim())) {
//         vatNumberError.innerText = ''
//         vatNumberCheck = true;
//         // console.log(vatNumberField.value.trim().length);
//     }else{
//         vatNumberError.innerText = 'La partita Iva deve contenere solo numeri e deve contenere 11 caratteri.'
//         vatNumberCheck = false
//     }
//     submitOn()
// })
// let addressField = document.getElementById('address');
// let addressError = document.getElementById('address-error')
// let addressCheck = false
// addressField.addEventListener('focusout', function(){
//     let reg = /^[.@&]?[a-zA-Z0-9 ]+[ !.@&()]?[ a-zA-Z0-9!()]+/
//     if (reg.test(addressField.value.trim())) {
//         addressError.innerText = ''
//         addressCheck = true
//     }else if(addressField.value.length == 0   ){
//         addressError.innerText = 'Compila questo campo'
//         addressCheck = false
//     }
//     else {
//         addressError.innerText = 'L\'indirizzo non è valido'
//         addressCheck = false
//     }
//     submitOn()
// })
// let phoneField = document.getElementById('phone');
// let phoneError = document.getElementById('phone-error');
// let phoneCheck = false;
// phoneField.addEventListener('focusout', function(){
//     let reg = /^[0-9-+\s]{9,15}$/
//     if (reg.test(phoneField.value.trim())) {
//         phoneError.innerText = '';
//         phoneCheck = true;
//     }else if(phoneField.value.length == 0   ){
//         phoneError.innerText = 'Compila questo campo';
//         phoneCheck = false;
//     }else {
//         phoneError.innerText = 'Il numero non è valido';
//         phoneCheck = false;
//         console.log('else ');
//     }
//     submitOn()
// })
// let checkboxsField = document.getElementsByName('types[]');
// let checkboxsError = document.getElementById('checkbox-error');
// let checkboxsCheck = false;
// let count = 0;
// for(let i = 0; i < checkboxsField.length; i++){
//     checkboxsField[i].addEventListener('click', function(){
//         if(checkboxsField[i].checked){
//             checkboxsCheck = true;
//             count++;
//             checkboxsError.innerText = '';
//         }else if(!checkboxsField[i].checked){
//             count--;
//             if (count == 0) {
//                 checkboxsError.innerText = 'Selezionare almeno un tipo';
//             }
//         }
//         // else if(!checkboxsField[i].checked && count == 0){
//         //     checkboxsError.innerText = 'Selezionare almeno un tipo';
//         // }
//         console.log(count);
//     })
//     submitOn()
// }
// let passwordField = document.getElementById('password');
// let passwordError = document.getElementById('password-error')
// let passwordCheck = false
// passwordField.addEventListener('focusout', function(){
//     // let reg = /^(?!.*\s)(?=.[0-9])(?=.[a-z]).{8,20}$
//     let reg = /\s/
//     if (reg.test(passwordField.value)) {
//         passwordError.innerText = 'La password non può contenere spazi';
//     } else {
//         if (passwordField.value.length >= 8 && passwordField.value.length < 20 ) {
//             passwordError.innerText = '';
//             passwordCheck = true;
//             console.log(passwordField.value);
//         }else if(passwordField.value.length == 0   ){
//             passwordError.innerText = 'Compila questo campo';
//             passwordCheck = false;
//             console.log(passwordField.value);
//         }else {
//             passwordError.innerText = 'La password inserita deve contenere almeno 8 caratteri e massimo 20';
//             passwordCheck = false;
//             console.log(passwordField.value);
//         }
//     }
//     passwordMatch()
//     submitOn()
// })
// let passwordConfField = document.getElementById('password-confirm');
// let confirmError = document.getElementById('confirm-error');
// let passwordConfCheck = false;
// function passwordMatch() {
//     if(passwordConfField.value == passwordField.value){
//         confirmError.innerText = '';
//         passwordConfCheck = true;
//         console.log('sono io', passwordConfField.value);
//     }else{
//         confirmError.innerText = 'Le password non coincidono';
//         passwordConfCheck = false;
//         console.log('sono io non ', passwordConfField.value);
//     }
//     submitOn()
// }
// passwordConfField.addEventListener('focusout', passwordMatch)

/***/ }),

/***/ 1:
/*!******************************************!*\
  !*** multi ./resources/js/validation.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/guidobuono/Desktop/Boolean/laravel/deliveboo/resources/js/validation.js */"./resources/js/validation.js");


/***/ })

/******/ });