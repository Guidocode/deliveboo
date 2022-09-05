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
            cartNumber: 0,
            productList: {}
        };
    },
    components: { DishCard },
    mounted() {
        this.getDishes()

    },
    methods: {
        getDishes(){
            axios.get('/api/ristorante/'+ this.$route.params.slug)
           .then(r => {
             this.resturant = r.data.user
           })
        },

        cartItemCount(count){
            if(count){
                this.cartNumber = count
            }
        },
        getProductList(cartToExport){
            if(cartToExport){
                this.productList = cartToExport
            }
            this.$emit('dataCart', this.productList)
        }
    },

}
</script>

<style lang="scss" scoped>
@import'../../../sass/front/vars';
.container-menu{
    height: calc(100%);
    .sidebar{
        padding: 20px 10px;
        background-color: $light_green;
    }
    .dish-container{
        padding: 10px;
        gap: 10px;
        flex-wrap: wrap;
        background-color: $orange;
        justify-content: center;
        flex-grow: 1;
    }
}
</style>
