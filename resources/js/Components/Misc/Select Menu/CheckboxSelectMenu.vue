<template>
    <Listbox as="div" v-model="selected">
      <!-- <ListboxLabel class="block text-sm font-medium leading-6 text-gray-900">Assigned to</ListboxLabel> -->
      <div class="relative mt-2">
        <ListboxButton class="relative w-full cursor-default bg-white py-1.5 pl-3 pr-10 text-left text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none  sm:text-sm sm:leading-6">
          <span class="block truncate">{{ selected.name }}</span>
          <span class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
            <ChevronUpDownIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
          </span>
        </ListboxButton>
  
        <transition leave-active-class="transition ease-in duration-100" leave-from-class="opacity-100" leave-to-class="opacity-0">
          <ListboxOptions class="absolute z-10 mt-1 max-h-60 w-full overflow-auto bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm">
            <ListboxOption as="template" v-for="option in options" :key="option" :value="option" v-slot="{ active, selected }">
              <li :class="[active ? 'bg-gray-200 text-black' : 'text-gray-900', 'relative cursor-default select-none py-2 pl-3 pr-9']" class="flex gap-[10px]">
                <input type="checkbox" name="" id="" :checked="selected ? true : false">
                <span :class="[selected ? 'font-semibold' : 'font-normal', 'block truncate']">
                    {{ option.name }}
                </span>
                <span v-if="selected" :class="[active ? 'text-white' : 'text-indigo-600', 'absolute inset-y-0 right-0 flex items-center pr-4']">
                  <CheckIcon class="h-5 w-5" aria-hidden="true" />
                </span>
              </li>
            </ListboxOption>
          </ListboxOptions>
        </transition>
      </div>
    </Listbox>
  </template>
  
  <script>
    import { ref } from 'vue'
  import { Listbox, ListboxButton, ListboxLabel, ListboxOption, ListboxOptions } from '@headlessui/vue'
  import CheckIcon from '../Icons/CheckIcon.vue'
  import ChevronUpDownIcon from '../Icons/ChevronUpDownIcon.vue'
  export default {
    components:{
        Listbox, ListboxButton, ListboxLabel, ListboxOption,
        ListboxOptions, CheckIcon, ChevronUpDownIcon
    },
  }
  </script>
  <script setup>


  const options = [
    { id: 1, name: 'Wade Cooper' },
    { id: 2, name: 'Arlene Mccoy' },
    { id: 3, name: 'Devon Webb' },
    { id: 4, name: 'Tom Cook' },
    { id: 5, name: 'Tanya Fox' },
    { id: 6, name: 'Hellen Schmidt' },
    { id: 7, name: 'Caroline Schultz' },
    { id: 8, name: 'Mason Heaney' },
    { id: 9, name: 'Claudie Smitham' },
    { id: 10, name: 'Emil Schaefer' },
  ]

 


  const selected = ref(options[0])
  </script>