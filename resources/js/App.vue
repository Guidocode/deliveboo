<template>
  <div>
    <HeaderComp/>

    <main>
      <router-view></router-view>
    </main>

    <FooterComp/>

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

  data(){
    return{

    }
  },
  methods:{
 /// getApi() -->axios
  },

  mounted(){

  }
}
</script>

<style lang="scss" scoped>
main{
    padding-top: 110px;
}
</style>
