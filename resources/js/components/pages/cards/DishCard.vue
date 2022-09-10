<template>
<!--
    <div class="card">
        <img v-if="dish.image_db" :src="dish.image_db" class="card-img-top" alt="Immagine db">
        <img v-else-if="dish.image" :src="`/storage/${dish.image}`" class="card-img-top" alt="Immagine utente">
        <img v-else src="storage/uploads/dish-default.jpg" class="card-img-top" alt="immagine default">
        <div class="card-body dish-body">
            <h6 class="card-title"> {{ dish.name }} </h6>
        </div>
        <div class="card-footer">
            <div class="" >
                <a @click="addCart(dish),cartNumber(),getTotalCost(dish)" class="btn btn-primary">Aggiungi</a>
                <span> {{ dish.price }}&euro;</span>
            </div>
        </div>
    </div> -->
    <div class="card mb-3 p-2 card-product" >
        <div class="row no-gutters">
            <div class="col-md-6 image ">
                <img v-if="dish.image_db" :src="dish.image_db" class="card-img" alt="Immagine db">
                <img v-else-if="dish.image" :src="`/storage/${dish.image}`" class="card-img" alt="Immagine utente">
                <img v-else src="storage/uploads/dish-default.jpg" class="card-img" alt="immagine default">
            </div>
            <div class="col-md-6 ">
                <div class="card-body h-100 d-flex flex-column justify-content-between">
                    <h5 class="card-title">{{ dish.name }}</h5>
                    <div class="card-text overflow-auto">
                        <p class="card-text">{{ dish.description }}</p>
                    </div>
                    <div class="d-flex justify-content-between mt-2 align-items-center">
                        <a @click="addCart(dish),cartNumber(),getTotalCost(dish)" class="btn btn-primary">Aggiungi</a>
                        <span> {{ dish.price }}&euro;</span>
                    </div>
                </div>
            </div>
        </div>
    </div>




</template>

<script>
export default {
    name: 'DishCard',
    props:{
        dish: Object
    },
    data () {
        return {
            cartToExport: {}
        }
    },
    methods: {
        addCart(dish){
            let count = localStorage.getItem('count');
            count = parseInt(count);
            console.log(count)
            this.setItem(dish)

            if(count){
                localStorage.setItem('count', count + 1);

            }else{
                localStorage.setItem('count', 1);
                count = parseInt(count);
            }
            this.cartNumber()
        },
        cartNumber(){
            let count = localStorage.getItem('count');
            this.$emit('getCount', ""),
            this.$emit('getProductList', "")
        },
        setItem(dish){

            let cartItems = localStorage.getItem('dishesInCart');
            cartItems = JSON.parse(cartItems);

            if(cartItems != null){
                if(cartItems[dish.name] == undefined){
                    dish.inCart = 0;
                    cartItems = {
                        ...cartItems,
                        [dish.name]: dish,
                    }
                }
                cartItems[dish.name].inCart += 1;
            }else {
                dish.inCart = 1;
                cartItems = {
                    [dish.name]: dish,
                }
            }

            localStorage.setItem('dishesInCart', JSON.stringify(cartItems));
            this.cartToExport = cartItems;
            // console.log(this.cartToExport);
        },
        getTotalCost(dish){
            let cartCost = localStorage.getItem('totalCost');

            if(cartCost != null){
                cartCost = parseFloat(cartCost);
                localStorage.setItem('totalCost', cartCost + parseFloat(dish.price))
            }else{
                localStorage.setItem('totalCost', dish.price)
            }
        }

    },//fine methods
    mounted() {
        this.cartNumber()
    },
}
</script>

<style lang="scss" scoped>
@import'../../../../sass/front/vars';

.card-product{
    width: calc(100% /2 - 10px);
    max-height: 300px;
    .card-text{
        max-height: 100px;
    }

    ::-webkit-scrollbar {
        display: none;
    }
    .image{
        margin: auto;
    }

}
</style>
