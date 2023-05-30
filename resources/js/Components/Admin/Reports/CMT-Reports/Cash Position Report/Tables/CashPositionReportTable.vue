<script>
import Pagination from "@/Components/Misc/Pagination/Pagination.vue";
import CheckboxSelectMenu from "@/Components/Misc/Select Menu/CheckboxSelectMenu.vue";
export default{
    components:{
        Pagination, CheckboxSelectMenu
    },
    props:{
        BanksProviders:{
            type: String,
            default: ''
        },
        ReportType:{
            type: String,
            default: ''
        },
        CurrencyType:{
            type: String,
            default: ''
        },
        StartDate:{
            type: Date,
            default: 'MM/DD/YYYY'
        },
        EndDate:{
            type: Date,
            default: 'MM/DD/YYYY'
        },
    },
    data() {
        return {
            CashPositionReport: [],
            pagination: {
                current_page: 1,
            },
            labels:[
                {label:'DATE'},
                {label:'REFERENCE NO.'},
                {label:'ACCOUNT NAME'},
                {label:'BEGINNING BALANCE'},
                {label:'TOTAL_DR'},
                {label:'TOTAL_CR'},
                {label:'NET AMOUNT'},
            ],
        }
    },    
    methods: {
        async getCashPositionReport() {
            await axios.get(`/api/billers?page=${this.pagination.current_page}`)
                .then((response) => {
                    console.log(response.data);
                  this.CashPositionReport = response.data.data;
                  this.pagination = response.data;
                })
                .catch((errors) => {

                })
        },

    },
}
</script>
<template>
    <div class="flex flex-col h-screen pb-10">
        <div class="flex flex-col justify-between uppercase mb-[30px]">
            <h2 class="text-[16px] text-center font-semibold">OPTIMUM EXCHANGE REMIT INC.</h2>
            <div class="text-center mt-[20px]">
                <h3 class="text-[13px] font-semibold">CASH POSITION SUMMARY 
                    <span v-if="BanksProviders !== 'All Banks/Providers'" class="font-normal">: {{ BanksProviders }}</span>
                </h3>
                <p class="text-[12px]">{{ StartDate }} -  {{ EndDate }}</p>
            </div>
        </div>
        <!-- TABLE -->
        <div class="overflow-hidden w-full px-3">
            <div class="inline-block min-w-full  align-middle ">
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 m-2 ">
                    <table class="min-w-full divide-y divide-gray-300 text-xs overflow-x-scroll">
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
                                    cmt-092822
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    ALL BANK IMUS USD
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    202,458.72
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    0
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    0
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    202,458.72
                                </td>
                            </tr>
                            <tr class="divide-x divide-gray-200">
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    09/28/2022 12:54:26 PM
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    cmt-092822
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    ALL BANK IMUS USD
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    202,458.72
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    0
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    0
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    202,458.72
                                </td>
                            </tr>
                            <tr class="divide-x divide-gray-200">
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    09/28/2022 12:54:26 PM
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    cmt-092822
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    ALL BANK IMUS USD
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    202,458.72
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    0
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    0
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    202,458.72
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <Pagination @paginate="getCashPositionReport()" :pagination="pagination"
                :offset="1" class="mt-8" />
    </div>
</template>