<template>
    <Combobox
        as="div"
        @input="$emit('update:modelValue', $event.target.value)"
        :value="props.modelValue.company_name"
        v-bind="$attrs"
    >
        <div class="relative mt-1">
            <ComboboxLabel
                class="text-[10px] font-bold absolute -mt-2 bg-white ml-3 tracking-widest"
            >
                {{ placeholder ? label : "" }}
                <span v-if="props.placeholder" class="text-red-500">*</span>
                <span v-else></span>
            </ComboboxLabel>
            <ComboboxInput
                class="w-full border placeholder:text-gray-500 border-gray-300 uppercase tracking-wider bg-[white] py-2 pl-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 sm:text-sm"
                @change="query = $event.target.value"
                :display-value="(person) => person?.company_name"
                :placeholder="props.placeholder"
            />
            <ComboboxButton
                class="absolute inset-y-0 right-0 flex items-center rounded-r-md px-2 focus:outline-none"
            >
                <component
                    :is="icon"
                    class="h-5 w-5"
                    aria-hidden="true"
                ></component>
            </ComboboxButton>

            <ComboboxOptions
                v-if="filteredData"
                class="absolute z-10 mt-1 max-h-60 w-full overflow-auto bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm"
            >
                <ComboboxOption
                    v-for="person in filteredData"
                    :key="person.id"
                    :value="person"
                    as="template"
                    v-slot="{ active, selected }"
                >
                    <li
                        :class="[
                            'relative tracking-widest cursor-pointer uppercase select-none py-2 pl-3 pr-9',
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
                            {{ person.company_name }}
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
import CheckIcon from "../Icons/CheckIcon.vue";
import {
    Combobox,
    ComboboxButton,
    ComboboxInput,
    ComboboxLabel,
    ComboboxOption,
    ComboboxOptions,
} from "@headlessui/vue";

const props = defineProps({
    label: {
        type: String,
        default: "",
    },
    data: {
        type: Array,
    },
    placeholder: {
        type: [String, Number],
        default: "",
    },
    modelValue: {
        type: [String, Number],
        default: "",
    },
    icon: {
        type: String,
    },
});

const query = ref("");
const selectedData = ref(null);
const filteredData = computed(() =>
    query.value === ""
        ? props.data
        : props.data.filter((person) => {
              return person.company_name
                  .toLowerCase()
                  .includes(query.value.toLowerCase());
          })
);
</script>
