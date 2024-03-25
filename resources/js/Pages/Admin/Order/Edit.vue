<template>
    <div>
        <div class="w-full bg-indigo-200 h-20"></div>
        <div class="flex">
            <div class="w-1/4 min-h-screen bg-sky-300"></div>
            <div class="w-3/4">
                <div class="p-4 flex justify-between items-center">
                    <h1 class="text-lg">Изменить ордер</h1>
                    <Link :href="route('orders.index')" class="inline-block text-xs px-3 py-2 bg-red-500 text-white">Назад</Link>
                </div>
                <div v-if="storeSuccess" class="bg-green-600 text-white p-4">
                    Ордер успешно изменен
                </div>
                <div class="p-4">
                    <div class="mb-4">
                        <input class="w-1/4 border border-gray-200" type="number" v-model="orderData.total" placeholder="total">
                    </div>
                    <div class="mb-4">
                        <input class="w-1/4 border border-gray-200" type="number" v-model="orderData.status" placeholder="status">
                    </div>
                    <div class="mb-4">
                        <input class="w-1/4 border border-gray-200" type="number" v-model="orderData.user_id" placeholder="user_id">
                    </div>
                    <div class="mb-4">
                        <a @click.prevent="updateOrder" href="#" class="inline-block text-xs px-3 py-2 bg-green-600 text-white">Изменить</a>
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

    props: ['order'],

    data() {
        return {
            orderData: this.order,
            storeSuccess: false,
        }
    },

    components: {
        Link,
    },

    methods: {
        updateOrder() {
            axios.patch(`/admin/orders/${this.orderData.id}`, this.orderData)
                .then(res => {
                    this.orderData = res.data
                    this.storeSuccess = true
                })
                .catch(res => {
                    this.storeSuccess = false
                })
                .finally(res => {
                });
        }
    },

}
</script>

<style scoped>

</style>
