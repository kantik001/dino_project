<template>
    <div>
        <div class="w-full bg-indigo-200 h-20">
            <div>{{ layoutTotalData }}</div>
        </div>
        <div class="flex">
            <aside class="w-1/4 min-h-screen bg-sky-300">

            </aside>
            <article class="w-3/4">
                <slot/>
            </article>
        </div>
    </div>
</template>

<script>
export default {
    name: "MainLayout",
    data() {
        return {
            layoutTotalData: this.$page.props.auth.user.total_in_cart
        }
    },

    mounted() {
        console.log(this.$page.props.auth.user);
        this.getTotal()
    },

    methods: {
        getTotal() {
            axios.get('/references/total')
                .then(res => {
                    this.layoutTotalData = res.data.total
                })
        }
    }
}
</script>

<style scoped>

</style>
