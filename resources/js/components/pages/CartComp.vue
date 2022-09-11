<template>
    <div class="cartt">
        <div class="cart c_container text-center">
            <div v-if="!clientInfo">
                <h3 class="text-uppercase pl-4 text-left">Il tuo carello</h3>
                <div class="cart_item d-flex mb-3" v-for="(product, index) in dataCart" :key="index">
                <div class="cart_img">
                    <img :src="product.image_db" alt="">
                </div>
                <div class="item_info ml-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4>{{ product.name }}</h4>
                        <div class="trash"><i @click="deleteProduct(product, index)" class="fa-solid fa-trash"></i></div>
                    </div>
                        <div class="item_price">
                            <td>1pc / {{ product.price }}&euro;</td>
                        </div>
                    <div class="info_wrap d-flex justify-content-between align-items-center">
                        <div class="noselect">
                            <i @click="productMinus(product, index, 0)" class="fa-solid fa-minus"></i>
                            <span class="number_items">{{ product.inCart }}</span>
                            <i  @click="productPlus(product, index, 1)" class="fa-solid fa-plus"></i>
                        </div>
                        <div class="green_price">{{ (product.price * product.inCart).toFixed(2) }} &euro;</div>
                    </div>
                </div>
                </div>
                <div class="line"></div>
                <div class="tot_price d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <div class="msg_price">Prezzo totale: </div>
                    </div>
                    <span v-show="totalCount == 0" class="text-center">Non sono Presenti articoli nel carrello</span>
                    <span v-if="!clientInfo" class="text-right tt_p">{{ totalCost }} &euro;</span>
                </div>
            </div>
            
            <div class="btn-text">
            <ButtonPulseComp
            button_text="Cio"
            v-if="!clientInfo" @click="clientInfo = true" />
           <div v-if="!clientInfo" @click="clientInfo = true" class="btn btn-white btn-animate flex-grow-0">Procedi</div>
         
            <!-- step 1 paymant -->
            <div class="container mt-2 text-left" v-if="clientInfo && totalCount > 0 && !clientPay">
                <h3 class="text-uppercase">Informazioni cliente</h3>
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
                            <input v-model=form.note type="text" class="form-control" id="">
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div>
                            <div v-if="clientInfo && !clientPay" @click="clientInfo = false" class="btn  btn-animate k_btn">Torna al carrello</div>
                            <div v-if="clientInfo && clientPay" @click="clientPay = false" class="btn k_btn btn-animate">Torna ai dati di spedizione</div>

                        </div>
                        <button @click="sendFormDetails" type="button" class="btn btn_green btn-animate">Vai al Pagamento</button>

                    </div>
                    <div>
                        <img src="" alt="">
                    </div>
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
            >123</v-braintree>
            </div>
        </div>
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
    @import'../../../sass/front/vars';
    .cartt{
        background-image: url('/img/back3.jpg');
        background-position: center;
        background-size: cover;
        padding: 4rem 0;
        // display:grid;
        height:100vh;
    }
    .c_container{
        width:55%;
    }
    .cart{
        margin:0 auto;
        padding: 30px 50px;
        background-color: $light_green;
        grid-template-columns: repeat(3, 1fr);
        border-radius:30px;
        box-shadow: 0 0 10px rgb(113, 113, 113);
    }
    .cart_img{
        min-width:100px;
        // flex-basis:25%;
        height:155px;
        border-radius: 30px;
        overflow:hidden;
        img{
            width:100%;
            height: 100%;
             object-fit: cover!important;
        }
    }
    .number_items{
        padding:7px 14px;
        border:1px solid black;
        border-radius: 50%;
        margin: 0 10px;
    }
    .item_info{
        flex-basis: 70%;
    }
    .info_wrap{
        margin-top:30px;
    }
    .noselect .fa-solid{
        font-size:20px;
        &:hover{
            cursor:pointer;
            transform: scale(1.2);
        }
    }
    .line{
         height:2px;
         width:100%;
         background-color: rgb(52, 52, 52);
     }
    .cart_item{
        padding:20px;
        //border-bottom: 1px solid purple;
        border-radius:30px;
        &:hover{
            background-color: white;
        }
    }
    .pricee{
        font-size:20px;
        font-weight: 600;
        color: rgba(252, 59, 59, 0.852);
    }
    .green_price{
        padding: 5px 15px;
        color:black;
        // border: 2px solid black;
        border-radius: 30px;
        font-size:18px;
        font-weight:600;
        background-color: $green_salad;
    }
    .tt_p{
        color: $violet;
        font-size: 22px;
        font-weight: 700;
        &:hover{
            transform: scale(1.2);
        }
    }
    .trash{
        margin: 0 20px;
        color: darken($green_salad, 20%);
        font-size: 20px;
        .fa-trash:hover{
            cursor:pointer;
            color:black;
        }
    }
    .msg_price{
        font-size: 20px;
        margin-right: 10px;
    }
    .tot_price{
        margin-top: 15px;
        padding: 0 30px;
    }
    .form-control{
        border-radius:20px;
    }

    // BTN
.btn-text{
    position: relative;
}
.btn{
    background-color: black;
    color:white;
    border-radius: 20px;
    padding: 5px 40px;
}
.k_btn{
    background-color: $violet;
    color:rgb(6, 6, 6);
}
.btn_green{
    background-color: $green_salad;
    color:rgb(6, 6, 6);
}
.btn:link,
.btn:visited {
    text-transform: uppercase;
    text-decoration: none;
    padding: 10px 40px;
    border-radius: 30px;
    display: inline-block;
    transition: all .2s;
    position: absolute;
}

.btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

.btn:active {
    transform: translateY(-1px);
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
}

.btn-white {
    background-color: rgb(3, 3, 3);
    color: white;
}

.btn::after {
    content: "";
    display: inline-block;
    height: 100%;
    width: 100%;
    border-radius: 100px;
    position: absolute;
    top: 0;
    left: 0;
    z-index: -1;
    transition: all .4s;
}

.btn-white::after {
    background-color: rgb(7, 7, 7);
}

.btn:hover::after {
    transform: scaleX(1.3) scaleY(1.2);
    opacity: 0;
}

.btn-animated {
    animation: moveInBottom 5s ease-out;
    animation-fill-mode: backwards;
}
@keyframes moveInBottom {
    0% {
        opacity: 0;
        transform: translateY(30px);
    }

    100% {
        opacity: 1;
        transform: translateY(0px);
    }
}
    // =====MEDIA=====
@media only screen and (min-width: 2200px){
 
}

@media only screen and (max-width: 426px){
.c_container {
    width: 88%;
}
.cart{
    padding:15px 10px;
    h3{
        font-size:20px;
    }
}
.info_wrap{
    flex-direction: column;
    margin-top: 20px;
    align-items: start;
}
.green_price{
    font-size:14px;
    margin-top:20px;
}
.tot_price{
    margin-bottom:30px;
}
}

</style>
