<template>
    <div>
        <div class="w-full bg-indigo-200 h-20"></div>
        <div class="flex">
            <div class="w-1/4 min-h-screen bg-sky-300"></div>
            <div class="w-3/4">
                <div class="p-4 flex justify-between items-center">
                    <h1 class="text-lg">Изменить профиль</h1>
                    <Link :href="route('profiles.index')" class="inline-block text-xs px-3 py-2 bg-red-500 text-white">Назад</Link>
                </div>
                <div v-if="storeSuccess" class="bg-green-600 text-white p-4">
                    Профиль успешно изменен
                </div>
                <div class="p-4">
                    <div class="mb-4">
                        <input class="w-1/4 border border-gray-200" type="text" v-model="profile.login" placeholder="login">
                    </div>
                    <div class="mb-4">
                        <input class="w-1/4 border border-gray-200" type="text" v-model="profile.first_name" placeholder="first_name">
                    </div>
                    <div class="mb-4">
                        <input class="w-1/4 border border-gray-200" type="text" v-model="profile.last_name" placeholder="last_name">
                    </div>
                    <div class="mb-4">
                        <input class="w-1/4 border border-gray-200" type="number" v-model="profile.gender" placeholder="gender">
                    </div>
                    <div class="mb-4">
                        <input class="w-1/4 border border-gray-200" type="date" v-model="profile.birthed_at" placeholder="birthed_at">
                    </div>
                    <div class="mb-4">
                        <input class="w-1/4 border border-gray-200" type="number" v-model="profile.balance" placeholder="balance">
                    </div>
                    <div class="mb-4">
                        <input class="w-1/4 border border-gray-200" type="number" v-model="profile.user_id" placeholder="user_id">
                    </div>
                    <div class="mb-4">
                        <a @click.prevent="updateProfile" href="#" class="inline-block text-xs px-3 py-2 bg-green-600 text-white">Изменить</a>
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

    props: ['profile'],

    data() {
        return {
            profileData: this.profile,
            storeSuccess: false,
        }
    },

    components: {
        Link,
    },

    methods: {
        updateProfile() {
            axios.patch(`/admin/profiles/${this.profileData.id}`, this.profileData)
                .then(res => {
                    this.profileData = res.data
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
