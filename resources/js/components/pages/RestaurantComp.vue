<template>
    <div class="d-flex container">
         <div class=" bg-info ">
             <ul>
                 <li v-for="(tipo, index) in types" :key="`tipo${ index }`">
                     <input type="checkbox" :name="tipo.name" :id="tipo.id" :value="tipo.id" v-model="selectedTypes">
                     <label :for="tipo.id">{{ tipo.name }}</label>
                 </li>
             </ul>

         </div>
         <div class="bg-dark flex-grow-1 ">
             <div v-for="resturant in resturants" :key="resturant.id">
                 <h3 class=" text-white">{{ resturant.name }}</h3>
                 <ul>
                     <li class=" text-white" v-for="(item,index) in resturant.types" :key="`tipoo${ index }`">{{ item.name }}</li>
                 </ul>
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

     </style>
