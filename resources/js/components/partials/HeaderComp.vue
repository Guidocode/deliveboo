<template>
  <!-- HEader & Jumbotron  -->
    <div class="my_jumbotron">
      <header class="d-flex">

        <div class="logo">
          <img :src="'img/Logo.svg'" alt="Logo">
        </div>


        <!-- NAVBAR -->
        <nav>
          <ul id="header" class="nav-list">
            <li><router-link :to="{name:'home'}">Home</router-link></li>
            <li><router-link :to="{name:'restaurants'}">Ristornati</router-link></li>
            <li><router-link :to="{name:'about'}">Chi Siamo</router-link></li>
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
  min-height: 100px;
  position: absolute!important;
  left: 0;
  right: 0;
  z-index: 90;
  background-image: none;
  display:flex;
  align-items: center;
  justify-content: space-between;
  padding: 1em 3em;
  background-color: lightgray;
  
  .logo img{
  width:100px;
  }

  .nav-list{
    display: flex;
    align-items: center;
    li{
      margin: 0 15px;
      cursor: pointer;
      line-height: 60px;
      a{
        color: black;
        display: flex;
        align-items: center;
        &:hover{
          color: red;
        }
      }

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

</style>
