<template>
    <div class="bg-white w-full">
        <div class="px-3 py-5">
            <form class="flex justify-between items-top">
                <div class="flex flex-col gap-3 w-[35%]">
                    <div class="w-[50%]">
                        <CheckboxSelectMenu :label="'Currency'" :inputWidth="'w-full'" :placeholder="'PHP'" :options="currencyOption" />
                    </div>
                    <div class="flex gap-[5px] w-full">
                        <div class="w-[50%]">
                            <CheckboxSelectMenu v-model="bulkSelected"  :inputWidth="'w-full'" :placeholder="'Bulk Action'" :options="bulkOption" />
                        </div>
                        <div v-if="this.bulkSelected" class="flex items-end gap-[5px] w-[50%] ">
                            <div  class="w-[90%]">
                                <CheckboxSelectMenu
                                :label="this.bulkSelected.value === 'Update Provider' ? 'Provider' : 'Channel'" :inputWidth="'w-full'"
                                :placeholder="this.bulkSelected.value  === 'Update Provider' ? 'Select Provider' : 'Select Channel'"
                                :options="this.bulkSelected.value  === 'Update Provider' ? providerOption : channelOption" />
                            </div>
                            <NormalButton label="Apply"
                            class="py-1.5 px-3 uppercase h-7 bg-[#F9951E] text-[10px] text-white"/>
                        </div>
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
                                    <th scope="col"
                                        class="py-1 px-2 uppercase tracking-wider text-center text-gray-900 ">
                                        <div class="flex items-center ">
                                        <input type="checkbox" class="h-3 w-3 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 mr-1" />
                                        TRANSACTION TYPE
                                        </div>
                                    </th >
                                    <th v-for="label in labels" :key="label.label" scope="col"
                                        class=" py-1 px-2 uppercase tracking-wider text-center text-gray-900">
                                        {{label.label}}
                                    </th>
                                    <th scope="col"
                                        class="py-1 px-5 uppercase tracking-wider text-center text-gray-900 w-full  ">
                                        Action
                                    </th >
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
                                        BANCO DE ORO
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                        PHP
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                        0.00
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                        50,000.00
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                        <div v-show="!isUpdate">
                                            BDO Unibank, Inc.
                                        </div>
                                        <div v-show="isUpdate">
                                            <CheckboxSelectMenu :inputWidth="'w-full'" :placeholder="'Select Provider'" :options="providerOption" />
                                        </div>
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                        <div v-show="!isUpdate">
                                            INSTAPAY
                                        </div>
                                        <div v-show="isUpdate">
                                            <CheckboxSelectMenu :inputWidth="'w-full'" :placeholder="'Channel'" :options="channelOption" />
                                        </div>

                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                        09/30/2022 09:17:08 AM
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                        seneta, gerahcel de castro
                                    </td>
                                    <td class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                        <div class="flex justify-center gap-1">
                                            <SwitchToggle
                                                :status="true"
                                                :isChecked="true"
                                            />
                                            <button v-show="!isUpdate" @click="(isUpdate = true)" class="tooltip tooltip-left" data-tip="Edit">
                                                <ResetIcon/>
                                            </button>
                                            <button v-show="isUpdate" @click="(isUpdate = false)" class="tooltip tooltip-left" data-tip="Verify">
                                                <img src="../../../../../../assets/images/VerifyIcon.png" alt="Verify Icon" class="h-5 w-5">
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <div class="py-6">
            <Pagination @paginate="getOPSDistributionSetup()" :pagination="pagination"
            :offset="1" class = ""/>
        </div>
        </div>
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

export default {
    components:{
        CheckboxSelectMenu,
        DropDown,
        NormalButton,
        SwitchToggle,
        ResetIcon,
        Pagination
    },

    data() {
        return {
            OPSDistributionSetup: [],
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
                {label:'BANK/BILLER'},
                {label:'CURRENCY'},
                {label:'AMOUNT FROM'},
                {label:'AMOUNT TO'},
                {label:'PROVIDER'},
                {label:'CHANNEL'},
                {label:'LAST DATE UPDATED'},
                {label:'UPDATED BY'},
            ],
            providerOption:[
                {label: 'AllBank (A Thrift Bank), Inc', value: 'AllBank (A Thrift Bank), Inc'},
                {label: 'Asia United Bank Corporation', value: 'Asia United Bank Corporation'},
                {label: 'Bank of Commerce', value: 'Bank of Commerce'},
                {label: 'Bank of the Philippine Islands', value: 'Bank of the Philippine Islands'},
                {label: 'BDO Unibank Inc.', value: 'BDO Unibank Inc.'},
                {label: 'China Banking Corporation', value: 'China Banking Corporation'},
                {label: 'Land Bank of the Philippines', value: 'Land Bank of the Philippines'},
                {label: 'Philippine National Bank', value: 'Philippine National Bank'},
                {label: 'Robinsons Bank Corporation', value: 'Robinsons Bank Corporation'},
                {label: 'Security Bank Corporation', value: 'Security Bank Corporation'},
            ],
            channelOption:[
                {label: 'Instapay', value: 'Instapay'},
                {label: 'Pesonet', value: 'Pesonet'},
                {label: 'Own Account', value: 'Own Account'},
            ],
            isUpdate: false,
            bulkSelected: ''

        }
    },
    methods: {
        async getOPSDistributionSetup() {
            await axios.get(`/api/billers?page=${this.pagination.current_page}`)
                .then((response) => {
                    console.log(response.data);
                  this.OPSDistributionSetup = response.data.data;
                  this.pagination = response.data;
                })
                .catch((errors) => {

                })
        },
    },
}
</script>
