<script>
export default {
    name: "AdminLayout",

    data() {
        return {
            visible: true,
        }
    },

    methods:{
        toggle: function() {
            this.visible = !this.visible;
        },
    }
}

</script>

<template>
    <div>

        <div v-show="!visible">
            <div class="w-full bg-white-700 h-10">
            </div>
            <div class="w-full bg-blue-700 h-10">
            </div>
            <div class="w-full bg-red-700 h-10">
            </div>
        </div>
        <div @click="toggle" class="cursor-pointer p-4 flex justify-between items-center bg-sky-400 focus:outline-none hover:bg-violet-300" >
            <button>Флаг</button>
        </div>
        <div class="flex">
            <aside class="w-1/6 min-h-screen bg-blue-200"></aside>
            <article class="w-5/6">
                <slot />
            </article>
        </div>
    </div>

</template>

<style scoped>

</style>
