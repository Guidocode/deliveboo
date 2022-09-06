<template>
    <div>
        <table class="table">
            <thead>
                <tr>
                        <th scope="col">Piatto</th>
                        <th scope="col">Prezzo</th>
                        <th scope="col">Prezzo complessivo</th>
                        <th scope="col">N°</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(product, index) in dataCart" :key="index">
                    <th scope="row">{{ product.name }}</th>
                    <td>{{ product.price }}</td>
                    <td>{{ product.price * product.inCart }}</td>
                    <td> <span @click="productMinus(product, index)">-</span> {{ product.inCart }} <span>+</span></td>

                </tr>

            </tbody>
        </table>

        <!-- step 1 paymant -->
        <div class="container" v-if="!clientData">
            <form>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Nome</label>
                        <input v-model=form.client_name type="text" class="form-control" id="name">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="surname">Surname</label>
                        <input v-model=form.client_surname type="text" class="form-control" id="surname">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">Email</label>
                        <input v-model=form.client_email type="email" class="form-control" id="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Numero di telefono</label>
                        <input v-model=form.client_phone type="text" class="form-control" id="">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">Indirizzo</label>
                        <input v-model=form.client_address type="text" class="form-control" id="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Note per il ristorante</label>
                        <textarea class="form-control" name="" id="" rows="3">{{ form.note }}</textarea>
                    </div>
                    <h3>Prezzo Totale <span>{{ totalCost }}&euro;</span></h3>
                </div>
                <button @click="sendFormDetails" type="button" class="btn btn-primary btn-lg btn-block">Vai al Pagamento</button>
            </form>
        </div>

        <!-- step 2 paymant -->
        <v-braintree
            v-if="clientData"
            class="container"
            authorization="sandbox_gpm3mdyb_vbh2gg786m8tr86x"
            locale="it_IT"
            @success="onSuccess"
            @error="onError"
        ></v-braintree>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name:'CartComp',
    props:{


    },
    mounted() {
        this.getTotalPrice()
    },

    data () {
        return {
            dataCart: JSON.parse(window.localStorage.getItem('dishesInCart')),
            productsToPass: [],
            totalCount: localStorage.getItem('count'),
            totalCost: 0,
            clientData: false,
            form:{
            }
        }
    },
    methods: {

    productMinus(product, index){
        if(product.inCart > 1){
            product.inCart--;
            localStorage.setItem('dishesInCart',JSON.stringify(this.dataCart));
            this.totalCount--;
            localStorage.setItem('count', this.totalCount);
            let actualCost = parseFloat(this.totalCost) - product.price
            localStorage.setItem('totalCost', actualCost)
        }else if(product.inCart == 1){
            delete this.dataCart[index]
            localStorage.setItem('dishesInCart', JSON.stringify(this.dataCart))
            this.totalCount--;
            localStorage.setItem('count', this.totalCount);
            let actualCost = parseFloat(this.totalCost) - product.price
            localStorage.setItem('totalCost', actualCost)
            this.$forceUpdate()
        }


    },

    sendFormDetails(){

        axios.get('api/order' , {
            params: this.form
        })
        .then(r => {
            if(r.data.success == 'success'){
                this.clientData = true;
            }

        }).catch(e => {
            console.log(e.message);
        })
    },

    onSuccess (payload) {
        let nonce = payload.nonce;
        console.log(payload)
        this.form.products = this.productsToPass
        this.form.total_price = this.totalCost
        axios.post('api/order',
            this.form
        ).then(r => {
            if(r.data.success == 'success'){
                setTimeout(() => {
                    this.$router.push({ name: "ThanksPage"})
                }, 1000);
            }
        console.log(r.data)

      })


    },
    onError (error) {
      let message = error.message;
      console.log(message)
    },
    getTotalPrice(){
        console.log('ciao');
        //setTimeout(() => {
            let totalCostF = 0;
            for (const dish in this.dataCart) {
                if (Object.hasOwnProperty.call(this.dataCart, dish)) {
                    const element = this.dataCart[dish];
                    this.productsToPass.push(element)
                    let price = parseFloat(element.price)
                    let qty = parseInt(element.inCart)
                    totalCostF += (price * qty)

                }
            }
            this.totalCost = totalCostF
       // }, 3000); forse local storage lento


    }
  }
}
</script>

<style lang="scss" scoped>
textarea{
    resize: none
}
</style>
