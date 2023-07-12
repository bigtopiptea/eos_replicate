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
                {label:'PHP'},
                {label:'YEAR'},
                {label:'YTD'},
                {label:'% TO REVENUE'},
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
                {value: '-'}, {value: '-'}, {value: '-'}, {value: '-'},
                {value: '-'}, {value: '-'}, {value: '-'}, {value: '-'}, {value: '-'},
                {value: '-'}, {value: '-'}, {value: '-'}, {value: '-'}, {value: '-'},
                {value: '-'}, {value: '-'}, {value: '-'}, {value: '-'}, {value: '-'},
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
            <h3 class="text-[13px] font-semibold">domestic revenue report</h3>
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
                            <th scope="col" colspan="4"
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
                                class="py-2 px-1 uppercase tracking-wider text-center text-gray-900" :class="id >= 4 && id <= 7 ? 'bg-[#FFD9AB]' : 'bg-[#EAEAEA]'">
                                {{ id == 1 ? currentYear : label.label }}
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white font-light text-[10px]">
                        <!-- DOMESTIC REVENUE FIRST DATA START -->
                        <tr class="bg-white divide-x divide-gray-200">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-left">
                                revenue
                            </td>
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-right"
                                v-for="(item, id) in sampleData" :key="id"
                            >
                                {{ item.value }}
                            </td>
                        </tr>
                        <!-- DOMESTIC REVENUE FIRST DATA END -->

                        <!-- DIVIDER 1 START-->
                        <tr class="bg-white divide-x divide-gray-200">
                            <td colspan="100%"
                                class="whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider">
                                
                            </td>
                        </tr>
                        <!-- DIVIDER 1 END-->

                        <!-- VOLUME PER ITEMS START -->
                        <tr class="bg-[#EAEAEA] divide-x divide-white font-bold">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider"
                                v-for="(label, id) in vpiLabels" :key="id"
                                :class="id == 0  ? 'text-left' : 'text-center'"
                            >
                                {{ label.label }}
                            </td>
                        </tr>

                        <tr class="bg-white divide-x divide-gray-200">
                            <td class="whitespace-nowrap uppercase py-2 px-1  pl-[20px] tracking-wider text-left">
                                head office
                            </td>
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-right"
                                v-for="(item, id) in sampleData" :key="id"
                            >
                                {{ item.value }}
                            </td>
                        </tr>

                        <tr class="bg-[#EAEAEA] divide-x divide-gray-200 font-bold">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-left">
                                total no. of txns.
                            </td>
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-right"
                                v-for="(item, id) in sampleData" :key="id"
                            >
                                {{ item.value }}
                            </td>
                        </tr>
                        <!-- VOLUME PER ITEMS END -->

                        <!-- DIVIDER 2 END-->
                        <tr class="bg-white divide-x divide-gray-200">
                            <td colspan="100%"
                                class="whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider">
                                
                            </td>
                        </tr>
                        <!-- DIVIDER 2 END-->

                        <!-- REVENUE PER LOCATION START -->
                        <tr class="bg-[#EAEAEA] divide-x divide-white font-bold">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider"
                                v-for="(label, id) in rplLabels" :key="id"
                                :class="id == 0  ? 'text-left' : 'text-center'"
                            >
                                {{ label.label }}
                            </td>
                        </tr>

                        <tr class="bg-white divide-x divide-gray-200">
                            <td class="whitespace-nowrap uppercase py-2 px-1  pl-[20px] tracking-wider text-left">
                                head office
                            </td>
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-right"
                                v-for="(item, id) in sampleData" :key="id"
                            >
                                {{ item.value }}
                            </td>
                        </tr>

                        <tr class="bg-[#EAEAEA] divide-x divide-gray-200 font-bold">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-left">
                                total revenue
                            </td>
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-right"
                                v-for="(item, id) in sampleData" :key="id"
                            >
                                {{ item.value }}
                            </td>
                        </tr>
                        <!-- REVENUE PER LOCATION END -->

                        <!-- DIVIDER 3 END-->
                        <tr class="bg-white divide-x divide-gray-200">
                            <td colspan="100%"
                                class="whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider">
                                
                            </td>
                        </tr>
                        <!-- DIVIDER 3 END-->

                        <!-- HEAD OFFICE START -->
                        <tr class="bg-[#FFD9AB] divide-x divide-gray-200 font-bold">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-left">
                                HEAD OFFICE
                            </td>
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-right"
                                v-for="(item, id) in sampleData" :key="id"
                            >
                                {{ item.value }}
                            </td>
                        </tr>

                        <tr class="bg-white divide-x divide-gray-200">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-left  pl-[20px]">
                                iexplore
                            </td>
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-right"
                                v-for="(item, id) in sampleData" :key="id"
                            >
                                {{ item.value }}
                            </td>
                        </tr>
                        <!-- HEAD OFFICE END -->

                        <!-- ALLCASH START -->
                        <tr class="bg-[#FFD9AB] divide-x divide-gray-200 font-bold">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-left">
                                ALLCASH
                            </td>
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-right"
                                v-for="(item, id) in sampleData" :key="id"
                            >
                                {{ item.value }}
                            </td>
                        </tr>

                        <tr class="bg-white divide-x divide-gray-200">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-left  pl-[20px]">
                                ecpay
                            </td>
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-right"
                                v-for="(item, id) in sampleData" :key="id"
                            >
                                {{ item.value }}
                            </td>
                        </tr>
                        <!-- ALLCASH END -->

                        <!-- ALLDAY START -->
                        <tr class="bg-[#FFD9AB] divide-x divide-gray-200 font-bold">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-left">
                                ALLDAY
                            </td>
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-right"
                                v-for="(item, id) in sampleData" :key="id"
                            >
                                {{ item.value }}
                            </td>
                        </tr>

                        <tr class="bg-white divide-x divide-gray-200">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-left  pl-[20px]">
                                ecpay
                            </td>
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-right"
                                v-for="(item, id) in sampleData" :key="id"
                            >
                                {{ item.value }}
                            </td>
                        </tr>
                        <!-- ALLDAY END -->

                        <!-- ALLBANK START -->
                        <tr class="bg-[#FFD9AB] divide-x divide-gray-200 font-bold">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-left">
                                ALLBANK
                            </td>
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-right"
                                v-for="(item, id) in sampleData" :key="id"
                            >
                                {{ item.value }}
                            </td>
                        </tr>

                        <tr class="bg-white divide-x divide-gray-200">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-left  pl-[20px]">
                                ecpay
                            </td>
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-right"
                                v-for="(item, id) in sampleData" :key="id"
                            >
                                {{ item.value }}
                            </td>
                        </tr>
                        <!-- ALLBANK END -->

                        <!-- TOTAL REVENUE START -->
                        <tr class="bg-[#EAEAEA] divide-x divide-gray-200 font-bold">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-left">
                                TOTAL REVENUE
                            </td>
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-right"
                                v-for="(item, id) in sampleData" :key="id"
                            >
                                {{ item.value }}
                            </td>
                        </tr>

                        <tr class="bg-white divide-x divide-gray-200">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-left  pl-[20px]">
                                allday
                            </td>
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-right"
                                v-for="(item, id) in sampleData" :key="id"
                            >
                                {{ item.value }}
                            </td>
                        </tr>

                        <!-- TOTAL COMM SHARE-->
                        <tr class="bg-[#EAEAEA] divide-x divide-gray-200">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-left  pl-[20px] font-bold"> 
                                total comm share
                            </td>
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-right"
                                v-for="(item, id) in sampleData" :key="id"
                            >
                                {{ item.value }}
                            </td>
                        </tr>
                        <tr class="bg-white divide-x divide-gray-200">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-left  pl-[20px]">
                                gross profit
                            </td>
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-right"
                                v-for="(item, id) in sampleData" :key="id"
                            >
                                {{ item.value }}
                            </td>
                        </tr>

                        <!-- EBITDA SHARE-->
                        <tr class="bg-[#EAEAEA] divide-x divide-gray-200">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-left  pl-[20px] font-bold"> 
                                ebitda
                            </td>
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-right"
                                v-for="(item, id) in sampleData" :key="id"
                            >
                                {{ item.value }}
                            </td>
                        </tr>
                        <tr class="bg-white divide-x divide-gray-200">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-left  pl-[20px]">
                                amort & depreciation
                            </td>
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-right"
                                v-for="(item, id) in sampleData" :key="id"
                            >
                                {{ item.value }}
                            </td>
                        </tr>
                        <tr class="bg-[#EAEAEA] divide-x divide-gray-200">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-left  pl-[20px] font-bold"> 
                                ebit
                            </td>
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-right"
                                v-for="(item, id) in sampleData" :key="id"
                            >
                                {{ item.value }}
                            </td>
                        </tr>
                        <!-- TOTAL REVENUE END -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</template>