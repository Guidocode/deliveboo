<template>

    <div class="container card text-center mt-5 px-0">
        <div class="card-header">
            <h3>Grazie per il tuo ordine!</h3>
        </div>
        <div class="card-body my-5">
            <div class="w-50 m-auto">
                <h5 class="card-title text-center">Trovera i dettagli dell'ordine alla mail da te fornita.</h5>
                <p class="card-text my-4">Ogni tuo acquisto per noi significa che stiamo facendo un buon lavoro, grazie! Grazie, per ogni acquisto, per ogni feedback e per aver riposto in noi la tua fiducia. </p>
                <div class="pt-4">
                    <router-link class="home" :to="{name:'home'}">TORNA ALLA HOME</router-link>
                </div>
            </div>
        </div>
        <div class="card-footer text-muted">
            Copyright&copy; 2022 | All rights reserved.
        </div>
    </div>

</template>

<script>
export default {
    name: 'ThanksPage',
    data () {


        return {}
    }
}
</script>

<style lang="scss" scoped>
@import'../../../sass/front/vars';
.home{
      border: 2px solid black;
      border-top-right-radius: 25px;
      border-bottom-right-radius: 25px;
      padding: 10px;
    background-color: $light_green;
      &:hover{
        transition: border-radius 0.4s linear;
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
        cursor:pointer;
      }
    }
</style>
