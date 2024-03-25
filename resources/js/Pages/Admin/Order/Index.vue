<template>
    <div>
        <div class="w-full bg-indigo-200 h-20">

        </div>
        <div class="flex">
            <div class="w-1/5 min-h-screen bg-sky-300">
            </div>
            <div class="w-3/4">
                <div class="font-semibold p-4 flex justify-between items-center">
                    <h1 class="text-lg ">Таблица ордеров</h1>
                    <span class="relative inline-flex">
                    <Link :href="route('orders.create')" class="bg-green-500 hover:bg-violet-600 focus:outline-none focus:ring focus:ring-violet-300 active:bg-violet-700 px-5 py-2 text-sm leading-5 rounded-full font-semibold text-white">Добавить ордер</Link>
                        <span class="flex absolute h-3 w-3 top-0 right-0 -mt-1 -mr-1">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-sky-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-3 w-3 bg-sky-500"></span>
                        </span>
                    </span>

                </div>
                <div class="p-4 dark:border-red-500">
                    <div class="relative rounded-xl overflow-auto border border-gray-200">

                        <div class="shadow-sm overflow-hidden my-8">

                            <table class="border-collapse table-auto w-full text-sm">
                                <thead>
                                <tr class="bg-blue-800">
                                    <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
                                        ID
                                    </th>
                                    <th class="border-b dark:border-slate-600 font-medium p-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
                                        Total
                                    </th>
                                    <th class="border-b dark:border-slate-600 font-medium p-4 pr-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
                                        Status
                                    </th>
                                    <th class="border-b dark:border-slate-600 font-medium p-4 pr-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
                                        User_id
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-slate-800">
                                <tr v-for="order in orders">
                                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                                        {{ order.id }}
                                    </td>
                                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                                        {{ order.total }}
                                    </td>
                                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
                                        {{ order.status }}
                                    </td>
                                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
                                        {{ order.user_id }}
                                    </td>
<!--                                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pr-8 text-slate-500 dark:text-slate-400">-->
<!--                                        {{ order.user }}-->
                                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pr-8 text-red-500 dark:text-red-600">

<!--                                    <DropdownLink as="button" class="bg-red-500 hover:bg-violet-600 focus:outline-none focus:ring focus:ring-violet-300 active:bg-violet-700 px-5 py-2 text-sm leading-5 rounded-full font-semibold text-white" :href="route('orders.destroy', order.id)"  method="delete">-->
<!--                                        Удалить-->
<!--                                    </DropdownLink>  иной метод удаления-->
                                    </td>
                                    <td>
                                        <Link :href="route('orders.edit', order.id)"
                                              class="cursor-pointer bg-green-500 hover:bg-violet-600 focus:outline-none focus:ring focus:ring-violet-300 active:bg-violet-700 px-5 py-2 text-sm leading-5 rounded-full font-semibold text-white">Редактировать
                                        </Link>
                                    </td>
                                    <td>
                                        <a @click.prevent="deleteOrder(order.id)" class="cursor-pointer bg-red-500 hover:bg-violet-600 focus:outline-none focus:ring focus:ring-violet-300 active:bg-violet-700 px-5 py-2 text-sm leading-5 rounded-full font-semibold text-white">Удалить</a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div></div>
        </div>
    </div>
</template>

<script>
import { Link } from "@inertiajs/vue3"
import DropdownLink from '@/Components/DropdownLink.vue'
export default {
    name: "Index",

    props: ['orders'],

    methods:{
        deleteOrder(id) {
            if (confirm('Вы уверены?')) {
                this.$inertia.delete(this.route('orders.destroy', id))
            }
        },
    },

    components: {
        DropdownLink,
        Link,
    },
}
</script>

<style scoped>

</style>

