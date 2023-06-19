<template>
    <Listbox as="div" v-model="selected">
      <div class="relative flex items-center h-7 w-full">
        <ListboxLabel class="inline-flex items-center text-[11px] h-full uppercase bg-white z-5 border border-[#EAEAEA] px-2" :class="labelWidth">{{ label }}</ListboxLabel>
        <ListboxButton class="relative h-full cursor-default bg-white pl-3 pr-10 text-left text-gray-900 border border-gray-300  focus:outline-none text-[11px]" :class="inputWidth">
          <span v-if="selected === false" class="block truncate uppercase">{{ placeholder }}</span>
          <span v-else class="block truncate uppercase">{{ this.selected.name }}</span>
          <span class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
            <ChevronDownIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
          </span>
        </ListboxButton>
  
        <transition leave-active-class="transition ease-in duration-100" leave-from-class="opacity-100" leave-to-class="opacity-0">
          <ListboxOptions class="absolute -bottom-[100px] right-0 z-10 max-h-[100px]  overflow-auto bg-white text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none text-[11px] border" :class="inputWidth">
            <ListboxOption hidden>
                <li class="text-gray-900 relative cursor-default select-none py-1 pl-3 pr-9">
                    <span class="font-normal block truncate uppercase">
                    {{ placeholder }}
                    </span>
                </li>
            </ListboxOption>
            <ListboxOption as="template" v-for="option in options" :key="option" :value="option" v-slot="{ active, selected }">
              <li :class="[active ? 'bg-gray-200 text-black' : 'text-gray-900', 'relative cursor-default select-none py-1 pl-3']" class="flex gap-[10px] uppercase border-b h-auto">
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
  export default {
    components:{
        Listbox, ListboxButton, ListboxLabel, ListboxOption,
        ListboxOptions, CheckIcon, ChevronDownIcon
    },
    props:{
        label:{
            type: String,
            default: 'Label'
        },
        inputWidth:{
            type: String,
            default: 'w-5/12',
        },
        labelWidth:{
            type: String,
            default: 'w-7/12',
        },
        options:{
            type: Array,
        },
        placeholder:{
            type:String,
            default:''
        },
    },

    data(){
        return{
            // selected: this.options[0],
            selected: false
        }
    }
  }
  </script>