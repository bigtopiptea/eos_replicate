<template>
    <Listbox as="div" v-model="selected">
      <div class="relative">
        <ListboxLabel class="absolute -top-[8px] left-[10px] block text-[11px] uppercase bg-white z-[6]">
          {{ label }}
          <span :hidden="isRequired ? false : true" class="ml-1 text-red-500 text-[10px]">*</span>
        </ListboxLabel>
        <ListboxButton class="relative w-full h-7 cursor-default bg-white pl-3 pr-10 text-left text-gray-900 border border-gray-300 focus:outline-none text-[11px]">
          <span v-if="selected === false" class="block truncate uppercase">{{ placeholder }}</span>
          <span v-else class="block truncate uppercase">{{ this.selected.name }}</span>
          <span class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
            <ChevronDownIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
          </span>
        </ListboxButton>

        <transition leave-active-class="transition ease-in duration-100" leave-from-class="opacity-100" leave-to-class="opacity-0">
          <ListboxOptions class="absolute z-10 max-h-[150px] w-full overflow-y-auto bg-white  text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none text-[11px]" multiple>
            <ListboxOption hidden>
                <li class="text-gray-900 relative cursor-default select-none py-1 pl-3 pr-9">
                    <span class="font-normal block truncate uppercase">
                    {{ placeholder }}
                    </span>
                </li>
            </ListboxOption>
            <ListboxOption as="template" v-for="option in options" :key="option" :value="option" v-slot="{ active, selected }">
              <li :class="[active ? 'bg-gray-200 text-black' : 'text-gray-900', 'relative cursor-default select-none py-1 pl-3']" class="flex gap-[10px] uppercase border-b">
                <!-- Conditional Statement to include checkbox or not -->
                <input v-if="withCheckbox === true" type="checkbox" name="" id="" :checked="selected ? true : false">
                <span :class="[selected ? 'font-semibold' : 'font-normal', 'block truncate']" >
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
  export default {
    components:{
        Listbox, ListboxButton, ListboxLabel, ListboxOption,
        ListboxOptions, CheckIcon, ChevronDownIcon
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
            default:''
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
