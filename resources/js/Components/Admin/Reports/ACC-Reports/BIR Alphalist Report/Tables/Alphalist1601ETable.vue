<script>
import moment from 'moment';
import Pagination from "@/Components/Misc/Pagination/Pagination.vue";
export default{
    components:{
        Pagination, moment
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
            Alphalist1601E: [],
            pagination: {
                current_page: 1,
            },
            labels:[
                {label:'Reporting_Month'},
                {label:'Vendor_TIN'},
                {label:'branchCode'},
                {label:'companyName'},
                {label:'surName'},
                {label:'firstName'},
                {label:'middleName'},
                {label:'ATC'},
                {label:'income_payment'},
                {label:'ewt_rate'},
                {label:'tax_amount'},
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
        async getAlphalist1601E() {
            await axios.get(`/api/billers?page=${this.pagination.current_page}`)
                .then((response) => {
                    console.log(response.data);
                  this.Alphalist1601E = response.data.data;
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
        <h2 class="text-[16px] text-center font-semibold">{{ Report }}</h2>
        <div class="text-center">
            <h3 class="text-[13px] font-semibold">TIN: 006-651-461-000</h3>
            <h3 class="text-[13px] font-semibold">WITHHOLDING AGENT’S NAME: OPTIMUM EXCHANGE REMIT INC.</h3>
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
                            <th v-for="label in labels" :key="label.label" scope="col"
                                class="py-2 px-1 tracking-wider text-center text-gray-900">
                                {{ label.label }}
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white font-light text-[10px]">
                        <tr class="divide-x divide-gray-200">
                            <td
                                class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                8/31/2022
                            </td>
                            <td
                                class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                000185616
                            </td>
                            <td
                                class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                003
                            </td>
                            <td
                                class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                MANUELA CORPORATION
                            </td>
                            <td
                                class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                               
                            </td>
                            <td
                                class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                               
                            </td>
                            <td
                                class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                               
                            </td>
                            <td
                                class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                WC 100
                            </td>
                            <td
                                class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                50,000.00
                            </td>
                            <td
                                class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                5
                            </td>
                            <td
                                class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                2,000.00
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <Pagination @paginate="getAlphalist1601E()" :pagination="pagination"
            :offset="1" class="mt-8" />
</div>
</template>