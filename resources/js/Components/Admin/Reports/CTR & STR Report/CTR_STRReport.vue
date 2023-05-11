<script setup>
import NormalButton from "@/Components/Misc/Buttons/NormalButton.vue";
import SearchIcon from "@/Components/Misc/Icons/SearchIcon.vue";
import ListIcon from "@/Components/Misc/Icons/ListIcon.vue";
import DateInput from "@/Components/Misc/Input/DateInput.vue";
</script>

<script>
import FloatingLabelDropdown from '../../../Misc/Input/FloatingLabelDropdown.vue';
import BorderButton from "@/Components/Misc/Buttons/BorderButton.vue";
import Pagination from "@/Components/Misc/Pagination/Pagination.vue";
export default {
    name: 'Payment to Suppliers',
    components: {
        NormalButton, SearchIcon, ListIcon, DateInput, FloatingLabelDropdown,
        BorderButton, Pagination
    },
    data() {
        return {
            CtrStrReport: [],
            pagination: {
                current_page: 1,
            },
            labels:[
                {label:'DATE'},
                {label:'REPORT TYPE'},
                {label:'REFERENCE NO.'},
                {label:'TRANSACTION'},
                {label:'VOLUME'},
                {label:'RATE'},
                {label:'PHP'},
                {label:'TYPE'},
                {label:'SETTLEMENT'},
                {label:'ACCOUNT NO.'},
                {label:'ADDRESS'},
                {label:'MODE'},
                {label:'REG. DATE'},
                {label:'DEAL SLIP NO.'},
            ],
            reportTypeOption:[
                'ALL (CTR & STR REPORT)',
                'CTR - COVERED TRANSACTIONS REPORT',
                'STR - SUSPICIOUS TRANSACTIONS REPORT'
            ]
        }
    },
    methods: {
        async getCtrStrReport() {
            await axios.get(`/api/billers?page=${this.pagination.current_page}`)
                .then((response) => {
                    console.log(response.data);
                  this.CtrStrReport = response.data.data;
                  this.pagination = response.data;
                })
                .catch((errors) => {

                })
        },

        // async getRate(){
        //     await axios.get('/api/rates/cmt/list')
        //         .then((response) => {
        //           this.rates = response.data;
        //         })
        //         .catch((errors) => [
        //         ])
        // },
    },
}
</script>
<template>
    <div class="w-auto  h-screen bg-white">
        <div class="flex flex-col gap-[15px] min-w-full px-3 pt-10 pb-5">
            <div class="flex justify-between items-center w-[98%] mx-[12px]">
                <div class="w-[33.33%]">
                    <FloatingLabelDropdown :inputLabel="'Report Type'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" :options="reportTypeOption" :placeholder="'Select Report type'"/>
                </div>
                <div>
                    <BorderButton :buttonLabel="'FILE NEW STR'" :buttonPadding="'p-2'" :buttonSize="'h-[40px] w-[170px]'"/>
                </div>
            </div>
            <div class="flex justify-between items-end h-auto w-full border-b-2 border-[#EAEAEA] px-[11px] pb-[30px]">
                <div class="flex justify-end flex-col">
                    <div class="flex gap-3 items-end">
                        <div>
                            <DateInput label="Start Date" />
                        </div>
                        <div>
                            <DateInput label="End Date" />
                        </div>
                        <div>
                            <NormalButton label="Filter"
                            class="p-1.5 px-6 uppercase h-[34px] bg-[#3E3E3E] tracking-wider text-[10px] text-white" />
                        </div>
                    </div>
                </div>
                <div class="right-side">
                    <form class="flex items-start gap-3">
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
                        class="p-1.5 px-3 uppercase h-[34px] bg-[#3E3E3E] tracking-wider text-[10px] text-white" />
                    </form>
                </div>
            </div>
        </div>

        <!-- MAIN CONTENT -->
        <div class="flex flex-col h-auto pb-10">
            <div class="flex flex-col justify-between uppercase mb-[30px]">
                <h2 class="text-[16px] text-center font-semibold">OPTIMUM EXCHANGE REMIT INC.</h2>
                <div class="text-center mt-[20px]">
                    <h3 class="text-[13px] font-semibold">CTR & STR REPORT</h3>
                    <p class="text-[12px]">09/28/2022 -  09/28/2022</p>
                </div>
            </div>
            <!-- TABLE -->
            <div class="overflow-hidden w-full px-3">
                <div class="inline-block min-w-full  align-middle ">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 m-2 ">
                        <table class="min-w-full divide-y divide-gray-300 overflow-x-scroll">
                            <thead class="bg-[#D7D7D7] font-medium text-[11px] whitespace-nowrap">
                                <tr class="divide-x divide-gray-200">
                                    <th v-for="label in labels" :key="label.label" scope="col"
                                        class="py-2 px-1 uppercase tracking-wider text-center text-gray-900">
                                        {{ label.label }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white font-light text-[10px]">
                                <tr class="divide-x divide-gray-200">
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        09/28/2022 12:54:26 PM
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        CTR
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        TRD-042222-2
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        Petnet
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        90,000.00
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        52.38
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        4,715,100.00
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        sell
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        banco de oro
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        ft
                                    </td>
                                    <td
                                        class="whitespace-normal text-center uppercase py-2 px-1 tracking-wider">
                                        East office building 114 Aguirre St. Legaspi Village Makati City
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        ft
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        01/01/2001
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        0001-002950
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <Pagination @paginate="getCtrStrReport()" :pagination="pagination"
                    :offset="1" class="mt-8" />
        </div>
    </div>
</template>
