<template>
    <div class="container my-4 ">
        <table class="table" v-if="!clientInfo">
            <thead>
                <tr class=" text-center">
                        <th scope="col">Piatto</th>
                        <th scope="col">Prezzo</th>
                        <th scope="col">Prezzo complessivo</th>
                        <th scope="col">N°</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <tr v-for="(product, index) in dataCart" :key="index">
                    <th scope="row">{{ product.name }}</th>
                    <td>{{ product.price }}</td>
                    <td>{{ (product.price * product.inCart).toFixed(2) }}</td>
                    <td class="noselect">
                        <i @click="productMinus(product, index, 0)" class="fa-solid fa-circle-minus mr-1"></i>
                        {{ product.inCart }}
                        <i  @click="productPlus(product, index, 1)" class="fa-solid fa-circle-plus ml-1"></i>
                    </td>
                    <td><i @click="deleteProduct(product, index)" class="fa-solid fa-trash"></i></td>


                </tr>

            </tbody>
        </table>
        <h4  v-show="totalCount == 0" class="text-center">Non sono Presenti articoli nel carrello</h4>
        <h3 v-if="!clientInfo" class="mt-2 text-right">Prezzo Totale <span>{{ totalCost }}&euro;</span></h3>

        <ButtonPulseComp
        button_text="Cio"
        v-if="!clientInfo" @click="clientInfo = true" />
       <div v-if="!clientInfo" @click="clientInfo = true" class="btn btn-primary flex-grow-0">Procedi</div>
       <div v-if="clientInfo && !clientPay" @click="clientInfo = false" class="btn btn-warning">Torna al carrello</div>
       <div v-if="clientInfo && clientPay" @click="clientPay = false" class="btn btn-warning">Torna ai dati di spedizione</div>

        <!-- step 1 paymant -->
        <div class="container mt-2" v-if="clientInfo && totalCount > 0 && !clientPay">
            <h3>Informazioni cliente</h3>
            <form>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Nome</label>
                        <input v-model=form.client_name type="text" class="form-control" id="name">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="surname">Cognome</label>
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

                </div>
                <button @click="sendFormDetails" type="button" class="btn btn-primary btn-lg btn-block">Vai al Pagamento</button>
            </form>
        </div>

        <!-- step 2 paymant -->
        <v-braintree
            v-if="clientPay"
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
    name: "CartComp",
    components:{
    },
    props: {},
    mounted() {
        this.getTotalPrice();
    },
    data() {
        return {
            dataCart: JSON.parse(window.localStorage.getItem("dishesInCart")),
            productsToPass: [],
            totalCount: localStorage.getItem("count"),
            totalCost: 0,
            clientInfo: false,
            clientPay: false,
            form: {}
        };
    },
    methods: {
        deleteProduct(product, index){
            delete this.dataCart[index];
            localStorage.setItem("dishesInCart", JSON.stringify(this.dataCart));
            this.totalCount -= product.inCart;
            localStorage.setItem("count", this.totalCount);
            let actualCost = parseFloat(this.totalCost) - (product.price * product.inCart) ;
            localStorage.setItem("totalCost", actualCost);
            this.totalCost = actualCost,
            this.$forceUpdate();
        },
        productMinus(product, index, bool) {
            if (product.inCart > 1) {
                product.inCart--;
                localStorage.setItem("dishesInCart", JSON.stringify(this.dataCart));
                this.totalCount--;
                localStorage.setItem("count", this.totalCount);
                let actualCost = parseFloat(this.totalCost) - product.price;
                localStorage.setItem("totalCost", actualCost);
            }
            else if (product.inCart == 1) {
                delete this.dataCart[index];
                localStorage.setItem("dishesInCart", JSON.stringify(this.dataCart));
                this.totalCount--;
                localStorage.setItem("count", this.totalCount);
                let actualCost = parseFloat(this.totalCost) - product.price;
                localStorage.setItem("totalCost", actualCost);
                this.$forceUpdate();
            }
            this.updateTotalCost(product.price, bool);
        },
        productPlus(product, index, bool) {
            product.inCart++;
            localStorage.setItem("dishesInCart", JSON.stringify(this.dataCart));
            this.totalCount++;
            localStorage.setItem("count", this.totalCount);
            this.updateTotalCost(product.price, bool);
        },
        sendFormDetails() {
            axios.get("api/order", {
                params: this.form
            })
                .then(r => {
                if (r.data.success == "success") {
                    this.clientPay = true;
                }
            }).catch(e => {
                console.log(e.message);
            });
        },
        onSuccess(payload) {
            let nonce = payload.nonce;
            this.form.products = this.productsToPass;
            this.form.total_price = this.totalCost;
            axios.post("api/order", this.form)
                .then(r => {
                if (r.data.success == "success") {
                    setTimeout(() => {
                        this.$router.push({ name: "ThanksPage" });
                        localStorage.clear();
                    }, 1000);
                }
            });
        },
        onError(error) {
            let message = error.message;
            console.log(message);
        },
        getTotalPrice() {
            console.log("ciao");
            //setTimeout(() => {
            let totalCostF = 0;
            for (const dish in this.dataCart) {
                if (Object.hasOwnProperty.call(this.dataCart, dish)) {
                    const element = this.dataCart[dish];
                    this.productsToPass.push(element);
                    let price = parseFloat(element.price);
                    let qty = parseInt(element.inCart);
                    totalCostF += (price * qty);
                }
            }
            this.totalCost = totalCostF.toFixed(2);
            // }, 3000); forse local storage lento
        },
        updateTotalCost(price, bool) {
            let actualTotal = parseFloat(this.totalCost);
            if (bool) {
                this.totalCost = actualTotal + parseFloat(price);
            }
            else {
                this.totalCost = actualTotal - parseFloat(price);
            }
            this.totalCost = this.totalCost.toFixed(2);
        }
    },

}
</script>

<style lang="scss" scoped>
textarea{
    resize: none
}
tbody{

    tr{
        td{
            i{
                cursor:pointer;
            }
        }
        &:hover{
            background-color: darken($color: white, $amount: 20%);
        }
    }
}

.noselect {
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}
</style>
