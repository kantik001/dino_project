<script>
export default {
    name: "MainLayout"
}

</script>

<template>
    <div>
        <div class="w-full bg-lime-200 h-20">

        </div>
        <div class="flex">
            <aside class="w-1/6 min-h-screen bg-green-200">

            </aside>
            <article class="w-3/4">
                <slot />
            </article>
        </div>
    </div>

</template>

<style scoped>

</style>
