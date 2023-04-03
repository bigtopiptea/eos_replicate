<template>
    <Combobox as="div" v-model="selectedItem">
        <div class="relative">
            <ComboboxLabel v-if="label"  class="absolute -top-2 left-2 -mt-px inline-block bg-white text-[10px] tracking-[1.5px] font-bold text-gray-700">
                {{ label }}
                <span v-if="required == 'required'" class="text-mid-red">*</span
                >
            </ComboboxLabel>
            <ComboboxInput
                class="w-full border uppercase placeholder:tracking-widest placeholder:text-gray-500 placeholder:text-xs border-gray-300 bg-white py-2 pl-3 pr-10 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 sm:text-sm"
                @change="query = $event.target.value"
                :display-value="(person) => person?.name"
                :placeholder="placeholder"
            />

            <ComboboxButton class="absolute inset-y-0 right-0 flex items-center rounded-r-md px-2 focus:outline-none">
                <ChevronDownIcon
                    class="h-5 w-5 text-gray-400"
                    aria-hidden="true"
                />
            </ComboboxButton>

            <ComboboxOptions
                v-if="filteredData.length > 0"
                class="absolute text-left tracking-wider z-10 mt-1 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm"
            >
                <ComboboxOption
                    v-for="item in filteredData"
                    :key="item.id"
                    :value="item"
                    as="template"
                    v-slot="{ active, selected }"
                >
                    <li
                        :class="[
                            'relative cursor-default select-none py-2 pl-3 pr-9',
                            active
                                ? 'bg-indigo-600 text-white'
                                : 'text-gray-900',
                        ]"
                    >
                        <span
                            :class="[
                                'block truncate',
                                selected && 'font-semibold',
                            ]"
                        >
                            {{ item.name }}
                            <span class="uppercase" v-if="item.currency_name">
                                -
                                {{ item.currency_name }}
                            </span>
                        </span>

                        <span
                            v-if="selected"
                            :class="[
                                'absolute inset-y-0 right-0 flex items-center pr-4',
                                active ? 'text-white' : 'text-indigo-600',
                            ]"
                        >
                            <CheckIcon class="h-5 w-5" aria-hidden="true" />
                        </span>
                    </li>
                </ComboboxOption>
            </ComboboxOptions>
        </div>
    </Combobox>
</template>

<script setup>
import { computed, ref } from "vue";
import ChevronDownIcon from "../Icons/ChevronDownIcon.vue";
import ExclamationCircleIcon from "../Icons/ExclamationCircleIcon.vue";
import {
    Combobox,
    ComboboxButton,
    ComboboxInput,
    ComboboxLabel,
    ComboboxOption,
    ComboboxOptions,
} from "@headlessui/vue";

const props = defineProps({
    data: Array,
    label: {
        type: String,
        default: "",
    },
    required: {
        type: String,
        default: "",
    },
    placeholder: {
        type: String,
        default: "",
    },
    error: {
        type: Array,
        default: [],
    },
});

const query = ref("");
const selectedItem = ref(null);
const filteredData = computed(() =>
    query.value === ""
        ? props.data
        : props.data.filter((item) => {
              return item.name
                  .toLowerCase()
                  .includes(query.value.toLowerCase());
          })
);
</script>
