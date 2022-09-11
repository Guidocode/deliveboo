<template>


    <div class="dish_card d-flex">
        <div class="image_dish">
            <!-- <img src="https://img.freepik.com/free-photo/top-view-pepperoni-pizza-with-mushroom-sausages-bell-pepper-olive-corn-black-wooden_141793-2158.jpg?w=2000" class="card-img-top" alt="..."> -->

            <img v-if="dish.image_db" :src="dish.image_db"  alt="Immagine db">
            <img v-else-if="dish.image" :src="`/storage/${dish.image}`" class="card-img-top img-dish img-fluid" alt="Immagine utente">
            <img v-else src="storage/uploads/dish-default.jpg" class="card-img-top img-dish img-fluid" alt="immagine default">

        </div>

        <div class="card-body d-flex justify-content-between align-items-center">
            <div>
                <h2 class="card-title"> {{ dish.name }} </h2>
                <div class="description">{{ dish.description}}</div>
                <div class="h6">Disponibile: {{ dish.visible === 1 ? 'Si' : 'No'}}</div>

                <div class="d-flex justify-content-between align-items-end">
                    <div class="price"> {{ dish.price }}&euro;</div>
                        <div class="order_btn">
                            <button class="btn btn-white btn-animate">
                                <a @click="addCart(dish),cartNumber(),getTotalCost(dish)">Aggiungi</a>
                            </button>
                        </div>
                </div>
          </div>

   <!-- commentato nel merge <div class="card">
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
            </div> fino a qui -->

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

.dish_card{
width: 100% !important;
padding:2rem;
border-bottom: 1px solid gray;
&:hover{
animation: shake 0.5s;
}
}
.image_dish{
    width: 40%;
    height: 250px;
    overflow:hidden;

    
    img{
        width:100%;
        height:100%;
        object-fit: cover!important;
        border-radius: 20px;
        overflow: hidden;
        &:hover{
            transform: scale(1.1);
            transition: all 1s ease;
        }
    }
}
.card-body{
    padding: 0 30px;
    h2{
        margin:0;
    }
}
.price{
    font-size: 20px;
    font-weight:600;
    background-color: $blue;
    border-radius: 20px;
    padding: 10px 20px;
    margin-top: 20px;
}
.description{
    font-size:18px;
    // font-style: italic;
    margin: 10px 0;
}

//BTN
 .order_btn{
   position:relative;
}
.btn{
    // margin-top: 20px;
    // margin-top: 50px;
    // margin-bottom:30px;
    padding: 15px 40px;
    border-radius: 30px;
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

// @keyframes moveInBottom {
//     0% {
//         opacity: 0;
//         transform: translateY(30px);
//     }

//     100% {
//         opacity: 1;
//         transform: translateY(0px);
//     }
// }

@keyframes shake {
  0% { transform: translate(1px, 1px) rotate(0deg); }
  10% { transform: translate(-1px, -2px) rotate(-1deg); }
  20% { transform: translate(-3px, 0px) rotate(1deg); }
  30% { transform: translate(3px, 2px) rotate(0deg); }
  40% { transform: translate(1px, -1px) rotate(1deg); }
  50% { transform: translate(-1px, 2px) rotate(-1deg); }
  60% { transform: translate(-3px, 1px) rotate(0deg); }
  70% { transform: translate(3px, 1px) rotate(-1deg); }
  80% { transform: translate(-1px, -1px) rotate(1deg); }
  90% { transform: translate(1px, 2px) rotate(0deg); }
  100% { transform: translate(1px, -2px) rotate(-1deg); }
}

//MEDIA
@media only screen and (max-width: 576px){
    .card-body[data-v-8c8299e8]{
      padding: 0 0px;
    }
    .dish_card{
    flex-direction: column;
    padding: 2rem;
    }
}
@media only screen and (max-width: 392px){

    .dish_card{
        flex-direction: column;
    }
    .image_dish{
        width:100%;
    }
    .image_dish img{
        height: 220px;
    }
    .card-body[data-v-8c8299e8]{
      padding: 0 0px;
    }
    .card-title{
        margin-top:10px;
        font-size:22px;
        font-weight: 600;
    }
    .description{
        font-size:16px;
        margin:15px 0;
    }
    .btn{
        transform: translateY(0px);
        padding: 11px 32px;

.card{
    width: calc((100% / 3) - 10px);
    margin: 5px;
    img{
        height: 40%;

    }
}


</style>

