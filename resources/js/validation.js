
let submit = document.getElementById('registration-submit');

submit.disabled = true;

let name = document.getElementById('name');

async function prova(){
    submit.disabled = false
    console.log('ciaoo')
}






// handleSubmit(){

//     this.nameMessageError = ( /^(?!-)[a-zA-Z-][a-zA-Z]$/.test(this.insertName) && this.insertName.length > 2) ? '':'Name must be at least 3 letters, no numbers and special characters';

//     //per contollare la mail inserito uso una forma di Regex...Che con Vue va in una specie di conflitto con " . "  , e ho dovuto disabilitare i controlli sulla  prossima linea successiva --->

//     //eslint-disable-next-line
//     this.mailMessageError = (/^\w+([.-]?\w+)@\w+([.-]?\w+)*(.\w{2,3})+$/.test(this.insertMail)) ? '': 'Please provide a correct email address!';

//    if( this.mailMessageError == '' && this.nameMessageError == '' )
//    {
//         this.successMessage = 'Congrats, you're one of us!';
//         this.insertMail = '';
//         this.insertName = '';
//         this.visible = false;
//    }
//    else{
//      this.successMessage = 'Please repeat!';
//    }
//  }
