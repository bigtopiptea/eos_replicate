<script>
export default {
    props: {
        label: {
            type: String,
            default: '',
        }
    }
}
</script>
<template>
    <span class="text-[10px] uppercase font-rubik-light -mt-2 tracking-widest">
        {{ label }}
        <span class="text-red-500">*</span>
    </span>
</template>
