<template>
    <div v-if="isModal" @click="isModal = false"  class="modal">
        <div @click.stop class="box">
            <div @click="isModal = false" class="close">X</div>
            <div class="content">
                <div class="relative rounded-xl overflow-auto border border-gray-200">
                    <div class="shadow-sm overflow-hidden my-8">
                        <table class="border-collapse table-auto w-full text-sm">
                            <tbody class="bg-white dark:bg-slate-800">
                            <tr>
                                <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                                    ID
                                </td>
                                <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                                    {{ dino.id }}
                                </td>
                            </tr>
                            <tr>
                                <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                                    Name
                                </td>
                                <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                                    {{ dino.name }}
                                </td>
                            </tr>
                            <tr>
                                <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                                    Description
                                </td>
                                <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                                    {{ dino.description }}
                                </td>
                            </tr>
                            <tr>
                                <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                                    Price
                                </td>
                                <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                                    {{ dino.price }}
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ModalWindow",

    props: ['dino', 'isModal'],
}
</script>

<style scoped>
.modal {
    position: fixed;
    width: 100%;
    height: 100%;
    left: 0;
    top: 0;
    background: rgba(0, 0, 0, 0.5);
    z-index: 1;
    display: flex;
    align-items: center;
}

.box {
    width: 500px;
    background: #fff;
    border: 1px solid #d0d4db;
    margin: auto;
    position: relative;
    padding: 10px;
}

.close {
    position: absolute;
    right: 20px;
    top: 20px;
    display: inline-block;
    cursor: pointer;
    z-index: 2;
}
</style>
