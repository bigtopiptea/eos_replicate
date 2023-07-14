<script>
import moment from 'moment';
import Pagination from "@/Components/Misc/Pagination/Pagination.vue";
import ChevronDownIcon from '@/Components/Misc/Icons/ChevronDownIcon.vue';
import BorderButton from '@/Components/Misc/Buttons/BorderButton.vue';
export default{
    components:{
        Pagination, ChevronDownIcon, moment, BorderButton
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
            // startDate: '',
            // endDate: '',
            labels:[
                {label:'Q1'},
                {label:'Q2'},
                {label:'Q3'},
                {label:'Q4'},
            ],
            sampleData:[
                {value: '-'}, {value: '-'}, {value: '-'}, {value: '-'}, {value: '-'},
                {value: '-'}, {value: '-'}, {value: '-'}, {value: '-'}, {value: '-'},
                {value: '-'}, {value: '-'}, 
            ],
            formattedStartDate: '',
            formattedEndDate: '',
            
        }
    },    
    mounted() {
        this.formatDates();
    },
    watch: {
        StartDate(newValue) {
            this.formatDates(newValue, this.EndDate);
        },
        EndDate(newValue) {
            this.formatDates(this.StartDate, newValue);
        },
    },
    methods: {
        formatDates() {
            let startDate = moment(this.StartDate);
            let endDate = moment(this.EndDate);

            if (!startDate.isValid() || !endDate.isValid()) {
                startDate = moment().startOf('year');
                endDate = moment().endOf('year');
            }

            this.formattedStartDate = startDate.format('L');
            this.formattedEndDate = endDate.format('L');
        },

    },
    computed:{
        currentYear() {
            return moment().format('YYYY');
        },
        months() {
            let startDate = moment(this.StartDate);
            let endDate = moment(this.EndDate);

            if (!startDate.isValid() || !endDate.isValid()) {
                startDate = moment().startOf('year').startOf('month');
                endDate = moment().endOf('year').endOf('month');
            }

            const months = [];
            let currentDate = startDate.clone();

            while (currentDate.isSameOrBefore(endDate)) {
                months.push(currentDate.format('MMM YY'));
                currentDate.add(1, 'month').startOf('month');
            }

            return months;
        },
        previousYear() {
            const currentYear = moment().year();
            const previousYear = currentYear - 1;
            return previousYear.toString();
        }
    }
}
</script>
<template>
<div class="flex flex-col pb-10">
    <div class="flex flex-col justify-between uppercase mb-[30px]">
        <h2 class="text-[16px] text-center font-semibold">OPTIMUM EXCHANGE REMIT INC.</h2>
        <div class="text-center mt-[20px]">
            <h3 class="text-[13px] font-semibold">oeri monthly income statement</h3>
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
                            <th scope="col" colspan="9"
                                class="py-2 px-1 uppercase tracking-wider text-center text-gray-900 bg-white">                            
                            </th>
                            <th scope="col" colspan="100%"
                                class="py-2 px-1 uppercase tracking-wider text-center text-gray-900 bg-[#FFC37B]">
                                {{ currentYear }}
                            </th>
                        </tr>
                        <tr class="divide-x divide-white">
                            <th scope="col" 
                                class="py-2 px-1 uppercase tracking-wider text-left text-gray-900 bg-[#EAEAEA]">
                                In '000
                            </th>
                            <th scope="col"
                                class="py-2 px-1 uppercase tracking-wider text-center text-gray-900 bg-[#EAEAEA]">
                                {{ previousYear }}
                            </th>
                            <th scope="col"
                                class="py-2 px-1 uppercase tracking-wider text-center text-gray-900 bg-[#EAEAEA]">
                                {{ currentYear }}
                            </th>
                            <th scope="col"
                                class="py-2 px-1 uppercase tracking-wider text-center text-white bg-[#F9951E]">
                                {{ currentYear }} TARGET
                            </th>
                            <th scope="col"
                                class="py-2 px-1 uppercase tracking-wider text-center text-gray-900 bg-[#EAEAEA]">
                                GR TARGET
                            </th>
                            <th scope="col"
                                class="py-2 px-1 uppercase tracking-wider text-center text-gray-900 bg-[#EAEAEA]">
                                GR'ANNL
                            </th>
                            <th scope="col"
                                class="py-2 px-1 uppercase tracking-wider text-center text-gray-900 bg-[#EAEAEA]">
                                {{ currentYear }} HIT RATE
                            </th>
                            <th scope="col"
                                class="py-2 px-1 uppercase tracking-wider text-center text-gray-900 bg-[#EAEAEA]">
                                YTD {{ currentYear }}
                            </th>
                            <th scope="col"
                                class="py-2 px-1 uppercase tracking-wider text-center text-gray-900 bg-[#EAEAEA]">
                                YTD HIT RATE
                            </th>
                            <th v-for="(label, id) in labels" :key="id" scope="col"
                                class="py-2 px-1 uppercase tracking-wider text-center text-gray-900 bg-[#FFD9AB]">
                                {{ label.label }}
                            </th>
                            <th v-for="month in months" :key="month" scope="col" class="py-2 px-1 uppercase tracking-wider text-center text-gray-900 bg-[#EAEAEA]">
                                {{ month }}
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white font-light text-[10px]">
                        <!-- TOTAL REVENUE WITH F/X '000 START -->
                        <tr class="bg-[#EAEAEA] divide-x divide-white font-bold">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-left">
                                total revenue with f/x gain
                            </td>
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-right"
                                v-for="(label, id) in sampleData" :key="id"
                            >
                                {{ label.value }}
                            </td>
                            <td v-for="month in months" :key="month" scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-[#EAEAEA]">
                                -
                            </td>
                        </tr>

                        <tr class="bg-white divide-x divide-gray-300">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-left">
                                rev per remittance
                            </td>
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-right"
                                v-for="(label, id) in sampleData" :key="id"
                            >
                                <div v-if="id == 2">
                                    <input type="number" class="text-right w-[100px] py-1 px-2 border border-[#EAEAEA]" placeholder="-">
                                </div>
                                <div v-else>
                                    {{ label.value }}
                                </div>
                            </td>
                            <td v-for="month in months" :key="month" scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>
                        </tr>

                        <tr class="bg-white divide-x divide-gray-300">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-left">
                                cost of sales
                            </td>
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-right"
                                v-for="(label, id) in sampleData" :key="id"
                            >
                                <div v-if="id == 2">
                                    <input type="number" class="text-right w-[100px] py-1 px-2 border border-[#EAEAEA]" placeholder="-">
                                </div>
                                <div v-else>
                                    {{ label.value }}
                                </div>
                            </td>
                            <td v-for="month in months" :key="month" scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>
                        </tr>
                        <!-- TOTAL REVENUE WITH F/X '000 END -->

                        <!-- GP PER REMITTANCE START -->
                        <tr class="bg-[#EAEAEA] divide-x divide-white font-bold">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-left">
                                gp per remittance
                            </td>
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-right"
                                v-for="(label, id) in sampleData" :key="id"
                            >
                                {{ label.value }}
                            </td>
                            <td v-for="month in months" :key="month" scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-[#EAEAEA]">
                                -
                            </td>
                        </tr>

                        <tr class="bg-white divide-x divide-gray-300">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-left">
                                forex gain
                            </td>
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-right"
                                v-for="(label, id) in sampleData" :key="id"
                            >
                                <div v-if="id == 2">
                                    <input type="number" class="text-right w-[100px] py-1 px-2 border border-[#EAEAEA]" placeholder="-">
                                </div>
                                <div v-else>
                                    {{ label.value }}
                                </div>
                            </td>
                            <td v-for="month in months" :key="month" scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>
                        </tr>

                        <tr class="bg-white divide-x divide-gray-300">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-right">
                                ho fx
                            </td>
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-right"
                                v-for="(label, id) in sampleData" :key="id"
                            >
                                <div v-if="id == 2">
                                    <input type="number" class="text-right w-[100px] py-1 px-2 border border-[#EAEAEA]" placeholder="-">
                                </div>
                                <div v-else>
                                    {{ label.value }}
                                </div>
                            </td>
                            <td v-for="month in months" :key="month" scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>
                        </tr>

                        <tr class="bg-white divide-x divide-gray-300">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-right">
                                branches
                            </td>
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-right"
                                v-for="(label, id) in sampleData" :key="id"
                            >
                                <div v-if="id == 2">
                                    <input type="number" class="text-right w-[100px] py-1 px-2 border border-[#EAEAEA]" placeholder="-">
                                </div>
                                <div v-else>
                                    {{ label.value }}
                                </div>
                            </td>
                            <td v-for="month in months" :key="month" scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>
                        </tr>

                        <tr class="bg-white divide-x divide-gray-300">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-left">
                                all cash
                            </td>
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-right"
                                v-for="(label, id) in sampleData" :key="id"
                            >
                                <div v-if="id == 2">
                                    <input type="number" class="text-right w-[100px] py-1 px-2 border border-[#EAEAEA]" placeholder="-">
                                </div>
                                <div v-else>
                                    {{ label.value }}
                                </div>
                            </td>
                            <td v-for="month in months" :key="month" scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>
                        </tr>

                        <tr class="bg-white divide-x divide-gray-300">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-left">
                                other services
                            </td>
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-right"
                                v-for="(label, id) in sampleData" :key="id"
                            >
                                <div v-if="id == 2">
                                    <input type="number" class="text-right w-[100px] py-1 px-2 border border-[#EAEAEA]" placeholder="-">
                                </div>
                                <div v-else>
                                    {{ label.value }}
                                </div>
                            </td>
                            <td v-for="month in months" :key="month" scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>
                        </tr>

                        <tr class="bg-white divide-x divide-gray-300">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-left">
                                cost - other services
                            </td>
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-right"
                                v-for="(label, id) in sampleData" :key="id"
                            >
                                <div v-if="id == 2">
                                    <input type="number" class="text-right w-[100px] py-1 px-2 border border-[#EAEAEA]" placeholder="-">
                                </div>
                                <div v-else>
                                    {{ label.value }}
                                </div>
                            </td>
                            <td v-for="month in months" :key="month" scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>
                        </tr>
                        <!-- GP PER REMITTANCE END -->
                      
                        <!-- TOTAL GROSS PROFIT START -->
                        <tr class="bg-[#EAEAEA] divide-x divide-white font-bold">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-left">
                                total gross profit
                            </td>
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-right"
                                v-for="(label, id) in sampleData" :key="id"
                            >
                                {{ label.value }}
                            </td>
                            <td v-for="month in months" :key="month" scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-[#EAEAEA]">
                                -
                            </td>
                        </tr>

                        <tr class="bg-white divide-x divide-gray-300">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-left">
                                operating expenses - head office
                            </td>
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-right"
                                v-for="(label, id) in sampleData" :key="id"
                            >
                                <div v-if="id == 2">
                                    <input type="number" class="text-right w-[100px] py-1 px-2 border border-[#EAEAEA]" placeholder="-">
                                </div>
                                <div v-else>
                                    {{ label.value }}
                                </div>
                            </td>
                            <td v-for="month in months" :key="month" scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>
                        </tr>

                        <tr class="bg-white divide-x divide-gray-300">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-left">
                                operating expenses - allcash
                            </td>
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-right"
                                v-for="(label, id) in sampleData" :key="id"
                            >
                                <div v-if="id == 2">
                                    <input type="number" class="text-right w-[100px] py-1 px-2 border border-[#EAEAEA]" placeholder="-">
                                </div>
                                <div v-else>
                                    {{ label.value }}
                                </div>
                            </td>
                            <td v-for="month in months" :key="month" scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>
                        </tr>
                        <!-- TOTAL GROSS PROFIT END -->
                      
                        <!-- TOTAL EBITDA START -->
                        <tr class="bg-[#EAEAEA] divide-x divide-white font-bold">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-left">
                                total gross profit
                            </td>
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-right"
                                v-for="(label, id) in sampleData" :key="id"
                            >
                                {{ label.value }}
                            </td>
                            <td v-for="month in months" :key="month" scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-[#EAEAEA]">
                                -
                            </td>
                        </tr>

                        <tr class="bg-white divide-x divide-gray-300">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-left">
                                income
                            </td>
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-right"
                                v-for="(label, id) in sampleData" :key="id"
                            >
                                <div v-if="id == 2">
                                    <input type="number" class="text-right w-[100px] py-1 px-2 border border-[#EAEAEA]" placeholder="-">
                                </div>
                                <div v-else>
                                    {{ label.value }}
                                </div>
                            </td>
                            <td v-for="month in months" :key="month" scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>
                        </tr>

                        <tr class="bg-white divide-x divide-gray-300">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-left">
                                interest income
                            </td>
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-right"
                                v-for="(label, id) in sampleData" :key="id"
                            >
                                <div v-if="id == 2">
                                    <input type="number" class="text-right w-[100px] py-1 px-2 border border-[#EAEAEA]" placeholder="-">
                                </div>
                                <div v-else>
                                    {{ label.value }}
                                </div>
                            </td>
                            <td v-for="month in months" :key="month" scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>
                        </tr>

                        <tr class="bg-white divide-x divide-gray-300">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-left">
                                depreciation & amortization - ho
                            </td>
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-right"
                                v-for="(label, id) in sampleData" :key="id"
                            >
                                <div v-if="id == 2">
                                    <input type="number" class="text-right w-[100px] py-1 px-2 border border-[#EAEAEA]" placeholder="-">
                                </div>
                                <div v-else>
                                    {{ label.value }}
                                </div>
                            </td>
                            <td v-for="month in months" :key="month" scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>
                        </tr>

                        <tr class="bg-white divide-x divide-gray-300">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-left">
                                depreciation & amortization - allcash
                            </td>
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-right"
                                v-for="(label, id) in sampleData" :key="id"
                            >
                                <div v-if="id == 2">
                                    <input type="number" class="text-right w-[100px] py-1 px-2 border border-[#EAEAEA]" placeholder="-">
                                </div>
                                <div v-else>
                                    {{ label.value }}
                                </div>
                            </td>
                            <td v-for="month in months" :key="month" scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>
                        </tr>
                        <!-- TOTAL EBITDA END -->
                                            
                        <!-- TOTAL EBIT START -->
                        <tr class="bg-[#EAEAEA] divide-x divide-white font-bold">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-left">
                                total ebit
                            </td>
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-right"
                                v-for="(label, id) in sampleData" :key="id"
                            >
                                {{ label.value }}
                            </td>
                            <td v-for="month in months" :key="month" scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-[#EAEAEA]">
                                -
                            </td>
                        </tr>

                        <tr class="bg-white divide-x divide-gray-300">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-left">
                                taxes
                            </td>
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-right"
                                v-for="(label, id) in sampleData" :key="id"
                            >
                                {{ label.value }}
                               
                            </td>
                            <td v-for="month in months" :key="month" scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>
                        </tr>
                        <!-- TOTAL EBIT END -->

                        <!-- NET INCOME START -->
                        <tr class="bg-[#EAEAEA] divide-x divide-white font-bold">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-left">
                                net income
                            </td>
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-right"
                                v-for="(label, id) in sampleData" :key="id"
                            >
                                {{ label.value }}
                            </td>
                            <td v-for="month in months" :key="month" scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-[#EAEAEA]">
                                -
                            </td>
                        </tr>
                        <!-- NET INCOME END -->

                        <!-- DIVIDER 1 START -->
                        <tr class="bg-white divide-x divide-gray-200">
                            <td colspan="100%"
                                class="whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider">  
                            </td>
                        </tr>
                        <!-- DIVIDER 1 END -->

                        <!-- TOTAL NO. oF ITEMS -->
                        <tr class="bg-white divide-x divide-gray-300">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-left">
                                total of no. items
                            </td>                        
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                                                
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                <input type="number" class="text-right w-[100px] py-1 px-2 border border-[#EAEAEA]" placeholder="-">
                            </td>
                            <td scope="col" colspan="3" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                
                            </td>
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>    
                            <td v-for="month in months" :key="month" scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>
                        </tr>

                        <!-- USD AMOUNT -->
                        <tr class="bg-white divide-x divide-gray-300">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-left">
                                usd amount
                            </td>                        
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                                                
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                <input type="number" class="text-right w-[100px] py-1 px-2 border border-[#EAEAEA]" placeholder="-">
                            </td>
                            <td scope="col" colspan="3" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white border-b-0">
                                
                            </td>
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>    
                            <td v-for="month in months" :key="month" scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>
                        </tr>

                        <!-- PHP EQUIVALENT -->
                        <tr class="bg-white divide-x divide-gray-300">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-left">
                                php equivalent
                            </td>                        
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                                                
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                <input type="number" class="text-right w-[100px] py-1 px-2 border border-[#EAEAEA]" placeholder="-">
                            </td>
                            <td scope="col" colspan="3" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                
                            </td>
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>    
                            <td v-for="month in months" :key="month" scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>
                        </tr>

                        <!-- EXCHANGE RATE -->
                        <tr class="bg-white divide-x divide-gray-300">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-left">
                                exchange rate
                            </td>                        
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                                                
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>
                            <td scope="col" colspan="3" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                
                            </td>
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>    
                            <td v-for="month in months" :key="month" scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>
                        </tr>

                        <!-- PHP REMITTANCE -->
                        <tr class="bg-white divide-x divide-gray-300">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-left">
                                php remittance
                            </td>                        
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                                                
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                <input type="number" class="text-right w-[100px] py-1 px-2 border border-[#EAEAEA]" placeholder="-">
                            </td>
                            <td scope="col" colspan="3" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                
                            </td>
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>    
                            <td v-for="month in months" :key="month" scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>
                        </tr>

                        <!-- PRINCIPAL AMOUNT OF OTHER SERVICES -->
                        <tr class="bg-[#FFD9AB] divide-x divide-gray-300 font-bold">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-left">
                                Principal Amount of Other Services
                            </td>                        
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-[#FFD9AB]">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-[#FFD9AB]">
                                -
                            </td>                                                
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-[#FFD9AB]">
                                -
                            </td>
                            <td scope="col" colspan="3" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                
                            </td>
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-[#FFD9AB]">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-[#FFD9AB]">
                                -
                            </td>    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-[#FFD9AB]">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-[#FFD9AB]">
                                -
                            </td>    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-[#FFD9AB]">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-[#FFD9AB]">
                                -
                            </td>    
                            <td v-for="month in months" :key="month" scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-[#FFD9AB]">
                                -
                            </td>
                        </tr>

                        <!-- PERCENTAGE TO REMITTANCE REVENUE -->
                        <tr class="bg-[#EAEAEA] divide-x divide-gray-300 font-bold">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-left">
                                Percentage to Remittance Revenue
                            </td>                        
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-[#EAEAEA]">
                                
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-[#EAEAEA]">
                                
                            </td>                                                
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-[#EAEAEA]">
                                
                            </td>
                            <td scope="col" colspan="3" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                
                            </td>
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-[#EAEAEA]">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-[#EAEAEA]">
                                -
                            </td>    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-[#EAEAEA]">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-[#EAEAEA]">
                                -
                            </td>    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-[#EAEAEA]">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-[#EAEAEA]">
                                -
                            </td>    
                            <td v-for="month in months" :key="month" scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-[#EAEAEA]">
                                -
                            </td>
                        </tr>
                        
                        <!-- DIVIDER 2 START -->
                        <tr class="bg-white divide-x divide-gray-200">
                            <td colspan="100%"
                                class="whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider">  
                            </td>
                        </tr>
                        <!-- DIVIDER 2 END -->

                        <!-- GP per Item (transaction ) -->
                        <tr class="bg-white divide-x divide-gray-300">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-left">
                                GP per Item (transaction )
                            </td>                        
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                                                
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>
                            <td scope="col" colspan="3" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white border-b-0">
                                
                            </td>
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                
                            </td>    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>    
                            <td v-for="month in months" :key="month" scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>
                        </tr>

                        <!-- GP per remittance tnx -->
                        <tr class="bg-white divide-x divide-gray-300">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-left">
                                GP per remittance tnx
                            </td>                        
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                                                
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>
                            <td scope="col" colspan="3" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white border-b-0">
                                
                            </td>
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                
                            </td>    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>    
                            <td v-for="month in months" :key="month" scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>
                        </tr>

                        <!-- opex -->
                        <tr class="bg-white divide-x divide-gray-300">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-left">
                                opex
                            </td>                        
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                                                
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>
                            <td scope="col" colspan="3" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white border-b-0">
                                
                            </td>
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                
                            </td>    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>    
                            <td v-for="month in months" :key="month" scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>
                        </tr>

                        <!-- ebitda -->
                        <tr class="bg-white divide-x divide-gray-300">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-left">
                                ebitda
                            </td>                        
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                                                
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>
                            <td scope="col" colspan="3" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white border-b-0">
                                
                            </td>
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                
                            </td>    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>    
                            <td v-for="month in months" :key="month" scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>
                        </tr>

                        <!-- interest -->
                        <tr class="bg-white divide-x divide-gray-300">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-left">
                                interest
                            </td>                        
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                                                
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>
                            <td scope="col" colspan="3" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white border-b-0">
                                
                            </td>
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                
                            </td>    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>    
                            <td v-for="month in months" :key="month" scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>
                        </tr>
                        
                        <!-- taxes and licenses -->
                        <tr class="bg-white divide-x divide-gray-300">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-left">
                                taxes and licenses
                            </td>                        
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                                                
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>
                            <td scope="col" colspan="3" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white border-b-0">
                                
                            </td>
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                
                            </td>    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>    
                            <td v-for="month in months" :key="month" scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>
                        </tr>

                        <!-- depreciation and amortization -->
                        <tr class="bg-white divide-x divide-gray-300">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-left">
                                depreciation and amortization
                            </td>                        
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                                                
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>
                            <td scope="col" colspan="3" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white border-b-0">
                                
                            </td>
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                
                            </td>    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>    
                            <td v-for="month in months" :key="month" scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>
                        </tr>

                        <!-- net income/(loss) -->
                        <tr class="bg-white divide-x divide-gray-300">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-left">
                                net income/(loss)
                            </td>                        
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                                                
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>
                            <td scope="col" colspan="3" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white border-b-0">
                                
                            </td>
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                
                            </td>    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>    
                            <td v-for="month in months" :key="month" scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>
                        </tr>

                        <!-- DIVIDER 3 START -->
                        <tr class="bg-white divide-x divide-gray-200">
                            <td colspan="100%"
                                class="whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider">  
                            </td>
                        </tr>
                        <!-- DIVIDER 3 END -->

                        <!-- Percentage to Total Revenue ( Remittance + FX Gain ) -->
                        <tr class="bg-[#FFD9AB] divide-x divide-gray-300 font-bold">
                            <td rowspan="2" class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-left border-r border-gray-300">
                                Percentage to Total Revenue ( Remittance + FX Gain )
                            </td>                        
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-center text-gray-900 bg-[#FFD9AB]">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-center text-gray-900 bg-[#FFD9AB]">
                                -
                            </td>                                                
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-center text-gray-900 bg-[#FFD9AB]">
                                -
                            </td>
                            <td scope="col" colspan="3" class="py-2 px-1 uppercase tracking-center text-right text-gray-900 bg-white">
                                
                            </td>
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-center text-gray-900 bg-[#FFD9AB]">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-center text-gray-900 bg-white">
                                
                            </td>    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-center text-gray-900 bg-[#FFD9AB]">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-center text-gray-900 bg-[#FFD9AB]">
                                -
                            </td>    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-center text-gray-900 bg-[#FFD9AB]">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-center text-gray-900 bg-[#FFD9AB]">
                                -
                            </td>    
                            <td v-for="month in months" :key="month" scope="col" class="py-2 px-1 uppercase tracking-wider text-center text-gray-900 bg-[#FFD9AB]">
                                -
                            </td>
                        </tr>

                        <tr class="bg-[#FFD9AB] divide-x divide-gray-300 font-bold">                      
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-center text-gray-900 bg-[#FFD9AB]">
                                {{ previousYear }}
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-center text-gray-900 bg-[#FFD9AB]">
                                {{ currentYear }}
                            </td>                                                
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-center text-gray-900 bg-[#FFD9AB]">
                                {{ currentYear }}
                            </td>
                            <td scope="col" colspan="3" class="py-2 px-1 uppercase tracking-wider text-center text-gray-900 bg-white">
                                
                            </td>
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-center text-gray-900 bg-[#FFD9AB]">
                                YTD {{ currentYear }}
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-center text-gray-900 bg-white">
                                
                            </td>    
                            <td v-for="(label, id) in labels" :key="id" scope="col" class="py-2 px-1 uppercase tracking-wider text-center text-gray-900 bg-[#FFD9AB]">
                                {{ label.label }}
                            </td>                                         
                            <td v-for="month in months" :key="month" scope="col" class="py-2 px-1 uppercase tracking-wider text-center text-gray-900 bg-[#FFD9AB]">
                                {{ month }}
                            </td>
                        </tr>

                        <!-- GP WITH FX -->
                        <tr class="bg-white divide-x divide-gray-300">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-left">
                                gp with fx
                            </td>                        
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                                                
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>
                            <td scope="col" colspan="3" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white border-b-0">
                                
                            </td>
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                
                            </td>    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>    
                            <td v-for="month in months" :key="month" scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>
                        </tr>

                        <!-- opex -->
                        <tr class="bg-white divide-x divide-gray-300">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-left">
                                opex
                            </td>                        
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                                                
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>
                            <td scope="col" colspan="3" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white border-b-0">
                                
                            </td>
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                
                            </td>    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>    
                            <td v-for="month in months" :key="month" scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>
                        </tr>

                        <!-- ebitda -->
                        <tr class="bg-white divide-x divide-gray-300">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-left">
                                ebitda
                            </td>                        
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                                                
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>
                            <td scope="col" colspan="3" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white border-b-0">
                                
                            </td>
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                
                            </td>    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>    
                            <td v-for="month in months" :key="month" scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>
                        </tr>

                        <!-- net income/(loss) -->
                        <tr class="bg-white divide-x divide-gray-300">
                            <td class="whitespace-nowrap uppercase py-2 px-1 tracking-wider text-left">
                                net income/(loss)
                            </td>                        
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                                                
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>
                            <td scope="col" colspan="3" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white border-b-0">
                                
                            </td>
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                
                            </td>    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>                    
                            <td scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>    
                            <td v-for="month in months" :key="month" scope="col" class="py-2 px-1 uppercase tracking-wider text-right text-gray-900 bg-white">
                                -
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="flex justify-center space-x-4 items-center w-full h-auto mt-5">
        <BorderButton :buttonLabel="'RESET'" :buttonPadding="'py-2'" :buttonTextColor="'text-[#3e3e3e]'" :buttonBorderColor="'border-[#3e3e3e]'" :buttonHover="'hover:bg-[#3E3E3E]'" :buttonTextSize="'text-[15px]'"/>
        <BorderButton :buttonLabel="'SAVE'" :buttonPadding="'py-2'" :buttonTextSize="'text-[15px]'" />
    </div>
</div>
</template>
