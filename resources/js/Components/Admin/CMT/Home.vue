<script setup>

import ChevRightIcon from "@/Components/Misc/Icons/ChevRightIcon.vue";
import UserIcon from "@/Components/Misc/Icons/UserIcon.vue";

</script>

<script>
import {defineComponent} from "vue";
import SmallHeading from "@/Components/Misc/Heading/SmallHeading.vue";

export default defineComponent({
    components: {
        SmallHeading, 
    },
    data(){
        return{
            isOpen: true,
        }   
    },
    methods: {
        openCommittedRate(){
            this.isOpen = !this.isOpen;
        },
    }
})
</script>
<template>
    <div class="container h-screen p-3 bg-white">
        <div class="font-rubik-light">
            <p class="text-base font-bold">COMMITED RATE AS OF: <br>
               <span class="text-sm">SEPTEMBER 28,2022 08:00:00 AM</span> 
            </p>
        </div>
        <div class="grid grid-cols-6 gap-0 mt-3 pb-5 border-b-2 border-solid border-#EAEAEA">
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
                <h3 class="text-xl font-bold">50.00</h3>
                <p class="text-1sm text-center mt-2 font-medium">REDHA AL ANSARI EXCHANGE</p>
                <p class="text-2sm font-thin">Last update: 09/28/2022 8:00:00 AM</p>
            </div>
            <div class="h-24 w-44 py-4 px-1 border-l-2 border-b-2 border-#EAEAEA text-center text-black">
                <img src="../../../assets/images/usd_to_php_graph.png" />
                <!-- <img src="resources/assets/images/usd_to_php_graph.png" alt="sample"> -->
                <p class="text-sm">USD to PHP</p>
            </div>
        </div>
        <div class="flex justify-between w-full h-4/6 my-5">
            <div class="h-full overflow-y-auto">
                <table class="h-full border-collapse border-2 border-#EAEAEA w-80 text-center">
                    <thead>
                        <tr>
                            <th class="bg-#3E3E3E text-white text-sm text-bold" colspan="2">BANK BALANCES</th>
                        </tr>
                        <tr>
                            <th class="bg-#D9D9D9 font-extralight text-sm">BANKS</th>
                            <th class="bg-#D9D9D9 font-extralight text-sm w-24">AMOUNT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td  class="border-solid border-l-2 border-#EAEAEA"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="h-full overflow-y-auto">
                <table class="h-full border-collapse border-2 border-#EAEAEA w-80 text-center overflow-auto">
                    <thead>
                        <tr>
                            <th class="bg-#3E3E3E text-white text-sm text-bold" colspan="2">TIE-UPS FUNDS</th>
                        </tr>
                        <tr>
                            <th class="bg-#D9D9D9 font-extralight text-sm">TIE-UPS</th>
                            <th class="bg-#D9D9D9 font-extralight text-sm w-24">AMOUNT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td class="border-solid border-l-2 border-#EAEAEA"></td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="h-full overflow-y-auto">
                <table class="h-full border-collapse border-2 border-#EAEAEA w-80 text-center sticky top-0 left-0">
                    <thead>
                        <tr>
                            <th class="bg-#3E3E3E text-white text-sm text-bold" colspan="2">BANK & PROVIDERS FUNDS</th>
                        </tr>
                        <tr>
                            <th class="bg-#D9D9D9 font-extralight text-sm">BANKS & PROVIDERS</th>
                            <th class="bg-#D9D9D9 font-extralight text-sm w-24">AMOUNT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td class="border-solid border-l-2 border-#EAEAEA"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <SmallHeading :isOpen="isOpen" label="FUNDING WORKSPACE" class="bg-#EE3E2C" :icon="ChevRightIcon" @clicked="openCommittedRate()" />
    <Transition name="slide-fade" >
        <div class="container h-screen bg-white" v-if="!isOpen">
            <h1>HELLO!</h1>
        </div>
    </Transition>

    <!-- SLIDEOVER -->
    <div class="container flex flex-col justify-between fixed top-0 right-0 h-screen w-1/3 bg-white z-10 py-10">
        <div class="slide-title flex justify-center items-center relative h-14 text-white">
            <div class="absolute left-5">
                <UserIcon></UserIcon>
            </div>
            <h2 class="text-xl">PROFILE</h2>
        </div>
        <div class="input-area py-5 mx-10">
            <div class="profile-upload flex justify-evenly items-center">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSIVjgXETMVBozgM1apBTmVROTQnz9zgJh8d8k6PpY&s" alt="user-logo" class="w-36 h-36 rounded-full">
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
            <button type="button" class="py-1 px-5 text-xl font-medium border-2 border-black">CLOSE</button>
        </div>
    </div>

</template>