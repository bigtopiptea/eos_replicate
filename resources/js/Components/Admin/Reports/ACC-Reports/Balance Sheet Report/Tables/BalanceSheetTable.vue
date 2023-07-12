<script>
import moment from 'moment';
import Pagination from "@/Components/Misc/Pagination/Pagination.vue";
import CheckboxSelectMenu from "@/Components/Misc/Select Menu/CheckboxSelectMenu.vue";
export default{
    components:{
        Pagination, CheckboxSelectMenu, moment
    },
    props:{
        Report:{
            type: String,
            default: ''
        },
        StartDate:{
            type: String,
            default: 'MM/DD/YYYY'
        },
        EndDate:{
            type: String,
            default: 'MM/DD/YYYY'
        },
    },
    data() {
        return {
            BalanceSheet: [],
            pagination: {
                current_page: 1,
            },
            formattedStartDate: '',
            formattedEndDate: '',
        }
    },    
    computed: {
        months() {
            const startDate = moment(this.StartDate);
            const endDate = moment(this.EndDate);

            const months = [];
            let currentDate = startDate.clone();

            while (currentDate.isSameOrBefore(endDate)) {
                months.push(currentDate.endOf('month').format('MMMM D'));
                currentDate.add(1, 'month').startOf('month');
            }

            return months;
        },
    },
    mounted() {
        this.formatDates();
    },
    methods: {
        formatDates() {
            this.formattedStartDate = moment(this.StartDate).format('L');
            this.formattedEndDate = moment(this.EndDate).format('L');
        },
        async getBalanceSheet() {
            await axios.get(`/api/billers?page=${this.pagination.current_page}`)
                .then((response) => {
                    console.log(response.data);
                  this.BalanceSheet = response.data.data;
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
            <h3 class="text-[13px] font-semibold">STATEMENT OF FINANCIAL POSITION</h3>
            <p class="text-[12px]">
                {{ formattedStartDate }} - 
                {{ formattedEndDate }}
            </p>
        </div>
    </div>
    <!-- TABLE -->
    <div class="overflow-hidden w-full px-3">
        <div class="relative h-[360px]">
            <div class="shadow ring-1 ring-black ring-opacity-5 overflow-auto absolute inset-x-0 min-h-auto max-h-full">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead class="bg-[#D7D7D7] font-medium text-[11px] whitespace-nowrap sticky top-0">
                        <tr class="divide-x divide-gray-200">
                            <th scope="col"
                                class="py-2 px-1 uppercase tracking-wider text-center text-gray-900">
                                Account Description
                            </th>
                            <th v-for="month in months" :key="month" scope="col" class="py-2 px-1 uppercase tracking-wider text-center text-gray-900">
                                {{ month }}
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white font-light text-[10px]">
                        <!-- ASSETS TABLE START-->
                        <tr class="divide-x divide-gray-200">
                            <td
                                class="whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider">
                                CASH AND CASH EQUIVALENTS
                            </td>
                            <td  v-for="(month, id) in months" :key="id"
                                class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                500,000.00
                            </td>
                        </tr>

                        <tr class="bg-[#EAEAEA] divide-x divide-gray-200 font-bold">
                            <td 
                                class="whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider">
                                TOTAL ASSET
                            </td>
                            <td  v-for="(month, id) in months" :key="id"
                                class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                500,000.00
                            </td>
                        </tr>
                        <!-- ASSETS TABLE END-->

                        <!-- START DIVIDER -->
                        <tr class="divide-x divide-gray-200">
                            <td colspan="100%"
                                class="whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider text-transparent"></td>
                        </tr>
                        <!-- END DIVIDER -->
                        
                        <!-- LIABILITIES TABLE START -->
                        <tr class="divide-x divide-gray-200">
                            <td
                                class="whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider">
                                TRADE AND OTHER PAYABLES
                            </td>
                            <td  v-for="(month, id) in months" :key="id"
                                class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                500,000.00
                            </td>
                        </tr>

                        <tr class="bg-[#EAEAEA] divide-x divide-gray-200 font-bold">
                            <td 
                                class="whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider">
                                TOTAL LIABILITIES
                            </td>
                            <td  v-for="(month, id) in months" :key="id"
                                class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                500,000.00
                            </td>
                        </tr>
                        <!-- LIABILITIES TABLE END -->

                        <!-- START DIVIDER -->
                        <tr class="divide-x divide-gray-200">
                            <td colspan="100%"
                                class="whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider text-transparent"></td>
                        </tr>
                        <!-- END DIVIDER -->

                        <!-- STOCK EQUITY TABLE START -->
                        <tr class="divide-x divide-gray-200">
                            <td
                                class="whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider">
                                PAID UP CAPITAL
                            </td>
                            <td  v-for="(month, id) in months" :key="id"
                                class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                500,000.00
                            </td>
                        </tr>

                        <tr class="bg-[#EAEAEA] divide-x divide-gray-200 font-bold">
                            <td 
                                class="whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider">
                                TOTAL STOCKHOLDERS EQUITY
                            </td>
                            <td  v-for="(month, id) in months" :key="id"
                                class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                500,000.00
                            </td>
                        </tr>
                        <!-- STOCK EQUITY TABLE END -->
                    </tbody>
                    <tfoot class="bg-[#EAEAEA] font-medium text-[10px] whitespace-nowrap">
                        <tr class="divide-x divide-gray-200">
                            <th scope="col"
                                class="font-bold py-2 px-1 uppercase tracking-wider text-left text-gray-900">
                                TOTAL LIABILITIES AND STOCKHOLDER'S EQUITY
                            </th>
                            <td  v-for="(month, id) in months" :key="id"
                                class="font-bold whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                500,000.00
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <Pagination @paginate="getBalanceSheet()" :pagination="pagination"
            :offset="1" class="mt-8" />
</div>
</template>