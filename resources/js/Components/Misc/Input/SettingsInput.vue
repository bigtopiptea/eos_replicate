<script setup>
const props = defineProps({
    placeholder: {
        type: String,
        default: "",
    },
    modelValue: {
        type: [String, Number],
        default: "",
    },
    required: {
        type: String,
        default: "",
    },
    type:{
        type:String,
        default: 'text'
    },
});
</script>
<template>
    <div>
        <input @input="$emit('update:modelValue', $event.target.value.toUpperCase())" v-bind="$attrs" :value="props.modelValue"
            :placeholder="props.placeholder"
            class="block border font-rubik-normal border-gray-300 tracking-[1.5px] h-[28px] placeholder:text-[10px] placeholder:text-gray-500 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 text-[10px]" />
    </div>
</template>
