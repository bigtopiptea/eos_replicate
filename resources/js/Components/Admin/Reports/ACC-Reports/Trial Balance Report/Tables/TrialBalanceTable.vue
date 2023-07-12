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
            TrialBalance: [],
            pagination: {
                current_page: 1,
            },
            labels:[
                {label:'ACCOUNT DESCRIPTION'},
                {label:'BEGINNING BALANCE'},
                {label:'DEBIT'},
                {label:'CREDIT'},
                {label:'ENDING BALANCE'},
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
        async getTrialBalance() {
            await axios.get(`/api/billers?page=${this.pagination.current_page}`)
                .then((response) => {
                    console.log(response.data);
                  this.TrialBalance = response.data.data;
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
            <h3 class="text-[13px] font-semibold">TRIAL BALANCE</h3>
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
                    <thead class="bg-[#EAEAEA] font-medium text-[11px] whitespace-nowrap">
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
                                AR - AL EKTESAD PHP
                            </td>
                            <td
                                class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                500,000.00
                            </td>
                            <td
                                class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                250,000.00
                            </td>
                            <td
                                class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                250,000.00
                            </td>
                            <td
                                class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                500,000.00
                            </td>
                        </tr>

                        <!-- ACCOUNTS RECEIVABLE START-->
                        <tr class="bg-[#EAEAEA] divide-x divide-gray-200">
                            <td colspan="100%"
                                class="whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider">
                                ACCOUNTS RECEIVABLE - TIEUP
                            </td>
                        </tr>
                        
                        <tr class="divide-x divide-gray-200">
                            <td
                                class="whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider">
                                AR - ALLBANK INSTAPAY PHP
                            </td>
                            <td
                                class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                500,000.00
                            </td>
                            <td
                                class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                250,000.00
                            </td>
                            <td
                                class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                250,000.00
                            </td>
                            <td
                                class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                500,000.00
                            </td>
                        </tr>
                        <!-- ACCOUNTS RECEIVABLE END-->

                        <!-- TOTALS ACCOUNTS RECEIVABLEDIVIDER START-->
                        <tr class="bg-[#EAEAEA] divide-x divide-gray-200">
                            <td colspan="100%"
                                class="whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider">
                                TOTAL ACCOUNTS RECEIVABLE - BANKS AND COURIERS
                            </td>
                        </tr>

                        <tr class="divide-x divide-gray-200">
                            <td
                                class="whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider">
                                AR - ALLBANK INSTAPAY PHP
                            </td>
                            <td
                                class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                500,000.00
                            </td>
                            <td
                                class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                250,000.00
                            </td>
                            <td
                                class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                250,000.00
                            </td>
                            <td
                                class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                500,000.00
                            </td>
                        </tr>
                        <!-- TOTALS ACCOUNTS RECEIVABLEDIVIDER END-->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <Pagination @paginate="getTrialBalance()" :pagination="pagination"
            :offset="1" class="mt-8" />
</div>
</template>