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
        Supplier:{
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
            DetailedAP: [],
            pagination: {
                current_page: 1,
            },
            labels:[
                {label:'PROCESS DATE'},
                {label:'INVOICE DATE'},
                {label:'INVOICE NO.'},
                {label:'INVOICE AMOUNT'},
                {label:'DUE DATE'},
                {label:'PAYMENTS MADE'},
                {label:'OUTSTANDING BALANCE'},
                {label:'AGING (IN DAYS)'},
            ],
            formattedStartDate: '',
            formattedEndDate: '',
        }
    },    
    mounted() {
        this.formatDates();
    },
    methods: {
        formatDates() {
            this.formattedStartDate = moment(this.StartDate).format('L');
            this.formattedEndDate = moment(this.EndDate).format('L');
        },
        async getDetailedAP() {
            await axios.get(`/api/billers?page=${this.pagination.current_page}`)
                .then((response) => {
                    console.log(response.data);
                  this.DetailedAP = response.data.data;
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
            <h3 class="text-[13px] font-semibold">ACCOUNTS PAYABLE</h3>
            <h3 class="text-[13px] font-semibold">{{ Report }}</h3>
            <p class="text-[12px]">
                {{ formattedStartDate }} - 
                {{ formattedEndDate }}
            </p>
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
                                class="whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider">
                                09/01/2022 08:30:01 AM
                            </td>
                            <td
                                class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                08/29/2022
                            </td>
                            <td
                                class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                INV00001
                            </td>
                            <td
                                class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                10,000.00
                            </td>
                            <td
                                class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                10/05/2022
                            </td>
                            <td
                                class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                10,000.00
                            </td>
                            <td
                                class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                0.00
                            </td>
                            <td
                                class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                30 DAYS
                            </td>
                        </tr>
                    </tbody>
                    <tfoot class="text-[10px] font-semibold bg-[#D7D7D7]">
                        <tr>
                            <td colspan="4" class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">500,000.00</td>
                            <td colspan="2" class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">250,000.00</td>
                            <td class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">250,000.00</td>
                            <td class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <Pagination @paginate="getDetailedAP()" :pagination="pagination"
            :offset="1" class="mt-8" />
</div>
</template>