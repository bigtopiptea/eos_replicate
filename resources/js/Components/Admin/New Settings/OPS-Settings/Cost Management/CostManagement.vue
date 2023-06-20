<template>
    <div class="bg-white w-full">
        <div class="px-3 py-5">
            <form class="flex justify-between items-top">
                <div class="flex items-end gap-3 w-[40%]">
                    <div class="w-[50%]">
                        <CheckboxSelectMenu :label="'Currency'" :inputWidth="'w-full'" :placeholder="'PHP'" :options="currencyOption" />
                    </div>
                    <div class="w-[50%]">
                        <AdvanceSettingsSelectMenu :inputWidth="'w-12/12'" :options="advanceSettings" :withCheckbox="true"/>
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
            <div class="min-w-full py-2 align-middle ">
                <div class="relative h-[360px]">
                    <div class="shadow ring-1 ring-black ring-opacity-5 overflow-auto absolute inset-x-0 min-h-auto max-h-full">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-[#D7D7D7] font-medium text-[11px] whitespace-nowrap sticky top-0">
                                <tr class="divide-x divide-gray-200">
                                    <th v-for="label in labels" :key='label.label' scope="col"
                                        class=" py-1 px-2 uppercase tracking-wider text-center text-gray-900">
                                        {{label.label}}
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white text-[10px]">
                                <tr class="divide-x divide-gray-200">
                                    <td class=" whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                        1
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                        AllBank (A Thrift Bank), Inc.
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                        AllBank (A Thrift Bank), Inc.
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                        984082461
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                        Fixed Amount
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                        0.00
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                        1.00
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                        1,000,000.00

                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                        BANARIA, JEFFREY CLIDORIO
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                        BANARIA, JEFFREY CLIDORIO
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <div class="py-6">
            <Pagination @paginate="getOPSCostManagement()" :pagination="pagination"
            :offset="1" class = ""/>
        </div>
        </div>
    </div>
    <div>
  </div>
</template>

<script setup>
import SearchIcon from '@/Components/Misc/Icons/SearchIcon.vue';
import ResetIcon from '@/Components/Misc/Icons/ResetIcon.vue';
</script>

<script>

import CheckboxSelectMenu from '@/Components/Misc/Select Menu/CheckboxSelectMenu.vue'
import DropDown from '@/Components/Misc/Dropdown/Dropdown.vue';
import NormalButton from "@/Components/Misc/Buttons/NormalButton.vue";
import SwitchToggle from '@/Components/Misc/Switch(Toggle)/SwitchToggle.vue';
import Pagination from '@/Components/Misc/Pagination/Pagination.vue';
import AdvanceSettingsSelectMenu from '@/Components/Misc/Select Menu/AdvanceSettingsSelectMenu.vue';
export default {
    components:{
        CheckboxSelectMenu,
        DropDown,
        NormalButton,
        SwitchToggle,
        ResetIcon,
        Pagination,
        AdvanceSettingsSelectMenu
    },

    data() {
        return {
            OPSCostManagement: [],
            pagination: {
                current_page: 1,
            },
            bulkOption:[
                {label:'Update Provider',value:'Update Provider'},
                {label:'Update Channel',value:'Update Channel'},
            ],
            currencyOption:[
                {label:'PHP',value:'PHP'},
                {label:'USD',value:'USD'},
                {label:'EUR',value:'EUR'},
            ],
            labels:[
                {label:'ID'},
                {label:'PROVIDER'},
                {label:'BANK'},
                {label:'ACCOUNT NO.'},
                {label:'TYPE OF FEE'},
                {label:'TRANSACTION COST'},
                {label:'AMOUNT FROM'},
                {label:'AMOUNT TO'},
                {label:'DATE ADDED'},
                {label:'ADDED BY'},
            ],
            advanceSettings:[
                {checked: false, label:'ID'},
                {checked: false, label:'PROVIDER NAME'},
                {checked: false, label:'BANK'},
                {checked: false, label:'ACCOUNT NO.'},
                {checked: false, label:'CURRENCY'},
                {checked: false, label:'COMPLETE ADDRESS'},
                {checked: false, label:'ACCOUNT OFFICER'},
                {checked: false, label:'DESTINATION'},
                {checked: false, label:'FAX. NO.'},
                {checked: false, label:'CONTACT NO.'},
                {checked: false, label:'TYPE OF FEE'},
                {checked: false, label:'TRANSACTION COST'},
                {checked: false, label:'AMOUNT FROM'},
                {checked: false, label:'AMOUNT TO'},
                {checked: false, label:'DATE ADDED'},
                {checked: false, label:'ADDED BY'},
            ],

        }
    },
    methods: {
        async getOPSCostManagement() {
            await axios.get(`/api/billers?page=${this.pagination.current_page}`)
                .then((response) => {
                    console.log(response.data);
                  this.OPSCostManagement = response.data.data;
                  this.pagination = response.data;
                })
                .catch((errors) => {

                })
        },
    },
}
</script>
