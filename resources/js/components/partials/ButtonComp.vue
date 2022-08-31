<template>
  <div class="basebutton">
      <!-- <div :class="[light ? 'light' : '', 'basebutton']"> -->
  <span></span>
  <span></span>
  <span></span>
  <span></span>
  {{buttonText}}
</div>
</template>

<script>
export default {
  name: 'ButtonComp',
  props: {
    buttonText:{
      type: String,
      default: () => "Label"
    },
    light:{
      type: Boolean,
      default: () => false
    },
  }
}
</script>

<style lang="scss" scoped>
// @import '../assets/style/vars';
.basebutton {
  position: relative;
  display: inline-block;
  padding: 10px 30px;
  border-radius: 4px;
  color: #EBE7DE;
  text-decoration: none;
  text-transform: uppercase;
  overflow: hidden;
  margin: 10px 25px;
  filter: hue-rotate(0deg);
  border: 2px solid  #EBE7DE;
  transition: all 0.1s linear;
  //background-color: rgba($doveGray-dark, .5);
  cursor: crosshair;
  &:hover {
    border: 2px solid transparent;
    background-color: rgba(#E7DCC8, .3);
    color:white;
    span {
      position: absolute;
      display: block;
      &:nth-child(1) {
        filter: hue-rotate(0deg);
        top: 0;
        left: 0;
        width: 100%;
        height: 3px;
        background: linear-gradient(90deg, transparent, #3a86ff);
        animation: animate1 1s linear infinite;
        
      }
      @keyframes animate1 {
        0% {
          left: -100%;
        }
        50%,
        100% {
          left: 100%;
        }
      }
      &:nth-child(2) {
        filter: hue-rotate(60deg);
        top: -100%;
        right: 0;
        width: 3px;
        height: 100%;
        background: linear-gradient(180deg, transparent, #3a86ff);
        animation: animate2 1s linear infinite;
        animation-delay: 0.25s;
      }
      @keyframes animate2 {
        0% {
          top: -100%;
        }
        50%,
        100% {
          top: 100%;
        }
      }
      &:nth-child(3) {
        filter: hue-rotate(120deg);
        bottom: 0;
        right: 0;
        width: 100%;
        background: linear-gradient(270deg, transparent, #3a86ff);
        animation: animate3 1s linear infinite;
        animation-delay: 0.5s;
      }
      @keyframes animate3 {
        0% {
          right: -100%;
          height: 3px;
        }
        50%,
        100% {
          height: 2px;
          right: 100%;
        }
      }
      &:nth-child(4) {
        filter: hue-rotate(300deg);
        bottom: -100%;
        left: 0;
        width: 3px;
        height: 100%;
        background: linear-gradient(360deg, transparent, #3a86ff);
        animation: animate4 1s linear infinite;
        animation-delay: 0.75s;
      }
      @keyframes animate4 {
        0% {
          bottom: -100%;
        }
        50%,
        100% {
          bottom: 100%;
        }
      }
    }
  }
}

// .light{
//   color: $thatch-brown;
//   border: 2px solid  $thatch-brown;
//   &:hover{
//     background-color: rgba($thatch-brown, .5);
//     color:$irishCoffee;
//     font-weight:600;
//       span {
//       position: absolute;
//       display: block;
//       &:nth-child(1) {
//         background: linear-gradient(90deg, transparent, #ffffff);       
//       }
//       &:nth-child(2) {
//         background: linear-gradient(180deg, transparent, #ffffff);       
//       }
//       &:nth-child(3) {
//         background: linear-gradient(270deg, transparent, #ffffff);       
//       }
//       &:nth-child(4) {
//         background: linear-gradient(360deg, transparent, #ffffff);       
//       }
//   }
// }
// }
</style>