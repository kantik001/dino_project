<template>
    <div>
        <div class="p-4 flex justify-between items-center">
                    <h1 class="text-lg">Добавить дино</h1>
                    <Link :href="route('dinos.index')" class="inline-block text-xs px-3 py-2 bg-red-500 text-white">Назад</Link>
        </div>
        <div v-if="storeSuccess && Object.keys(dino).length === 0" class="bg-green-600 text-white p-4">
                    Динозавр успешно добавлен
        </div>
        <div class="p-4">
            <div class="mb-4">
                <input class="w-1/4 border border-gray-500" type="text" v-model="dino.name" placeholder="name">
            </div>
            <div class="mb-4">
                <textarea class="w-1/4 border border-gray-500" type="number" v-model="dino.description" placeholder="description"></textarea>
            </div>
            <div class="mb-4">
                <input class="w-1/4 border border-gray-500" type="number" v-model="dino.price" placeholder="price">
            </div>
            <div class="mb-4">
                <input class="w-1/4 border border-gray-500" type="text" v-model="dino.categories" placeholder="categories">
            </div>
            <div class="mb-4">
                <input class="w-1/4 border border-gray-500" type="number" v-model="dino.discount" placeholder="discount">
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
            <div class="test">
                <a @click.prevent="storeDino" href="#" class=" inline-block text-xs px-3 py-2 bg-green-600 text-white">Добавить</a>
            </div>
        </div>
    </div>
</template>

<script>
import {Link} from '@inertiajs/vue3'
import AdminLayout from "@/Layouts/AdminLayout.vue";
export default {
    name: "Index",

    layout: AdminLayout,

    props: ['dinos'],

    data() {
        return {
            dino: {},
            storeSuccess: false,
            // image: null,
        }
    },

    components: {
        Link,
    },

    mounted() {
        console.log(this.dinos);
    },

    methods: {
        storeDino() {
            axios.post('/admin/dinos', this.dino)
                .then(res => {
                    this.dino = {}
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
.test{
    margin-bottom: auto;
}
</style>
