<template>
    <Listbox as="div" v-model="selected">
      <div class="relative">
        <ListboxLabel class="absolute -top-[8px] left-[10px] block text-[11px] uppercase bg-white z-[6]">
          {{ label }}
          <span :hidden="isRequired ? false : true" class="ml-1 text-red-500 text-[10px]">*</span>
        </ListboxLabel>
        <ListboxButton class="relative flex justify-center items-center gap-[10px] w-full h-7 cursor-default bg-[#3E3E3E] px-3 text-left text-gray-900 border border-gray-300  focus:outline-none text-[11px]">
            <span class="pointer-events-none ">
              <FilterIcon class="h-5 w-5 text-white" aria-hidden="true" />
            </span>
            <span class="block truncate uppercase text-white text-[12px]">{{ placeholder }}</span>
            <!-- <span v-else class="block truncate uppercase text-white text-right">{{ this.selected.name }}</span> -->
        </ListboxButton>
  
        <transition leave-active-class="transition ease-in duration-100" leave-from-class="opacity-100" leave-to-class="opacity-0">
          <ListboxOptions class="absolute z-10 max-h-[150px] w-full overflow-auto bg-white  text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none text-[11px]">
            <ListboxOption hidden>
                <li class="text-gray-900 relative cursor-default select-none py-1 pl-3 pr-9">
                    <span class="font-normal block truncate uppercase">
                    {{ placeholder }}
                    </span>
                </li>
            </ListboxOption>
            <ListboxOption as="template" v-for="option in options" :key="option" :value="option" v-slot="{ active, selected }">
              <li :class="[active ? 'bg-gray-200 text-black' : 'text-gray-900', 'relative cursor-default select-none py-1 pl-3 pr-9']" class="flex gap-[10px] uppercase border-b">
                <!-- Conditional Statement to include checkbox or not -->
                <input v-if="withCheckbox === true" type="checkbox" name="" id="" :checked="selected ? true : false">
                <span :class="[selected ? 'font-semibold' : 'font-normal', 'block truncate']">
                    {{ option.name }}
                </span>
                <!-- <span v-if="selected" :class="[active ? 'text-white' : 'text-indigo-600', 'absolute inset-y-0 right-0 flex items-center pr-4']">
                  <CheckIcon class="h-5 w-5" aria-hidden="true" />
                </span> -->
              </li>
            </ListboxOption>
          </ListboxOptions>
        </transition>
      </div>
    </Listbox>
  </template>
  
  <script>
//   import { ref } from 'vue'
  import { Listbox, ListboxButton, ListboxLabel, ListboxOption, ListboxOptions } from '@headlessui/vue'
  import CheckIcon from '../Icons/CheckIcon.vue'
  import ChevronDownIcon from '../Icons/ChevronDownIcon.vue'
  import FilterIcon from '../Icons/FilterIcon.vue'
  export default {
    components:{
        Listbox, ListboxButton, ListboxLabel, ListboxOption,
        ListboxOptions, CheckIcon, ChevronDownIcon, FilterIcon
    },
    props:{
        label:{
            type: String,
            default: ''
        },
        options:{
            type: Array,
            required: true
        },
        placeholder:{
            type:String,
            default:'ADVANCE SETTINGS'
        },
        withCheckbox:{
            type: Boolean,
        },
        isRequired:{
          type: Boolean,
          required: false
        }
    },

    data(){
        return{
            // selected: this.options[0],
            selected: false
        }
    }
  }
  </script>