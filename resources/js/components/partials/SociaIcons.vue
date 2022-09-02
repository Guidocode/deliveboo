<template>
  <div class="icons d-flex">
    <div class="icon_wrap"><i class="fa-brands fa-facebook-f"></i></div>
    <div class="icon_wrap"><i class="fa-brands fa-twitter"></i></div>
    <div class="icon_wrap"><i class="fa-brands fa-instagram"></i></div>
  </div>
</template>

<script>
export default {
  name:'SociaIcons'
  }


</script>

<style lang="scss" scoped>
@import'../../../sass/front/vars';
.icon_wrap{
  display: flex;
  align-items: center;
  justify-content: center;
  width:40px;
  height:40px;
  background-color: darken($violet, 12%);
  border-radius: 50%;
  margin: 0 5px;
  &:hover{
    cursor: pointer;
    background-color: lighten($violet, 10%);
    color: darken($violet, 17%);
  }
}

</style>