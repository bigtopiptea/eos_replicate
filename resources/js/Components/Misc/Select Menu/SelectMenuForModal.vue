<template>
    <Combobox as="div" @input="$emit('update:modelValue', $event.target.value)" :value="props.modelValue.name"
        v-bind="$attrs">
        <div class="relative">
            <ComboboxLabel class="text-[10px] absolute  bg-white ml-3 uppercase tracking-widest">
                {{ placeholder ? label : '' }}
            </ComboboxLabel>
            <ComboboxInput
                class="w-full border border-gray-300 uppercase font-semibold bg-[white] py-2 pl-3 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500"
                @change="query = $event.target.value" :display-value="(name) => name?.name"
                :placeholder="props.placeholder" />
            <ComboboxButton class="absolute inset-y-0 right-0 flex items-center rounded-r-md px-2 focus:outline-none">
                <component :is="icon" class="h-5 w-5" aria-hidden="true"></component>
            </ComboboxButton>

            <ComboboxOptions v-if="filteredData"
                class="absolute border border-gray-300 bottom-10 pl-4 z-10 mt-1 max-h-60 w-62 right-10 overflow-auto  bg-white py-4">
                <ComboboxOption v-for="name in filteredData" :key="name.id" :value="name" as="template"
                    v-slot="{ active, selected }">
                    <li
                        :class="['relative  cursor-pointer uppercase select-none py-2 pl-3 ', active ? 'bg-indigo-600 text-white' : 'text-gray-900 font-normal']">
                        <span :class="['block truncate', selected && 'font-bold']">
                            {{ name.name }}
                        </span>

                        <span v-if="selected"
                            :class="['absolute inset-y-0 right-0 flex items-center pr-4', active ? 'text-white' : 'text-indigo-600']">
                            <CheckIcon class="h-5 w-5" aria-hidden="true" />
                        </span>
                    </li>
                </ComboboxOption>
            </ComboboxOptions>
        </div>
    </Combobox>
</template>

  
<script setup>
import { computed, ref } from 'vue'
import CheckIcon from '../Icons/CheckIcon.vue';
import {
    Combobox,
    ComboboxButton,
    ComboboxInput,
    ComboboxLabel,
    ComboboxOption,
    ComboboxOptions,
} from '@headlessui/vue'

const props = defineProps({
    label: {
        type: String,
        default: '',
    },
    data: {
        type: Array,
    },
    placeholder: {
        type: [String, Number],
        default: '',
    },
    modelValue: {
        type: [String, Number],
        default: '',
    },
    icon: {
        type: String,
    }
});

const query = ref('')
const selectedData = ref(null)
const filteredData = computed(() =>
    query.value === ''
        ? props.data
        : props.data.filter((name) => {
            return name.name.toLowerCase().includes(query.value.toLowerCase())
        })
)
</script>
  