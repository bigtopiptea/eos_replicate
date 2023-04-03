<script setup>
import { ref } from 'vue';
import ErrorMessage from "@/Components/Misc/Form Validation/ErrorMessage.vue";

let type = ref(false);

const props = defineProps({
    modelValue: {
        type: [String, Number],
        default: '',
    },
    placeholder: {
        type: String,
        default: ''
    },
    action: {
        type: Boolean,
    },
    label: {
        type: String,
        default: '',
    },
    error: {
        type: [],
    }
});
</script>
<template>
    <div>
        <label class="font-medium tracking-wider text-[14px] uppercase" for="password">
            {{ props.label }}
        </label>
        <div className="mt-1 flex rounded-md shadow-sm">
            <div className="relative flex flex-grow items-stretch focus-within:z-10">
                <div className="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                        </path>
                    </svg>
                </div>
                <input :class="{'border-2 border-mid-red' : error}" :type="[type ? 'text' : 'password']" @input="$emit('update:modelValue', $event.target.value)"
                    class="block text-[#3E3E3E] text-[14px] w-full border-gray-150 h-[50px] border bg-[#ECECEC] pl-12 tracking-wider"
                    :placeholder="props.placeholder" :value="props.modelValue" v-bind="$attrs" />
            </div>
            <button @click="type = !type" type="button"
                className="relative bg-[#F9951E] hover:bg-[#f0870a] text-white -ml-px inline-flex items-center space-x-2  border border-gray-300 px-4 py-2 text-sm">
                <span class="uppercase">{{ type? 'Hide': `Show` }}</span>
            </button>
        </div>
        <ErrorMessage v-if="error" :error="error" />

    </div>
</template>
