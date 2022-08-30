<template>

  <div class="jumbo">
    <!-- <img :src="'img/jumbotron.jpg'" alt=""> -->
    <div class="k_container text-center">
      <div class="banner-text pb-2 text-uppercase question">Hai Fame?</div>
      <h6>Sei nel posto giusto</h6>
            <!-- <div class="text-center">
         <ButtonComp buttonText="Join us today!"/>
      
            </div> -->
    </div>
  </div>

  
</template>

<script>
export default {
  name: 'HomeComp'
}
</script>

<style lang="scss" scoped>

.jumbo{
  width:100%;
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
  max-height: 720px;
  background-position: center;
  background: url('https://images.unsplash.com/photo-1630278156268-12d56c2e135f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1331&q=80');
  background-size: cover;
  // background-attachment: fixed;

  .question{
    font-size: 4em;
    font-weight: 700;
    color:white;

  }
}

</style>