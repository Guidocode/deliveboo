<template>
    <div>
        <div class="card" style="width: 18rem;">
            <img src="https://img.freepik.com/free-photo/top-view-pepperoni-pizza-with-mushroom-sausages-bell-pepper-olive-corn-black-wooden_141793-2158.jpg?w=2000" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"> {{ dish.name }} </h5>
                <span> {{ dish.price }} &euro;</span>
                <a @click="addCart()" class="btn btn-primary"> Aggiungi al carrello </a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'DishCard',
    props:{
        dish: Object
    },
    data () {
        return {

        }
    },
    methods: {
        addCart(){
            let count = localStorage.getItem('count');
            count = parseInt(count);

            if(count){
                localStorage.setItem('count', count + 1);

            }else{
                localStorage.setItem('count', 1);
            }
        }
    },
}
</script>

<style lang="scss" scoped>
@import'../../../../sass/front/vars';

</style>
