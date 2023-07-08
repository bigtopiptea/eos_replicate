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
            BIRAlphalist: [],
            pagination: {
                current_page: 1,
            },
            labels:[
                {label:'Vendor_TIN'},
                {label:'companyName'},
                {label:'lastName'},
                {label:'firstName'},
                {label:'middleName'},
                {label:'address1'},
                {label:'address2'},
                {label:'exempt'},
                {label:'zeroRated'},
                {label:'services'},
                {label:'capitalGoods'},
                {label:'otherThanCapitalGoods'},
                {label:'taxableNetOfVat'},
                {label:'vatRate'},
                {label:'inputVat'},
                {label:'totalPurchases'},
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
        async getBIRAlphalist() {
            await axios.get(`/api/billers?page=${this.pagination.current_page}`)
                .then((response) => {
                    console.log(response.data);
                  this.BIRAlphalist = response.data.data;
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
            <h3 class="text-[13px] font-semibold">WITHHOLDING AGENT’S NAME: <span>OPTIMUM EXCHANGE REMIT INC.</span></h3>
            <p class="text-[12px]">
                {{ formattedStartDate }} - 
                {{ formattedEndDate }}
            </p>
        </div>
    </div>
    <!-- TABLE -->
    <div class="w-full px-3">
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
                                000185616
                            </td>
                            <td
                                class="whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider">
                                MANUELA CORPORATION  starmall
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
                                class="whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider">
                                Starmall Edsa Shaw corner Shaw Blvd., Mandaluyong City
                            </td>
                            <td
                                class="whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider">
                                Starmall Edsa Shaw corner Shaw Blvd., Mandaluyong City
                            </td>
                            <td
                                class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                0.00
                            </td>
                            <td
                                class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                0.00
                            </td>
                            <td
                                class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                0.00
                            </td>
                            <td
                                class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                0.00
                            </td>
                            <td
                                class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                0.00
                            </td>
                            <td
                                class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                0.00
                            </td>
                            <td
                                class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                12
                            </td>
                            <td
                                class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                0.00
                            </td>
                            <td
                                class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                0.00
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <Pagination @paginate="getBIRAlphalist()" :pagination="pagination"
            :offset="1" class="mt-8" />
</div>
</template>