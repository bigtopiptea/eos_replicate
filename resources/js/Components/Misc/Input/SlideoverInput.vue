<script>
export default {
    props: {
        placeholder: {
            type: String,
            default: '',
        },
        label: {
            type: String,
            default: 'Hello',
        },
        modelValue: {
            type: [String, Number],
            default: '',
        },
    }
}

</script>
<template>
    <div class="mt-1 flex rounded-md shadow-sm">
        <span
            class="inline-flex items-center border uppercase font-semibold border-gray-300 bg-[#D9D9D9] px-3 tracking-wider sm:text-sm">
            {{ label }}
        </span>
        <input @input="$emit('update:modelValue', $event.target.value)" v-bind="$attrs" :value="modelValue"
            name="company-website" id="company-website"
            class="block bg-white w-full min-w-0 flex-1 border border-gray-300 px-3 py-2 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
            :placeholder="placeholder" />
    </div>
</template>
