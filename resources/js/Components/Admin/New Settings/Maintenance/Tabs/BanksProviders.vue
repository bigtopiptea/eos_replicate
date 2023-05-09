<script setup>
import SearchIcon from "@/Components/Misc/Icons/SearchIcon.vue";
import DateInput from "@/Components/Misc/Input/DateInput.vue";
</script>

<script>
import FloatingLabelDropdown from '@/Components/Misc/Input/FloatingLabelDropdown.vue';
import FloatingTextArea from "../../../../Misc/Input/FloatingTextArea.vue";
import SmallLabelInput from '@/Components/Misc/Input/SmallLabelInput.vue';
import NormalButton from "@/Components/Misc/Buttons/NormalButton.vue";
import DropDown from '@/Components/Misc/Dropdown/Dropdown.vue';
import Slideover from '@/Components/Misc/Slideover/Slideover.vue';
import SolidButton from "@/Components/Misc/Buttons/SolidButton.vue";
import SwitchToggle from "@/Components/Misc/Switch(Toggle)/SwitchToggle.vue";

export default {
    name: 'Maintenance - Banks/Providers',
    components: {
        NormalButton, SearchIcon, DateInput, FloatingLabelDropdown, 
        FloatingTextArea, SmallLabelInput, DropDown, Slideover, 
        SolidButton, SwitchToggle
    },
    data() {
        return {
            labels:[
                {label:'BANKS/PROVIDERS'},
                {label:'REASON'},
                {label:'DATE MODIFIED'},
                {label:'MODIFIED BY'},
                {label:'ACTIONS'},
            ],
            holdOpen: false,
            paraIcon:'HOLD', //Icon Parameter
            isHold: false,
            isLiftHold: false,

        }
    },
    methods: {
        // Slider
        holdToggle(){
            this.holdOpen = false;
            isHold = false;
        },

    },
}
</script>
<template>
    <div class="h-screen w-full bg-white">
        <div class="flex flex-col min-w-full pt-7 pb-5 px-[25px]">
            <div class="flex justify-end items-center ">
                <div class="flex w-[35%]">
                    <div class="w-full">
                        <form class="flex items-start">
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <SearchIcon />
                                </div>
                                <input type="text" id="simple-search"
                                    class="bg-gray-50 h-[34px] border border-r-0 border-[#EAEAEA] text-gray-900 text-[10px] block w-full pl-10 py-2 px-1.5"
                                    placeholder="Search" required />
                            </div>
                            <NormalButton label="Go"
                            class="p-1.5 px-3 uppercase h-[34px] bg-[#F9951E] text-[10px] text-white" />
                            <NormalButton label="Export"
                            class="p-1.5 px-3 uppercase h-[34px] bg-[#3E3E3E] ml-4 tracking-wider text-[10px] text-white" />
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- TABLE-->
        <div class="overflow-hidden px-[25px]">
            <div class="inline-block min-w-full py-2 align-middle">
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-[#D7D7D7] font-medium text-[11px] whitespace-nowrap">
                            <tr class="divide-x divide-gray-200">
                                <th scope="col"
                                    class="flex justify-center items-center py-2 px-1 uppercase tracking-wider text-center text-gray-900 gap-2">
                                    <input type="checkbox" name="" id="">
                                    <span>
                                        ID
                                    </span>
                                </th>
                                <th v-for="label in labels" :key="label.label" scope="col"
                                    class="py-2 px-4 uppercase tracking-wider text-center text-gray-900">
                                    {{label.label}}
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white text-[10px]">
                            <tr class="divide-x divide-gray-200">
                                <td class=" whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    <div class="flex justify-center items-center gap-2">
                                        <input type="checkbox" name="" id="">
                                        <a class="underline text-cyan-500" href="#">
                                            01
                                        </a>
                                    </div>
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    Redha Al Ansari Exchange
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    <div class="flex justify-center gap-[5px]">
                                        <button @click="(holdOpen = !holdOpen), (isHold = !isHold)">
                                            <img src="../../../../../../assets/images/HoldIcon.png" alt="Hold Icon" class="h-5 w-5">
                                        </button>
                                        <button @click="(holdOpen = !holdOpen), (isLiftHold = !isLiftHold)">
                                            <img src="../../../../../../assets/images/LiftHoldIcon.png" alt="Hold Icon" class="h-5 w-5">
                                        </button>
                                        <SwitchToggle
                                            :status="true"
                                            :isChecked="true"
                                        />
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <Slideover :show="holdOpen" @close="holdToggle" :title="isHold ? 'HOLD' : 'LIFT HOLD'" :iconShow="isHold ? 'HOLD' : 'LIFT'">
        <div class="flex flex-col justify-between h-full pb-[20px]">
            <div class="flex flex-col gap-[15px] m-10">
                <div> 
                    <FloatingLabelDropdown :inputLabel="'banks/providers'" :inputColor="'bg-white'"  :inputWidth="'w-12/12'"/>
                </div>
                <div> 
                    <FloatingLabelDropdown :inputLabel="'reason'" :inputColor="'bg-white'"  :inputWidth="'w-12/12'"/>
                </div>
                <div>
                    <FloatingTextArea :label="'REMARKS'"/>
                </div>
            </div>
            <div class="flex flex-col gap-[80px]">
                <div v-if="isHold === true" class="text-center text-[14px] uppercase whitespace-normal leading-[30px] mx-[80px]">
                    <p>
                        ARE YOU SURE YOU WANT TO PROCEED? <br>
                        DISTRIBUTION OF TRANSACTION <br>
                        WILL BE PUT <span class="font-semibold">ON-HOLD.</span><br>
                        CLICK ‘CONFIRM’ TO PROCEED.
                    </p>
                </div>
                <div v-else class="text-center text-[14px] uppercase whitespace-normal leading-[30px] mx-[50px]">
                    <p>
                        ARE YOU SURE YOU WANT TO PROCEED?<br>
                        ONCE <span class="font-semibold">HOLD HAS BEEN LIFTED,</span><br> 
                        PENDING TRANSACTIONS WILL BE DISTRIBUTED.<br>
                        CLICK ‘CONFIRM’ TO PROCEED.
                    </p>
                </div>
                <div class="flex justify-center gap-[100px] pb-[20px">
                    <SolidButton @click="(addNewSignatoryOpen = !addNewSignatoryOpen)" :buttonLabel="'CANCEL'" :buttonTextSize="'text-[15px]'"/>
                    <SolidButton :buttonLabel="'SAVE'" :buttonTextSize="'text-[15px]'" :buttonStyle="'bg-[#F9951E]'"/>
                </div>
            </div>
        </div>
    </Slideover>
</template>