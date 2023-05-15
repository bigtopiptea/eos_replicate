<script setup>
import SearchIcon from "@/Components/Misc/Icons/SearchIcon.vue";
import CirclePlusIcon from "@/Components/Misc/Icons/CirclePlusIcon.vue";
import DateInput from "@/Components/Misc/Input/DateInput.vue";
</script>

<script>
import FloatingLabelDropdown from '../../../Misc/Input/FloatingLabelDropdown.vue';
import FloatingLabelInput from '../../../Misc/Input/FloatingLabelInput.vue';
import SmallLabelInput from '../../../Misc/Input/SmallLabelInput.vue';
import BorderButton from "@/Components/Misc/Buttons/BorderButton.vue";
import NormalButton from "@/Components/Misc/Buttons/NormalButton.vue";
import DropDown from '../../../Misc/Dropdown/Dropdown.vue';
import Slideover from '../../../Misc/Slideover/Slideover.vue';
import SolidButton from "../../../Misc/Buttons/SolidButton.vue";
import SwitchToggle from "@/Components/Misc/Switch(Toggle)/SwitchToggle.vue";
import CheckboxSelectMenu from '@/Components/Misc/Select Menu/CheckboxSelectMenu.vue';

export default {
    name: 'Signatories',
    components: {
        NormalButton, SearchIcon, CirclePlusIcon, DateInput, 
        FloatingLabelDropdown, FloatingLabelInput, SmallLabelInput,
        BorderButton, DropDown, Slideover, SolidButton, SwitchToggle,
        CheckboxSelectMenu
    },
    data() {
        return {
            labels:[
                {label:'SIGNATORY NAME'},
                {label:'DESIGNATION'},
                {label:'SIGNATORY TYPE'},
                {label:'DATE ADDED'},
                {label:'ADDED BY'},
                {label:'ACTIONS'},
            ],
            designOptions: [
                {name: 'BUSINESS DEVELOPMENT HEAD'},
                {name: 'ACCOUNTING HEAD'},
                {name: 'COO'},
            ],
            signatoryType: [
                {name: 'SET A'},
                {name: 'SET B'},
                {name: 'SET C'},
            ],
            addNewSignatoryOpen: false,
            paraIcon:'PLUS', //Icon Parameter

        }
    },
    methods: {
        // Slider
        addNewSignatoryToggle(){
            this.addNewSignatoryOpen = false;
        },
    },
}
</script>
<template>
    <div class="h-screen w-full bg-white">
        <div class="flex flex-col min-w-full pt-7 pb-5 px-[25px]">
            <div class="flex justify-between items-center">
                <div class="flex w-[40%]">
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
                <div>
                    <BorderButton :buttonLabel="'ADD NEW'" :buttonPadding="'p-2'" :buttonSize="'h-auto w-[120px]'" :buttonStyle="'border-2 border-#F9951E text-#F9951E text-[13px]'" @click="(addNewSignatoryOpen = !addNewSignatoryOpen)"/>
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
                                    asis, ginalyn Ibarra
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    accounting head
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    set b
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    09/28/2022 10:38:20 AM
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    banaria, jeffrey clidorio
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    <div class="flex justify-center">
                                        <button>
                                            <img src="../../../../../assets/images/EditIconTwo.png" alt="Edit Icon" class="h-5 w-6">
                                        </button>
                                        <SwitchToggle
                                            :status="true"
                                            :isChecked="true"
                                        />
                                    </div>
                                </td>
                            </tr>
                            <tr class="divide-x divide-gray-200">
                                <td class=" whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    <div class="flex justify-center items-center gap-2">
                                        <input type="checkbox" name="" id="">
                                        <a class="underline text-cyan-500" href="#">
                                            02
                                        </a>
                                    </div>
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    asis, ginalyn Ibarra
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    accounting head
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    set b
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    09/28/2022 10:38:20 AM
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    banaria, jeffrey clidorio
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    <div class="flex justify-center">
                                        <button>
                                            <img src="../../../../../assets/images/EditIconTwo.png" alt="Edit Icon" class="h-5 w-6">
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

    <Slideover :show="addNewSignatoryOpen" @close="addNewSignatoryToggle" :title="'ADD NEW SIGNATORY'" :iconShow="paraIcon">
        <div class="flex flex-col justify-between h-full pb-[20px]">
            <div class="flex flex-col gap-[15px] m-10">
                <div class="flex flex-col gap-[15px]">
                    <div class="flex gap-[10px] w-full">
                        <div class="w-[70%]">
                            <FloatingLabelInput :inputLabel="'last name'"  :inputWidth="'w-12/12'"/>
                        </div>
                        <div class="w-[30%]">
                            <FloatingLabelInput :inputLabel="'suffix'"  :inputWidth="'w-12/12'" :placeholder="'-'"/>
                        </div>
                    </div>
                    <div class="w-full"> 
                        <FloatingLabelInput :inputLabel="'first name'"  :inputWidth="'w-12/12'"/>
                    </div>
                    <div class="w-full"> 
                        <FloatingLabelInput :inputLabel="'middle name'"  :inputWidth="'w-12/12'"/>
                    </div>
                </div>
                <div> 
                    <SmallLabelInput :inputLabel="'signatory name'"  :inputWidth="'w-12/12'" :isDisabled="true"/>
                </div>
                <div> 
                    <CheckboxSelectMenu :label="'designation'" :placeholder="'select designation'"  :inputWidth="'w-12/12'" :options="designOptions"/>
                </div>
                <div> 
                    <CheckboxSelectMenu :label="'signatory type'" :placeholder="'Select Signatory type'" :inputWidth="'w-12/12'" :options="signatoryType"/>
                </div>
            </div>
            <div class="flex justify-center gap-[100px] border-black">
                <BorderButton @click="(addNewSignatoryOpen = !addNewSignatoryOpen)" :buttonLabel="'CANCEL'" :buttonPadding="'py-2'" :buttonTextColor="'text-[#3e3e3e]'" :buttonBorderColor="'border-[#3e3e3e]'" :buttonHover="'hover:bg-[#3E3E3E]'" :buttonTextSize="'text-[15px]'"/>
                <BorderButton :buttonLabel="'SAVE'" :buttonPadding="'py-2'" :buttonTextSize="'text-[15px]'"/>
            </div>
        </div>
    </Slideover>
</template>