<script>
import moment from 'moment';
import Pagination from "@/Components/Misc/Pagination/Pagination.vue";
import ChevronDownIcon from '@/Components/Misc/Icons/ChevronDownIcon.vue';
export default{
    components:{
        Pagination, ChevronDownIcon, moment
    },
    props:{
        Year:{
            type: String,
            default: ''
        },
    },
    data() {
        return {
            startDate: '',
            endDate: '',
            datesDisplayed: false,
            labels:[
                {label:'Q1'},
                {label:'Q2'},
                {label:'Q3'},
                {label:'Q4'},
                {label:'JANUARY'},
                {label:'FEBRUARY'},
                {label:'MARCH'},
                {label:'APRIL'},
                {label:'MAY'},
                {label:'JUNE'},
                {label:'JULY'},
                {label:'AUGUST'},
                {label:'SEPTEMBER'},
                {label:'OCTOBER'},
                {label:'NOVEMBER'},
                {label:'DECEMBER'},
            ],
            revenueData: [
                {
                    label: 'TOTAL REVENUE',
                    data: [
                        'TOTAL REVENUE', '129,000.00', 
                        '321,000.00', '-', '28,000.00', 
                        '-', '-', '-', '-', '-', '-', 
                        '243,000.00', '-', '-', '-', 
                        '-', '-', '-', '-',                   
                    ],
                    rowData: [
                        { 
                            data: [
                                'ALLCASH EVIA', '129,000.00', 
                                '321,000.00', '-', '28,000.00', 
                                '-', '-', '-', '-', '-', '-', 
                                '243,000.00', '-', '-', '-', 
                                '-', '-', '-', '-',   
                            ] 
                        },
                        { 
                            data: [
                                'ALLCASH TAGUIG', '129,000.00', 
                                '321,000.00', '-', '28,000.00', 
                                '-', '-', '-', '-', '-', '-', 
                                '243,000.00', '-', '-', '-', 
                                '-', '-', '-', '-',   
                            ] 
                        },
                        { 
                            data: [
                                'ALLCASH ALABANG', '129,000.00', 
                                '321,000.00', '-', '28,000.00', 
                                '-', '-', '-', '-', '-', '-', 
                                '243,000.00', '-', '-', '-', 
                                '-', '-', '-', '-',   
                            ] 
                        },
                        { 
                            data: [
                                'ALLCASH TANZA', '129,000.00', 
                                '321,000.00', '-', '28,000.00', 
                                '-', '-', '-', '-', '-', '-', 
                                '243,000.00', '-', '-', '-', 
                                '-', '-', '-', '-',   
                            ] 
                        },
                        { 
                            data: [
                                'ALLCASH MOLINO', '129,000.00', 
                                '321,000.00', '-', '28,000.00', 
                                '-', '-', '-', '-', '-', '-', 
                                '243,000.00', '-', '-', '-', 
                                '-', '-', '-', '-',   
                            ] 
                        },
                        { 
                            data: [
                                'ALLCASH SHAW', '129,000.00', 
                                '321,000.00', '-', '28,000.00', 
                                '-', '-', '-', '-', '-', '-', 
                                '243,000.00', '-', '-', '-', 
                                '-', '-', '-', '-',   
                            ] 
                        },
                        { 
                            data: [
                                'ALLCASH SJDM', '129,000.00', 
                                '321,000.00', '-', '28,000.00', 
                                '-', '-', '-', '-', '-', '-', 
                                '243,000.00', '-', '-', '-', 
                                '-', '-', '-', '-',   
                            ] 
                        },
                        { 
                            data: [
                                'ALLCASH BATAAN', '129,000.00', 
                                '321,000.00', '-', '28,000.00', 
                                '-', '-', '-', '-', '-', '-', 
                                '243,000.00', '-', '-', '-', 
                                '-', '-', '-', '-',   
                            ] 
                        },
                    ]
                }
            ],
            commissionExpData: [
                {
                    label: 'TOTAL COMMISSION EXPENSE',
                    data: [
                        'TOTAL COMMISSION EXPENSE', '129,000.00', 
                        '321,000.00', '-', '28,000.00', 
                        '-', '-', '-', '-', '-', '-', 
                        '243,000.00', '-', '-', '-', 
                        '-', '-', '-', '-',                   
                    ],
                    rowData: [
                        { 
                            data: [
                                'ALLCASH EVIA', '129,000.00', 
                                '321,000.00', '-', '28,000.00', 
                                '-', '-', '-', '-', '-', '-', 
                                '243,000.00', '-', '-', '-', 
                                '-', '-', '-', '-',   
                            ] 
                        },
                        { 
                            data: [
                                'ALLCASH TAGUIG', '129,000.00', 
                                '321,000.00', '-', '28,000.00', 
                                '-', '-', '-', '-', '-', '-', 
                                '243,000.00', '-', '-', '-', 
                                '-', '-', '-', '-',   
                            ] 
                        },
                        { 
                            data: [
                                'ALLCASH ALABANG', '129,000.00', 
                                '321,000.00', '-', '28,000.00', 
                                '-', '-', '-', '-', '-', '-', 
                                '243,000.00', '-', '-', '-', 
                                '-', '-', '-', '-',   
                            ] 
                        },
                        { 
                            data: [
                                'ALLCASH TANZA', '129,000.00', 
                                '321,000.00', '-', '28,000.00', 
                                '-', '-', '-', '-', '-', '-', 
                                '243,000.00', '-', '-', '-', 
                                '-', '-', '-', '-',   
                            ] 
                        },
                        { 
                            data: [
                                'ALLCASH MOLINO', '129,000.00', 
                                '321,000.00', '-', '28,000.00', 
                                '-', '-', '-', '-', '-', '-', 
                                '243,000.00', '-', '-', '-', 
                                '-', '-', '-', '-',   
                            ] 
                        },
                        { 
                            data: [
                                'ALLCASH SHAW', '129,000.00', 
                                '321,000.00', '-', '28,000.00', 
                                '-', '-', '-', '-', '-', '-', 
                                '243,000.00', '-', '-', '-', 
                                '-', '-', '-', '-',   
                            ] 
                        },
                        { 
                            data: [
                                'ALLCASH SJDM', '129,000.00', 
                                '321,000.00', '-', '28,000.00', 
                                '-', '-', '-', '-', '-', '-', 
                                '243,000.00', '-', '-', '-', 
                                '-', '-', '-', '-',   
                            ] 
                        },
                        { 
                            data: [
                                'ALLCASH BATAAN', '129,000.00', 
                                '321,000.00', '-', '28,000.00', 
                                '-', '-', '-', '-', '-', '-', 
                                '243,000.00', '-', '-', '-', 
                                '-', '-', '-', '-',   
                            ] 
                        },
                    ]
                }
            ],
            grossProfitData: [
                {
                    label: 'TOTAL GROSS PROFIT',
                    data: [
                        'TOTAL GROSS PROFIT', '129,000.00', 
                        '321,000.00', '-', '28,000.00', 
                        '-', '-', '-', '-', '-', '-', 
                        '243,000.00', '-', '-', '-', 
                        '-', '-', '-', '-',                   
                    ],
                    rowData: [
                        { 
                            data: [
                                'ALLCASH EVIA', '129,000.00', 
                                '321,000.00', '-', '28,000.00', 
                                '-', '-', '-', '-', '-', '-', 
                                '243,000.00', '-', '-', '-', 
                                '-', '-', '-', '-',   
                            ] 
                        },
                        { 
                            data: [
                                'ALLCASH TAGUIG', '129,000.00', 
                                '321,000.00', '-', '28,000.00', 
                                '-', '-', '-', '-', '-', '-', 
                                '243,000.00', '-', '-', '-', 
                                '-', '-', '-', '-',   
                            ] 
                        },
                        { 
                            data: [
                                'ALLCASH ALABANG', '129,000.00', 
                                '321,000.00', '-', '28,000.00', 
                                '-', '-', '-', '-', '-', '-', 
                                '243,000.00', '-', '-', '-', 
                                '-', '-', '-', '-',   
                            ] 
                        },
                        { 
                            data: [
                                'ALLCASH TANZA', '129,000.00', 
                                '321,000.00', '-', '28,000.00', 
                                '-', '-', '-', '-', '-', '-', 
                                '243,000.00', '-', '-', '-', 
                                '-', '-', '-', '-',   
                            ] 
                        },
                        { 
                            data: [
                                'ALLCASH MOLINO', '129,000.00', 
                                '321,000.00', '-', '28,000.00', 
                                '-', '-', '-', '-', '-', '-', 
                                '243,000.00', '-', '-', '-', 
                                '-', '-', '-', '-',   
                            ] 
                        },
                        { 
                            data: [
                                'ALLCASH SHAW', '129,000.00', 
                                '321,000.00', '-', '28,000.00', 
                                '-', '-', '-', '-', '-', '-', 
                                '243,000.00', '-', '-', '-', 
                                '-', '-', '-', '-',   
                            ] 
                        },
                        { 
                            data: [
                                'ALLCASH SJDM', '129,000.00', 
                                '321,000.00', '-', '28,000.00', 
                                '-', '-', '-', '-', '-', '-', 
                                '243,000.00', '-', '-', '-', 
                                '-', '-', '-', '-',   
                            ] 
                        },
                        { 
                            data: [
                                'ALLCASH BATAAN', '129,000.00', 
                                '321,000.00', '-', '28,000.00', 
                                '-', '-', '-', '-', '-', '-', 
                                '243,000.00', '-', '-', '-', 
                                '-', '-', '-', '-',   
                            ] 
                        },
                    ]
                }
            ],
            operatingExpData: [
                {
                    label: 'TOTAL OPERATING EXPENSE',
                    data: [
                        'TOTAL OPERATING EXPENSE', '129,000.00', 
                        '321,000.00', '-', '28,000.00', 
                        '-', '-', '-', '-', '-', '-', 
                        '243,000.00', '-', '-', '-', 
                        '-', '-', '-', '-',                   
                    ],
                    rowData: [
                        { 
                            data: [
                                'ALLCASH EVIA', '129,000.00', 
                                '321,000.00', '-', '28,000.00', 
                                '-', '-', '-', '-', '-', '-', 
                                '243,000.00', '-', '-', '-', 
                                '-', '-', '-', '-',   
                            ] 
                        },
                        { 
                            data: [
                                'ALLCASH TAGUIG', '129,000.00', 
                                '321,000.00', '-', '28,000.00', 
                                '-', '-', '-', '-', '-', '-', 
                                '243,000.00', '-', '-', '-', 
                                '-', '-', '-', '-',   
                            ] 
                        },
                        { 
                            data: [
                                'ALLCASH ALABANG', '129,000.00', 
                                '321,000.00', '-', '28,000.00', 
                                '-', '-', '-', '-', '-', '-', 
                                '243,000.00', '-', '-', '-', 
                                '-', '-', '-', '-',   
                            ] 
                        },
                        { 
                            data: [
                                'ALLCASH TANZA', '129,000.00', 
                                '321,000.00', '-', '28,000.00', 
                                '-', '-', '-', '-', '-', '-', 
                                '243,000.00', '-', '-', '-', 
                                '-', '-', '-', '-',   
                            ] 
                        },
                        { 
                            data: [
                                'ALLCASH MOLINO', '129,000.00', 
                                '321,000.00', '-', '28,000.00', 
                                '-', '-', '-', '-', '-', '-', 
                                '243,000.00', '-', '-', '-', 
                                '-', '-', '-', '-',   
                            ] 
                        },
                        { 
                            data: [
                                'ALLCASH SHAW', '129,000.00', 
                                '321,000.00', '-', '28,000.00', 
                                '-', '-', '-', '-', '-', '-', 
                                '243,000.00', '-', '-', '-', 
                                '-', '-', '-', '-',   
                            ] 
                        },
                        { 
                            data: [
                                'ALLCASH SJDM', '129,000.00', 
                                '321,000.00', '-', '28,000.00', 
                                '-', '-', '-', '-', '-', '-', 
                                '243,000.00', '-', '-', '-', 
                                '-', '-', '-', '-',   
                            ] 
                        },
                        { 
                            data: [
                                'ALLCASH BATAAN', '129,000.00', 
                                '321,000.00', '-', '28,000.00', 
                                '-', '-', '-', '-', '-', '-', 
                                '243,000.00', '-', '-', '-', 
                                '-', '-', '-', '-',   
                            ] 
                        },
                    ]
                }
            ],
            ebitOneData: [
                {
                    label: 'EBIT',
                    data: [
                        'EBIT', '129,000.00', 
                        '321,000.00', '-', '28,000.00', 
                        '-', '-', '-', '-', '-', '-', 
                        '243,000.00', '-', '-', '-', 
                        '-', '-', '-', '-',                   
                    ],
                    rowData: [
                        { 
                            data: [
                                'ALLCASH EVIA', '129,000.00', 
                                '321,000.00', '-', '28,000.00', 
                                '-', '-', '-', '-', '-', '-', 
                                '243,000.00', '-', '-', '-', 
                                '-', '-', '-', '-',   
                            ] 
                        },
                        { 
                            data: [
                                'ALLCASH TAGUIG', '129,000.00', 
                                '321,000.00', '-', '28,000.00', 
                                '-', '-', '-', '-', '-', '-', 
                                '243,000.00', '-', '-', '-', 
                                '-', '-', '-', '-',   
                            ] 
                        },
                        { 
                            data: [
                                'ALLCASH ALABANG', '129,000.00', 
                                '321,000.00', '-', '28,000.00', 
                                '-', '-', '-', '-', '-', '-', 
                                '243,000.00', '-', '-', '-', 
                                '-', '-', '-', '-',   
                            ] 
                        },
                        { 
                            data: [
                                'ALLCASH TANZA', '129,000.00', 
                                '321,000.00', '-', '28,000.00', 
                                '-', '-', '-', '-', '-', '-', 
                                '243,000.00', '-', '-', '-', 
                                '-', '-', '-', '-',   
                            ] 
                        },
                        { 
                            data: [
                                'ALLCASH MOLINO', '129,000.00', 
                                '321,000.00', '-', '28,000.00', 
                                '-', '-', '-', '-', '-', '-', 
                                '243,000.00', '-', '-', '-', 
                                '-', '-', '-', '-',   
                            ] 
                        },
                        { 
                            data: [
                                'ALLCASH SHAW', '129,000.00', 
                                '321,000.00', '-', '28,000.00', 
                                '-', '-', '-', '-', '-', '-', 
                                '243,000.00', '-', '-', '-', 
                                '-', '-', '-', '-',   
                            ] 
                        },
                        { 
                            data: [
                                'ALLCASH SJDM', '129,000.00', 
                                '321,000.00', '-', '28,000.00', 
                                '-', '-', '-', '-', '-', '-', 
                                '243,000.00', '-', '-', '-', 
                                '-', '-', '-', '-',   
                            ] 
                        },
                        { 
                            data: [
                                'ALLCASH BATAAN', '129,000.00', 
                                '321,000.00', '-', '28,000.00', 
                                '-', '-', '-', '-', '-', '-', 
                                '243,000.00', '-', '-', '-', 
                                '-', '-', '-', '-',   
                            ] 
                        },
                    ]
                }
            ],
            depreAmortData: [
                {
                    label: 'TOTAL DEPRECIATION & AMORTIZATION',
                    data: [
                        'TOTAL DEPRECIATION & AMORTIZATION', '129,000.00', 
                        '321,000.00', '-', '28,000.00', 
                        '-', '-', '-', '-', '-', '-', 
                        '243,000.00', '-', '-', '-', 
                        '-', '-', '-', '-',                   
                    ],
                    rowData: [
                        { 
                            data: [
                                'ALLCASH EVIA', '129,000.00', 
                                '321,000.00', '-', '28,000.00', 
                                '-', '-', '-', '-', '-', '-', 
                                '243,000.00', '-', '-', '-', 
                                '-', '-', '-', '-',   
                            ] 
                        },
                        { 
                            data: [
                                'ALLCASH TAGUIG', '129,000.00', 
                                '321,000.00', '-', '28,000.00', 
                                '-', '-', '-', '-', '-', '-', 
                                '243,000.00', '-', '-', '-', 
                                '-', '-', '-', '-',   
                            ] 
                        },
                        { 
                            data: [
                                'ALLCASH ALABANG', '129,000.00', 
                                '321,000.00', '-', '28,000.00', 
                                '-', '-', '-', '-', '-', '-', 
                                '243,000.00', '-', '-', '-', 
                                '-', '-', '-', '-',   
                            ] 
                        },
                        { 
                            data: [
                                'ALLCASH TANZA', '129,000.00', 
                                '321,000.00', '-', '28,000.00', 
                                '-', '-', '-', '-', '-', '-', 
                                '243,000.00', '-', '-', '-', 
                                '-', '-', '-', '-',   
                            ] 
                        },
                        { 
                            data: [
                                'ALLCASH MOLINO', '129,000.00', 
                                '321,000.00', '-', '28,000.00', 
                                '-', '-', '-', '-', '-', '-', 
                                '243,000.00', '-', '-', '-', 
                                '-', '-', '-', '-',   
                            ] 
                        },
                        { 
                            data: [
                                'ALLCASH SHAW', '129,000.00', 
                                '321,000.00', '-', '28,000.00', 
                                '-', '-', '-', '-', '-', '-', 
                                '243,000.00', '-', '-', '-', 
                                '-', '-', '-', '-',   
                            ] 
                        },
                        { 
                            data: [
                                'ALLCASH SJDM', '129,000.00', 
                                '321,000.00', '-', '28,000.00', 
                                '-', '-', '-', '-', '-', '-', 
                                '243,000.00', '-', '-', '-', 
                                '-', '-', '-', '-',   
                            ] 
                        },
                        { 
                            data: [
                                'ALLCASH BATAAN', '129,000.00', 
                                '321,000.00', '-', '28,000.00', 
                                '-', '-', '-', '-', '-', '-', 
                                '243,000.00', '-', '-', '-', 
                                '-', '-', '-', '-',   
                            ] 
                        },
                    ]
                }
            ],
            ebitTwoData: [
                {
                    label: 'EBIT',
                    data: [
                        'EBIT', '129,000.00', 
                        '321,000.00', '-', '28,000.00', 
                        '-', '-', '-', '-', '-', '-', 
                        '243,000.00', '-', '-', '-', 
                        '-', '-', '-', '-',                   
                    ],
                    rowData: [
                        { 
                            data: [
                                'ALLCASH EVIA', '129,000.00', 
                                '321,000.00', '-', '28,000.00', 
                                '-', '-', '-', '-', '-', '-', 
                                '243,000.00', '-', '-', '-', 
                                '-', '-', '-', '-',   
                            ] 
                        },
                        { 
                            data: [
                                'ALLCASH TAGUIG', '129,000.00', 
                                '321,000.00', '-', '28,000.00', 
                                '-', '-', '-', '-', '-', '-', 
                                '243,000.00', '-', '-', '-', 
                                '-', '-', '-', '-',   
                            ] 
                        },
                        { 
                            data: [
                                'ALLCASH ALABANG', '129,000.00', 
                                '321,000.00', '-', '28,000.00', 
                                '-', '-', '-', '-', '-', '-', 
                                '243,000.00', '-', '-', '-', 
                                '-', '-', '-', '-',   
                            ] 
                        },
                        { 
                            data: [
                                'ALLCASH TANZA', '129,000.00', 
                                '321,000.00', '-', '28,000.00', 
                                '-', '-', '-', '-', '-', '-', 
                                '243,000.00', '-', '-', '-', 
                                '-', '-', '-', '-',   
                            ] 
                        },
                        { 
                            data: [
                                'ALLCASH MOLINO', '129,000.00', 
                                '321,000.00', '-', '28,000.00', 
                                '-', '-', '-', '-', '-', '-', 
                                '243,000.00', '-', '-', '-', 
                                '-', '-', '-', '-',   
                            ] 
                        },
                        { 
                            data: [
                                'ALLCASH SHAW', '129,000.00', 
                                '321,000.00', '-', '28,000.00', 
                                '-', '-', '-', '-', '-', '-', 
                                '243,000.00', '-', '-', '-', 
                                '-', '-', '-', '-',   
                            ] 
                        },
                        { 
                            data: [
                                'ALLCASH SJDM', '129,000.00', 
                                '321,000.00', '-', '28,000.00', 
                                '-', '-', '-', '-', '-', '-', 
                                '243,000.00', '-', '-', '-', 
                                '-', '-', '-', '-',   
                            ] 
                        },
                        { 
                            data: [
                                'ALLCASH BATAAN', '129,000.00', 
                                '321,000.00', '-', '28,000.00', 
                                '-', '-', '-', '-', '-', '-', 
                                '243,000.00', '-', '-', '-', 
                                '-', '-', '-', '-',   
                            ] 
                        },
                    ]
                }
            ],
            expandedRows: [],
            
        }
    },    
    created() {
        // Set the initial expanded rows
        this.revenueData.forEach((buttonData, buttonDataKey) => {
            this.expandedRows.push({ group: 'revenueData', key: buttonDataKey });
        });

        this.commissionExpData.forEach((buttonData, buttonDataKey) => {
            this.expandedRows.push({ group: 'commissionExpData', key: buttonDataKey });
        });

        this.grossProfitData.forEach((buttonData, buttonDataKey) => {
            this.expandedRows.push({ group: 'grossProfitData', key: buttonDataKey });
        });

        this.operatingExpData.forEach((buttonData, buttonDataKey) => {
            this.expandedRows.push({ group: 'operatingExpData', key: buttonDataKey });
        });

        this.ebitOneData.forEach((buttonData, buttonDataKey) => {
            this.expandedRows.push({ group: 'ebitOneData', key: buttonDataKey });
        });

        this.depreAmortData.forEach((buttonData, buttonDataKey) => {
            this.expandedRows.push({ group: 'depreAmortData', key: buttonDataKey });
        });

        this.ebitTwoData.forEach((buttonData, buttonDataKey) => {
            this.expandedRows.push({ group: 'ebitTwoData', key: buttonDataKey });
        });
    },
    mounted() {
        this.displayYearDates();
    },
    methods: {
        displayYearDates() {
            this.startDate = moment(this.Year, 'YYYY').startOf('year').format('L');
            this.endDate = moment(this.Year, 'YYYY').endOf('year').format('L');
            this.datesDisplayed = true;
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
        },
        
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
                {{ startDate }} - 
                {{ endDate }}
            </p>
        </div>
    </div>
    <!-- TABLE -->
    <div class="overflow-hidden w-full px-3">
        <div class="relative h-[560px]">
            <div class="shadow ring-1 ring-black ring-opacity-5 overflow-auto absolute inset-x-0 min-h-auto max-h-full">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead class="bg-[#D7D7D7] font-medium text-[10px] whitespace-nowrap sticky top-0">
                        <tr class="divide-x divide-gray-200">
                            <th scope="col" colspan="3"
                                class="py-2 px-1 uppercase tracking-wider text-center text-gray-900 bg-white">
                                
                            </th>
                            <th scope="col" colspan="4"
                                class="py-2 px-1 uppercase tracking-wider text-center text-gray-900 bg-[#FFC37B]">
                                {{ Year }}
                            </th>
                            <th scope="col" colspan="12"
                                class="py-2 px-1 uppercase tracking-wider text-center text-gray-900 bg-[#FFC37B]">
                                {{ Year }}
                            </th>
                        </tr>
                        <tr class="divide-x divide-white">
                            <th scope="col" class="py-2 px-1 uppercase tracking-wider text-center text-gray-900">
                                all branches
                            </th>
                            <th scope="col" class="py-2 px-1 uppercase tracking-wider text-center text-gray-900">
                                {{ Year }}
                            </th>
                            <th scope="col" class="py-2 px-1 uppercase tracking-wider text-center text-gray-900">
                                YTD {{ Year }}
                            </th>
                            <th v-for="(label, id) in labels" :key="id" scope="col"
                                class="py-2 px-1 uppercase tracking-wider text-center text-gray-900" :class="id >= 0 && id <= 3 ? 'bg-[#FFD9AB]' : 'bg-[#EAEAEA]'">
                                {{ label.label }}
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white font-light text-[10px]">
                        <!-- REVENUE START -->
                        <tr class="bg-[#F9F0E6] divide-x divide-gray-200 font-bold">
                            <td colspan="100%"
                                class="whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider">
                                revenue
                            </td>
                        </tr>

                        <template v-for="(buttonData, buttonDataKey) in revenueData" :key="buttonDataKey">
                            <template v-if="isExpanded('revenueData', buttonDataKey)">
                                <tr v-for="(rowData, rowDataIndex) in buttonData.rowData" :key="rowDataIndex" class="divide-x divide-gray-200">
                                    <td v-for="(cell, cellIndex) in rowData.data" :key="cellIndex"  class="whitespace-nowrap  uppercase py-2 px-1 tracking-wider pl-[15px]" :class="cellIndex == 0 ? 'text-left' : 'text-right'">
                                    {{ cell }}
                                    </td>
                                </tr>
                            </template>
                            <tr class="bg-[#EAEAEA] divide-x divide-white font-bold">
                                <td  class="flex items-center gap-[5px] whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider" @click="toggleRow('revenueData', buttonDataKey)" :class="{ expanded: isExpanded('revenueData', buttonDataKey) }">
                                    <div class="h-4" :class="{ 'rotate-180 transition-all': isExpanded('revenueData', buttonDataKey) }">
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
                        <tr class="bg-[#F9F0E6] divide-x divide-gray-200 font-bold">
                            <td colspan="100%"
                                class="whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider">
                                commission expense
                            </td>
                        </tr>

                        <template v-for="(buttonData, buttonDataKey) in commissionExpData" :key="buttonDataKey">
                            <template v-if="isExpanded('commissionExpData', buttonDataKey)">
                                <tr v-for="(rowData, rowDataIndex) in buttonData.rowData" :key="rowDataIndex" class="divide-x divide-gray-200">
                                    <td v-for="(cell, cellIndex) in rowData.data" :key="cellIndex"  class="whitespace-nowrap  uppercase py-2 px-1 tracking-wider pl-[15px]" :class="cellIndex == 0 ? 'text-left' : 'text-right'">
                                    {{ cell }}
                                    </td>
                                </tr>
                            </template>
                            <tr class="bg-[#EAEAEA] divide-x divide-white font-bold">
                                <td  class="flex items-center gap-[5px] whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider" @click="toggleRow('commissionExpData', buttonDataKey)" :class="{ expanded: isExpanded('commissionExpData', buttonDataKey) }">
                                    <div class="h-4"  :class="{ 'rotate-180 transition-all': isExpanded('commissionExpData', buttonDataKey) }">
                                        <ChevronDownIcon/>
                                    </div>
                                    {{ buttonData.label }}
                                </td>
                                <td  v-for="(cell, cellIndex) in buttonData.data.slice(1)" :key="cellIndex" class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                    {{ cell }}
                                </td>
                            </tr>
                        </template>
                        <!-- COMMISSION EXPENSE END -->

                        <!-- DIVIDER 2 END-->
                        <tr class="bg-white divide-x divide-gray-200">
                            <td colspan="100%"
                                class="whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider">
                                
                            </td>
                        </tr>
                        <!-- DIVIDER 2 END-->

                        <!-- GROSS PROFIT START -->
                        <tr class="bg-[#F9F0E6] divide-x divide-gray-200 font-bold">
                            <td colspan="100%"
                                class="whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider">
                                gross profit
                            </td>
                        </tr>

                        <template v-for="(buttonData, buttonDataKey) in grossProfitData" :key="buttonDataKey">
                            <template v-if="isExpanded('grossProfitData', buttonDataKey)">
                                <tr v-for="(rowData, rowDataIndex) in buttonData.rowData" :key="rowDataIndex" class="divide-x divide-gray-200">
                                    <td v-for="(cell, cellIndex) in rowData.data" :key="cellIndex"  class="whitespace-nowrap  uppercase py-2 px-1 tracking-wider pl-[15px]" :class="cellIndex == 0 ? 'text-left' : 'text-right'">
                                    {{ cell }}
                                    </td>
                                </tr>
                            </template>
                            <tr class="bg-[#EAEAEA] divide-x divide-white font-bold">
                                <td  class="flex items-center gap-[5px] whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider" @click="toggleRow('grossProfitData', buttonDataKey)" :class="{ expanded: isExpanded('grossProfitData', buttonDataKey) }">
                                    <div class="h-4" :class="{ 'rotate-180 transition-all': isExpanded('grossProfitData', buttonDataKey) }">
                                        <ChevronDownIcon/>
                                    </div>
                                    {{ buttonData.label }}
                                </td>
                                <td  v-for="(cell, cellIndex) in buttonData.data.slice(1)" :key="cellIndex" class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                    {{ cell }}
                                </td>
                            </tr>
                        </template>
                        <!-- GROSS PROFIT END -->

                        <!-- DIVIDER 3 END-->
                        <tr class="bg-white divide-x divide-gray-200">
                            <td colspan="100%"
                                class="whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider">
                                
                            </td>
                        </tr>
                        <!-- DIVIDER 3 END-->

                        <!-- OPERATING EXPENSES START -->
                        <tr class="bg-[#F9F0E6] divide-x divide-gray-200 font-bold">
                            <td colspan="100%"
                                class="whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider">
                                operating expense
                            </td>
                        </tr>

                        <template v-for="(buttonData, buttonDataKey) in operatingExpData" :key="buttonDataKey">
                            <template v-if="isExpanded('operatingExpData', buttonDataKey)">
                                <tr v-for="(rowData, rowDataIndex) in buttonData.rowData" :key="rowDataIndex" class="divide-x divide-gray-200">
                                    <td v-for="(cell, cellIndex) in rowData.data" :key="cellIndex"  class="whitespace-nowrap  uppercase py-2 px-1 tracking-wider pl-[15px]" :class="cellIndex == 0 ? 'text-left' : 'text-right'">
                                    {{ cell }}
                                    </td>
                                </tr>
                            </template>
                            <tr class="bg-[#EAEAEA] divide-x divide-white font-bold">
                                <td  class="flex items-center gap-[5px] whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider" @click="toggleRow('operatingExpData', buttonDataKey)" :class="{ expanded: isExpanded('operatingExpData', buttonDataKey) }">
                                    <div class="h-4" :class="{ 'rotate-180 transition-all': isExpanded('operatingExpData', buttonDataKey) }">
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

                        <!-- FIRST EBIT START -->
                        <tr class="bg-[#F9F0E6] divide-x divide-gray-200 font-bold">
                            <td colspan="100%"
                                class="whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider">
                                EBIT
                            </td>
                        </tr>

                        <template v-for="(buttonData, buttonDataKey) in ebitOneData" :key="buttonDataKey">
                            <template v-if="isExpanded('ebitOneData', buttonDataKey)">
                                <tr v-for="(rowData, rowDataIndex) in buttonData.rowData" :key="rowDataIndex" class="divide-x divide-gray-200">
                                    <td v-for="(cell, cellIndex) in rowData.data" :key="cellIndex"  class="whitespace-nowrap  uppercase py-2 px-1 tracking-wider pl-[15px]" :class="cellIndex == 0 ? 'text-left' : 'text-right'">
                                    {{ cell }}
                                    </td>
                                </tr>
                            </template>
                            <tr class="bg-[#EAEAEA] divide-x divide-white font-bold">
                                <td  class="flex items-center gap-[5px] whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider" @click="toggleRow('ebitOneData', buttonDataKey)" :class="{ expanded: isExpanded('ebitOneData', buttonDataKey) }">
                                    <div class="h-4" :class="{ 'rotate-180 transition-all': isExpanded('ebitOneData', buttonDataKey) }">
                                        <ChevronDownIcon/>
                                    </div>
                                    {{ buttonData.label }}
                                </td>
                                <td  v-for="(cell, cellIndex) in buttonData.data.slice(1)" :key="cellIndex" class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                    {{ cell }}
                                </td>
                            </tr>
                        </template>
                        <!-- FIRST EBIT END -->

                        <!-- DIVIDER 5 END-->
                        <tr class="bg-white divide-x divide-gray-200">
                            <td colspan="100%"
                                class="whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider">
                            </td>
                        </tr>
                        <!-- DIVIDER 5 END-->

                        <!-- DEPRECIATION & AMORTIZATION START -->
                        <tr class="bg-[#F9F0E6] divide-x divide-gray-200 font-bold">
                            <td colspan="100%"
                                class="whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider">
                                DEPRECIATION & AMORTIZATION
                            </td>
                        </tr>

                        <template v-for="(buttonData, buttonDataKey) in depreAmortData" :key="buttonDataKey">
                            <template v-if="isExpanded('depreAmortData', buttonDataKey)">
                                <tr v-for="(rowData, rowDataIndex) in buttonData.rowData" :key="rowDataIndex" class="divide-x divide-gray-200">
                                    <td v-for="(cell, cellIndex) in rowData.data" :key="cellIndex"  class="whitespace-nowrap  uppercase py-2 px-1 tracking-wider pl-[15px]" :class="cellIndex == 0 ? 'text-left' : 'text-right'">
                                    {{ cell }}
                                    </td>
                                </tr>
                            </template>
                            <tr class="bg-[#EAEAEA] divide-x divide-white font-bold">
                                <td  class="flex items-center gap-[5px] whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider" @click="toggleRow('depreAmortData', buttonDataKey)" :class="{ expanded: isExpanded('depreAmortData', buttonDataKey) }">
                                    <div class="h-4" :class="{ 'rotate-180 transition-all': isExpanded('depreAmortData', buttonDataKey) }">
                                        <ChevronDownIcon/>
                                    </div>
                                    {{ buttonData.label }}
                                </td>
                                <td  v-for="(cell, cellIndex) in buttonData.data.slice(1)" :key="cellIndex" class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                    {{ cell }}
                                </td>
                            </tr>
                        </template>                       
                        <!-- DEPRECIATION & AMORTIZATION END -->     

                        <!-- DIVIDER 6 END-->
                        <tr class="bg-white divide-x divide-gray-200">
                            <td colspan="100%"
                                class="whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider">
                            </td>
                        </tr>
                        <!-- DIVIDER 6 END-->

                        <!-- SECOND EBIT START -->
                        <tr class="bg-[#F9F0E6] divide-x divide-gray-200 font-bold">
                            <td colspan="100%"
                                class="whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider">
                                EBIT
                            </td>
                        </tr>

                        <template v-for="(buttonData, buttonDataKey) in ebitTwoData" :key="buttonDataKey">
                            <template v-if="isExpanded('ebitTwoData', buttonDataKey)">
                                <tr v-for="(rowData, rowDataIndex) in buttonData.rowData" :key="rowDataIndex" class="divide-x divide-gray-200">
                                    <td v-for="(cell, cellIndex) in rowData.data" :key="cellIndex"  class="whitespace-nowrap  uppercase py-2 px-1 tracking-wider pl-[15px]" :class="cellIndex == 0 ? 'text-left' : 'text-right'">
                                    {{ cell }}
                                    </td>
                                </tr>
                            </template>
                            <tr class="bg-[#EAEAEA] divide-x divide-white font-bold">
                                <td  class="flex items-center gap-[5px] whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider" @click="toggleRow('ebitTwoData', buttonDataKey)" :class="{ expanded: isExpanded('ebitTwoData', buttonDataKey) }">
                                    <div class="h-4">
                                        <ChevronDownIcon/>
                                    </div>
                                    {{ buttonData.label }}
                                </td>
                                <td  v-for="(cell, cellIndex) in buttonData.data.slice(1)" :key="cellIndex" class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                    {{ cell }}
                                </td>
                            </tr>
                        </template>
                        <!-- SECOND EBIT END -->   
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</template>