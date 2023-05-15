<script>
import DateInput from '@/Components/Misc/Input/DateInput.vue';
import NormalButton from '@/Components/Misc/Buttons/NormalButton.vue';
import SearchIcon from '@/Components/Misc/Icons/SearchIcon.vue';
import SolidButton from '../../../Misc/Buttons/SolidButton.vue';
import BorderButton from '../../../Misc/Buttons/BorderButton.vue';


export default{
    components:{
        DateInput,
        NormalButton,
        SearchIcon,
        SolidButton,
        BorderButton,
    },

    data() {
        return {
            labels:[
                {label:'TRANSACTION DATE'},
                {label:'ADJUSTMENT REFERENCE NO.'},
                {label:'ENTRY'},
                {label:'DESCRIPTION'},
                {label:'DEBIT'},
                {label:'CREDIT'},
            ]
        }
    },

}

</script>
<template>
    <div class="h-auto w-full bg-white">
        <div class=" px-8 pt-5">
            <div class="flex justify-between">
                <div class="flex justify-start flex-col ">
                    <div class="flex items-end gap-3">
                        <div>
                            <DateInput label="Start Date" />
                        </div>
                        <div>
                            <DateInput label="End Date" />
                        </div>
                        <div>
                            <NormalButton label="Filter"
                            class="p-1.5 px-3 uppercase h-[34px] bg-[#3E3E3E] tracking-wider text-[10px]  text-white" />
                        </div>
                    </div>
                </div>
                <div class="right-side flex ">
                    <form class="flex items-start gap-3">
                        <div class="flex">
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <SearchIcon />
                                </div>
                                <input type="text" id="simple-search"
                                class="bg-gray-50 h-[34px] border border-r-0 border-[#EAEAEA] text-gray-900 font-light text-[10px] block w-full pl-10 py-2 px-1.5"
                                placeholder="Search" required />
                            </div>
                            <NormalButton label="Go"
                            class="p-1.5 px-3 uppercase h-[34px] bg-[#F9951E] text-[10px]  text-white" />
                        </div>
                        <NormalButton label="Export"
                        class="p-1.5 px-3 uppercase h-[34px] bg-[#3E3E3E] tracking-wider text-[10px]  text-white" />
                    </form>
                </div>
            </div>
            <!-- Break -->
            <div class="border-3 border-[#EAEAEA] h-[3px] bg-[#EAEAEA] my-3 "/>

            <div class="min-w-full py-2 align-middle ">
                <div class="relative h-[360px]">
                    <div class="shadow ring-1 ring-black ring-opacity-5 overflow-auto absolute inset-x-0 min-h-auto max-h-full">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-[#D7D7D7] font-medium text-[11px] whitespace-nowrap sticky top-0">
                                <tr class="divide-x divide-gray-200 ">
                                    <th v-for="label in labels" :key="label.label" scope="col" class="px-3 py-1">
                                        {{label.label}}
                                    </th>
                                </tr>
                            </thead>
                            <tbody class=" text-[10px] font-light text-center text-#3E3E3E whitespace-nowrap">
                                <tr class="divide-x divide-gray-200">
                                    <td>
                                        09/28/2022 11:20:01 am
                                    </td>
                                    <td>
                                        ADJ000000001
                                    </td>
                                    <td>
                                        AR - FUNDING PAY ANYWHERE
                                    </td>
                                    <td class="text-justify px-3 whitespace-normal">
                                        Adjustment entry for reference number EKTE-0100 amounting to Php 25,000.13 dated September 27, 2022.
                                    </td>
                                    <td>
                                        25,000.13
                                    </td>
                                    <td>
                                        0.00
                                    </td>
                                </tr>
                                <tr class="divide-x divide-gray-200">
                                    <td>
                                        09/28/2022 11:20:01 am
                                    </td>
                                    <td>
                                        ADJ000000001
                                    </td>
                                    <td>
                                        AR - FUNDING PAY ANYWHERE
                                    </td>
                                    <td class="text-justify px-3 whitespace-normal">
                                        Adjustment entry for reference number EKTE-0100 amounting to Php 25,000.13 dated September 27, 2022.
                                    </td>
                                    <td>
                                        25,000.13
                                    </td>
                                    <td>
                                        0.00
                                    </td>
                                </tr>
                                <tr class="divide-x divide-gray-200">
                                    <td>
                                        09/28/2022 11:20:01 am
                                    </td>
                                    <td>
                                        ADJ000000001
                                    </td>
                                    <td>
                                        AR - FUNDING PAY ANYWHERE
                                    </td>
                                    <td class="text-justify px-3 whitespace-normal">
                                        Adjustment entry for reference number EKTE-0100 amounting to Php 25,000.13 dated September 27, 2022.
                                    </td>
                                    <td>
                                        25,000.13
                                    </td>
                                    <td>
                                        0.00
                                    </td>
                                </tr>
                                <tr class="divide-x divide-gray-200">
                                    <td>
                                        09/28/2022 11:20:01 am
                                    </td>
                                    <td>
                                        ADJ000000001
                                    </td>
                                    <td>
                                        AR - FUNDING PAY ANYWHERE
                                    </td>
                                    <td class="text-justify px-3 whitespace-normal">
                                        Adjustment entry for reference number EKTE-0100 amounting to Php 25,000.13 dated September 27, 2022.
                                    </td>
                                    <td>
                                        25,000.13
                                    </td>
                                    <td>
                                        0.00
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot class="text-[11px] font-light text-center text-#3E3E3E bg-[#EAEAEA] border border-[#D7D7D7]">
                                <tr>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td class="text-right px-3">
                                        Total
                                    </td>
                                    <td>
                                        25,000.13
                                    </td>
                                    <td>
                                        25,000.13
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="flex justify-center my-10">
                <router-link to="/app/status-reversal/adjustment-entry">
                    <BorderButton :buttonLabel="'back'" :buttonBorderColor="'border-#3E3E3E'" :buttonTextColor="'text-#3E3E3E'" :buttonHover="'hover:bg-#3E3E3E'"/>
                </router-link>
            </div>
        </div>
    </div>
</template>
