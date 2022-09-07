<template>

    <div class="restaurants text-center">

        <!-- <h2>Cosa vuoi mangiare?</h2> -->


    


    <div class="input-wrap">

      <div class="inputs">
        <div class="ck-button" v-for="(tipo, index) in types" :key="`tipo${ index }`">
          <label :for="tipo.id">
            <input type="checkbox" :name="tipo.name" :id="tipo.id" :value="tipo.id" @click="filterMe(tipo.id)"><span><i class="fa-solid fa-circle-check"></i> {{ tipo.name }}</span>
          </label>
        </div>
      </div>

            </div>
          </div>

        <!-- <div class="line mt-2"></div> -->
            <div class="my_container d-flex flex-wrap justify-content-center">
                <div v-for="resturant in resturants" :key="resturant.id" class="card  mx-4" style="width: 18rem;">
                    <img v-if="resturant.image_db" :src="resturant.image_db" class="card-img-top" alt="">
                    <img v-else-if="resturant.image" :src="resturant.image" alt="">
                    <div class="card-body">
                        <h5 class="card-title">{{ resturant.name }}</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <router-link class="btn btn-primary" :to="{ name: 'Menu', params: {slug: resturant.slug} }" >Vai al ristorante</router-link>
                    </div>
                </div>
            </div>


          <!-- <div class="search-container p-1">
              <h4 class=" text-center">Cosa vuoi mangiare?</h4>
              <ul class="d-flex justify-content-center">
                  <li class=" ml-2" v-for="(tipo, index) in types" :key="`tipo${ index }`">
                      <input type="checkbox" :name="tipo.name" :id="tipo.id" :value="tipo.id"  @click="filterMe(tipo.id)">
                      <label :for="tipo.id">{{ tipo.name }}</label>
                  </li>
              </ul>

          </div>

          <div class="d-flex container flex-wrap resturant-container justify-content-center py-4">

              <div v-for="resturant in resturants" :key="resturant.id" class="card" style="width: 18rem;">
                  <img :src="resturant.image" class="card-img-top" alt="">
                  <div class="card-body">
                      <h5 class="card-title">{{ resturant.name }}</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <router-link class="btn btn-primary" :to="{ name: 'Menu', params: {slug: resturant.slug} }" >Vai al ristorante</router-link>
                  </div>
              </div>
              -->
        </div>


    </div>

     <!-- <div class="line mt-2"></div>  -->

    <div class="resturant-container d-flex flex-wrap justify-content-center">

        <div v-for="resturant in resturants" :key="resturant.id" class="my_card mx-4" style="width: 18rem;">

          <router-link :to="{ name: 'Menu', params: {slug: resturant.slug} }">
            <img :src="resturant.image" class="card-img-top" alt="">
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

       export default {
         name: 'HomeComp',
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


          },
       }
</script>

<style lang="scss" scoped>
@import'../../../sass/front/vars';
  .search-container{
    background-color: $light_green;
    border-radius: 10px;
  }
  .resturant-container{
    width: 75%;
    margin: 1rem auto;
    gap: 10px;
    border-radius: 10px;
  }

  .restaurants{
    margin: 0 auto;
  }

  h2{
    margin-bottom: 40px;
    font-family: Poppins,sans-serif;
  }
  
  // INPUT
  .input-wrap{
    min-width: 300px;
    height: 67px;
    padding: 0 2rem;
  }

  .inputs{
    margin: 30px auto;
    display:flex;
    height:50px;
    justify-content: center;
    flex-wrap: wrap;
    -webkit-overflow-scrolling: touch;
    &::-webkit-scrollbar {
      display: none;
    }
  }

  div label input {
     margin-right:100px;
  }
  
  .ck-button {
    background-color: $violet;
    color: darken($violet, 50%);
    margin:5px;
    margin: 5px;
    padding: 7px 20px;
    border-radius:25px;
    &:hover{
      background-color: $violet;
    }
  }

  .ck-button label {
      float:left;
      margin-bottom: 0;
  }

  .ck-button label span {
      text-align:center;
      display:block;
  }

  .ck-button label input {
      position:absolute;
      top:-20px;
  }

  .ck-button input:checked + span {
      color:white;
      padding: 0 30px 0 30px;
      font-weight:600;
      &:hover{
        color: rgb(245, 68, 68);
        background-color: $violet;
      }
  }
  //END INPUT


  .line{
    width:93%;
    margin: 2rem auto;
    height:3px;
    background-color: black;
  }

   //JUMBO 

  // .jumbo-img{
  //   width:100%;
  //   height: 100px;
  //   overflow: hidden;
  //   position: relative;
  //   display:flex;
  //   justify-content: center;
  //   align-items: center;
  //   img{
  //       width:100%;
  //   }
  //   .msg-res{
  //       width:60%;
  //       padding: 1rem;
  //       background-color: $light_green;
  //       border-radius: 20px;
  //       position: absolute;
  //       text-align: start;
  //    }

  //   }
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
   &:hover{
    filter: blur(5px);
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
