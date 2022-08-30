<template>
    <div>
        <form method="POST" >


            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">Email Address</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control " name="email" v-model="form.name" required autocomplete="email" autofocus>


                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control " v-model="form.password" name="password" required autocomplete="current-password">


                </div>
            </div>


            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button  @click.prevent="loginUser" type="submit" class="btn btn-primary">
                        Login
                    </button>


                </div>
            </div>
        </form>
    </div>
</template>
<script>
export default {
   data(){
       return{
           form:{
               email: '',
               password: ''
           },
           errors: []
       }
   },
   methods:{
        loginUser(){
            axios.post('/api/login', this.form).then(() =>{
                this.$router.push({ name: "Dashboard"});
            }).catch((error) => {
                this.errors = error.response.data.errors;
           })
        }
   }
}
</script>
<style lang="scss" scoped>

</style>
