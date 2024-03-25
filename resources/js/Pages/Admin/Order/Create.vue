<template>
    <div>
        <div class="w-full bg-indigo-200 h-20">

        </div>
        <div class="flex">
            <div class="w-1/4 min-h-screen bg-sky-300">

            </div>
            <div class="w-3/4">

                <div class="p-4 flex justify-between items-center">
                    <h1 class="text-lg">Добавить ордер</h1>
                    <Link :href="route('orders.index')" class="inline-block text-xs px-3 py-2 bg-red-500 text-white">Назад</Link>
                </div>
                <div v-if="storeSuccess && Object.keys(order).length === 0" class="bg-green-600 text-white p-4">
                    Ордер успешно добавлен
                </div>
                <div class="p-4">
                    <div class="mb-4">
                        <input class="w-1/4 border border-gray-200" type="number" v-model="order.total" placeholder="total">
                    </div>
                    <div class="mb-4">
                        <input class="w-1/4 border border-gray-200" type="number" v-model="order.status" placeholder="status">
                    </div>
                    <div class="mb-4">
                        <input class="w-1/4 border border-gray-200" type="number" v-model="order.user_id" placeholder="user_id">
                    </div>
                    <div class="mb-4">
                        <a @click.prevent="storeOrder" href="#" class="inline-block text-xs px-3 py-2 bg-green-600 text-white">Добавить</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {Link} from '@inertiajs/vue3'
export default {
    name: "Index",

    props: ['orders'],

    data() {
        return {
            order: {},
            storeSuccess: false,
        }
    },

    components: {
        Link,
    },

    mounted() {
    },

    methods: {
        storeOrder() {
            axios.post('/admin/orders', this.order)
                .then(res => {
                    this.order = {}
                    this.storeSuccess = true
                })
                .catch(error => {
                    console.log(error);
                    this.errored = true;
                })
                .finally(() => (this.loading = false));
        },
    },

}
</script>

<style scoped>

</style>
