<script>
import Pagination from "@/Components/Misc/Pagination/Pagination.vue";
export default {
    name: 'Daily Inventory Report',
    components: {
        Pagination
    },
    props:{
        TieUpBanks:{
            type: String,
            default: ''
        },
        TradingType:{
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
            DailyInventoryReport: [],
            pagination: {
                current_page: 1,
            },
            labels:[
                {label:'ID'},
                {label:'TRANSACTION DATE'},
                {label:'MAKER'},
                {label:'CLIENT NAME'},
                {label:'REFERENCE NO.'},
                {label:'CURRENCY'},
                {label:'AMOUNT'},
                {label:'EXCHANGE RATE'},
                {label:'PHP AMOUNT'},
            ],
        }
    },
    methods: {
        async getDailyInventoryReport() {
            await axios.get(`/api/billers?page=${this.pagination.current_page}`)
                .then((response) => {
                    console.log(response.data);
                  this.DailyInventoryReport = response.data.data;
                  this.pagination = response.data;
                })
                .catch((errors) => {

                })
        },
    },
}
</script>
<template>
    <div class="flex flex-col h-auto pb-10">
        <div class="flex flex-col justify-between uppercase mb-[30px]">
            <h2 class="text-[16px] text-center font-semibold">OPTIMUM EXCHANGE REMIT INC.</h2>
            <div class="text-center mt-[20px]">
                <h3 class="text-[13px] font-semibold">DAILY INVENTORY Report: {{ TradingType }}</h3>
                <p class="text-[12px]">{{ StartDate }} -  {{ EndDate }}</p>
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
                                    <a class="underline text-cyan-500" href="#">
                                        01
                                    </a>
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    09/28/2022 10:55:09 aM
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    LASCONIA, ELIOMAR DE ASIS
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    redha al ansari exchange
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    1234
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    USD
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    15,000.00
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    48.00
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    720,000.00
                                </td>
                            </tr>
                        </tbody>
                        <tfoot class="text-[11px] font-semibold bg-[#D7D7D7]">
                            <tr>
                                <td colspan="6" class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">TOTAL BUY</td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">1,025,000.00</td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">47.95</td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">49,149,000.00</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <Pagination @paginate="getDailyInventoryReport()" :pagination="pagination"
                :offset="1" class="mt-8" />
    </div>
</template>