<template>
  <footer>
    <!-- top footer -->
    <div class="container">
        <div class="row d-flex justify-content-between align-items-center pt-5 pb-4">
            <!-- banner -->
            <div class="col col-6">
                <h3>Cerca, Ordina, Deliveboo</h3>
                <p>Mangia ovunque vuoi e con chi vuoi i migliori piatti dei ristoranti più ricercati del momento.</p>

            </div>
            <!-- socials -->
            <div class="col col-3">
                <p>Seguici sui nostri social:</p>
                <a href="#">Instagram</a>
                <a href="#">Facebook</a>
                <a href="#">Youtube</a>
                <a href="#">TikTok</a>
            </div>
        </div>
    </div>
    <!-- bottom footer -->
    <div class="btm-footer">
        <div class=" container d-flex justify-content-center align-items-center h-100">
        <p class="btm-sentence">This site is empowered by <span>Gack</span> </p>
    </div>
    </div>
  </footer>
</template>

<script>
export default {
  name: 'FooterComp'
}
</script>

<style lang="scss" scoped>
@import'../../../sass/front/vars';
footer{
    background-color: $green_salad;
    height: 200px;

    a{
        padding: 5px;
    }
    h3{
        font-weight: bold;
    }
    .btm-footer{
        height: 50px;
        background-color: $light_brown;
        .btm-sentence{
        font-style: italic;
        font-size: 11px;
        margin: 0 !important;
        span{
            font-weight: bold;
        }
    }
    }
}
</style>
