<template>

  <div class="restaurants text-center">
    <div class="jumbo">
      <img :src="'img/p3.png'" alt="">

      <div class="jumbo-text">
      <div class="banner-text text-uppercase question">Categorie</div>
      <h3>scegliere uno o più categorie</h3>
      <!-- <i class="fa-solid fa-arrow-down"></i> -->
    </div>
    </div>


    <div class="input-wrap">
        <div class="text-box" v-for="(tipo, index) in types" :key="`tipo${ index }`">
          <label :for="tipo.id">

            <button class="my_btn" type="submit" :name="tipo.name" :id="tipo.id" :value="tipo.id" @click="filterMe(tipo.id)" :class="{active:selectedTypes.includes(tipo.id)}">
              <span><i :class="tipo.icon"></i> {{ tipo.name }}</span>
            </button>

          </label>
        </div>
        <!-- <div><i class="fa-solid fa-xmark"></i></div> -->

    </div>

      <div class="resturant-container d-flex flex-wrap">

        <div v-for="resturant in resturants" :key="resturant.id" class="my_card mx-4" style="width: 18rem;">
          <div class="box">

             <img v-if="resturant.image_db" :src="resturant.image_db" class="card-img-top img-fluid" alt="Imagine db">
             <img  class="img-fluid" v-else-if="resturant.image" :src="`/storage/${resturant.image}`" alt="Immagine utente">
             <img class="img-fluid" v-else src="storage/uploads/restaurant-default.jpg" alt="Immagine default">


          <router-link :to="{ name: 'Menu', params: {slug: resturant.slug} }">
          <div class="card-body d-flex">
            <div class="card-title">
              <router-link :to="{ name: 'Menu', params: {slug: resturant.slug} }" ><i class="fa-regular fa-eye"></i></router-link>
              <h5 >{{ resturant.name }}</h5>
            </div>
          </div>
          </router-link>

          </div>
        </div>

      </div>

  </div>
</template>

<script>
  import axios from 'axios';
  import ButtonPulseComp from '../partials/ButtonPulseComp'

       export default {
         name: 'HomeComp',
         components:{
          ButtonPulseComp
         },
          data() {
              return {
               resturants: [],
               types:[],
               selectedTypes:[],
               type: 'Cinese',
               isActive: false
              }
          },
         mounted() {
           this.getResturant(),
           this.getTypes()
         },
         methods: {
          getResturant(){
              axios.get('/api/ristoranti')
              .then(r => {
                  this.resturants = r.data.users;
                  console.log('sono l\'utente', r.data.users);
              })
          },

          getTypes(){
              axios.get('/api/tipi')
              .then(r => {
                  this.types = r.data.types
              })
          },

          filterMe(id){

              if(this.selectedTypes.includes(id)){
                  let index = this.selectedTypes.indexOf(id)
                  this.selectedTypes.splice(index,1)
              }else{
                  this.selectedTypes.push(id)
              }

              if(this.selectedTypes.length != 0){
                  axios.get('/api/filter', {
                      params:{
                          ids: this.selectedTypes
                      }
                  })
                  .then(r => {
                      // console.log(r.data);
                      // this.resturants = r.data.selectedTypes
                      this.resturants = []

                      r.data.selectedTypes.forEach(element => {
                          let alredyExist = this.resturants.some(resturant => {
                              if(resturant.id == element.id){
                                  return true
                              }else{
                                  return false
                              }
                          })
                          if(!alredyExist){
                              this.resturants.push(element)
                          }
                      });
                  })
              }else{
                  this.getResturant()
              }

          },
          changeColor(){
            let button = document.querySelector('.my_btn');
            button.classList.toggle('active');
            }
          }

       }
</script>

