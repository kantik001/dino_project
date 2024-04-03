<template>
    <div class="bg-white border border-gray-200 p-4">
        <h3 class="mb-4">{{ dino.name }}</h3>
        <div class="mb-4">{{ dino.price }}</div>
        <div>
            {{ num }}
        </div>
        <a @click.prevent="storeDinoInCart(dino.id)"
           class="inline-block text-xs px-3 py-2 bg-indigo-600 text-white" href="#">Купить</a>
    </div>
</template>

<script>
export default {
    name: "Dino",

    props: ['dino'],

    data() {
        return {
            num: 0
        }
    },

    methods: {
        storeDinoInCart(id) {
            axios.post('/users/dino-to-cart', {dino_id: id})
                .then(res => {
                    this.num = res.data.total
                    this.$emit('storeToCart', res.data.total)
                })
        }
    }

}
</script>

<style scoped>

</style>
