<template>
    <div v-if="!visible">
        <div class="w-full bg-white-700 h-10">
        </div>
        <div class="w-full bg-blue-700 h-10">
        </div>
        <div class="w-full bg-red-700 h-10">
        </div>
    </div>
    <div>
        <button @click="toggle" class="inline-block text-xs px-3 py-2 bg-sky-400 text-white">Patriot edition</button>
    </div>
    <div>
        <ModalWindow :dino="dino" :is-modal="isModal"></ModalWindow>
        <div class="p-4 flex justify-between items-center bg-blue-300  ">
            <h1 class="text-lg">Таблица динозавров</h1>
            <Link :href="route('dinos.create')"
                  class="inline-block text-xs px-3 py-2 bg-green-600 text-white">Добавить дино
            </Link>
        </div>
        <div class="p-4 flex items-center justify-between bg-blue-200 " @click="toggle">
            <div>
                <input class="border border-lime-300" v-model="filters.name" placeholder="name"  type="text">
            </div>
            <div>
                <input class="w-20 border border-lime-300" v-model="filters.price_from" placeholder="price from"  type="number">
            </div>
            <div>
                <input class="w-20 border border-lime-300" v-model="filters.price_to" placeholder="price to"  type="number">
            </div>
            <div>
                <input class="w-20 border border-lime-300" v-model="filters.discount_from" placeholder="discount from"  type="number">
            </div>
            <div>
                <input class="w-20 border border-lime-300" v-model="filters.discount_to" placeholder="discount to"  type="number">
            </div>
            <div>
                <input class="border border-lime-300" v-model="filters.description" placeholder="description"  type="text">
            </div>
            <div>
                <input class="border border-lime-300" v-model="filters.categories" placeholder="categories"  type="text">
            </div>
            <div>
                <select class="border border-lime-300" v-model="filters.per_page">
                    <option disabled selected>Страниц</option>
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                </select>
            </div>
            <div>
                <a @click.prevent="indexDino" class="inline-block text-xs px-3 py-2 bg-sky-500 text-white" href="#">Фильтровать</a>
            </div>
            <div>
                <a @click.prevent="refreshFilters" class="inline-block text-xs px-3 py-2 bg-red-300 text-white" href="#">Сбросить</a>
            </div>

        </div>
        <div class="p-4">
            <div class="relative rounded-xl overflow-auto border border-sky-300">
                <div class="shadow-sm overflow-hidden my-8">
                    <table class="border-collapse table-auto w-full text-sm ">
                        <thead>
                        <tr class="bg-blue-300">
                            <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
                                ID
                            </th>
                            <th class="border-b dark:border-slate-600 font-medium p-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
                                Name
                            </th>
                            <th class="border-b dark:border-slate-600 font-medium p-4 pr-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
                                Description
                            </th>
                            <th class="border-b dark:border-slate-600 font-medium p-4 pr-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
                                Price
                            </th>
                            <th class="border-b dark:border-slate-600 font-medium p-4 pr-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
                                Categories
                            </th>
                            <th class="border-b dark:border-slate-600 font-medium p-4 pr-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
                                Discount
                            </th>
                            <th class=" border-b dark:border-slate-600 font-medium p-4 pr-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
                                Actions
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-slate-800 ">
                        <tr v-for="dino in dinosData.data">
                            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                                {{ dino.id }}
                            </td>
                            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                                {{ dino.name }}
                            </td>
                            <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
                                {{ dino.description }}
                            </td>
                            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pr-8 text-slate-500 dark:text-slate-400">
                                {{ dino.price }}
                            </td>
                            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pr-8 text-slate-500 dark:text-slate-400">
                                {{ dino.categories }}
                            </td>
                            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pr-8 text-slate-500 dark:text-slate-400">
                                {{ dino.discount }}
                            </td>
                            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pr-8 text-slate-500 dark:text-slate-400">
                                <div class="flex justify-around">


                                    <Link :href="route('dinos.edit', dino.id)"
                                          class="cursor-pointer bg-green-500 hover:bg-violet-600 focus:outline-none focus:ring focus:ring-violet-300 active:bg-violet-700 px-5 py-2 text-sm leading-5 rounded-full font-semibold text-white ">Редактировать
                                    </Link>
                                    <Link method="delete" :href="route('dinos.destroy', dino.id)"
                                          class="cursor-pointer bg-red-500 hover:bg-violet-600 focus:outline-none focus:ring focus:ring-violet-300 active:bg-violet-700 px-5 py-2 text-sm leading-5 rounded-full font-semibold text-white">Удалить
                                    </Link>
                                    <a @click.prevent="showModal(dino)" href="#"
                                       class="cursor-pointer bg-blue-500 hover:bg-violet-600 focus:outline-none focus:ring focus:ring-violet-300 active:bg-violet-700 px-5 py-2 text-sm leading-5 rounded-full font-semibold text-white">Показать</a>

                                </div>

                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div v-if="dinosData.meta.links.length > 0">
                    <div >
                        <a v-for="link in dinosData.meta.links" href="#" class="inline-block mr-2 p-1 border border-gray-200 bg-white text-gray-600" @click.prevent="paginatePage(link)">
                            {{ link.label }}
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
import {Link} from "@inertiajs/vue3"
import AdminLayout from "@/Layouts/AdminLayout.vue"
import ModalWindow from "@/Components/ModalWindow.vue"

export default {
    name: "Index",

    props: ['dinos'],

    layout: AdminLayout,

    data() {
        return {
            dinosData: this.dinos,
            filters: {},
            isModal: false,
            visible: true,
            dino: {},
        }
    },

    components: {
        Link,
        ModalWindow
    },

    methods: {
        deleteDino(id) {
            if (!confirm('Are u sure?')) return
            axios.delete(`/admin/dinos/${id}`)
                .then(res => {
                    axios.get('/admin/dinos')
                        .then(res => {
                            this.dinosData = res.data
                        })
                })
        },

        toggle: function() {
            this.visible = !this.visible;
        },

        indexDino() {
            axios.get('/admin/dinos', {
                params: this.filters
            })
                .then(res => {
                    this.dinosData = res.data
                })
        },


        paginatePage(link) {
            this.filters.page = link.url.split('=')[1]
            this.indexDino()
        },

        refreshFilters(){
            this.filters = {}
            this.indexDino()
        },

        showModal(dino) {
            this.isModal = true
            this.dino = dino
        }


    },

    // computed: {
    //     names() {
    //         return this.dinosData.data.map(dino => {
    //             return dino.name
    //         })
    //     }
    // },

    mounted() {
        console.log(this.dinosData)
    }
}
</script>

<style scoped>

</style>
