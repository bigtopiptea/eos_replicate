<script setup>
import ErrorMessage from "@/Components/Misc/Form Validation/ErrorMessage.vue";

const props = defineProps({
    label: {
        type: String,
        default: ''
    },
    placeholder: {
        type: String,
        default: ''
    },
    modelValue: {
        type: [String, Number],
        default: '',
    },
    icon: {
        type: String
    },
    error: {
        type: [],
    },
});

</script>

<template>
    <div>
        <label for="username" class="block text-sm font-medium text-[#3E3E3E] uppercase tracking-[1.6px]">
            {{ props.label }}
        </label>
        <div class="mt-1 flex rounded-md shadow-sm">
            <div class="relative flex flex-grow items-stretch focus-within:z-10">
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                    <component :is="props.icon"></component>
                </div>
                <input :class="{'border-2 border-red-500' : error}"  type="text" name="username" id="username"
                    class="block tracking-wider bg-[#ECECEC] w-full h-[50px] border-gray-300 pl-12 focus:border-indigo-500 focus:ring-indigo-500 text-[14px]"
                    :placeholder="props.placeholder" v-bind="$attrs" :value="props.modelValue"
                    @input="$emit('update:modelValue', $event.target.value)" />
            </div>

        </div>
        <ErrorMessage v-if="error" :error="error" />
    </div>
</template>
