<script setup>
const props = defineProps({
    title: {
        type: String,
        default: '',
    }
});
</script>
<template>
    <div class="w-full">
        <div class="w-full h-[36px] bg-gradient-to-r from-[#FB9E30] via-[#F98B38] to-[#EE3E2C]">
            <h1 class="float-right py-2.5  px-4 text-[12px] font-rubik-light tracking-wide text-white uppercase">
                {{ props.title }}
            </h1>
        </div>
    </div>
</template>
