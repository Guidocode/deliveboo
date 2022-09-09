<template>
    <div class="container">
        <div class="d-flex resturant-info justify-content-between mt-3">
            <h1>{{ resturant.name }}</h1>
            <div>
                <h5>Indirizzo: </h5>
                <span class=" text-muted">{{ resturant.address }}</span>
            </div>
            <div>
                <h5>Telefono: </h5>
                <span class=" text-muted">{{ resturant.phone }}</span>
            </div>

        </div>



        <div class="container">
            <div class="row">

                <div class="col col-lg-4">
                    <div class="sidebar d-flex flex-column justify-content-between">

                        <div class="">
                        <h3>Carrello <span >{{ cartNumber }}</span></h3>
                            <table class="table  ">
                                <thead>
                                    <tr>
                                    <th scope="col">Piatto</th>
                                    <th scope="col">Prezzo</th>
                                    <th scope="col">N°</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(product, index) in productList" :key="index">
                                        <th scope="row" class=" overflow-hidden">{{ product.name }}</th>
                                        <td>{{ product.price }}</td>
                                        <td>{{ product.inCart }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div v-if="productList"  class="btn btn-primary"><router-link :to="{name:'Cart'}">Vai al carrello</router-link></div>
                    </div>
                </div>


                <div class="col col-lg-8 d-flex flex-wrap">


                    <DishCard v-for="dish in resturant.dishes" :key="dish.id"
                    :dish="dish"
                    @getCount="cartItemCount"
                    @getProductList="getProductList"

                    />


                </div>
            </div>
        </div>

    </div>
</template>

<script>
import DishCard from './cards/DishCard.vue';

export default {
    name: "MenuComp",
    data() {
        return {
            resturant:{},
            cartNumber: JSON.parse(window.localStorage.getItem('count')),
            productList: JSON.parse(window.localStorage.getItem('dishesInCart')),
            slug :  this.$route.params.slug? this.$route.params.slug : window.localStorage.getItem('CartRestaurant')
        };
    },
    components: { DishCard },

    mounted() {
        this.getDishes()
        this.cartItemCount()

    },
    methods: {

        getDishes(){
            if(this.cartNumber > 0 &&  window.localStorage.getItem('CartRestaurant') != this.$route.params.slug && this.$route.params.slug  ){
                if(confirm("Sei entrato in un altro ristorante. Vuoi continuare e cancellare l'ordine precedente?")){
                    localStorage.clear()
                }else{
                  this.$router.push('/ristoranti')
                }
            }

            if( this.$route.params.slug ||  this.$route.params.slug > 0){
                localStorage.setItem('CartRestaurant', this.$route.params.slug);
            }

            axios.get('/api/ristorante/'+ this.slug)
           .then(r => {
                this.resturant = r.data.user
            })
        },

        cartItemCount(count){
            this.cartNumber = JSON.parse(window.localStorage.getItem('count'))
        },

        getProductList(cartToExport){
            this.productList = JSON.parse(window.localStorage.getItem('dishesInCart'))
            this.$emit('dataCart', this.productList)
        }
    },




}
</script>

<style lang="scss" scoped>
@import'../../../sass/front/vars';
.resturant-info{
    background-color: aqua;
    align-items: center;
    padding: 10px;
}
.col{
    min-height: 400px;
}
.sidebar{
    min-height: 400px;
}

</style>
