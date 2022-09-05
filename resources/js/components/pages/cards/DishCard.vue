<template>
    <div>
        <div class="card" style="width: 18rem;">
            <img src="https://img.freepik.com/free-photo/top-view-pepperoni-pizza-with-mushroom-sausages-bell-pepper-olive-corn-black-wooden_141793-2158.jpg?w=2000" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"> {{ dish.name }} </h5>
                <span> {{ dish.price }} &euro;</span>
                <a @click="addCart(dish),cartNumber(),getTotalCost(dish)" class="btn btn-primary"> Aggiungi al carrello </a>
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

</style>
