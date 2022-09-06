<template>
  <div>

    <HeaderComp
    :cartList="dataCart" />


    <main>
        <router-view></router-view>
    </main>

    <FooterComp/>
    <!-- ADD PAGEUP -->
    <div id="pagetop" v-show="scY > 300" @click="toTop"><i class="fa-solid fa-arrow-up"></i>
    </div>
  </div>


</template>

<script>

import HeaderComp from './components/partials/HeaderComp';
import FooterComp from './components/partials/FooterComp';

export default {
  name: 'App',
  components: {
    HeaderComp,
    FooterComp
  },
  data() {
    return {
      scTimer: 0,
      scY: 0,
      dataCart: null
    }
  },
  mounted() {
    window.addEventListener('scroll', this.handleScroll)

  },
  methods:{

    handleScroll: function () {
      if (this.scTimer) return;
      this.scTimer = setTimeout(() => {
      this.scY = window.scrollY;

      clearTimeout(this.scTimer);
      this.scTimer = 0;
      }, 100);
    },

    toTop: function () {
    window.scrollTo({
      top: 0,
      behavior: "smooth"
    });
    },
 }
}
</script>

<style lang="scss" scoped>

#pagetop{
  position: fixed;
  z-index: 995;
  bottom: 40px;
  right:50px;

}

.fa-arrow-up{
  color:black;
  padding: 12px 15px;
  background-color: white;
  border-radius: 50%;
  &:hover{
    background-color:rgb(252, 151, 151);
    cursor: pointer;
    color:black;
  }
}
// main{
//   height: 100vh;
// }

</style>


