<template>
    <TransitionRoot appear as="template">
        <Dialog as="div" class="relative z-10" @close="open = false">
            <TransitionChild as="template" enter="ease-in-out duration-500" enter-from="opacity-0"
                enter-to="opacity-100" leave="ease-in-out duration-500" leave-from="opacity-100" leave-to="opacity-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
            </TransitionChild>

            <div class="fixed inset-0 overflow-hidden">

                <div class="absolute inset-0 overflow-hidden">
                    <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
                        <TransitionChild as="template"
                            enter="transform transition ease-in-out duration-500 sm:duration-700"
                            enter-from="translate-x-full" enter-to="translate-x-0"
                            leave="transform transition ease-in-out duration-500 sm:duration-700"
                            leave-from="translate-x-0" leave-to="translate-x-full">
                            <DialogPanel class="pointer-events-auto  w-screen" :class="widthModal">
                                <div class="flex h-full flex-col bg-white py-6 shadow-xl">
                                    <div
                                        class="mt-[41px] mb-6 flex justify-center items-center w-full h-[50px] bg-gradient-to-r from-[#FB9E30] via-[#F98B38] to-[#EE3E2C]">
                                        <h2
                                            class="text-[14px] font-bold text-white font-rubik-light uppercase tracking-wider">
                                            {{ title }}
                                        </h2>
                                    </div>
                                    <div class="relative flex-1 px-4">
                                        <!-- Replace with your content -->
                                        <slot />
                                    </div>

                                </div>
                            </DialogPanel>
                        </TransitionChild>
                    </div>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>

<script>


import SwitchToggle from '../Switch(Toggle)/SwitchToggle.vue';
export default {
    name: "Slideover",
    props: {
        widthModal: {
            type: String,
            default: 'max-w-md',
        },
        title: {
            type: String,
            default: 'MODAL TITLE HERE',
        }
    },
    components: {
        SwitchToggle
    },
    data() {
        return {
            state: {}
        };
    },
}
</script>

<script setup>
import { ref } from 'vue'
import { Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue'

const open = ref(true)

</script>
