<template>

  <div class="restaurants text-center">
    <div class="jumbo">
      <img :src="'img/try1.png'" alt="">

      <div class="jumbo-text">
      <div class="banner-text text-uppercase question">Categorie</div>
      <h3>scegliere uno o più categorie</h3>
      <!-- <i class="fa-solid fa-arrow-down"></i> -->
    </div>
    </div>


    <div class="input-wrap">
        <div class="text-box" v-for="(tipo, index) in types" :key="`tipo${ index }`">
          <label :for="tipo.id">
            
            <button class="my_btn" type="submit" :name="tipo.name" :id="tipo.id" :value="tipo.id" @click="filterMe(tipo.id)">
              <span><i :class="tipo.icon"></i> {{ tipo.name }}</span>
            </button>
            
          </label>
        </div>

    </div>

      <div class="resturant-container d-flex flex-wrap">

        <div v-for="resturant in resturants" :key="resturant.id" class="my_card mx-4" style="width: 18rem;">
          <router-link :to="{ name: 'Menu', params: {slug: resturant.slug} }">
             <img v-if="resturant.image_db" :src="resturant.image_db" class="card-img-top img-fluid" alt="Imagine db">
             <img  class="img-fluid" v-else-if="resturant.image" :src="`/storage/${resturant.image}`" alt="Immagine utente">
             <img class="img-fluid" v-else src="storage/uploads/restaurant-default.jpg" alt="Immagine default">
          </router-link>

            <div class="card-body">
                <h5 class="card-title">{{ resturant.name }}</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <router-link class="btn btn-primary" :to="{ name: 'Menu', params: {slug: resturant.slug} }" >Vai al ristorante</router-link>
            </div>
        </div>
      </div>


     <!-- <div class="line mt-2"></div> -->
     

    
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

            let button =document.querySelector('.xxx');
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
    height: 35rem;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow:hidden;
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
        color: black;
        text-transform: uppercase;
        animation: mymove 2s ease;
        margin-bottom:1rem;
      }
      h3{
      animation: h3move 2s ease;
      padding-left:1rem;
      }
    }
    img{
      height:41rem;
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

  .resturant-container{
  gap: 10px;
  margin: 0 auto;
  justify-content: center;
  }
  h2{
    margin-bottom: 40px;
    font-family: Poppins,sans-serif;
  }

  // INPUT
  .main_rest{
    width:80%;
    margin: 0 auto;
    padding: 9rem 0;
    height: 66rem;
    justify-content: space-between;

  }
  .input-wrap{
    display: flex;
    min-height: 50px;
    align-items: start;
    width: 93%;
    margin: 0 auto;
    padding: 130px 60px 50px 60px;
    .text-box{
      margin-right:12px;
    }
  }

  // .inputs{
  //   margin: 50px auto;
  //   display:flex;
  //   height:50px;
  //   justify-content: center;
  //   flex-wrap: wrap;
  // }

  .my_btn{
    color: black;
    background-color: $green_salad;
    border-radius: 20px;
    border: 3px solid black;
    font-size: 20px;
    padding: 5px 20px;
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
  margin: 20px;
  width: calc(100% /3);
  height: 200px;
  position: relative;
  border-radius: 20px;
  overflow: hidden;
  box-shadow: 0 0 10px gray;
  img {
  object-fit: cover;
  width:100%;
   &:hover{
    filter: blur(5px);
    // transform: scale(1.3);
    transition: 0.5s ease-in;
  }
  }
  .card-body{
  position: absolute;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 40%;
  bottom: 0;
  left: 0;
  color: white;
  background-color: rgba(0, 0, 0, 0.5);
  transform: translateY(100%);
  transition: all 0.4s;
  }
  &:hover .card-body{
  transform: translateY(0%);
  }
  h5{
    padding: 10px 20px;
    background-color: $blue;
    border-radius: 20px;
    color:black;
  }

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


  // =====MEDIAS=====

    @media only screen and (min-width: 2000px){
    .restaurants{
      padding:0 15rem;
    }
  }

  @media only screen and (max-width: 1400px){
   .jumbo,
    .jumbo img{
       height: 28rem;
    }
    .jumbo .jumbo-text{
      top: 64%;
      left: 8%;
      // line-height: 25px;
      .question{
        font-size:4rem;
      }
      h3{
        font-size: 23px;
        padding-left: 7px;
      }
    }
  }
  @media only screen and (max-width: 992px){
    .jumbo,
    .jumbo img{
       height: 24rem;
    }
    .jumbo .jumbo-text{
      top: 63%;
      left: 8%;
      // line-height: 25px;
      .question{
        font-size:4rem;
      }
      h3{
        font-size: 23px;
        padding-left: 7px;
      }
    }
  }


  @media only screen and (max-width: 768px){
    .jumbo,
    .jumbo img{
       height: 20rem;
    }
    .jumbo .jumbo-text{
      top: 63%;
      left: 6%;
      // line-height: 25px;
      .question{
        font-size:3.2rem;
      }
      h3{
        font-size: 20px;
        line-height: 8px;
        padding-left: 7px;
      }
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
        font-size:2.8rem;
      }
      h3{
        font-size: 18px;
        line-height: 42px;
        padding-left: 7px;
      }
    }
  }

  @media only screen and (max-width: 390px){
    
    .jumbo,
    .jumbo img{
       height: 10rem;
    }
    .jumbo .jumbo-text{
      top: 60%;
      left: 6%;      
      line-height: 25px;
      .question{
        font-size:2rem;
      }
      h3{
        font-size:14px;
      }
    }

  }

  </style>