<style lang="scss" scoped>
@import'../../../sass/front/vars';

  .restaurants{
    margin: 0 auto;
  }
  .jumbo{
    position:relative;
    width: 100%;
    height: 36rem;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow:hidden;
    margin-bottom: 3rem;
    .jumbo-text{
      position:absolute;
      position:absolute;
      text-align: initial;
      top: 66%;
      left: 10%;
      line-height: 79px;
      // transform: translate(33%, 50%);
      .question{
        font-size: 5rem;
        font-weight: 700;
        color: rgb(255, 255, 255);
        text-transform: uppercase;
        animation: mymove 2s ease;
        margin-bottom:1rem;
      }
      h3{
      animation: h3move 2s ease;
      padding-left:1rem;
      color: white;
      }
    }
    img{
      // height:41rem;
      width:100%;
    }
    .fa-arrow-down{
      font-size: 45px;
      margin-top:20px;
      // background-color: $violet;
      color: lightgray;
    }
  }
  //END JUMBO

  //RESTAURANT PART

  .resturant-container{
  gap: 10px;
  margin: 5rem auto;
  justify-content: center;
  }
  h2{
    margin-bottom: 40px;
    font-family: Poppins,sans-serif;
  }
  .main_rest{
    width:80%;
    margin: 0 auto;
    padding: 9rem 0;
    height: 66rem;
    justify-content: space-between;

  }
  .input-wrap{
    display: flex;
    flex-wrap: wrap;
    min-height: 50px;
    justify-content: start;
    align-items: center;
    width: 84%;
    margin: 0 auto;
    padding-left: 35px;
    margin-top: 2rem;
    // margin-bottom:5rem;
    .text-box{
      margin-right:12px;
    }
    div:last-child{
     justify-self: end;
    }
  }

   //BUTTONS
  .my_btn{
    color: black;
    background-color: #BECFBC;
    border-radius: 20px;
    border: 3px solid black;
    font-size: 20px;
    padding: 10px 31px;
    &:hover{
      background-color: darken($green_salad, 20%);
    }
    &:active{
      color:black;
    }
    i{
      margin-right:10px;
    }
  }
  .active{
    background-color:green;
  }

  //CARD
  .my_card{
  margin: 40px;
  width: calc(100% /3);
  height: 300px;
  position: relative;
  border-radius: 20px;
  overflow: hidden;
  text-align: start;
  box-shadow: 0 0 10px gray;
  img {
    position:absolute;
    height: 100%;
    object-fit: cover;
    max-width: 100%;
    display: inline-block;
  }
  .my_card img:hover .card-body{
    // position: absolute;
    // filter: blur(5px);
    // filter: brightness(60%);
    //transform: scale(1.1);
    transition: all 1s ease;
    cursor:pointer;
  }
  .box{
    width:100%;
    height:100%;
    background-color: red;
  }
  .card-body{
    display: none !important;
    position:relative;
    width:100%;
    height:100%;
    background-color: rgba(0, 0, 0, 0.6);
    text-align:center;
    align-items: end;
    .card-title{
      position: absolute;
      top:0;
      left:0;
      transform: translate(0%, 200%);
      color:white;
      width:100%;
    }
    i{
    font-size: 20px;
    color:rgb(201, 201, 201);
    }
  }
  .box:hover .card-body{
  display: block !important;
  cursor: pointer;
  }


  // =====KEYFRAMES=====

  @keyframes mymove {
  from { transform: translateX(-100%);}
  to { transform: translateX(0%);}
  }
  @keyframes h3move {
  from { transform: translateX(20%);}
  to { transform: translateX(0%);}
  }
  @keyframes move_arrow {
  from { transform: translateX(20%);}
  to { transform: translateX(0%);}
  }

  }
  // =====MEDIAS=====



  @media only screen and (min-width: 1400px){
   .jumbo,
    .jumbo img{
       height: 40rem;
    }
    .jumbo .jumbo-text{
      top: 64%;
      left: 8rem;
      // line-height: 25px;
      .question{
        font-size:6rem;
      }
      h3{
        font-size: 2.5rem;
        padding-left: 7px;
      }
    }
    .input-wrap{
      width: 83%;
    }
    .resturant-container{
    margin: 0 auto;
    justify-content: center;
    width: 83%;
    justify-content: space-between;
    padding: 2rem 0;
    }
    .input-wrap .text-box{
      margin-right: 25px;
    }
  }
  @media only screen and (max-width: 993px){
    .jumbo,
    .jumbo img{
       height: 26rem;
    }
    .jumbo .jumbo-text{
      top: 60%;
      left: 8%;
      // line-height: 25px;
      .question{
        font-size:4rem;
        margin:0;
      }
      h3{
        font-size: 23px;
        padding-left: 7px;
      }
    }
    .input-wrap{
    padding-left: 20px;
    .my_btn{
      padding: 7px 28px;
    }
    }
    .resturant-container{
      margin: 2rem auto;
    }
  }


  @media only screen and (max-width: 768px){
    .jumbo,
    .jumbo img{
       height: 22rem;
    }
    .jumbo .jumbo-text{
      top: 60%;
      left: 9%;
      // line-height: 25px;
      .question{
        font-size:3.2rem;
        margin:0;
      }
      h3{
        font-size: 20px;
        line-height: 8px;
        padding-left: 7px;
        padding-top:5px;
      }
    }
    .input-wrap{
    padding-left: 20px;
    .my_btn{
      padding: 7px 28px;
    }
    }
    .resturant-container{
      margin: 3rem auto;
    }
  }

  @media only screen and (max-width: 576px){
    .jumbo,
    .jumbo img{
       height: 16rem;
    }
    .jumbo .jumbo-text{
      top: 63%;
      left: 6%;
      line-height: 25px;
      .question{
        font-size:2.6rem;
        margin:0;
      }
      h3{
        font-size: 18px;
        line-height: 42px;
        padding-left: 7px;
        padding-top:5px;
      }
    }
    .input-wrap{
      flex-wrap: nowrap;
      // width:300px;
        overflow-y: hidden;
        overflow-x: scroll;
        margin: 0 auto;
        padding-left: 0;
        &::-webkit-scrollbar {
        display: none;
        }
    }
    .resturant-container{
      margin: 0 auto;
    }
    .my_btn{
      padding: 2px 27px;
    }
  }

  @media only screen and (max-width: 426px){

    .jumbo,
    .jumbo img{
       height: 14rem;
    }
    .jumbo .jumbo-text{
      top: 60%;
      left: 6%;
      line-height: 25px;
      .question{
        font-size:2rem;
        margin:0;
      }
      h3{
        font-size:14px;

      }
    }
    .input-wrap{
      flex-wrap: nowrap;
      // width:300px;
        overflow-y: hidden;
        overflow-x: scroll;
        margin: 0 auto;
        padding-left: 0;
        margin: 2rem auto;
        &::-webkit-scrollbar {
        display: none;
        }
    }
      .my_btn{
        height: 50px;
        padding: 5px;
        white-space: nowrap;
        // overflow-y: hidden;
        // overflow-x: scroll;
        // -webkit-overflow-scrolling: touch;
      }

      .resturant-container{
        margin: 0 auto;
        padding-bottom: 30px;
      }
      .my_card{
        margin:15px;
        height:200px;
      }

  }


  </style>
