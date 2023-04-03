<script setup>
const props = defineProps({
    placeholder: {
        type: String,
        default: '',
    },
    modelValue: {
        type: [String, Number],
        default: '',
    },
    label: {
        type: String,
        default: ''
    }
});
</script>
<template>
    <div class="mt-1">
        <input @input="$emit('update:modelValue', $event.target.value)" v-bind="$attrs" :value="props.modelValue"
            :placeholder="props.placeholder"
            class="block w-full border border-gray-300 py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" />

    </div>
</template>
