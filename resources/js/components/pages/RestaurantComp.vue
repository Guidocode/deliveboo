<template>

  <div class="restaurants text-center">
    <div class="jumbo">
      <img :src="'img/jumbo.jpg'" alt="">

      <div class="jumbo-text my_container">
        <img :src="'img/jumbo2.jpg'" alt="" width="200">
      </div>
    </div>

    <div class="input-wrap">

      <div class="inputs">
        <div class="text-box" v-for="(tipo, index) in types" :key="`tipo${ index }`">
          <label :for="tipo.id">
            
            <button class="btn btn-warning my_btn" type="submit" :name="tipo.name" :id="tipo.id" :value="tipo.id" @click="filterMe(tipo.id)"><span><i class="fa-solid fa-circle-check"></i> {{ tipo.name }}</span></button>
            
          </label>
        </div>
      </div>
    </div>

    <!-- OLD ONE -->

      <!-- <div v-for="resturant in resturants" :key="resturant.id" class="card  mx-4" style="width: 18rem;">
        <img v-if="resturant.image_db" :src="resturant.image_db" class="card-img-top" alt="">
        <img v-else-if="resturant.image" :src="resturant.image" alt="">

        <div class="card-body">
          <h5 class="card-title">{{ resturant.name }}</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <router-link class="btn btn-primary" :to="{ name: 'Menu', params: {slug: resturant.slug} }" >Vai al ristorante</router-link>
        </div>
      </div>  -->



     <div class="line mt-2"></div>
     

    <div class="resturant-container d-flex flex-wrap justify-content-center">

        <div v-for="resturant in resturants" :key="resturant.id" class="my_card mx-4" style="width: 18rem;">
          <router-link :to="{ name: 'Menu', params: {slug: resturant.slug} }">
             <img v-if="resturant.image_db" :src="resturant.image_db" class="card-img-top" alt="">
             <img v-else-if="resturant.image" :src="resturant.image" alt="">
          </router-link>

            <div class="card-body">
                <h5 class="card-title">{{ resturant.name }}</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <router-link class="btn btn-primary" :to="{ name: 'Menu', params: {slug: resturant.slug} }" >Vai al ristorante</router-link>
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
               type: 'Cinese'
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
                  this.resturants = r.data.users
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



          }

       }
</script>

<style lang="scss" scoped>
@import'../../../sass/front/vars';


  .restaurants{
    margin: 0 auto;
    .jumbo{
      height:550px;
      width:100%;
      overflow: hidden;
      img{
        width:100%;
      }
    }
  }
  .jumbo{
    position:relative;

  }
  .jumbo-text{
    width:60%;
    height: 300px;
    position:absolute;
    z-index: 990;
    top: 0;
    left:0;
    transform: translate(33%, 50%);
    background-color: $light_green;
    border-radius: 15px;
    padding: 4rem 7rem;
    overflow: hidden;
    animation: mymove 2s linear;
  }

  @keyframes mymove {
  from {top: -100px;}
  to {top: 0}
  }

    .resturant-container{
    width: 75%;
    margin: 4rem auto;
    gap: 10px;
    border-radius: 10px;
  }

  
  h2{
    margin-bottom: 40px;
    font-family: Poppins,sans-serif;
  }
  
  // INPUT
  .input-wrap{
    min-width: 300px;
    height: 85px;
    padding: 0 2rem;
  }

  .inputs{
    margin: 50px auto;
    display:flex;
    height:50px;
    justify-content: center;
    flex-wrap: wrap;
  }

  div label input {
     margin-right:100px;
  }
  
  .my_btn{
    color:white;
    background-color: black;
    border-radius: 20px;
    border:none;
    margin:5px;
    padding:8px 20px;
    &:hover{
      background-color: $violet;
    }
    &:active{
      color:black;
      background-color: white;
    }
  }


  .line{
    height:3px;
    background-color: black;
  }

  //CARD
  .my_card{
  margin: 20px;
  height: 200px;
  width: 200px;
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
  
  //MEDIA

  @media only screen and (min-width: 1200px){
    // .col-lg-6{
    //   float:left;
    //   width:50%;
    // }
  }

  </style>
