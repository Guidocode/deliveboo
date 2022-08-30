<template>
    <div>
        Ciao
        <form method="POST" action="">


                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nome</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control " name="name" required autocomplete="name" v-model="form.name" >


                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control " name="email"  required autocomplete="email" v-model="form.email">


                            </div>
                        </div>



                         <div class="form-group row">
                            <label for="vat-number" class="col-md-4 col-form-label text-md-right">P.Iva</label>

                            <div class="col-md-6">
                                <input id="vat_number" type="text" class="form-control" name="vat_number" v-model="form.vat_number" >


                            </div>
                        </div>


                         <div  class="form-group row ">
                            <label for="types" class="col-md-4 col-form-label text-md-right">Tipi</label>

                            <div v-for="item in types" :key="item.id">
                                <input   type="checkbox" :id=" item.id " :name="item.name" :value=" item.id" v-model="form.checkedTypes">
                                <label class="form-check-label" :for=" item.name "> {{ item.name }}</label>
                            </div>



                        </div>






                         <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">Indirizzo</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control " name="address" v-model="form.address">


                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Telefono</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control " name="phone" v-model="form.phone" >


                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control " name="password" required autocomplete="new-password" v-model="form.password">


                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Conferma Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" v-model="form.password_confirmation">
                            </div>
                        </div>
                        <!-- errori -->
                            <span class=" text-danger" v-if="errors.name">{{ errors.name[0] }}</span>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button @clic.prevent="saveForm" type="submit" id="registration-submit" class="btn btn-primary">
                                    Registrati
                                </button>
                            </div>
                        </div>

                    </form>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data () {
        return {
            types: [],
            form:{
                checkedTypes:[]
            },
            errors:[]
        }
    },
    mounted() {
        axios.get('/api/types')
        .then(r => {
            this.types = r.data
        })
    },
    methods: {
        saveForm(){
            axios.post('/api/register', this.form)
            .then(r => {
                console.log('saved')

            }).catch(e => {
                this.errors = e.response.data.errors
            })
        }
    },
}
</script>

<style lang="scss" scoped>

</style>
