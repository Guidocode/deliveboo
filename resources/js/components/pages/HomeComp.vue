<template>

  <div class="home">

    <!-- TEXT  -->
    <div class="my_container text-center" >

      <div class="banner-text pt-2 text-uppercase question">Hai Fame?</div>
      <div class="msg_2">Sei nel posto giusto</div>

      
      <ButtonPulseComp :light_btn="false" a_link="/ristoranti" button_text="Comincia subito"
      /> 
      <!-- :light_btn="false" for white btn-->

    </div>

    <!-- IMAGE COVER -->
    <div class="jumbo">
      <img :src="'img/cover.v5.png'" alt="">
    </div>
  </div>
 
  

</template>

<script>
import ButtonPulseComp from '../partials/ButtonPulseComp'


export default {
  name: 'HomeComp',
  components:{
    ButtonPulseComp,
  }
}
</script>

<style lang="scss" scoped>
@import'../../../sass/front/vars';
.home{
  padding-top: 80px;
}
  .jumbo img{
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    }

  .msg_text{
    position: absolute!important;
    z-index: 998;
    top: 80px;
    padding: 0 40px;
    transform: translate(114%,50%);
    font-family: Poppins;
  }

  .question{
    font-size: 5em;
    font-weight: 700;
    color: black;
    }
  .msg_2{
    font-size: 22px;
    text-transform: uppercase;
    line-height: 2px;

    }
    .go_ahead{
      margin: 60px 0;
      padding: 10px 40px;
      border-radius: 30px;
      background-color:black;
      a{
        color:white;
      }
      i{
        margin-left:8px;
      }
    }

    .typos{
      margin-top:50px;
      text-align:center;
    }
    .my_container{
      height:240px;
    }


//-----------------------------
//MEDIAS

@media only screen and (max-width: 769px){
  .question{
    font-size: 3.8em;
  }
}

  @media only screen and (max-width: 590px){
  .question{
    font-size: 4em;
  }
  .msg_2{
    font-size: 18px;
  }
  .go_ahead{
    margin: 30px 0;
  }
  h1{
    font-size: 2em;
  }
 }

</style>
