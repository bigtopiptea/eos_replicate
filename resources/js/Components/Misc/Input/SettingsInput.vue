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
    isDisabled:{
        type: Boolean,
        default: false
    }
});
</script>
<template>
    <div>
        <input @input="$emit('update:modelValue', $event.target.value.toUpperCase())" v-bind="$attrs" :value="props.modelValue"
            :placeholder="props.placeholder" :type="props.type"
            class="disabled:bg-[#EAEAEA] bg-white block border border-gray-300 tracking-[1.5px] h-[28px] placeholder:text-[10px] placeholder:text-gray-500 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 text-[10px]" :disabled="isDisabled"/>
    </div>
</template>
