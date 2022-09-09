<template>

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
    </div>


    <!-- Card Stack over flow -->
    <!-- <div class="card flex-row flex-wrap">
        <div class="card-header border-0">
            <img v-if="dish.image_db" :src="dish.image_db" alt="Immagine db">
            <img v-else-if="dish.image" :src="`/storage/${dish.image}`" alt="Immagine utente">
            <img v-else src="storage/uploads/dish-default.jpg" alt="immagine default">
        </div>
        <div class="card-block px-2">
            <h4 class="card-title">{{ dish.name }}</h4>
        </div>
        <div class="w-100"></div>
        <div class="card-footer w-100 text-muted">
            <a @click="addCart(dish),cartNumber(),getTotalCost(dish)" class="btn btn-primary">Aggiungi</a>
            <span> {{ dish.price }}&euro;</span>
        </div>
    </div> -->


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
.card{
    width: calc((100% / 3) - 10px);
    margin: 5px;
    img{
        height: 40%;
    }
}


</style>
