<template>
    <div class="menu">
        <div>
            <!-- JUMBO -->
            <div class="jumbo">
                    <img :src="resturant.image_db" alt="">
                <div class="j-text">
                    <div class="d-flex justify-content-between align-items-end">
                        <div>
                            <div class="wel">Benvenuti da </div>
                            <h1>{{ resturant.name }}</h1>
                        </div>
                        <div class="text-right pb-2">
                            <span class="special">{{ resturant.phone }}</span>
                            <div class="address">{{ resturant.address }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /JUMBO -->
            <div class="order">
                <div class="sidebar">
                   <h3>{{ cartNumber ? 'Prodotti nel carello: '+ cartNumber : 'Carello vuoto' }}</h3>
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
                        <div class="order_btn">
                            <button v-if="productList" class="btn btn-white btn-animate"><router-link :to="{name:'Cart'}">Vai al carrello</router-link></button>
                        </div>
                   </div>
                </div>
            </div>
        </div>
        <div class="menu_items">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                      <DishCard v-for="dish in resturant.dishes" :key="dish.id"
                        :dish="dish"
                        @getCount="cartItemCount"
                        @getProductList="getProductList" />
                    </div>
            <!-- <div class="container">
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
            </div> -->
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
    .menu{
    position: relative;
    min-height: 80vh;
    }
    .jumbo{
        width:100%;
        height: 300px;
        overflow:hidden;
        img{
            width:100%;
            height: 500px;
            object-fit: cover;
        }
        .j-text{
            background-color: lighten($green_salad, 5%);
            position: absolute;
            padding: 20px 50px;
            border-radius:20px;
            width:60%;
            top:15rem;
            left: 5rem;
            box-shadow: 0 5px 20px rgb(60, 59, 59);
            animation: move_welcome 2s ease;
        }
    }
    .order{
        background-color: rgb(255, 255, 255);
        width: 27%;
        top:15rem;
        right: 5rem;
        padding: 20px;
        border-radius:20px;
        position: absolute;
        animation: move_cart 2s ease;
        // position:fixed;
    }
      @keyframes move_cart {
      from { transform: translateY(-100%);}
      to { transform: translateY(0%);}
      }
     @keyframes move_welcome {
      from { transform: translateX(-20%);}
      to { transform: translateX(0%);}
      }
    .menu_items{
        min-height: 400px;
        // margin: 5.5rem 0 5rem 3rem;
        margin-top: 5.5rem;
        margin-left:5rem;
        margin-bottom:4rem;
        padding: 50px;
        border-radius:20px;
        background-color: white;
        width:60%;
        box-shadow: 0 5px 15px rgb(60, 59, 59);
    }
     .order_btn{
       position:relative;
    //    width: 44%;
       margin: 0 auto;
    }
    .btn{
        padding: 10px 50px;
        border-radius: 30px;
        a{
            color:rgb(6, 6, 6);
        }
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
        box-shadow: 0 5px 8px rgb(30, 30, 31);;
    }
    .btn:active {
        transform: translateY(-1px);
        box-shadow: 0 5px 10px rgb(54, 54, 54);
    }
    .btn-white {
        background-color: rgb(255, 255, 255);
        color: rgb(10, 10, 10);
        border: 2px solid black;
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
        background-color: rgb(21, 21, 21);
    }
    .btn:hover::after {
        transform: scaleX(1.3) scaleY(1.2);
        opacity: 0;
    }
    .btn-animated {
        animation: moveInBottom 5s ease-out;
        animation-fill-mode: backwards;
    }
    // =======MEDIA=======
    @media only screen and (max-width: 1400px){
        .jumbo .j-text{
             padding: 14px 28px;
             top: 15rem;
             left: 3rem;
             width: 65%;
             h1{
                 font-size:28px;
             }
        }
        .order{
             width: 25%;
             top: 15rem;
             right: 3rem;
             h3{
                font-size: 24px;
             }
         }
        .menu_items{
         padding: 10px;
         margin-top: 4.5rem;
        margin-left: 3rem;
        width:65%;
        min-height:350px;
         }
    }
    @media only screen and (min-width: 1200px){
        .jumbo .j-text{
        padding: 20px 40px;
        top: 15rem;
        left: 7rem;
        width: 63%;
        }
             h1{
                 font-size:28px;
             }
        }
        .order{
             width: 25%;
             top: 15rem;
             right: 7rem;
             h3{
                font-size: 24px;
             }
         }
        .menu_items{
padding: 10px;
    margin-top: 6.5rem;
    margin-left: 7rem;
    width: 63%;
    min-height: 350px;
         }
         .image_dish{
            height: 343px;
    width: 35%;
    border-radius: 30px;
    overflow: hidden;
         }
    
    @media only screen and (max-width: 993px){
         .jumbo .j-text{
            padding: 14px 28px;
            width: 63%;
            top: 15rem;
            left: 3rem;
            h1{
                 font-size:28px;
            }
        }
        .address,
        .wel{
           font-size:14px;
         }
        .order{
             width: 25%;
             top: 15rem;
             right: 3rem;
         }
        .menu_items{
             padding: 10px;
             margin-top: 5.5rem;
             margin-left: 3rem;
             width:63%;
             min-height:340px;
          }
    }
    @media only screen and (max-width: 843px){
        .jumbo .j-text{
            top: 11rem;
            width: 65%;
            left: 2rem;
        }
        .order{
        top: 11rem;
        right: 2rem;
        padding: 13px;
            h3{
            font-size: 20px;
            }
         }
         .wel,
         .address{
            font-size: 14px;
         }
        .menu_items{
             width: 65%;
             margin-top: 4.5rem;
            margin-left: 2rem;
            min-height: 340px;
            padding:10px;
        }
            .btn{
            padding:5px 20px;
            box-shadow: 0 2px 8px rgb(30 30 31);
        }
    }
    @media only screen and (max-width: 768px){
        .jumbo,
        .jumbo img{
            height: 250px;
        }
        .jumbo .j-text{
            padding: 14px 28px;
            top: 10rem;
            left: 2rem;
            width: 65%;
            h1{
                font-size:28px;
            }
        }
         .address{
            font-size:14px;
        }
        .wel{
            font-size:14px;
        }
        //     }
        .order{
            width: 27%;
            top: 10rem;
            right: 1rem;
        }
        .table th, .table td{
            padding:5px;
        }
        .btn{
            padding:5px 10px;
            box-shadow: 0 2px 8px rgb(30 30 31);
        }
        .menu_items{
            padding: 21px;
            margin-top: 4.5rem;
            margin-left: 2rem;
            width:65%;
            min-height:300px;
         }
    }
    @media only screen and (max-width: 736px){
            .jumbo .j-text{
            width:58%;
            top: 11rem;
            left: 2rem;
            padding: 14px 29px;
            .address{
                font-size:14px;
            }
            h1{
                font-size: 22px;
            }
            .wel{
               font-size:14px;
            }
            }
            .order{
                width:30%;
                right:2rem;
                 top: 11rem;
                h3{
                    font-size: 18px;
                }
                .table th, .table td{
                    padding:5px;
                }
            }
            .btn{
                padding:10px;
                box-shadow: 0 2px 8px rgb(30 30 31);
            }
            .menu_items{
            width: 57%;
            margin-top: 3.5rem;
            padding: 30px;
            margin-left: 37px;
        }
    }
@media only screen and (max-width: 426px){

        .jumbo .j-text{
            width:90%;
            top: 13rem;
            left: 27px;
            .address{
                font-size:14px;
            }
        }
        h1{
            font-size: 2rem;
        }
        .address{
            display:none;
        }
        .special{
            font-size:14px;
        }
        .order{
            display:none;
            // width:90%;
            // left:27px;
            // top:23rem;
        }
        .menu_items{
        padding: 0;
        margin-top: 5rem;
        width:90%;
        margin-left: 30px;
        }
        .dish_card{
        flex-direction: column;
        padding-top: 1rem;
        padding-bottom: 2rem;
        }
        .card-body[data-v-8c8299e8]{
          padding: 0 0px;
        }
    }

    @media only screen and (max-width: 392px){
        .jumbo{
            height: 250px;
        }
        .jumbo img{
            height:100%;
        }
        .jumbo .j-text{
            width:90%;
            top: 13rem;
            left: 18px;
        }
        h1{
            font-size: 2rem;
        }
        .order{
            width:90%;
            left:20px;
            top:23rem;
        }
        .menu_items{
        padding: 0;
        margin-top: 6.5rem;
        width:90%;
        margin-left: 20px;
        }
    }
    .resturant-info{
        background-color: aqua;
        align-items: center;
        padding: 10px;
    }
    .col{
        min-height: 400px;
    }
    </style>









