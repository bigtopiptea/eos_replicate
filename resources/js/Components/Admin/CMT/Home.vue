<script setup>

import ChevRightIcon from "@/Components/Misc/Icons/ChevRightIcon.vue";
import LoadingIcon from "@/Components/Misc/Icons/LoadingIcon.vue";
import XMarkIcon from "@/Components/Misc/Icons/XMarkIcon.vue";
import ProgressIcon from "@/Components/Misc/Icons/ProgressIcon.vue";

</script>

<script>
import {defineComponent} from "vue";
import SmallHeading from "@/Components/Misc/Heading/SmallHeading.vue";
import Slideover from "@/Components/Misc/Slideover/Slideover.vue";
import RangeSlider from "@/Components/Misc/Range Slider/RangeSlider.vue";

export default defineComponent({
    components: {
        SmallHeading, Slideover, LoadingIcon, XMarkIcon, ProgressIcon, RangeSlider
    },
    data(){
        return{
            isOpen: true,
            slideoverOpen: false,
        }   
    },
    methods: {
        openFundingWorkspace(){
            this.isOpen = !this.isOpen;
        },
        slideOverToggle() {
            this.slideoverOpen = false;
        },
        getState(type) {
            this.state = type;
        },
    }
})
</script>
<template>
    <!-- MAIN CONTENT -->
    <div class="3xl:container h-screen p-3 bg-white">
        <div class="font-rubik-light">
            <p class="text-base font-bold">COMMITED RATE AS OF: <br>
               <span class="text-sm">SEPTEMBER 28,2022 08:00:00 AM</span> 
            </p>
        </div>
        <div class="flex justify-between mt-3 pb-5 border-b-2 border-solid border-#EAEAEA">
            <div class="h-24 w-40 py-4 px-1 bg-#F9951E text-center text-white">
                <h3 class="text-xl font-bold">50.00</h3>
                <p class="text-1sm text-center mt-2 font-medium">REDHA AL ANSARI EXCHANGE</p>
                <p class="text-2sm font-thin">Last update: 09/28/2022 8:00:00 AM</p>
            </div>
            <div class="h-24 w-40 py-4 px-1 bg-#F9951E text-center text-white">
                <h3 class="text-xl font-bold">50.01</h3>
                <p class="text-1sm text-center mt-2 font-medium">REDHA AL ANSARI EXCHANGE</p>
                <p class="text-2sm font-thin">Last update: 09/28/2022 8:00:00 AM</p>
            </div>
            <div class="h-24 w-40 py-4 px-1 bg-#F9951E text-center text-white">
                <h3 class="text-xl font-bold">49.99</h3>
                <p class="text-1sm text-center mt-2 font-medium">REDHA AL ANSARI EXCHANGE</p>
                <p class="text-2sm font-thin">Last update: 09/28/2022 8:00:00 AM</p>
            </div>
            <div class="h-24 w-40 py-4 px-1 bg-#F9951E text-center text-white">
                <h3 class="text-xl font-bold">50.02</h3>
                <p class="text-1sm text-center mt-2 font-medium">REDHA AL ANSARI EXCHANGE</p>
                <p class="text-2sm font-thin">Last update: 09/28/2022 8:00:00 AM</p>
            </div>
            <div class="h-24 w-40 py-4 px-1 bg-#F9951E text-center text-white">
                <h3 class="text-xl font-bold">49.98</h3>
                <p class="text-1sm text-center mt-2 font-medium">REDHA AL ANSARI EXCHANGE</p>
                <p class="text-2sm font-thin">Last update: 09/28/2022 8:00:00 AM</p>
            </div>
            <div class="h-24 w-44 py-4 px-1 border-l-2 border-b-2 border-#EAEAEA text-center text-black">
                <img src="../../../../assets/images/usd_to_php_graph.png" alt="graph-image"/>
                <p class="text-sm text-left">USD to PHP</p>
            </div>
        </div>
        <div class="flex justify-between w-full h-4/6 my-5">
            <div class="h-full overflow-y-auto">
                <table class="h-full border-collapse border-2 border-#EAEAEA w-80 text-center">
                    <thead class="sticky top-0">
                        <tr>
                            <th class="bg-#3E3E3E text-white text-sm text-bold" colspan="2">BANK BALANCES</th>
                        </tr>
                        <tr>
                            <th class="bg-#D9D9D9 font-extralight text-sm">BANKS</th>
                            <th class="bg-#D9D9D9 font-extralight text-sm w-24">AMOUNT</th>
                        </tr>
                    </thead>
                    <tbody class="overflow-y-auto">
                        <tr>
                            <td></td>
                            <td  class="border-solid border-l-2 border-#EAEAEA"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="h-full overflow-y-auto">
                <table class="h-full border-collapse border-2 border-#EAEAEA w-80 text-center overflow-auto">
                    <thead class="sticky top-0">
                        <tr>
                            <th class="bg-#3E3E3E text-white text-sm text-bold" colspan="2">TIE-UPS FUNDS</th>
                        </tr>
                        <tr>
                            <th class="bg-#D9D9D9 font-extralight text-sm">TIE-UPS</th>
                            <th class="bg-#D9D9D9 font-extralight text-sm w-24">AMOUNT</th>
                        </tr>
                    </thead>
                    <tbody class="overflow-y-auto">
                        <tr>
                            <td></td>
                            <td class="border-solid border-l-2 border-#EAEAEA"></td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="h-full overflow-y-auto">
                <table class="h-full border-collapse border-2 border-#EAEAEA w-80 text-center">
                    <thead class="sticky top-0">
                        <tr>
                            <th class="bg-#3E3E3E text-white text-sm text-bold" colspan="2">BANK & PROVIDERS FUNDS</th>
                        </tr>
                        <tr>
                            <th class="bg-#D9D9D9 font-extralight text-sm">BANKS & PROVIDERS</th>
                            <th class="bg-#D9D9D9 font-extralight text-sm w-24">AMOUNT</th>
                        </tr>
                    </thead>
                    <tbody class="overflow-y-auto">
                        <tr>
                            <td></td>
                            <td class="border-solid border-l-2 border-#EAEAEA"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <SmallHeading :isOpen="isOpen" label="FUNDING WORKSPACE" class="bg-#EE3E2C" :icon="ChevRightIcon" @clicked="openFundingWorkspace()" />
    <Transition name="slide-fade" >
        <div class="3xl:container h-screen bg-white" v-if="!isOpen">
            <h1>HELLO!</h1>
        </div>
    </Transition>

    <!-- SLIDEOVER PROFILE DETAILS-->
    <!-- <Slideover :show="slideoverOpen" @close="slideOverToggle" :title="'PROFILE'">
        <div class="flex flex-col justify-between h-full pb-3">
            <div class="input-area mx-10">
                <div class="profile-upload flex justify-evenly items-center">
                    <img src="../../../../assets/images/user-logo.png" alt="user-logo" class="w-36 h-36 rounded-full">
                    <button type="button" class=" text-sm py-1 px-3 h-7 border border-#F9951E text-#F9951E font-bold">UPLOAD</button>
                </div>
                <div class="mt-5">
                    <div class="flex rounded-md shadow-sm font-rubik-light mb-2">
                        <span class="px-4 inline-flex items-center w-72 border border-r-0 border-gray-200 text-xs text-#3E3E3E font-bold bg-white">COMPLETE NAME</span>
                        <input type="text" class="py-2 px-3 pr-11 block w-full border-gray-200 bg-#ECECEC text-#3E3E3E shadow-sm text-xs focus:z-10 focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <div class="flex rounded-md shadow-sm font-rubik-light mb-2">
                        <span class="px-4 inline-flex items-center w-72 border border-r-0 border-gray-200 text-xs text-#3E3E3E font-bold bg-white">USER ROLE</span>
                        <input type="text" class="py-2 px-3 pr-11 block w-full border-gray-200 bg-#ECECEC text-#3E3E3E shadow-sm text-xs focus:z-10 focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <div class="flex rounded-md shadow-sm font-rubik-light mb-2">
                        <span class="px-4 inline-flex items-center w-72 border border-r-0 border-gray-200 text-xs text-#3E3E3E font-bold bg-white">COMPANY</span>
                        <input type="text" class="py-2 px-3 pr-11 block w-full border-gray-200 bg-#ECECEC text-#3E3E3E shadow-sm text-xs focus:z-10 focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <div class="flex rounded-md shadow-sm font-rubik-light mb-2">
                        <span class="px-4 inline-flex items-center w-72 border border-r-0 border-gray-200 text-xs text-#3E3E3E font-bold bg-white">DEPARTMENT</span>
                        <input type="text" class="py-2 px-3 pr-11 block w-full border-gray-200 bg-#ECECEC text-#3E3E3E shadow-sm text-xs focus:z-10 focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <div class="flex rounded-md shadow-sm font-rubik-light mb-2">
                        <span class="px-4 inline-flex items-center w-72 border border-r-0 border-gray-200 text-xs text-#3E3E3E font-bold bg-white">EMAIL ADDRESS</span>
                        <input type="email" class="py-2 px-3 pr-11 block w-full border-gray-200 bg-#ECECEC text-#3E3E3E shadow-sm text-xs focus:z-10 focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <div class="flex rounded-md shadow-sm font-rubik-light mb-2">
                        <span class="px-4 inline-flex items-center w-72 border border-r-0 border-gray-200 text-xs text-#3E3E3E font-bold bg-white">CONTACT NUMBER</span>
                        <input type="text" class="py-2 px-3 pr-11 block w-full border-gray-200 bg-#ECECEC text-#3E3E3E shadow-sm text-xs focus:z-10 focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <div class="flex rounded-md shadow-sm font-rubik-light mb-2">
                        <span class="px-4 inline-flex items-center w-72 border border-r-0 border-gray-200 text-xs text-#3E3E3E font-bold bg-white">DATE CREATED</span>
                        <input type="date" class="py-2 px-3 pr-11 block w-full border-gray-200 bg-#ECECEC text-#3E3E3E shadow-sm text-xs text-center focus:z-10 focus:border-blue-500 focus:ring-blue-500">
                    </div>
                </div>
            </div>
            <div class="flex justify-center">
                <button @click.prevent="slideOverToggle()" type="submit" class="py-1 px-5 text-xl font-medium border-2 border-black">CLOSE</button>
            </div>
        </div>
    </Slideover> -->

    <button type="submit" @click="(slideoverOpen = !slideoverOpen), getState('view')" >Open Slider</button>
    
    <!-- SLIDEOVER CHANGE PHOTO - Step 1-->
    <!-- <Slideover :show="slideoverOpen" @close="slideOverToggle" :title="'CHANGE PHOTO'">
        <div class="flex flex-col justify-between items-center h-full pb-5">
            <div class="py-5 mx-5 w-4/5">
                <div class="flex flex-col items-center border-dotted border-2 border-#7F7F7F rounded-md p-5">
                    <div class="font-rubik-light text-center mb-5">
                        <p class="text-sm">DRAG IMAGE HERE<br>OR</p>
                        <button type="button" class="text-sm text-#EE3E2C font-medium py-1 px-4 border-2 border-#EE3E2C">BROWSE</button>
                    </div>
                    <div class="text-center text-xs">
                        <p>MAX FILE SIZE: <span class="font-bold">1MB</span><br>
                        SUPPORTED FILE TYPES: <span class="font-bold">JPEG, JPG, PNG</span>
                        </p>
                    </div>
                </div>
                <div class="pt-5 font-rubik-light">
                    <div class="flex justify-between mb-3">
                        <div class="flex items-center text-sm">
                            <LoadingIcon></LoadingIcon>
                            <span>photo_lasconia.jpg</span>
                        </div>
                        <div>
                            <XMarkIcon></XMarkIcon>
                        </div>
                    </div>
                    <div class="mb-3">
                        <ProgressIcon :progressWidth="'w-96'"></ProgressIcon>
                    </div>
                    <div class="flex justify-between text-xs mb-3">
                        <div>
                            <p>
                                <span>0.5 MB</span>
                                of
                                <span>1 MB</span>
                            </p>
                        </div>
                        <div class="text-#194E72">
                            <p>UPLOADING...
                            <span>50%</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-between w-4/5">
                <buttton @click.prevent="slideOverToggle()" type="submit" class="px-8 py-2 bg-#3E3E3E text-white text-lg cursor-pointer">CANCEL</buttton> 
                <buttton type="submit" class="px-8 py-2 bg-#F9951E text-white text-lg cursor-pointer">SUBMIT</buttton>
            </div>
        </div>
    </Slideover> -->

    <!-- SLIDEOVER CHANGE PHOTO - Step 2-->
    <Slideover :show="slideoverOpen" @close="slideOverToggle" :title="'CHANGE PHOTO'">
        <div class="flex flex-col justify-between items-center py-5 h-full">
            <div class="flex flex-col items-center">
                <div class="w-auto p-10 bg-#F9951E rounded-md relative">
                    <div class="absolute top-3 right-3 text-white">
                        <XMarkIcon></XMarkIcon>
                    </div>
                    <div class="flex justify-center items-center w-80 h-60 bg-#EAEAEA">
                        <img src="../../../../assets/images/user-logo.png" alt="user-logo" class="w-56 h-56 rounded-full border border-black">
                    </div>
                </div>
                <div class="mt-2">
                    <RangeSlider></RangeSlider>
                </div>
            </div>

            <div class="flex justify-between w-4/5">
                <buttton @click.prevent="slideOverToggle()" type="submit" class="px-8 py-2 bg-#3E3E3E text-white text-lg cursor-pointer">CANCEL</buttton> 
                <buttton type="submit" class="px-8 py-2 bg-#F9951E text-white text-lg cursor-pointer">SUBMIT</buttton>
            </div>
        </div>
    </Slideover>
</template>

