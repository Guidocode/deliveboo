<template>
    <div>
        <div class="container d-flex container-menu">

            <div class="sidebar">
               <h4> Ricerca Rapida </h4>
            </div>

            <div class="dish-container d-flex">
                <DishCard />

            </div>

        </div>
    </div>
</template>

<script>
import DishCard from './cards/DishCard.vue';

export default {
    name: "MenuComp",
    data() {
        return {};
    },
    components: { DishCard }
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
