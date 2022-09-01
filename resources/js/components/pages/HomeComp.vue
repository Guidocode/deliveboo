<template>

  <div>
    <img :src="'img/cover.v4.png'" alt="">

    <div class="msg_text text-center">
      <div class="banner-text pt-2 text-uppercase question">Hai Fame?</div>
      <div class="msg_2">Sei nel posto giusto</div>
         <ButtonComp buttonText="Join us today!"/>
         <button class="go_ahead mt-5">Comincia</button>

     </div>

    <!-- <ButtonComp/> -->
  </div>

  
</template>

<script>
// import ButtonComp from '../partials/ButtonComp.vue'
export default {
  name: 'HomeComp',
  // components:{
  //   ButtonComp
  // }
}
</script>

<style lang="scss" scoped>

  img{
    width:100%;
    position: relative;
    // height: 900px;
  }
  .msg_text{
    position: absolute!important;
    z-index: 998;
    top: 80px;
    padding: 0 40px;
    transform: translate(110%,50%);
    font-family: Poppins;
  }

  .question{
    font-size: 5em;
    font-weight: 700;
    color:black;
  }
  .msg_2{
    font-size: 22px;
    position: absolute;
    z-index: 997;
    top: 107px;
    left: 125px;
    }
    .go_ahead{
      padding: 5px 15px;
      border-radius: 30px;
    }


</style>