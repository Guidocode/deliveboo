<template>
    <button class="btn btn-white btn-animate">
        <a :href="a_link">{{button_text}}<i class="fa-solid fa-arrow-right ml-2"></i></a>
      </button>

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
  }
}
</script>

<style lang="scss" scoped>
.btn{
    margin-top: 50px;
    margin-bottom:30px;
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
    transform: scaleX(1.3) scaleY(1.2);
    opacity: 0;
}

.btn-animated {
    animation: moveInBottom 5s ease-out;
    animation-fill-mode: backwards;
}

// @keyframes moveInBottom {
//     0% {
//         opacity: 0;
//         transform: translateY(30px);
//     }

//     100% {
//         opacity: 1;
//         transform: translateY(0px);
//     }
// }
</style>