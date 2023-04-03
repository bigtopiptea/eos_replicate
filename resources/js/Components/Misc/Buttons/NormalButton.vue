<script setup>

const props = defineProps({
    label: {
        type: String,
        default: '',
    }
});

</script>

<template>
    <button >
        {{ props.label }}
    </button>
</template>
