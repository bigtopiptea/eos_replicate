<script>
import Pagination from "@/Components/Misc/Pagination/Pagination.vue";
import CheckboxSelectMenu from "@/Components/Misc/Select Menu/CheckboxSelectMenu.vue";
export default{
    components:{
        Pagination, CheckboxSelectMenu
    },
    props:{
        TieUpPartner:{
            type: String,
            default: ''
        },
        ReportType:{
            type: String,
            default: ''
        },
        TransactionType:{
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
            TransactionReport: [],
            pagination: {
                current_page: 1,
            },
            labels:[
                {label:'BATCH ID'},
                {label:'FILE NAME'},
                {label:'ITEM ACCOUNT'},
                {label:'TOTAL AMOUNT'},
                {label:'EXCHANGE RATE'},
                {label:'PROCESSED DATE'},
                {label:'VALUE DATE'},
            ],
        }
    },
    methods: {
        async getTransactionReport() {
            await axios.get(`/api/billers?page=${this.pagination.current_page}`)
                .then((response) => {
                    console.log(response.data);
                  this.TransactionReport = response.data.data;
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
            <h2 class="text-[16px] text-center mb-[10px] font-semibold">{{ TieUpPartner }}</h2>
            <h2 class="text-[14px] text-center">{{ ReportType }}</h2>
            <div class="text-center">
                <h3 class="text-[13px]">{{ TransactionType }} TRANSACTION</h3>
                <p class="text-[12px]">{{ StartDate }} -  {{ EndDate }}</p>
            </div>
        </div>
        <!-- TABLE -->
        <div  class="overflow-hidden w-full px-3">
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
                                    02
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    REDHA_Batch2
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    103
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    649,394.00
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    48.57
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    09/28/2022 12:00:05 PM
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    09/28/2022 12:00:05 PM
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <Pagination @paginate="getTransactionReport()" :pagination="pagination"
                :offset="1" class="mt-8" />
    </div>
</template>