<template>
      <header class="d-flex">

        <div class="logo">
          <img :src="'img/deliverboo_logo.png'" alt="Logo">
        </div>


        <!-- NAVBAR -->
        <div class="d-flex align-items-center">
          <nav>
            <ul id="header" class="nav-list">
              <li class="home"><router-link :to="{name:'home'}">Home</router-link></li>
              <li class="restors"><router-link :to="{name:'restaurants'}">Ristoranti</router-link></li>
              <li class="about"><router-link :to="{name:'about'}">Chi Siamo</router-link></li>
              <li class="home"><a :href="'/login'">Accedi o registrati</a></li>
            </ul>
          </nav>

          <!-- <i class="fa-solid fa-cart-shopping mx-2" style="color:black"><router-link :to="{name:'Cart'}"></router-link></i> -->

            <router-link :to="{name:'Cart'}">
                <i class="fa-solid fa-cart-shopping mx-2 position-relative" style="color:black">
                    <div class="position-absolute " >
                        <span> * </span>
                    </div>
                </i>
            </router-link>

          <!-- HAMBURGER MENU -->
          <div class="hamburger ml-2" @click="isShown = !isShown">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
          </div>

        </div>

        <ul v-if="isShown" class="hamburger-menu" :class="{'open' : isShown}">
          <li class="home"><router-link :to="{name:'home'}">Home</router-link></li>
              <li class="restors"><router-link :to="{name:'restaurants'}">Ristoranti</router-link></li>
              <li class="about"><router-link :to="{name:'about'}">Chi Siamo</router-link></li>
              <li class="home"><a :href="'/login'">Accedi o registrati</a></li>
        </ul>
       <!-- END OF HAMBURGER -->
      </header>
</template>

<script>

export default {
  name: 'HeaderComp',
  data() {
    return {
        cartList: JSON.parse(window.localStorage.getItem('dishesInCart')),
        isShown: false,
    }
  },
  methods: {

  },
  computed:{

  }
}
</script>

<style lang="scss" scoped>

@import'../../../sass/front/vars';

header{
  height: 100px;
  background-color: $light-green;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 1em 4em;
  box-shadow: 0 0 15px black;
  .logo img{
  width:200px;
  }
  nav{
    padding-top:17px;
  }
  li .active{
    color:#7131fa;
  }
}

.nav-list{
  display: flex;
  align-items: center;
    li{
      margin: 0 10px;
      padding: 5px 20px;
      cursor: pointer;
      line-height: 30px;
      list-style:none;
      a{
        &:hover{
          text-decoration: none !important;
        }
      }

    }
    .home{
      border: 2px solid black;
      border-top-right-radius: 25px;
      border-bottom-right-radius: 25px;
      &:hover{
        transition: border-radius 0.4s linear;
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
        cursor:pointer;
      }
    }
    .restors, .about{
      border: 2px solid black;
      border-radius: 25px;
      &:hover{
        transition: border-radius 0.4s linear;
        border-radius: 0;
        cursor:pointer;
      }
    }
}
.hamburger{
  display:none!important;
  cursor: pointer;
  .bar{
    display:block;
    width: 25px;
    height: 3px;
    margin: 5px auto;
    transition: all .2s ease-in-out;
    background-color: rgb(0, 0, 0);;
  }
}

//-----------------------------
//MEDIA

  @media only screen and (max-width: 992px){
    header[data-v-494e1ffe]{
      padding: 1em 1em 1em 2em;
    }
    .nav-list li[data-v-494e1ffe] {
      margin: 0 8px;
      padding: 2px 18px;
    }
    header .logo img[data-v-494e1ffe]{
      width:185px;
    }
  }

  @media only screen and (max-width: 842px){
    .nav-list li[data-v-494e1ffe] {
      margin: 0 7px;
      padding: 2px 13px;
    }
  }

  @media only screen and (max-width: 790px) {
    .header{
      padding: 1em 1.5em;
    }
    .logo img{
      width:170px;
    }
    .nav-list li[data-v-494e1ffe] {
      margin: 0 7px;
      padding: 2px 6px;
    }
  }

  @media only screen and (max-width: 735px){
    header{
      padding: 0 2em;
    }
    header nav li{
      display:none;
    }
    .hamburger{
      display: block!important;
      }
    .hamburger-menu[data-v-494e1ffe]{
      position: absolute;
      z-index: 967;
      top: 100px;
      left: 0;
      width:100%;
      background-color: $green_salad;
      display:flex;
      text-align:center;
      justify-content: space-between;
      padding: 10px;
      a{
        color: black;
        text-decoration: none;
        font-size: 18px;
        text-transform: uppercase;
        &:hover{
          color: white;
        }
      }
    }
  }
  i{
    transform: scale(2);
    div{
      background-color: blue;
      top: 50%;
      right: -20%;
      width: 13px;
      height: 13px;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      span{
        color: white;
        font-size: 8px;
      }

    }

  }
</style>
