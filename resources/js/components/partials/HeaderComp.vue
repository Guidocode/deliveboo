<template>
  <!-- HEader & Jumbotron  -->
      <header class="d-flex">

        <div class="logo">
          <img :src="'img/deliverboo_logo.png'" alt="Logo">
        </div>


        <!-- NAVBAR -->
        <div class="d-flex align-items-center">
          <nav>
            <ul id="header" class="nav-list">
              <li class="home"><router-link :to="{name:'home'}">Home</router-link></li>
              <li class="restors"><router-link :to="{name:'restaurants'}">Ristornati</router-link></li>
              <li class="about"><router-link :to="{name:'about'}">Chi Siamo</router-link></li>
            </ul>
          </nav>

          <i class="fa-solid fa-cart-shopping mx-2" style="color:black"></i>
          <!-- HAMBURGER MENU -->
          <div class="hamburger ml-2">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>          
          </div> 

        </div>

        <!-- <ul v-if="isShown" class="hamburger-menu" :class="{'open' : isShown}">
          <li>1</li>>
       </ul> -->

      </header>
</template>

<script>

export default {
  name: 'HeaderComp'
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
    padding: 1em 5em;
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

 @media only screen and (max-width: 992px) {
  .header{
  padding: 1em 1.5em;
  }

  }

  
  @media only screen and (max-width: 768px) { //akamde rac xdeba
  header{
    padding: 1em 2em;
  }

  header .logo img{
    width: 150px;
  }
  .nav-list li{
    margin: 0 5px;
    padding: 5px 12px;
    a{
      font-size: 14px;
    }
  }
  
  .nav{
    position: fixed;
    left: -120%;
    top: 70px;
    flex-direction: column;
    width:100%;
    text-align: center;
    transition: 0.3s;
  }
  .nav.active{
    left: 0;
  }
  .nav ul li{
    margin: 16px 0;
  }

  .banner-text{
    font-size:3em!important;
  }
  }

    @media only screen and (max-width: 575px){
      header{
        padding: 0 2em;
      }
      header nav li{
        display:none;
      }
       .hamburger{
        display: block!important;
        }
        .hamburger-menu{
        position: absolute;
        z-index: 967;
        top: 115px;
        width:100%;
        background-color: red;
        display:flex;
        flex-direction: column;
        text-align:center;
        justify-content: center;
        padding: 0;
        li{
          padding: 10px 0;
          &:hover{
            background-color: lighten(red, 10%);
            cursor: pointer;
          }
        }
        a{
          color: white;
          text-decoration: none;
          font-size: 22px;
          text-transform: uppercase;
        }   
        }

    }
</style>
