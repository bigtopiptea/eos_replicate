<script>
import moment from 'moment';
import Pagination from "@/Components/Misc/Pagination/Pagination.vue";
import ChevronDownIcon from '@/Components/Misc/Icons/ChevronDownIcon.vue';
export default{
    components:{
        Pagination, ChevronDownIcon, moment
    },
    props:{
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
            startDate: '',
            endDate: '',
            datesDisplayed: false,
            labels:[
                {label:'SUMMARY REPORT'},
                {label:'YEAR'},
                {label:'YTD'},
                {label:'Q1'},
                {label:'Q2'},
                {label:'Q3'},
                {label:'Q4'},
                {label:'JAN'},
                {label:'FEB'},
                {label:'MAR'},
                {label:'APR'},
                {label:'MAY'},
                {label:'JUN'},
                {label:'JUL'},
                {label:'AUG'},
                {label:'SEP'},
                {label:'OCT'},
                {label:'NOV'},
                {label:'DEC'},
            ],
            vpiLabels:[
                {label:'VOLUME PER ITEMS'},
                {label:''},
                {label:'YTD'},
                {label:'%'},
                {label:''},
                {label:''},
                {label:''},
                {label:''},
                {label:'JAN'},
                {label:'FEB'},
                {label:'MAR'},
                {label:'APR'},
                {label:'MAY'},
                {label:'JUN'},
                {label:'JUL'},
                {label:'AUG'},
                {label:'SEP'},
                {label:'OCT'},
                {label:'NOV'},
                {label:'DEC'},
            ],
            rplLabels:[
                {label:'REVENUE PER LOCATION'},
                {label:''},
                {label:''},
                {label:''},
                {label:''},
                {label:''},
                {label:''},
                {label:''},
                {label:'JAN'},
                {label:'FEB'},
                {label:'MAR'},
                {label:'APR'},
                {label:'MAY'},
                {label:'JUN'},
                {label:'JUL'},
                {label:'AUG'},
                {label:'SEP'},
                {label:'OCT'},
                {label:'NOV'},
                {label:'DEC'},
            ],
            sampleData:[
                {value: '-'}, {value: '-'}, {value: '-'}, {value: '-'}, {value: '-'},
                {value: '-'}, {value: '-'}, {value: '-'}, {value: '-'}, {value: '-'},
                {value: '-'}, {value: '-'}, {value: '-'}, {value: '-'}, {value: '-'},
                {value: '-'}, {value: '-'}, {value: '-'}, 
            ],
            intlRemitRevenueData:[
                [        
                    {value: 'redha (dubai)'}, {value: '-'},{value: '-'},
                    {value: '-'}, {value: '-'}, {value: '-'}, {value: '-'},
                    {value: '-'}, {value: '-'}, {value: '-'}, {value: '-'},
                    {value: '-'}, {value: '-'}, {value: '-'}, {value: '-'},
                    {value: '-'}, {value: '-'}, {value: '-'}, {value: '-'},
                ],
                [        
                    {value: 'AL EKTESAD UNITED EXCHANGE (KUWAIT)'}, {value: '-'},{value: '-'},
                    {value: '-'}, {value: '-'}, {value: '-'}, {value: '-'},
                    {value: '-'}, {value: '-'}, {value: '-'}, {value: '-'},
                    {value: '-'}, {value: '-'}, {value: '-'}, {value: '-'},
                    {value: '-'}, {value: '-'}, {value: '-'}, {value: '-'},
                ],
                [        
                    {value: 'CASH EXPRESS (HONGKONG)'}, {value: '-'},{value: '-'},
                    {value: '-'}, {value: '-'}, {value: '-'}, {value: '-'},
                    {value: '-'}, {value: '-'}, {value: '-'}, {value: '-'},
                    {value: '-'}, {value: '-'}, {value: '-'}, {value: '-'},
                    {value: '-'}, {value: '-'}, {value: '-'}, {value: '-'},
                ],
                [        
                    {value: 'BRUNPHIL (SINGAPORE)'}, {value: '-'},{value: '-'},
                    {value: '-'}, {value: '-'}, {value: '-'}, {value: '-'},
                    {value: '-'}, {value: '-'}, {value: '-'}, {value: '-'},
                    {value: '-'}, {value: '-'}, {value: '-'}, {value: '-'},
                    {value: '-'}, {value: '-'}, {value: '-'}, {value: '-'},
                ],
                [        
                    {value: 'J-DEE (SINGAPORE)'}, {value: '-'},{value: '-'},
                    {value: '-'}, {value: '-'}, {value: '-'}, {value: '-'},
                    {value: '-'}, {value: '-'}, {value: '-'}, {value: '-'},
                    {value: '-'}, {value: '-'}, {value: '-'}, {value: '-'},
                    {value: '-'}, {value: '-'}, {value: '-'}, {value: '-'},
                ],
                [        
                    {value: 'RNV FOREX'}, {value: '-'},{value: '-'},
                    {value: '-'}, {value: '-'}, {value: '-'}, {value: '-'},
                    {value: '-'}, {value: '-'}, {value: '-'}, {value: '-'},
                    {value: '-'}, {value: '-'}, {value: '-'}, {value: '-'},
                    {value: '-'}, {value: '-'}, {value: '-'}, {value: '-'},
                ],
                [        
                    {value: 'CITI EXPRESS'}, {value: '-'},{value: '-'},
                    {value: '-'}, {value: '-'}, {value: '-'}, {value: '-'},
                    {value: '-'}, {value: '-'}, {value: '-'}, {value: '-'},
                    {value: '-'}, {value: '-'}, {value: '-'}, {value: '-'},
                    {value: '-'}, {value: '-'}, {value: '-'}, {value: '-'},
                ],
                [        
                    {value: 'OTHERS'}, {value: '-'},{value: '-'},
                    {value: '-'}, {value: '-'}, {value: '-'}, {value: '-'},
                    {value: '-'}, {value: '-'}, {value: '-'}, {value: '-'},
                    {value: '-'}, {value: '-'}, {value: '-'}, {value: '-'},
                    {value: '-'}, {value: '-'}, {value: '-'}, {value: '-'},
                ],
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
    },
    computed:{
        currentYear() {
            return moment().format('YYYY');
        }
    }
}
</script>
<template>
<div class="flex flex-col pb-10">
    <div class="flex flex-col justify-between uppercase mb-[30px]">
        <h2 class="text-[16px] text-center font-semibold">OPTIMUM EXCHANGE REMIT INC.</h2>
        <div class="text-center mt-[20px]">
            <h3 class="text-[13px] font-semibold">international remittance and f/x revenue report</h3>
            <p class="text-[12px]">
                {{ formattedStartDate }} - 
                {{ formattedEndDate }}
            </p>
        </div>
    </div>
    <!-- TABLE -->
    <div class="overflow-hidden w-full px-3">
        <div class="relative h-[560px]">
            <div class="shadow ring-1 ring-black ring-opacity-5 overflow-auto absolute inset-x-0 min-h-auto max-h-full">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead class="bg-[#EAEAEA] font-medium text-[10px] whitespace-nowrap sticky top-0">
                        <tr class="divide-x divide-gray-200">
                            <th scope="col" colspan="3"
                                class="py-2 px-1 uppercase tracking-wider text-center text-gray-900 bg-white">
                                
                            </th>
                            <th scope="col" colspan="4"
                                class="py-2 px-1 uppercase tracking-wider text-center text-gray-900 bg-[#FFC37B]">
                                {{ currentYear }}
                            </th>
                            <th scope="col" colspan="12"
                                class="py-2 px-1 uppercase tracking-wider text-center text-gray-900 bg-[#FFC37B]">
                                {{ currentYear }}
                            </th>
                        </tr>
                        <tr class="divide-x divide-white">
                            <th v-for="(label, id) in labels" :key="id" scope="col"
                                class="py-2 px-1 uppercase tracking-wider text-center text-gray-900" :class="id >= 3 && id <= 6 ? 'bg-[#FFD9AB]' : 'bg-[#EAEAEA]'">
                                {{ id == 1 ? currentYear : label.label }}
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white font-light text-[10px]">
                        <!-- REVENUE WITH F/X '000 START -->
                        <tr class="bg-white divide-x divide-gray-200" v-for="row in intlRemitRevenueData" :key="row[0].value">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider" v-for="(cell, id) in row" :key="id" :class="id == 0 ? 'text-left' : 'text-right'">
                                {{ cell.value }}
                            </td>
                        </tr>

                        <tr class="bg-[#EAEAEA] divide-x divide-white font-bold">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-right pr-[20px]">
                                total revenue with f/x '000
                            </td>
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-right"
                                v-for="(label, id) in sampleData" :key="id"
                            >
                                {{ label.value }}
                            </td>
                        </tr>
                        <!-- REVENUE WITH F/X '000 END -->

                        <!-- DIVIDER 1 START-->
                        <tr class="bg-white divide-x divide-gray-200">
                            <td colspan="100%"
                                class="whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider">
                            </td>
                        </tr>
                        <!-- DIVIDER 1 END-->

                        <!-- NO. OF ITEMS START -->
                        <tr class="bg-white divide-x divide-gray-200" v-for="row in intlRemitRevenueData" :key="row[0].value">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider" v-for="(cell, id) in row" :key="id" :class="id == 0 ? 'text-left' : 'text-right'">
                                {{ cell.value }}
                            </td>
                        </tr>

                        <tr class="bg-[#EAEAEA] divide-x divide-white font-bold">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-right pr-[20px]">
                                total no. of items
                            </td>
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-right"
                                v-for="(label, id) in sampleData" :key="id"
                            >
                                {{ label.value }}
                            </td>
                        </tr>
                        <!-- NO. OF ITEMS END -->

                        <!-- DIVIDER 2 START-->
                        <tr class="bg-white divide-x divide-gray-200">
                            <td colspan="100%"
                                class="whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider">  
                            </td>
                        </tr>
                        <!-- DIVIDER 2 END-->

                        <!-- AVERAGE GP PER ITEM START -->
                        <tr class="bg-white divide-x divide-gray-200" v-for="row in intlRemitRevenueData" :key="row[0].value">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider" v-for="(cell, id) in row" :key="id" :class="id == 0 ? 'text-left' : 'text-right'">
                                {{ cell.value }}
                            </td>
                        </tr>

                        <tr class="bg-[#EAEAEA] divide-x divide-white font-bold">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-right pr-[20px]">
                                average gp per item start
                            </td>
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-right"
                                v-for="(label, id) in sampleData" :key="id"
                            >
                                {{ label.value }}
                            </td>
                        </tr>
                        <!-- AVERAGE GP PER ITEM END -->

                        <!-- DIVIDER 3 START-->
                        <tr class="bg-white divide-x divide-gray-200">
                            <td colspan="100%"
                                class="whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider">  
                            </td>
                        </tr>
                        <!-- DIVIDER 3 END-->

                        <!-- REMITTANCE REVENUE IN '000' START -->
                        <tr class="bg-white divide-x divide-gray-200" v-for="row in intlRemitRevenueData" :key="row[0].value">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider" v-for="(cell, id) in row" :key="id" :class="id == 0 ? 'text-left' : 'text-right'">
                                {{ cell.value }}
                            </td>
                        </tr>

                        <tr class="bg-[#EAEAEA] divide-x divide-white font-bold">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-right pr-[20px]">
                                remittance revenue in '000
                            </td>
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-right"
                                v-for="(label, id) in sampleData" :key="id"
                            >
                                {{ label.value }}
                            </td>
                        </tr>
                        <!-- REMITTANCE REVENUE IN '000' END -->

                        <!-- DIVIDER 4 START-->
                        <tr class="bg-white divide-x divide-gray-200">
                            <td colspan="100%"
                                class="whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider">  
                            </td>
                        </tr>
                        <!-- DIVIDER 4 END-->

                        <!-- TOTAL COST IN '000' START -->
                        <tr class="bg-white divide-x divide-gray-200" v-for="row in intlRemitRevenueData" :key="row[0].value">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider" v-for="(cell, id) in row" :key="id" :class="id == 0 ? 'text-left' : 'text-right'">
                                {{ cell.value }}
                            </td>
                        </tr>

                        <tr class="bg-[#EAEAEA] divide-x divide-white font-bold">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-right pr-[20px]">
                                total cost in '000
                            </td>
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-right"
                                v-for="(label, id) in sampleData" :key="id"
                            >
                                {{ label.value }}
                            </td>
                        </tr>
                        <!-- TOTAL COST IN '000' END -->

                        <!-- DIVIDER 5 START-->
                        <tr class="bg-white divide-x divide-gray-200">
                            <td colspan="100%"
                                class="whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider">  
                            </td>
                        </tr>
                        <!-- DIVIDER 5 END-->

                        <!-- TOTAL GP PER ITEM START -->
                        <tr class="bg-white divide-x divide-gray-200" v-for="row in intlRemitRevenueData" :key="row[0].value">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider" v-for="(cell, id) in row" :key="id" :class="id == 0 ? 'text-left' : 'text-right'">
                                {{ cell.value }}
                            </td>
                        </tr>

                        <tr class="bg-[#EAEAEA] divide-x divide-white font-bold">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-right pr-[20px]">
                                total GP per item
                            </td>
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-right"
                                v-for="(label, id) in sampleData" :key="id"
                            >
                                {{ label.value }}
                            </td>
                        </tr>
                        <!-- TOTAL GP PER ITEM END -->

                        <!-- DIVIDER 6 START-->
                        <tr class="bg-white divide-x divide-gray-200">
                            <td colspan="100%"
                                class="whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider">  
                            </td>
                        </tr>
                        <!-- DIVIDER 6 END-->

                        <!-- TOTAL FX START -->
                        <tr class="bg-white divide-x divide-gray-200" v-for="row in intlRemitRevenueData" :key="row[0].value">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider" v-for="(cell, id) in row" :key="id" :class="id == 0 ? 'text-left' : 'text-right'">
                                {{ cell.value }}
                            </td>
                        </tr>

                        <tr class="bg-[#EAEAEA] divide-x divide-white font-bold">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-right pr-[20px]">
                                total fx
                            </td>
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-right"
                                v-for="(label, id) in sampleData" :key="id"
                            >
                                {{ label.value }}
                            </td>
                        </tr>
                        <!-- TOTAL FX END -->

                        <!-- DIVIDER 7 START-->
                        <tr class="bg-white divide-x divide-gray-200">
                            <td colspan="100%"
                                class="whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider">  
                            </td>
                        </tr>
                        <!-- DIVIDER 7 END-->

                        <!-- TOTAL GP PER ITEM START -->
                        <tr class="bg-white divide-x divide-gray-200" v-for="row in intlRemitRevenueData" :key="row[0].value">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider" v-for="(cell, id) in row" :key="id" :class="id == 0 ? 'text-left' : 'text-right'">
                                {{ cell.value }}
                            </td>
                        </tr>

                        <tr class="bg-[#EAEAEA] divide-x divide-white font-bold">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-right pr-[20px]">
                                total GP PER ITEM
                            </td>
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-right"
                                v-for="(label, id) in sampleData" :key="id"
                            >
                                {{ label.value }}
                            </td>
                        </tr>
                        <!-- TOTAL GP PER ITEM END -->

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</template>
