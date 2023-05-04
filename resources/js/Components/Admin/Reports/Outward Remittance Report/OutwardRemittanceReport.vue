<script setup>
import NormalButton from "@/Components/Misc/Buttons/NormalButton.vue";
import SearchIcon from "@/Components/Misc/Icons/SearchIcon.vue";
import ListIcon from "@/Components/Misc/Icons/ListIcon.vue";
import DateInput from "@/Components/Misc/Input/DateInput.vue";
</script>

<script>
import FloatingLabelDropdown from '../../../Misc/Input/FloatingLabelDropdown.vue';
import Pagination from "@/Components/Misc/Pagination/Pagination.vue";
export default {
    name: 'Revenue Report',
    components: {
        NormalButton, SearchIcon, ListIcon, DateInput, FloatingLabelDropdown,
        Pagination
    },
    data() {
        return {
            OutwardRemittance: [],
            pagination: {
                current_page: 1,
            },
            labels:[
                {label:'TRANSACTION DATE'},
                {label:'REFERENCE NO.'},
                {label:'REMITTER BANK'},
                {label:'ACCOUNT NO.'},
                {label:'REMITTER NAME'},
                {label:'ACCOUNT'},
                {label:'RATE'},
                {label:'PHP'},
                {label:'BENEFICIARY BANK'},
                {label:'BENEFICIARY NAME'},
                {label:'ACCOUNT NAME'},
                {label:'COUNTRY'},
                {label:'PURPOSE'},
                {label:'NATURE OF BUSINESS/WORK'},
                {label:'DATE OF INCORPORATION'},
            ],
            remitterOptions:[
                'SELECT ALL',
                'Dusit Hospitality Education Phils In',
                'Multi - Line Building SystemALLBANK INC',
                'Prime Asset Ventures INC',
                'TKH Marketing',
                'The Lift Company Phils',
                'vertex entertainment and resorts corp',
            ]
        }
    },
    methods: {
        async getOutwardRemittance() {
            await axios.get(`/api/billers?page=${this.pagination.current_page}`)
                .then((response) => {
                    console.log(response.data);
                  this.OutwardRemittance = response.data.data;
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
    <div class="3xl:container h-screen bg-white">
        <div class="flex flex-col gap-[15px] min-w-full px-5 pt-10 pb-5">
            <div class="flex gap-[10px] w-[85%] mx-[12px]">
                <div class="w-[23.5%]">
                    <FloatingLabelDropdown :inputLabel="'remitter'" :inputWidth="'w-12/12'" :inputColor="'bg-white'" :options="remitterOptions"/>
                </div>
                <div class="w-[23.5%]">
                    <FloatingLabelDropdown :inputLabel="'country'" :inputWidth="'w-12/12'" :inputColor="'bg-white'"/>
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

        <!-- MAIN CONTENT -->
        <div class="flex flex-col h-auto">
            <div class="flex flex-col justify-between uppercase mb-[30px]">
                <h2 class="text-[16px] text-center font-semibold">OPTIMUM EXCHANGE REMIT INC.</h2>
                <div class="flex flex-col gap-[15px] text-center mt-[20px]">
                    <h3 class="text-[13px] font-semibold">
                        OUTWARD REMITTANCE REPORT: <br>
                        <span class="font-normal uppercase"> vertex entertainment and resorts corp.</span>
                    </h3>
                    <p class="text-[12px]">09/28/2022 -  09/28/2022</p>
                </div>
            </div>
            <!-- TABLE -->
            <div class="overflow-hidden w-full">
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
                                        09/28/2022 10:55:09 aM
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        TRD-050622-5
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        banco de oro
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        002860255555
                                    </td>
                                    <td
                                        class="whitespace-normal text-center uppercase py-2 px-1 tracking-wider">
                                        vertex entertainment and resorts corp.
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        114,583.34
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        52.58
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        6,024,792.017
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        CHINABANKING CORP.
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        PRIME ASSET VENTURES INC.
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        104052000157
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        philippines
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        Payment for loan amortization
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        General Services
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        06/26/2018
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <Pagination @paginate="getOutwardRemittance()" :pagination="pagination"
                    :offset="1" class="mt-8" />
        </div>
    </div>
</template>