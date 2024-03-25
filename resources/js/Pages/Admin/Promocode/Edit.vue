<template>
    <div>
        <div class="w-full bg-indigo-200 h-20"></div>
        <div class="flex">
            <div class="w-1/4 min-h-screen bg-sky-300"></div>
            <div class="w-3/4">
                <div class="p-4 flex justify-between items-center">
                    <h1 class="text-lg">Изменить промокод</h1>
                    <Link :href="route('promocodes.index')" class="inline-block text-xs px-3 py-2 bg-red-500 text-white">Назад</Link>
                </div>
                <div v-if="storeSuccess" class="bg-green-600 text-white p-4">
                    Промокод успешно изменен
                </div>
                <div class="p-4">
                    <div class="mb-4">
                        <input class="w-1/4 border border-gray-200" type="text" v-model="promocode.code" placeholder="code">
                    </div>
                    <div class="mb-4">
                        <input class="w-1/4 border border-gray-200" type="number" v-model="promocode.value" placeholder="value">
                    </div>
                    <div class="mb-4">
                        <input class="w-1/4 border border-gray-200" type="date" v-model="promocode.expired_at" placeholder="expired_at">
                    </div>
                    <div class="mb-4">
                        <input class="w-1/4 border border-gray-200" type="number" v-model="promocode.limit_from" placeholder="limit_from">
                    </div>
                    <div class="mb-4">
                        <input class="w-1/4 border border-gray-200" type="number" v-model="promocode.user_id" placeholder="user_id">
                    </div>
                    <div class="mb-4">
                        <a @click.prevent="updatePromocode" href="#" class="inline-block text-xs px-3 py-2 bg-green-600 text-white">Изменить</a>
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

    props: ['promocode'],

    data() {
        return {
            promocodeData: this.promocode,
            storeSuccess: false,
        }
    },

    components: {
        Link,
    },

    methods: {
        updatePromocode() {
            axios.patch(`/admin/promocodes/${this.promocodeData.id}`, this.promocodeData)
                .then(res => {
                    this.promocodeData = res.data
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
