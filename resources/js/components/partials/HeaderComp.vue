<template>
  <!-- HEader & Jumbotron  -->
    <div class="my_jumbotron">
      <header class="d-flex">

        <div class="logo">
          <img :src="'img/logo.svg'" alt="Logo">
        </div>


        <!-- NAVBAR -->
        <nav>
          <ul id="header" class="nav-list">
            <li class="home"><router-link :to="{name:'home'}">Home</router-link></li>
            <li class="restors"><router-link :to="{name:'restaurants'}">Ristornati</router-link></li>
            <li class="about"><router-link :to="{name:'about'}">Chi Siamo</router-link></li>
            <i class="fa-solid fa-cart-shopping mx-2" style="color:black"></i>
          </ul>

        </nav>



        <!-- Humburger-Menu 
        <div class="hamburger">
          <span class="bar"></span>
          <span class="bar"></span>
          <span class="bar"></span>
        </div>

        <ul class="hamburger-menu">
          <li><router-link :to="{name:'home'}">Home</router-link></li>
            <li><router-link :to="{name:'restaurants'}">Ristornati</router-link></li>
            <li><router-link :to="{name:'about'}">Chi Siamo</router-link></li>
        </ul>  -->
      </header>

    </div>


</template>

<script>
export default {
  name: 'HeaderComp'
}
</script>

<style lang="scss" scoped>

header{
  height: 100px;
  position: fixed!important;
  left: 0;
  right: 0;
  z-index: 999;
  background-image: none;
  display:flex;
  align-items: center;
  justify-content: space-between;
  align-items: center;
  padding: 10px 40px 20px 50px;
  background-color: white;
  // border-bottom: 1px solid black;
  box-shadow: 0 0 15px black;
  overflow: hidden;
  .logo img{
  width:200px;
  }
  nav{
    padding-top:17px;
  }

  .nav-list{
    display: flex;
    align-items: center;
    li{
      margin: 0 10px;
      padding: 5px 20px;
      cursor: pointer;
      line-height: 30px;
      a{
        color: black;
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
  .hamburger{
      display:none;
      cursor: crosshair;
      .bar{
        display:block;
        width: 25px;
        height: 3px;
        margin: 5px auto;
        transition: all .2s ease-in-out;
        background-color: white;;
      }
    }
  }    
}

</style>
