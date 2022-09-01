<template>
    <div>
        <div class=" bg-info ">
        <ul class="d-flex justify-content-center">
            <li class=" ml-2" v-for="(tipo, index) in types" :key="`tipo${ index }`">
                <input type="checkbox" :name="tipo.name" :id="tipo.id" :value="tipo.id" v-model="selectedTypes">
                <label :for="tipo.id">{{ tipo.name }}</label>
            </li>
        </ul>

    </div>
    <div class="d-flex container flex-wrap resturant-container">

        <div v-for="resturant in resturants" :key="resturant.id" class="card" style="width: 18rem;">
            <img :src="resturant.image" class="card-img-top" alt="">
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
         // this.filteredResearch()
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

         // filteredResearch(){
         //     axios.get('/api/ristoranti')
         //     .then(r => {
         //     r.data.users.forEach(element => {
         //         element.types.forEach(res => {
         //             if(res.name == 'Cinese'){
         //                 this.resturants.push(element)
         //             }
         //         });

         //     });


         //   })
         // },

     //     filteredResearch(){
     //         axios.get('/api/ristoranti-filtrati'+ this.type)
     //         .then(r => {
     //             this.resturants = r.data.users
     //         })
     //     }
        },
     }
     </script>

<style lang="scss" scoped>
    .resturant-container{
        gap: 10px;
    }
</style>
