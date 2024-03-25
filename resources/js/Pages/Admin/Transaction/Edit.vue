<template>
    <div>
        <div class="w-full bg-indigo-200 h-20"></div>
        <div class="flex">
            <div class="w-1/4 min-h-screen bg-sky-300"></div>
            <div class="w-3/4">
                <div class="p-4 flex justify-between items-center">
                    <h1 class="text-lg">Изменить транзакцию</h1>
                    <Link :href="route('transactions.index')" class="inline-block text-xs px-3 py-2 bg-red-500 text-white">Назад</Link>
                </div>
                <div v-if="storeSuccess" class="bg-green-600 text-white p-4">
                    Транзакция успешно изменена
                </div>
                <div class="p-4">
                    <div class="mb-4">
                        <input class="w-1/4 border border-gray-200" type="number" v-model="transaction.value" placeholder="value">
                    </div>
                    <div class="mb-4">
                        <input class="w-1/4 border border-gray-200" type="number" v-model="transaction.status" placeholder="status">
                    </div>
                    <div class="mb-4">
                        <input class="w-1/4 border border-gray-200" type="number" v-model="transaction.user_id" placeholder="user_id">
                    </div>
                    <div class="mb-4">
                        <input class="w-1/4 border border-gray-200" type="number" v-model="transaction.order_id" placeholder="order_id">
                    </div>
                    <div class="mb-4">
                        <a @click.prevent="updateDino" href="#" class="inline-block text-xs px-3 py-2 bg-green-600 text-white">Изменить</a>
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

    props: ['transaction'],

    data() {
        return {
            transactionData: this.transaction,
            storeSuccess: false,
        }
    },

    components: {
        Link,
    },

    methods: {
        updateDino() {
            axios.patch(`/admin/transactions/${this.transactionData.id}`, this.transactionData)
                .then(res => {
                    this.transactionData = res.data
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
