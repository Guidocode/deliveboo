<template>
  <header>
    <nav>
      <ul>
        <li><router-link :to="{name:'home'}">Home</router-link></li>
        <li><router-link :to="{name:'restaurants'}">Ristornati</router-link></li>
        <li><router-link :to="{name:'about'}">Chi Siamo</router-link></li>
      </ul>
    </nav>
  </header>
</template>

<script>
export default {
  name: 'HeaderComp'
}
</script>

<style lang="scss" scoped>
// router-link-exact-active{}
header{
  height: 70px; 
}

</style>
