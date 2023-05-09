<template>
    <Menu as="div" class="relative inline-block text-left w-full">
      <div class="relative text-#3E3E3E">
        <label for="{{ label }}" class="absolute -top-[8px] left-[10px] text-[11px]  uppercase inline-flex items-center h-auto  bg-white z-9">{{ label }}</label>
        <MenuButton class="inline-flex w-full justify-between items-center h-7 bg-white py-1 px-[10px] text-[11px] uppercase text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300">
          {{ placeholder }}
          <ChevronDownIcon class=" h-3 w-3 text-black" aria-hidden="true"/>
        </MenuButton>
      </div>
  
      <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
        <MenuItems class="absolute right-0 z-10 mt-2 w-full origin-top-right divide-y divide-gray-100 bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
          <div class="py-1">
            <MenuItem v-for="option in options" :key="option" v-slot="{ active }">
              <a href="#" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-[11px]']" class="flex gap-[5px]">
                <input type="checkbox" name="">
                <p>
                  {{option}}
                </p>
              </a>
            </MenuItem>
          </div>
        </MenuItems>
      </transition>
    </Menu>
  </template>
  
  <script setup>
  import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
    import ChevronDownIcon from '../Icons/ChevronDownIcon.vue'
  </script>

  <script>
  export default {
    components:{
        Menu, MenuButton, MenuItem, MenuItems, ChevronDownIcon
    },
    props:{
      label:{
        type:String,
        default: ''
      },
      placeholder:{
        type:String,
        default: ''
      },
      options:{
        type: Array,
        required: true
      }

    }
  }
  </script>