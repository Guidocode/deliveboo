<template>

  <div>
    <div class="background_img" :style="'background-image: url(img/cover.v4.png)'">

    </div>
    <!-- <img :src="'img/cover.v4.png'" alt=""> -->

    <div class="msg_text text-center" >
      <div class="banner-text pt-2 text-uppercase question">Hai Fame?</div>
      <div class="msg_2">Sei nel posto giusto</div>

         <button class="go_ahead mt-5"><a href="#tipologie">Seleziona categorie <i class="fa-solid fa-arrow-down"></i></a></button>

     </div>

  <section id="tipologie" class="my_container typos">
   <h1>CATEGORIE</h1>
    <ul>
      <li>
        <a href="#">logo + text</a>
      </li>
      <li>
        <a href="#">logo + text</a>
      </li>
      <li>
        <a href="#">logo + text</a>
      </li>
      <li>
        <a href="#">logo + text</a>
      </li>
    </ul>
  </section>
  </div>



</template>

<script>

export default {
  name: 'HomeComp'
}
</script>

<style lang="scss" scoped>

  .background_img{
    width:100%;
    position:relative;
    height: 1050px;
    // background-color: red;
    background-image: url('/public/img/cover.v4.png');
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
    position: absolute;
    z-index: 997;
    top: 107px;
    left: 125px;
    }
    .go_ahead{
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


</style>
