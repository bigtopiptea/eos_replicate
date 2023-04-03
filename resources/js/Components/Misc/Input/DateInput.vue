<script setup>
const props = defineProps({
    label: {
        type: String,
        default: ''
    },
    required: {
        type: String,
    }
});

</script>

<template>

    <div class="ml-3">
        <label class="text-[10px] font-bold absolute -mt-1 tracking-wider bg-white ml-2">
            {{ props.label }}
            <span v-if="props.required == 'required'" class="text-red-500">*</span>
        </label>
        <div class="border border-[#EAEAEA] h-10 mt-1 p-2.5 pl-4 text-[#3E3E3E] text-[12px]">
            <input type="date" />
        </div>
    </div>
</template>