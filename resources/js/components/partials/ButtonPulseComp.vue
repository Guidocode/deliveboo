<template>
  <div class="text-box">
    <a :href="a_link" class="btn btn-white btn-animate" :class="[light_btn ? '' : 'light_btn']">{{button_text}}</a>
  </div>
</template>

<script>
export default {
  name: 'ButtonPulseComp',
  props:{
    button_text:{
      type: String,
      default: () => 'label'
    },
    a_link:{
        type: String,
        default: () => '#'
    },
    light_btn:{
        type: Boolean,
        default: () => 'false'
    }
  }
}
</script>

<style lang="scss" scoped>
.text-box {
    margin-top: 50px;
    margin-bottom:30px;
    display:flex;
    justify-content:center;
 }

.btn:link,
.btn:visited {
    text-transform: uppercase;
    text-decoration: none;
    padding: 10px 40px;
    border-radius: 30px;
    display: inline-block;
    transition: all .2s;
    position: absolute;
}

.btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

.btn:active {
    transform: translateY(-1px);
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
}

.btn-white {
    background-color: rgb(3, 3, 3);
    color: white;
}

.btn::after {
    content: "";
    display: inline-block;
    height: 100%;
    width: 100%;
    border-radius: 100px;
    position: absolute;
    top: 0;
    left: 0;
    z-index: -1;
    transition: all .4s;
}

.btn-white::after {
    background-color: rgb(7, 7, 7);
}

.btn:hover::after {
    transform: scaleX(1.4) scaleY(1.6);
    opacity: 0;
}

.btn-animated {
    animation: moveInBottom 5s ease-out;
    animation-fill-mode: backwards;
}

// BTN_LIGHT


.light_btn{
 color:black;
 background-color:white;
 &:active {
    transform: translateY(-1px);
    box-shadow: 0 5px 10px rgba(243, 241, 241, 0.2);
    }
    &:hover {
    border: 1px solid black;
    transform: translateY(-3px);
    box-shadow: 0 10px 15px rgba(59, 59, 59, 0.2);
    }
    &:after{
    background-color: rgb(247, 246, 246);
    }
    &:hover::after {
    transform: scaleX(1.4) scaleY(1.6);
    opacity: 0;
}


}
@keyframes moveInBottom {
    0% {
        opacity: 0;
        transform: translateY(30px);
    }

    100% {
        opacity: 1;
        transform: translateY(0px);
    }
}
</style>