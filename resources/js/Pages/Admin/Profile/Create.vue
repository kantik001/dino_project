<template>
    <div>
        <div class="w-full bg-indigo-200 h-20">

        </div>
        <div class="flex">
            <div class="w-1/4 min-h-screen bg-sky-300">

            </div>
            <div class="w-3/4">
                <div class="p-4 flex justify-between items-center">
                    <h1 class="text-lg">Добавить профиль</h1>
                    <Link :href="route('profiles.index')" class="inline-block text-xs px-3 py-2 bg-red-500 text-white">Назад</Link>
                </div>
                <div v-if="storeSuccess && Object.keys(profile).length === 0" class="bg-green-600 text-white p-4">
                    Профиль успешно добавлен
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
                        <a @click.prevent="storeProfile" href="#" class="inline-block text-xs px-3 py-2 bg-green-600 text-white">Добавить</a>
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

    props: ['profiles'],

    data() {
        return {
            profile: {},
            storeSuccess: false,
            // image: null,
        }
    },

    components: {
        Link,
    },

    mounted() {
        console.log(this.profiles);
    },

    methods: {
        storeProfile() {
            axios.post('/admin/profiles', this.profile)
                .then(res => {
                    this.profile = {}
                    this.storeSuccess = true
                })
                .catch(error => {
                    console.log(error);
                    this.errored = true;
                })
                .finally(() => (this.loading = false));
        },
        // selectFile() {
        //     this.fileInput = this.$refs.file;
        //     this.fileInput.click();
        // },
        //
        // storeImage(e) {
        //     const file = e.target.files[0]
        //     const formData = new FormData()
        //     formData.append('image', file)
        //
        //     axios.post('/api/post_images', formData)
        //         .then(res => {
        //             this.image = res.data.data
        //         })
        // }
    },

}
</script>

<style scoped>

</style>
