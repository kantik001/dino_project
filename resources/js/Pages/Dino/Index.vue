<template>
    <div class="p-4">
        <div class="mb-4 flex justify-between items-center">
            <h3>Dinos</h3>
            <div>Общая сумма товаров: {{ totalData }}</div>
        </div>
        <div class="grid grid-cols-4 gap-4 dark:border-sky-300 dark:text-black-500">
            <Dino @storeToCart="changeTotal" v-for="dino in dinosData" :dino="dino" />
        </div>
    </div>
</template>

<script>
import Dino from "@/Components/Dino/Dino.vue";
import MainLayout from "@/Layouts/MainLayout.vue";
export default {
    name: "Index",

    props: ['dinos', 'total'],

    layout: MainLayout,

    components: {
        Dino
    },

    data() {
        return {
            dinosData: this.dinos,
            totalData: this.total,
        }
    },


    methods: {
        changeTotal(total) {
            this.totalData = total
        }
    }



}
</script>

<style scoped>

</style>
