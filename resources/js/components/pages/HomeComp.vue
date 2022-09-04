<template>

  <div class="home">

    <!-- TEXT  -->
    <div class="my_container text-center" >

      <div class="banner-text pt-2 text-uppercase question">Hai Fame?</div>
      <div class="msg_2">Sei nel posto giusto</div>

      
      <ButtonPulseComp :light_btn="false" a_link="#tipologie" button_text="Scegli Categoria"/>  
      <!-- :light_btn="false" for white btn-->

    </div>

    <!-- IMAGE COVER -->
    <div class="jumbo">
      <img :src="'img/cover.v5.png'" alt="">
    </div>


    <!-- SCROLL TEXT -->
    <div id="scroll-container">
      <div id="scroll-text">

        <span class="txt_scroll">categoria</span>
        <span class="txt_scroll">categoria</span>
        <span class="txt_scroll">categoria</span>
        <span class="txt_scroll hide">categoria</span>
        <span class="txt_scroll hide">categoria</span>
        <span class="txt_scroll hide">categoria</span>
        <span class="txt_scroll hide">categoria</span>
        <span class="txt_scroll hide">categoria</span>
        <span class="txt_scroll hide">categoria</span>
        <span class="txt_scroll hide">categoria</span>
        <span class="txt_scroll hide">categoria</span>

      </div>
    </div>
    <!-- END / SCROLL TEXT -->

    <section id="tipologie" class="my_container typos">
      <h1>CATEGORIE</h1>
        <ul>
          <li>
            <a href="#">logo + text</a>
          </li>
        </ul>

    </section>

    

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
// SCROLL

#scroll-container {
  border: 2px solid black;
  border-radius: 5px;
  overflow: hidden;
  margin-top: 10px;
  padding: 10px 0;
}

#scroll-text {
  /* animation properties */
  -moz-transform: translateX(100%);
  -webkit-transform: translateX(100%);
  transform: translateX(100%);
  
  -moz-animation: my-animation 20s linear infinite;
  -webkit-animation: my-animation 15s linear infinite;
  animation: my-animation 15s linear infinite;
  .txt_scroll{
    padding: 0 10px;
    text-transform: uppercase;
    font-size: 20px;
    font-weight: 600;
  }
}

/* for Firefox */
@-moz-keyframes my-animation {
  from { -moz-transform: translateX(100%); }
  // to { -moz-transform: translateX(-100%); }
}

/* for Chrome */
@-webkit-keyframes my-animation {
  from { -webkit-transform: translateX(100%); }
  to { -webkit-transform: translateX(-100%); }
}

@keyframes my-animation {
  from {
    -moz-transform: translateX(100%);
    -webkit-transform: translateX(100%);
    transform: translateX(100%);
  }
  to {
    -moz-transform: translateX(-100%);
    -webkit-transform: translateX(-100%);
    transform: translateX(-100%);
  }
}
//-----------------------------
//MEDIAS


 @media only screen and (max-width: 590px){
  .question{
    line-height:66px;
  }
  .msg_2{
    line-height: 55px;
    font-size: 20px;
  }
  .hide{
    display:none;
  }
  .jumbo{
    margin-top: 50px;
  }
 }

  @media only screen and (max-width: 575px){
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
