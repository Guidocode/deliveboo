<template>
    <div>
        <div class="search-container p-1">
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
                        console.log(alredyExist)
                        console.log
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
        gap: 10px;
        border-radius: 10px;
        background-color: $orange;
    }
</style>
