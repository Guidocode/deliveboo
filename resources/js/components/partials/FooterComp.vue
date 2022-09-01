<template>
  <footer>
    <div class="my_container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 align-items-center">

            <div class="col info">
                <div class="title">Scopri DeliverBoo</div>
                <ul>
                    <li>Chi siamo</li>
                    <li>Ristoranti</li>
                    <li>Investitori</li>
                    <li>Altro</li>
                </ul>
            </div>

            <div class="col online_support">
                <div class="title">Aiuto?</div>
                <ul>
                    <li>Contatti</li>
                    <li>FAQ</li>
                    <li>termini & condizioni</li>
                    <li>Tipi di cucina</li>
                </ul>
            </div>

            <div class="col info">
                <div class="title">Blog</div>
                <ul>
                    <li><i class="fa-solid fa-chevron-right"></i> Pizza, panzerotto, calzone fritto o focaccia?</li>
                    <li><i class="fa-solid fa-chevron-right"></i> DeliveBoo e AMSA insieme per l’ambiente anche nel 2022</li>
                </ul>
            </div>

            <div class="col icons">
                <SociaIcons/>
            </div>

        </div>
    </div>

    <!-- under footer -->   
    <div class="underlower-footer">
        <div class="my_container text-center">
            <div class="copyright"><i class='far fa-copyright'></i> Copyright 2020-2022 | DeliverBoo Comp. | All  Rights Reserved </div>
        
        </div>
    </div>
        
  </footer>
</template>

<script>

import SociaIcons from './SociaIcons'

export default {
  name: 'FooterComp',
  components:{
    SociaIcons
  }
}
</script>

<style lang="scss" scoped>

@import'../../../sass/front/vars';

footer{
    background-color:rgb(31, 31, 31);
    color: white;
    // height: 200px;
    a{
        padding: 5px;
    }
    h3{
        font-weight: bold;
    }
    .btm-footer{
        background-color: rgb(27, 27, 27);
        border-top: 2px solid black;
        .btm-sentence{
        font-style: italic;
        font-size: 11px;
        padding: 10px;
        margin: 0 !important;
        span{
            font-weight: bold;
        }
        }
    }
    .underlower-footer{
    height: 40px;
    padding-top: 10px;
    background-color: black;
    color: gray;
    // border-top: 1px solid gray;
    font-size: 12px;
    }

    .title{
    text-transform: uppercase;
    color: $green_salad;
    font-weight: 500;
    margin-bottom: 10px;
    }

    .icons{
    text-align:center;
    }

    .col{
     margin: 30px 0;
    }

    ul{
    margin-block-start: 0;
    margin-block-end: 0;
    padding-inline-start: 0px;
    }

    ul li{
    font-size: 14px;
    line-height: 25px;
    color: gray;
    &:hover{
    color: lighten(gray, 50%);
    cursor: pointer;
    }
    }
}
//End fOOTER

  @media only screen and (max-width: 575px){}
   .copyright{
    display:none;
   }
</style>
