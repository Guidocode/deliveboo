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
        <div class=" d-flex container-menu">

            <div class="sidebar">

               <h3>Carrello <span >{{ cartNumber }}</span></h3>
               <div class="d-flex flex-column justify-content-between">
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
                    <div v-if="productList"  class="btn btn-primary"><router-link :to="{name:'Cart'}">Vai al carrello</router-link></div>
               </div>
            </div>

            <div class="dish-container d-flex">

                <DishCard v-for="dish in resturant.dishes" :key="dish.id"
                :dish="dish"
                @getCount="cartItemCount"
                @getProductList="getProductList"

                />

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
.container-menu{
    margin: 10px auto;
    .sidebar{
        padding: 20px 10px;
        background-color: $light_green;
        width: 40%;
        th{
            white-space: nowrap;
            max-width: calc(100% / 3);
        }
    }
    .dish-container{
        padding: 10px;
        gap: 10px;
        flex-wrap: wrap;
        // background-color: $orange;
        justify-content: start;
        flex-grow: 1;

    }
}
</style>
