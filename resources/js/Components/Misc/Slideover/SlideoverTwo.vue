<template>
    <div class="slide-over container fixed inset-0 w-screen h-screen z-10" @close="open = false">
        <div class="flex flex-col justify-start fixed top-0 right-0 h-screen w-1/3 bg-white py-10">
            <div class="slide-title flex justify-center items-center relative h-14 text-white">
                <div class="absolute left-5">
                    <UserIcon></UserIcon>
                </div>
                <h2 class="text-xl">{{ title }}</h2>
            </div>
            <!-- YOUR CONTENT -->
            <slot></slot>
        </div>
    </div>
</template>

<script setup>
    import UserIcon from "@/Components/Misc/Icons/UserIcon.vue";
</script>

<script>
export default {
    props: {
      title: {
        type: String,
        default: 'Slideover Title',
      },
    },
}
</script>

<style>
    /* SLIDEOVER */
    .slide-over{
        background-color: rgba(0, 0, 0, 0.25);
    }
    .slide-title{
        background: rgb(238,62,44);
        background: linear-gradient(90deg, rgba(238,62,44,1) 0%, rgba(249,139,56,1) 35%, rgba(251,158,48,1) 100%);
    }
</style>
