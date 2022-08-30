<template>
    <div>
        <form @submit.prevent="submit">

            <div class="mb-3">
              <label for="name" class="form-label">Dish Name</label>
              <input type="text" class="form-control"  name="name" id="name" v-model="fields.name">

            </div>

            <div class="mb-3">
              <label for="description" class="form-label">Ingredients</label>
              <input type="text" class="form-control " name="description" id="description" v-model="fields.description"  >

            </div>

            <div class="mb-3">
              <label for="price" class="form-label">Price</label>
              <input type="text" class="form-control " name="price" id="price" v-model="fields.price"  >

            </div>

            Disponibile:
            <div class="form-check">

                <input class="form-check-input" type="radio" name="visible" id="visible" value="1" checked>
                <label class="form-check-label mr-4 mb-3" for="visible">
                  Si
                </label>

                <input class="form-check-input" type="radio" name="visible" id="not-visible" value="0">
                <label class="form-check-label" for="not-visible">
                  No
                </label>

            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>

<script>

import axios from 'axios';

export default {
    name: 'DishCreate',
    data () {
        return {
            fields:{

            }
        }
    },
    mounted() {
        // axios.get('/api/user')
        // .then(r => {
        //     console.log(r.data);
        // })
        this.fields.user_id = this.$userId
    },
    methods: {
        submit() {

            axios.post('/api/dishes', this.fields)
            .then(r => {

                this.fields = {};
                this.fields.user_id = this.$userId
            }).catch(e => {
                console.log('Error')
            })
        }
    },
}
</script>

<style lang="scss" scoped>

</style>
