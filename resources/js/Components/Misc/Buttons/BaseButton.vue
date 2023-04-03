<script setup>
const props = defineProps({
    label: {
        type: String,
        default: '',
    },
    action: {
        default: '',
    }
});
</script>
<template>
    <button v-bind="$attrs" @click="props.action" class="btn flex uppercase  w-[256px] m-auto justify-center font-rubik-light
                py-2 px-4 text-[12px] font-medium text-white duration-300
                hover:text-[#EE3E2C]
                bg-gradient-to-l from-[#ee3e2c] to-[#f98b38] via-[#fb9e30] hover:bg-gradient-to-r">
        {{ props.label }}
    </button>
</template>

