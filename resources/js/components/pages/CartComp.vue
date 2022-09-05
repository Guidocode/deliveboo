<template>
    <div>
        <table class="table">
            <thead>
                <tr>
                        <th scope="col">Piatto</th>
                        <th scope="col">Prezzo</th>
                        <th scope="col">Prezzo complessivo</th>
                        <th scope="col">N°</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(product, index) in dataCart" :key="index">
                    <th scope="row">{{ product.name }}</th>
                    <td>{{ product.price }}</td>
                    <td>{{ (product.price * product.inCart) }}</td>
                    <td> <span @click="productMinus(product, index)">-</span> {{ product.inCart }} <span>+</span></td>
                </tr>
            </tbody>
        </table>
        <div id="dropin-container"></div>

        <v-braintree
            class="container"
            authorization="sandbox_v29gqy6b_vbh2gg786m8tr86x"

            @success="onSuccess"
            @error="onError"
        ></v-braintree>
    </div>
</template>

<script>
export default {
    name:'CartComp',
    props:{


    },

    data () {
        return {
            dataCart: JSON.parse(window.localStorage.getItem('dishesInCart')),
            totalCount: localStorage.getItem('count'),
            totalCost: localStorage.getItem('totalCost'),

        }
    },
    methods: {
    productMinus(product, index){
        if(product.inCart > 1){
            product.inCart--;
            localStorage.setItem('dishesInCart',JSON.stringify(this.dataCart));
            this.totalCount--;
            localStorage.setItem('count', this.totalCount);
            let actualCost = parseFloat(this.totalCost) - product.price
            localStorage.setItem('totalCost', actualCost)
        }else if(product.inCart == 1){
            delete this.dataCart[index]
            localStorage.setItem('dishesInCart', JSON.stringify(this.dataCart))
            this.totalCount--;
            localStorage.setItem('count', this.totalCount);
            let actualCost = parseFloat(this.totalCost) - product.price
            localStorage.setItem('totalCost', actualCost)
            this.$forceUpdate()
        }


    },
    onSuccess (payload) {
      let nonce = payload.nonce;
      console.log(nonce)
      setTimeout(() => {
        this.$router.push({ name: "ThanksPage"})
      }, 2000);

    },
    onError (error) {
      let message = error.message;
      console.log(message)
    }
  }
}
</script>

<style lang="scss" scoped>

</style>
