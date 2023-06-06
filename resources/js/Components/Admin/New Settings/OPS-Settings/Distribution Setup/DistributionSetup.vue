<template>
    <div class="bg-white w-full">
        <div class="px-3 py-5">
            <form class="flex justify-between items-top">
                <div class="flex flex-col gap-3 w-auto">
                    <div class="">
                        <CheckboxSelectMenu :label="'Currency'" :inputWidth="'w-full'" :placeholder="'PHP'" :options="currencyOption" />
                    </div>
                    <div class="">
                        <DropDown class="whitespace-nowrap w-full shadow-none" label="Bulk Action" :options="bulkOption"/>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <div class="flex ">
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <SearchIcon />
                            </div>
                            <input type="text" id="simple-search"
                            class="bg-gray-50 h-[34px] border border-r-0 border-[#EAEAEA] text-gray-900 text-[10px] block w-full pl-10 py-1 px-2.5"
                            placeholder="Search" required />
                        </div>
                        <NormalButton label="Go"
                        class="p-1.5 px-3 uppercase h-[34px] bg-[#F9951E] text-[10px] text-white" />
                    </div>
                    <NormalButton label="Export"
                    class="p-1.5 px-3 uppercase h-[34px] bg-[#3E3E3E] tracking-wider text-[10px] text-white" />
                </div>
            </form>
            <!-- TABLE-->
            <div class="min-w-full py-5 align-middle ">
                <div class="relative h-[360px]">
                    <div class="shadow ring-1 ring-black ring-opacity-5 overflow-auto absolute inset-x-0 min-h-auto max-h-full">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-[#D7D7D7] font-medium text-[11px] whitespace-nowrap sticky top-0">
                                <tr class="divide-x divide-gray-200">
                                    <th scope="col"
                                        class="py-1 px-2 uppercase tracking-wider text-center text-gray-900 ">
                                        <div class="flex items-center ">
                                        <input type="checkbox" class="h-3 w-3 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 mr-1" />
                                        TRANSACTION TYPE
                                        </div>
                                    </th >
                                    <th v-for="label in labels" :key="label.label" scope="col"
                                        class="py-1 px-2 uppercase tracking-wider text-center text-gray-900">
                                        {{label.label}}
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white text-[10px]">
                                <tr class="divide-x divide-gray-200">
                                    <td class=" whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                        <div class="flex items-center ">
                                        <input type="checkbox" class="h-3 w-3 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 mr-1" />
                                        CREDIT TO BANK ACCOUNT
                                        </div>
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                        CBA - CREDIT TO BANK ACCOUNT
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                        BANCO DE ORO
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                        <DropdownNoLabel/>
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                        <input type="checkbox" value="">
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                        <input type="checkbox" value="">
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                        09/28/2022 09:17:18 AM
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                        LASCONIA, ELIOMAR DE ASIS
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                        LASCONIA, ELIOMAR DE ASIS
                                    </td>
                                    <td class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                        <div class="flex justify-center">
                                            <button>
                                                <img src="../../../../../../assets/images/EditIconTwo.png" alt="Edit Icon" class="h-5 w-6">
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
        <div class="py-6">
            <Pagination @paginate="getPHP()" :pagination="pagination"
            :offset="1" class = ""/>
        </div>
        </div>
    </div>
</template>

<script setup>
import SearchIcon from '../../../../Misc/Icons/SearchIcon.vue';
</script>

<script>

import CheckboxSelectMenu from '../../../../Misc/Select Menu/CheckboxSelectMenu.vue'
import DropDown from '@/Components/Misc/Dropdown/Dropdown.vue';
import NormalButton from "@/Components/Misc/Buttons/NormalButton.vue";

export default {
    components:{
        CheckboxSelectMenu,
        DropDown,
        NormalButton,
    },

    data() {
        return {
            bulkOption:[
                {label:'Update Provider',value:'Update Provider'},
                {label:'Update Channel',value:'Update Channel'},
            ],
            currencyOption:[
                {name:'PHP',value:'PHP'},
                {name:'USD',value:'USD'},
                {name:'EUR',value:'EUR'},
            ],
            labels:[
                {label:'BANK/BILLER'},
                {label:'CURRENCY'},
                {label:'AMOUNT FROM'},
                {label:'AMOUNT TO'},
                {label:'PROVIDER'},
                {label:'CHANNEL'},
                {label:'LAST DATE UPDATED'},
                {label:'UPDATED BY'},
                {label:'ACTIONS'},

            ],


        }
    },
}
</script>
