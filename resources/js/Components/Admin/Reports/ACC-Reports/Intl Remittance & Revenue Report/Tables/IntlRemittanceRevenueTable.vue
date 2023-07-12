<script>
import moment from 'moment';
import Pagination from "@/Components/Misc/Pagination/Pagination.vue";
import ChevronDownIcon from '@/Components/Misc/Icons/ChevronDownIcon.vue';
export default{
    components:{
        Pagination, ChevronDownIcon, moment
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
            IncomeStatement: [],
            pagination: {
                current_page: 1,
            },
            labels:[
                {label:''},
                {label:'ALLCASH - EVIA'},
                {label:'ALLCASH - TAGUIG'},
                {label:'ALLCASH - TANZA'},
                {label:'ALLCASH - MOLINO'},
                {label:'ALLCASH - SHAW'},
                {label:'ALLCASH - SJDM'},
                {label:'ALLCASH - BATAAN'},
            ],
            revenueData: [
                {
                    label: 'TOTAL REVENUE',
                    data: [
                        'TOTAL REVENUE', 
                        '999,000.00', '999,000.00',
                        '999,000.00', '999,000.00',
                        '999,000.00', '999,000.00',
                        '999,000.00', 
                    ],
                    rowData: [
                        { 
                            data: [
                                'Commission - Air Asia', 
                                '250,000.00', '250,000.00', 
                                '250,000.00', '250,000.00', 
                                '250,000.00', '250,000.00', 
                                '250,000.00', 
                            ] 
                        },
                        { 
                            data: [
                                'Commission - ECPay', 
                                '250,000.00', '250,000.00', 
                                '250,000.00', '250,000.00', 
                                '250,000.00', '250,000.00', 
                                '250,000.00', 
                            ] 
                        },
                    ]
                }
            ],
            operatingExpenseData: [
                {
                    label: 'TOTAL OPERATING EXPENSES',
                    data: [
                        'TOTAL OPERATING EXPENSES', 
                        '999,000.00', '999,000.00',
                        '999,000.00', '999,000.00',
                        '999,000.00', '999,000.00',
                        '999,000.00', 
                    ],
                    rowData: [
                        { 
                            data: [
                                'Salaries Expense', 
                                '250,000.00', '250,000.00', 
                                '250,000.00', '250,000.00', 
                                '250,000.00', '250,000.00', 
                                '250,000.00', 
                            ] 
                        },
                        { 
                            data: [
                                '13th Month', 
                                '250,000.00', '250,000.00', 
                                '250,000.00', '250,000.00', 
                                '250,000.00', '250,000.00', 
                                '250,000.00', 
                            ] 
                        },
                    ]
                }
            ],
            amortDepreData: [
                {
                    label: 'TOTAL AMORTIZATION/DEPRECIATION EXPENSES',
                    data: [
                        'TOTAL OPERATING EXPENSES', 
                        '-', '-', '-', '-', '-', '-', '-' 
                    ],
                    rowData: [
                        { 
                            data: [
                                'AMORTIZATION - PREPAID INSURANCE', 
                                '-', '-', '-', '-', '-', '-', '-' 
                            ] 
                        },
                        { 
                            data: [
                                'DEPRECIATION EXPENSE - LRI', 
                                '-', '-', '-', '-', '-', '-', '-' 
                            ] 
                        },
                    ]
                }
            ],
            expandedRows: [],
            formattedStartDate: '',
            formattedEndDate: '',
            isRotated: false
            
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
        async getIncomeStatement() {
            await axios.get(`/api/billers?page=${this.pagination.current_page}`)
                .then((response) => {
                    console.log(response.data);
                  this.IncomeStatement = response.data.data;
                  this.pagination = response.data;
                })
                .catch((errors) => {

                })
        },
        toggleRow(group, key) {
            const index = this.expandedRows.findIndex(item => item.group === group && item.key === key);
            if (index !== -1) {
                this.expandedRows.splice(index, 1); // Collapse the row
            } else {
                this.expandedRows.push({ group, key }); // Expand the row
            }
        },
        isExpanded(group, key) {
            return this.expandedRows.some(item => item.group === group && item.key === key);
        },
        toggleRotation() {
            this.isRotated = !this.isRotated;
        }
    },
}
</script>
<template>
<div class="flex flex-col pb-10">
    <div class="flex flex-col justify-between uppercase mb-[30px]">
        <h2 class="text-[16px] text-center font-semibold">OPTIMUM EXCHANGE REMIT INC.</h2>
        <div class="text-center mt-[20px]">
            <h3 class="text-[13px] font-semibold">ALLCASH BRANCHES income STATEMENT</h3>
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
                    <thead class="bg-[#D7D7D7] font-medium text-[11px] whitespace-nowrap sticky top-0">
                        <tr class="divide-x divide-gray-200">
                            <th v-for="label in labels" :key="label.label" scope="col"
                                class="py-2 px-1 uppercase tracking-wider text-center text-gray-900">
                                {{ label.label }}
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white font-light text-[10px]">
                        <!-- REVENUE START -->
                        <template v-for="(buttonData, buttonDataKey) in revenueData" :key="buttonDataKey">
                            <template v-if="isExpanded('revenueData', buttonDataKey)">
                                <tr v-for="(rowData, rowDataIndex) in buttonData.rowData" :key="rowDataIndex" class="divide-x divide-gray-200">
                                    <td v-for="(cell, cellIndex) in rowData.data" :key="cellIndex"  class="whitespace-nowrap  uppercase py-2 px-1 tracking-wider" :class="cellIndex == 0 ? 'text-left' : 'text-right'">
                                    {{ cell }}
                                    </td>
                                </tr>
                            </template>
                            <tr class="bg-[#EAEAEA] divide-x divide-white font-bold">
                                <td  class="flex items-center gap-[5px] whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider" @click="toggleRow('revenueData', buttonDataKey)" :class="{ expanded: isExpanded('revenueData', buttonDataKey) }">
                                    <div class="w-4 h-4">
                                        <ChevronDownIcon/>
                                    </div>
                                    {{ buttonData.label }}
                                </td>
                                <td  v-for="(cell, cellIndex) in buttonData.data.slice(1)" :key="cellIndex" class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                    {{ cell }}
                                </td>
                            </tr>
                        </template>
                        <!-- REVENUE END -->

                        <!-- DIVIDER 1 START-->
                        <tr class="bg-white divide-x divide-gray-200">
                            <td colspan="100%"
                                class="whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider">
                                
                            </td>
                        </tr>
                        <!-- DIVIDER 1 END-->

                        <!-- COMMISSION EXPENSE START -->
                        <tr class="bg-[#EAEAEA] divide-x divide-gray-200">
                            <td
                                class="whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider">
                                COMMISSION EXPENSE
                            </td>
                            <td
                                class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                75.00
                            </td>
                            <td class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                              
                            </td>
                            <td class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                              
                            </td>
                            <td class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                              
                            </td>
                            <td class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                              
                            </td>
                            <td class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                              
                            </td>
                            <td class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                              
                            </td>
                        </tr>
                        <!-- COMMISSION EXPENSE END -->

                        <!-- DIVIDER 2 END-->
                        <tr class="bg-white divide-x divide-gray-200">
                            <td colspan="100%"
                                class="whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider">
                                
                            </td>
                        </tr>
                        <!-- DIVIDER 2 END-->

                        <!-- GROSS PROFIT START -->
                        <tr class="bg-[#EAEAEA] divide-x divide-gray-200">
                            <td
                                class="whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider">
                                GROSS PROFIT
                            </td>
                            <td
                                class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                75.00
                            </td>
                            <td class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                75.00
                            </td>
                            <td class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                75.00
                            </td>
                            <td class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                75.00
                            </td>
                            <td class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                75.00
                            </td>
                            <td class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                75.00
                            </td>
                            <td class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                75.00
                            </td>
                        </tr>
                        <!-- GROSS PROFIT END -->

                        <!-- DIVIDER 3 END-->
                        <tr class="bg-white divide-x divide-gray-200">
                            <td colspan="100%"
                                class="whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider">
                                
                            </td>
                        </tr>
                        <!-- DIVIDER 3 END-->

                        <!-- OPERATING EXPENSES START -->
                        <template v-for="(buttonData, buttonDataKey) in operatingExpenseData" :key="buttonDataKey">
                            <template v-if="isExpanded('operatingExpenseData', buttonDataKey)">
                                <tr v-for="(rowData, rowDataIndex) in buttonData.rowData" :key="rowDataIndex" class="divide-x divide-gray-200">
                                    <td v-for="(cell, cellIndex) in rowData.data" :key="cellIndex"  class="whitespace-nowrap  uppercase py-2 px-1 tracking-wider" :class="cellIndex == 0 ? 'text-left' : 'text-right'">
                                    {{ cell }}
                                    </td>
                                </tr>
                            </template>
                            <tr class="bg-[#EAEAEA] divide-x divide-white font-bold">
                                <td  class="flex items-center gap-[5px] whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider" @click="toggleRow('operatingExpenseData', buttonDataKey)" :class="{ expanded: isExpanded('operatingExpenseData', buttonDataKey) }">
                                    <div class="w-4 h-4">
                                        <ChevronDownIcon/>
                                    </div>
                                    {{ buttonData.label }}
                                </td>
                                <td  v-for="(cell, cellIndex) in buttonData.data.slice(1)" :key="cellIndex" class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                    {{ cell }}
                                </td>
                            </tr>
                        </template>
                        <!-- OPERATING EXPENSES END -->

                        <!-- DIVIDER 4 END-->
                        <tr class="bg-white divide-x divide-gray-200">
                            <td colspan="100%"
                                class="whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider">
                                
                            </td>
                        </tr>
                        <!-- DIVIDER 4 END-->

                        <!-- EBITDA START -->
                        <tr class="bg-[#EAEAEA] divide-x divide-gray-200">
                            <td
                                class="whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider">
                                EBITDA
                            </td>
                            <td
                                class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                75.00
                            </td>
                            <td class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                75.00
                            </td>
                            <td class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                75.00
                            </td>
                            <td class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                75.00
                            </td>
                            <td class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                75.00
                            </td>
                            <td class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                75.00
                            </td>
                            <td class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                75.00
                            </td>
                        </tr>
                        <!-- EBITDA END -->   

                        <!-- DIVIDER 5 END-->
                        <tr class="bg-white divide-x divide-gray-200">
                            <td colspan="100%"
                                class="whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider">
                            </td>
                        </tr>
                        <!-- DIVIDER 5 END-->

                        <!-- OPERATING EXPENSES START -->
                        <template v-for="(buttonData, buttonDataKey) in amortDepreData" :key="buttonDataKey">
                            <template v-if="isExpanded('amortDepreData', buttonDataKey)">
                                <tr v-for="(rowData, rowDataIndex) in buttonData.rowData" :key="rowDataIndex" class="divide-x divide-gray-200">
                                    <td v-for="(cell, cellIndex) in rowData.data" :key="cellIndex"  class="whitespace-nowrap  uppercase py-2 px-1 tracking-wider" :class="cellIndex == 0 ? 'text-left' : 'text-right'">
                                    {{ cell }}
                                    </td>
                                </tr>
                            </template>
                            <tr class="bg-[#EAEAEA] divide-x divide-white font-bold">
                                <td  class="flex items-center gap-[5px] whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider" @click="toggleRow('amortDepreData', buttonDataKey)" :class="{ expanded: isExpanded('amortDepreData', buttonDataKey) }">
                                    <div class="w-4 h-4">
                                        <ChevronDownIcon/>
                                    </div>
                                    {{ buttonData.label }}
                                </td>
                                <td  v-for="(cell, cellIndex) in buttonData.data.slice(1)" :key="cellIndex" class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                    {{ cell }}
                                </td>
                            </tr>
                        </template>
                        <!-- OPERATING EXPENSES END -->     

                        <!-- DIVIDER 6 END-->
                        <tr class="bg-white divide-x divide-gray-200">
                            <td colspan="100%"
                                class="whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider">
                            </td>
                        </tr>
                        <!-- DIVIDER 6 END-->

                        <!-- EBIT START -->
                        <tr class="bg-[#EAEAEA] divide-x divide-gray-200 font-bold">
                            <td
                                class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                EBIT
                            </td>
                            <td
                                class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                75.00
                            </td>
                            <td class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                75.00
                            </td>
                            <td class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                75.00
                            </td>
                            <td class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                75.00
                            </td>
                            <td class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                75.00
                            </td>
                            <td class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                75.00
                            </td>
                            <td class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                75.00
                            </td>
                        </tr>
                        <!-- EBIT END -->   
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <Pagination @paginate="getIncomeStatement()" :pagination="pagination"
            :offset="1" class="mt-8" />
</div>
</template>