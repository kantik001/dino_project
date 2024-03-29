<script>
export default {
    name: "MainLayout"
}

</script>

<template>
    <div>
        <div class="w-full bg-white-700 h-10">
        </div>
        <div class="w-full bg-green-700 h-10">
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
