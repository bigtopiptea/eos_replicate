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
        openFundingWorksheet(){
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
        <div class="flex justify-between mt-3 pb-5 font-rubik-light border-b-2 border-solid border-#EAEAEA">
            <div class="h-24 w-40 py-4 px-1 bg-#F9951E text-center text-white">
                <h3 class="text-xl font-bold">50.00</h3>
                <p class="text-5xs text-center mt-2 font-medium">REDHA AL ANSARI EXCHANGE</p>
                <p class="text-6xs font-thin">Last update: 09/28/2022 8:00:00 AM</p>
            </div>
            <div class="h-24 w-40 py-4 px-1 bg-#F9951E text-center text-white">
                <h3 class="text-xl font-bold">50.01</h3>
                <p class="text-5xs text-center mt-2 font-medium">REDHA AL ANSARI EXCHANGE</p>
                <p class="text-6xs font-thin">Last update: 09/28/2022 8:00:00 AM</p>
            </div>
            <div class="h-24 w-40 py-4 px-1 bg-#F9951E text-center text-white">
                <h3 class="text-xl font-bold">49.99</h3>
                <p class="text-5xs text-center mt-2 font-medium">REDHA AL ANSARI EXCHANGE</p>
                <p class="text-6xs font-thin">Last update: 09/28/2022 8:00:00 AM</p>
            </div>
            <div class="h-24 w-40 py-4 px-1 bg-#F9951E text-center text-white">
                <h3 class="text-xl font-bold">50.02</h3>
                <p class="text-5xs text-center mt-2 font-medium">REDHA AL ANSARI EXCHANGE</p>
                <p class="text-6xs font-thin">Last update: 09/28/2022 8:00:00 AM</p>
            </div>
            <div class="h-24 w-40 py-4 px-1 bg-#F9951E text-center text-white">
                <h3 class="text-xl font-bold">49.98</h3>
                <p class="text-5xs text-center mt-2 font-medium">REDHA AL ANSARI EXCHANGE</p>
                <p class="text-6xs font-thin">Last update: 09/28/2022 8:00:00 AM</p>
            </div>
            <div class="h-24 w-40 px-1 border-l-2 border-b-2 border-#EAEAEA text-center text-black flex flex-col justify-end">
                <img src="../../../../assets/images/usd_to_php_graph.png" alt="graph-image"/>
                <p class="text-xs text-left font-medium">USD to PHP</p>
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
                            <th class="bg-#D9D9D9 font-extralight text-sm">AMOUNT</th>
                        </tr>
                    </thead>
                    <tbody class="overflow-y-auto">
                        <tr class="border-b border-#EAEAEA">
                            <td> - </td>
                            <td class="border-solid border-l-2 border-#EAEAEA"> - </td>
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
                            <th class="bg-#D9D9D9 font-extralight text-sm">AMOUNT</th>
                        </tr>
                    </thead>
                    <tbody class="overflow-y-auto">
                        <tr class="border-b border-#EAEAEA">
                            <td> - </td>
                            <td class="border-solid border-l-2 border-#EAEAEA"> - </td>
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
                            <th class="bg-#D9D9D9 font-extralight text-sm">AMOUNT</th>
                        </tr>
                    </thead>
                    <tbody class="overflow-y-auto">
                        <tr class="border-b border-#EAEAEA">
                            <td> - </td>
                            <td class="border-solid border-l-2 border-#EAEAEA"> - </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- SLIDEOVER TRIGGER FOR TRIAL -->
    <button type="submit" @click="(slideoverOpen = !slideoverOpen), getState('view')" >Open Slider</button>

    <!-- FUNDING WO -->
    <SmallHeading :isOpen="isOpen" label="FUNDING WORKSHEET" class="bg-#EE3E2C" :icon="ChevRightIcon" @clicked="openFundingWorksheet()" />
    <Transition name="slide-fade" >
        <div class="3xl:container h-auto bg-white p-3" v-if="!isOpen">
            <!-- FULL WIDTH TABLE -->
            <div class="h-full w-full font-rubik-light">
                <h1 class="text-xs  mb-2">BANKS & WALLET FUNDINGS</h1>
                <table class="h-full border-collapse border border-#EAEAEA w-full text-center text-3xs font-rubik-light">
                    <thead class="sticky top-0 bg-#D9D9D9">
                        <tr class="border-b border-#EAEAEA p-5 divide-x divide-#EAEAEA">
                            <th class="p-2 text-left">BANK</th>
                            <th class="p-2">BEGINNING BALANCE</th>
                            <th class="p-2">ITEMS</th>
                            <th class="p-2">REMITTANCE AMOUNT</th>
                            <th class="p-2">TRANSACTION COST</th>
                            <th class="p-2">TOTAL COST</th>
                            <th class="p-2">ADVANCE FUNDING</th>
                            <th class="p-2">FOR FUNDING</th>
                            <th class="p-2">BANK CHARGE</th>
                            <th class="p-2">FOR RTGS</th>
                            <th class="p-2">FUND FROM</th>
                            <th class="p-2">ESTIMATED TRANSACTIONS</th>
                            <th class="p-2">REMARKS</th>
                            <th class="p-2">ENDING BALANCE</th>
                        </tr>
                    </thead>
                    <tbody class="overflow-y-auto">
                        <tr class="border-b border-#EAEAEA  divide-x divide-#EAEAEA">
                            <td>ALL BANK (ALL THRIFT BANK) INC.</td>
                            <td>1,000,000.00</td>
                            <td>25</td>
                            <td>500,000.00</td>
                            <td>15.00</td>
                            <td>375.00</td>
                            <td> - </td>
                            <td>500.374.00</td>
                            <td>-</td>
                            <td>500.374.00</td>
                            <td>ALL BANK</td>
                            <td>750,000.00</td>
                            <td> </td>
                            <td>250,000.00</td>
                        </tr>
                        <tr class="border-b border-#EAEAEA divide-x divide-#EAEAEA">
                            <td>ALL BANK (ALL THRIFT BANK) INC.</td>
                            <td>1,000,000.00</td>
                            <td>25</td>
                            <td>500,000.00</td>
                            <td>15.00</td>
                            <td>375.00</td>
                            <td> - </td>
                            <td>500.374.00</td>
                            <td>-</td>
                            <td>500.374.00</td>
                            <td>ALL BANK</td>
                            <td>750,000.00</td>
                            <td> </td>
                            <td>250,000.00</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="flex gap-3">
                <!-- HALF TABLE 1 -->
                <div class="h-full w-1/2 font-rubik-light">
                    <h1 class="text-xs  my-2">TRANSFERS</h1>
                    <table class="h-full border-collapse border border-#EAEAEA w-full text-center text-3xs font-rubik-light">
                        <thead class="sticky top-0 bg-#D9D9D9 divide-x divide-#EAEAEA">
                            <tr class="border-b border-#EAEAEA p-5">
                                <th class="p-2 text-left">FROM BANK</th>
                                <th class="p-2">TO BANK</th>
                                <th class="p-2">AMOUNT</th>
                            </tr>
                        </thead>
                        <tbody class="overflow-y-auto">
                            <tr class="border-b border-#EAEAEA divide-x divide-#EAEAEA">
                                <td> --- </td>
                                <td> --- </td>
                                <td> --- </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- HALF TABLE 2 -->
                <div class="h-full w-1/2 font-rubik-light">
                    <h1 class="text-xs  my-2">TRADING</h1>
                    <table class="h-full border-collapse border border-#EAEAEA w-full text-center text-3xs font-rubik-light">
                        <thead class="sticky top-0 bg-#D9D9D9">
                            <tr class="border-b border-#EAEAEA p-5 divide-x divide-#EAEAEA">
                                <th class="p-2 text-left">COMPANY NAME</th>
                                <th class="p-2">TO BANK</th>
                                <th class="p-2">USD AMOUNT</th>
                                <th class="p-2">RATE</th>
                                <th class="p-2">TOTAL AMOUNT</th>
                            </tr>
                        </thead>
                        <tbody class="overflow-y-auto">
                            <tr class="border-b border-#EAEAEA divide-x divide-#EAEAEA">
                                <td> --- </td>
                                <td> --- </td>
                                <td> --- </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- 3/4 TABLE (ALIGN LEFT) -->
            <div class="h-full w-4/5 font-rubik-light">
                <h1 class="text-xs  my-2">FUNDING WORKSHEET CASH POSITION</h1>
                <table class="h-full border-collapse border border-#EAEAEA w-full text-center text-3xs font-rubik-light">
                    <thead class="sticky top-0 bg-#D9D9D9">
                        <tr class="border-b border-#EAEAEA p-5 divide-x divide-#EAEAEA">
                            <th class="p-2 text-left">BANK</th>
                            <th class="p-2">AVAILABLE BALANCE</th>
                            <th class="p-2">TRANSFERS</th>
                            <th class="p-2">TRADINGS</th>
                            <th class="p-2">RTGS</th>
                            <th class="p-2">ENDING BALANCE</th>
                        </tr>
                    </thead>
                    <tbody class="overflow-y-auto">
                        <tr class="border-b border-#EAEAEA divide-x divide-#EAEAEA">
                            <td> --- </td>
                            <td> --- </td>
                            <td> --- </td>
                            <td> --- </td>
                            <td> --- </td>
                            <td> --- </td>
                        </tr>
                        <tr class="border-b border-#EAEAEA divide-x divide-#EAEAEA">
                            <td> --- </td>
                            <td> --- </td>
                            <td> --- </td>
                            <td> --- </td>
                            <td> --- </td>
                            <td> --- </td>
                        </tr>
                        <tr class="border-b border-#EAEAEA divide-x divide-#EAEAEA">
                            <td> --- </td>
                            <td> --- </td>
                            <td> --- </td>
                            <td> --- </td>
                            <td> --- </td>
                            <td> --- </td>
                        </tr>
                    </tbody>
                </table>
            </div>
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
                <div class="w-auto p-7 bg-#F9951E rounded-md relative">
                    <div class="absolute top-3 right-3 text-white">
                        <XMarkIcon></XMarkIcon>
                    </div>
                    <div class="flex justify-center items-center w-80 h-60 bg-#EAEAEA">
                        <img src="../../../../assets/images/user-logo.png" alt="user-logo" class="w-56 h-56 rounded-full border border-#3E3E3E">
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

