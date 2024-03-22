<template>
    <div>
        <div class="w-full bg-indigo-200 h-20">

        </div>
        <div class="flex">
            <div class="w-1/4 min-h-screen bg-sky-300">

            </div>
            <div class="w-3/4">
                <div class ="w-2/6">
                <video muted="" loop="" autoplay="" playsinline="" preload="metadata" style="background-color: rgba(0, 0, 0, 0); display: compact;" onloadedmetadata="this.muted = true"><source src="https://pic.pikbest.com/19/58/53/27C888piCHAi.mp4" type="video/mp4"></video>
                </div>
                <div class="p-4 flex justify-between items-center">
                    <h1 class="text-lg">Добавить дино</h1>
                    <Link :href="route('dinos.index')" class="inline-block text-xs px-3 py-2 bg-red-500 text-white">Назад</Link>
                </div>
                <div v-if="storeSuccess && Object.keys(dino).length === 0" class="bg-green-600 text-white p-4">
                    Динозавр успешно добавлен
                </div>
                <div class="p-4">
                    <div class="mb-4">
                        <input class="w-1/4 border border-gray-200" type="text" v-model="dino.name" placeholder="name">
                    </div>
                    <div class="mb-4">
                        <textarea class="w-1/4 border border-gray-200" type="number" v-model="dino.description" placeholder="description"></textarea>
                    </div>
                    <div class="mb-4">
                        <input class="w-1/4 border border-gray-200" type="number" v-model="dino.price" placeholder="price">
                    </div>
                    <div class="mb-4">
                        <input class="w-1/4 border border-gray-200" type="text" v-model="dino.categories" placeholder="categories">
                    </div>
                    <div class="mb-4">
                        <input class="w-1/4 border border-gray-200" type="number" v-model="dino.discount" placeholder="discount">
                    </div>
                    <div class="mb-4">
                        <a @click.prevent="storeDino" href="#" class="inline-block text-xs px-3 py-2 bg-green-600 text-white">Добавить</a>
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

    props: ['dinos'],

    data() {
        return {
            dino: {},
            storeSuccess: false,
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
        }
    },

}
</script>

<style scoped>

</style>
