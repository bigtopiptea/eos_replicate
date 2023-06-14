<script setup>
const props = defineProps({
    label: {
        type: String,
        default: ''
    },
    required: {
        type: String,
    },
    modelValue: {
        type: Date,
    }

});

</script>

<template>

    <div>
        <label class="text-[8px] absolute -mt-1 tracking-wider bg-white ml-2">
            {{ props.label }}
            <span v-if="props.required == 'required'" class="text-red-500">*</span>
        </label>
        <div class="border border-[#EAEAEA] h-[34px] mt-1 p-2.5 pl-4 text-[#3E3E3E]  font-light text-[10px]">
            <input @input="$emit('update:modelValue', $event.target.value)" v-bind="$attrs" :value="props.modelValue"  type="date" class="focus:outline-none placeholder:text-opacity-50"/>
        </div>
    </div>
</template>
