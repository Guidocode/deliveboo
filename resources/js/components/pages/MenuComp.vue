<template>
    <div>
        <div class="container d-flex container-menu">

            <div class="sidebar">
                {{ resturant.name }}
               Aggiungere info ristoranti
               <h3>carrello <span >{{ cartNumber }}</span></h3>
               <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Piatto</th>
                        <th scope="col">Prezzo</th>
                        <th scope="col">N°</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(product, index) in productList" :key="index">
                            <th scope="row">{{ product.name }}</th>
                            <td>{{ product.price }}</td>
                            <td>{{ product.inCart }}</td>
                        </tr>
                    </tbody>
                </table>
                <div v-if="productList" class="btn btn-primary"><router-link :to="{name:'Cart'}">Vai al carrello</router-link></div>
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
.container-menu{
    margin: 10px auto;
    .sidebar{
        padding: 20px 10px;
        background-color: $light_green;
        width: 30%;
    }
    .dish-container{
        padding: 10px;
        gap: 10px;
        flex-wrap: wrap;
        background-color: $orange;
        justify-content: start;
        flex-grow: 1;
    }
}
</style>
