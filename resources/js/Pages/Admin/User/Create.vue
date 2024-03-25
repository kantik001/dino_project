<template>
    <div>
        <div class="w-full bg-indigo-200 h-20">

        </div>
        <div class="flex">
            <div class="w-1/4 min-h-screen bg-sky-300">

            </div>
            <div class="w-3/4">
                <div class="p-4 flex justify-between items-center">
                    <h1 class="text-lg">Добавить пользователя</h1>
                    <Link :href="route('users.index')" class="inline-block text-xs px-3 py-2 bg-red-500 text-white">Назад</Link>
                </div>
                <div v-if="storeSuccess && Object.keys(user).length === 0" class="bg-green-600 text-white p-4">
                    Пользователь успешно добавлен
                </div>
                <div class="p-4">
                    <div class="mb-4">
                        <input class="w-1/4 border border-gray-200" type="text" v-model="user.name" placeholder="name">
                    </div>
                    <div class="mb-4">
                        <input class="w-1/4 border border-gray-200" type="text" v-model="user.email" placeholder="email">
                    </div>
                    <div class="mb-4">
                        <input class="w-1/4 border border-gray-200" type="password" v-model="user.password" placeholder="password">
                    </div>
                    <div class="mb-4">
                        <input class="w-1/4 border border-gray-200" type="password" v-model="user.password_confirmation" placeholder="password_confirmation">
                    </div>
<!--                    <div class="flex mb-3 items-center">-->
<!--                        <div>-->
<!--                            <input @change="storeImage" ref="file" type="file" class="hidden">-->
<!--                            <a href="#" class="block p-2 w-16 text-center text-sm rounded-3xl bg-sky-500 text-white"-->
<!--                               @click.prevent="selectFile()">Image</a>-->
<!--                        </div>-->
<!--                        <div>-->
<!--                            <a v-if="image" @click.prevent="image = null" class="ml-3" href="#">Cancel</a>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div v-if="image">-->
<!--                        <img :src="image.url" alt="preview">-->
<!--                    </div>-->
                    <div class="mb-4">
                        <a @click.prevent="storeUser" href="#" class="inline-block text-xs px-3 py-2 bg-green-600 text-white">Добавить</a>
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

    props: ['users'],

    data() {
        return {
            user: {},
            storeSuccess: false,
            // image: null,
        }
    },

    components: {
        Link,
    },

    mounted() {
        console.log(this.users);
    },

    methods: {
        storeUser() {
            axios.post('/admin/users', this.user)
                .then(res => {
                    this.user = {}
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
