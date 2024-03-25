<template>
    <div>
        <div class="w-full bg-indigo-200 h-20"></div>
        <div class="flex">
            <div class="w-1/4 min-h-screen bg-sky-300"></div>
            <div class="w-3/4">
                <div class="p-4 flex justify-between items-center">
                    <h1 class="text-lg">Изменить пользователя</h1>
                    <Link :href="route('users.index')" class="inline-block text-xs px-3 py-2 bg-red-500 text-white">Назад</Link>
                </div>
                <div v-if="storeSuccess" class="bg-green-600 text-white p-4">
                    Пользователь успешно изменен
                </div>
                <div class="p-4">
                    <div class="mb-4">
                        <input class="w-1/4 border border-gray-200" type="text" v-model="userData.name" placeholder="name">
                    </div>
                    <div class="mb-4">
                        <input class="w-1/4 border border-gray-200" type="email" v-model="userData.email" placeholder="email">
                    </div>
                    <div class="mb-4">
                        <input class="w-1/4 border border-gray-200" type="password" v-model="userData.password" placeholder="password">
                    </div>
                    <div class="mb-4">
                        <a @click.prevent="updateUser" href="#" class="inline-block text-xs px-3 py-2 bg-green-600 text-white">Изменить</a>
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

    props: ['user'],

    data() {
        return {
            userData: this.user,
            storeSuccess: false,
        }
    },

    components: {
        Link,
    },

    methods: {
        updateUser() {
            axios.patch(`/admin/users/${this.userData.id}`, this.userData)
                .then(res => {
                    this.userData = res.data
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
