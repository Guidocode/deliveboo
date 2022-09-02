<template>
    <div>
        <div class="container d-flex container-menu">

            <div class="sidebar">
               <h4> Ricerca Rapida </h4>
            </div>

            <div class="dish-container d-flex">
                <DishCard v-for="dish in resturant.dishes" :key="dish.id"
                :dish="dish" />

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
            resturant:{}
        };
    },
    components: { DishCard },
    mounted() {
        this.getDishes()
    },
    methods: {
        getDishes(){
            console.log(this.$route.params.slug)
            axios.get('/api/'+ this.$route.params.slug)
           .then(r => {
             this.resturant = r.data.user
           })
        }
    },
}
</script>

<style lang="scss" scoped>
@import'../../../sass/front/vars';
.container-menu{
    height: calc(100%);
    .sidebar{
        padding: 20px 10px;
        background-color: $light_green;
    }
    .dish-container{
        padding: 10px;
        gap: 10px;
        flex-wrap: wrap;
        background-color: $orange;
        justify-content: center;
        flex-grow: 1;
    }
}
</style>
