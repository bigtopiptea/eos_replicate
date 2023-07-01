<template>
    <TransitionRoot as="template" :show="open">
      <Dialog as="div" class="relative z-10" @close="open = false">
        <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in duration-200" leave-from="opacity-100" leave-to="opacity-0">
          <div class="fixed inset-0 bg-[#1E1E1E] bg-opacity-75 transition-opacity" />
        </TransitionChild>

        <div class="fixed inset-0 z-10 overflow-y-auto">
          <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" enter-to="opacity-100 translate-y-0 sm:scale-100" leave="ease-in duration-200" leave-from="opacity-100 translate-y-0 sm:scale-100" leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
              <DialogPanel class="relative transform overflow-y-auto bg-white text-left shadow-xl transition-all sm:my-8 rounded-lg" :class="widthModal">
                <div class="absolute top-0 h-8 w-full bg-gradient-to-r from-[#FB9E30] via-[#F98B38] to-[#EE3E2C] flex items-end justify-end">
                    <h5 :class="[modalTitlePosition,modalTitleSize]" class="w-full text-white mb-1.5 px-5 uppercase">{{ modalTitle }}</h5>
                    <div class="absolute left-[15px] top-[5px]">
                      <div v-if="iconShow === 'LOCK'" class="w-[30px] h-[30px]">
                          <LockPinIcon/>
                      </div>
                    </div>
                </div>
                <div class="flex justify-start flex-col mt-[30px]" :class="[heightModal, titlePosition]">
                    <!-- <div class="text-center">
                        <DialogTitle as="h3" class="text-base font-semibold leading-6 text-gray-900">
                            {{ title }}
                        </DialogTitle>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">{{ description }}</p>
                        </div>
                    </div> -->
                      <slot/>
                </div>
              </DialogPanel>
            </TransitionChild>
          </div>
        </div>
      </Dialog>
    </TransitionRoot>
</template>

<script>
import LockPinIcon from '../Icons/LockPinIcon.vue';
export default {
    name: "ModalTwo",
    components:{
      LockPinIcon
    },
    props: {
        widthModal: {
            type: String,
            default: 'w-[500px]',
        },
        heightModal: {
            type: String,
            default: 'h-[200px]',
        },
        modalTitle: {
            type: String,
            default: '',
        },
        modalTitlePosition: {
            type: String,
            default: 'text-right',
        },
        modalTitleSize:{
            type: String,
            default: 'text-[17px]',
        },
        title: {
            type: String,
            default: '',
        },
        description: {
            type: String,
            default: '',
        },
        iconShow: {
            type: String,
            default:'',
        }
    },
}
</script>

<script setup>
import { ref } from 'vue'
import { Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue'
// import { ExclamationTriangleIcon } from '@heroicons/vue/24/outline'

const open = ref(true)
</script>
