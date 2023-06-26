<template>
    <div class="bg-white w-full h-auto px-2">
        <div class="p-4">
            <p class="text-[15px] font-bold">SEPTEMBER 28, 2022 11:10:00 AM</p>
        </div>
        <div class="flex flex-col gap-[8px] text-white uppercase">
            <div class="flex justify-between gap-[8px]">
                <div v-for="(stat, id) in firstRowStats" :key="id" class="flex flex-col gap-[15px] h-[100px] w-[190px] py-3 px-5 bg-[#3e3e3e] rounded-md">
                    <h1 class="text-[13px] font-bold text-center">{{ stat.label }}</h1>
                    <div class="text-[9px]">
                        <div class="flex items-center justify-between">
                            <p>head office:</p>
                            <p>{{ stat.headOffice }}</p>
                        </div>
                        <div class="flex items-center justify-between">
                            <p>branches:</p>
                            <p>{{ stat.branches }}</p>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-[15px] h-[100px] w-[190px] py-3 px-5 bg-[#3e3e3e] rounded-md">
                    <h1 class="text-[13px] font-bold text-center">income statement</h1>
                    <div class="text-[9px]">
                        <div class="flex items-center justify-between">
                            <p>gross profit:</p>
                            <p>***,***.**</p>
                        </div>
                        <div class="flex items-center justify-between">
                            <p>operating expenses:</p>
                            <p>**,***.**</p>
                        </div>
                        <div class="flex items-center justify-between">
                            <p>ebitda:</p>
                            <p>**,***.**</p>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-[15px] h-[100px] w-[190px] py-3 px-5 bg-[#3e3e3e] rounded-md">
                    <h1 class="text-[13px] font-bold text-center">balance sheet</h1>
                    <div class="text-[9px]">
                        <div class="flex items-center justify-between">
                            <p>assets:</p>
                            <p>*,***,***.**</p>
                        </div>
                        <div class="flex items-center justify-between">
                            <p>liabilities & she:</p>
                            <p>*,***,***.**</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex gap-[8px]">
                <div v-for="(stat, id) in secondRowStats" :key="id" class="flex flex-col gap-[15px] h-[100px] w-[190px] py-3 px-5 bg-[#f9951e] rounded-md">
                    <h1 class="text-[13px] font-bold text-center">{{ stat.label }}</h1>
                    <div class="text-[9px]">
                        <div class="flex items-center justify-between">
                            <p>current month:</p>
                            <p>{{ stat.currentMonth }}</p>
                        </div>
                        <div class="flex items-center justify-between">
                            <p>last month:</p>
                            <p>{{ stat.lastMonth }}</p>
                        </div>
                        <div class="flex items-center justify-between">
                            <p>change:</p>
                            <p>{{ stat.change }}%</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-between p-5">
            <div class="flex flex-col gap-[15px] w-[45%] h-full">
                <div class="flex flex-col items-center justify-center h-[300px] w-[full]">
                    <h1 class="text-center text-[14px] font-semibold uppercase">Operating Expenses</h1>
                    <Line :data="operatingExpenses" :options="chartOptions"/>
                </div>
                <div class="flex flex-col items-center justify-center h-[260px] w-[full]">
                    <h1 class="text-center text-[14px] font-semibold uppercase">TRANSACTIONS PER SERVICE TYPE</h1>
                    <Doughnut :data="transactionService" :options="chartOptions" />
                </div>
            </div>
            <div class="flex flex-col gap-[15px] w-[45%] h-full">
                <div class="flex flex-col items-center justify-center h-[300px] w-[full]">
                    <h1 class="text-center text-[14px] font-semibold uppercase">Revenue</h1>
                    <Line :data="revenue" :options="chartOptions"/>
                </div>
                <div class="flex flex-col items-center justify-cente h-[300px] w-[full]">
                    <h1 class="text-center text-[14px] font-semibold uppercase">Collection Efficiency</h1>
                    <Line :data="collectionEfficiency" :options="chartOptions"/>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
  import { Line, Doughnut } from 'vue-chartjs'
  import {   
  Chart as ChartJS,
  CategoryScale,
  LinearScale,
  PointElement,
  LineElement,
  Title,
  ArcElement,
  Tooltip,
  Legend } from 'chart.js'
  
  ChartJS.register(  
  CategoryScale,
  LinearScale,
  PointElement,
  LineElement,
  Title,
  ArcElement,
  Tooltip,
  Legend)
export default {
    components: { 
        Line, Doughnut
    },
    data(){
        return{
            firstRowStats:[
                {
                    label: 'revenue',
                    headOffice: '*,***,***,**',
                    branches: '***,***,**',
                },
                {
                    label: 'cost of sales',
                    headOffice: '*,***,***,**',
                    branches: '***,***,**',
                },
                {
                    label: 'fx gain/loss',
                    headOffice: '*,***,***,**',
                    branches: '***,***,**',
                },
                {
                    label: 'operating expenses',
                    headOffice: '*,***,***,**',
                    branches: '***,***,**',
                },
            ],
            secondRowStats:[
                {
                    label: 'bank balances',
                    currentMonth: '***,***.**',
                    lastMonth: '**,***.**',
                    change: '***.**',
                },
                {
                    label: 'payables',
                    currentMonth: '***,***.**',
                    lastMonth: '**,***.**',
                    change: '***.**',
                },
                {
                    label: 'receivables',
                    currentMonth: '***,***.**',
                    lastMonth: '**,***.**',
                    change: '***.**',
                },
            ],
            //LINE CHART 1
            operatingExpenses: {
            labels: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
            datasets: [
                {
                    label: 'HEAD OFFICE',
                    backgroundColor: '#F9951E',
                    data: [0, 235000, 155000, 177000, 94000, 563000, 794000, 1235000, 999000, 765000, 1000000, 635000]
                },
                {
                    label: 'BRANCHES',
                    backgroundColor: '#3E3E3E',
                    data: [75000, 245000, 255000, 77000, 194000, 663000, 594000, 1435000, 989000, 715000, 1200000, 612000]
                }
            ]
            },
            //LINE CHART 2
            revenue: {
            labels: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
            datasets: [
                {
                    label: 'HEAD OFFICE',
                    backgroundColor: '#F9951E',
                    data: [0, 235000, 155000, 177000, 94000, 563000, 794000, 1235000, 999000, 765000, 1000000, 635000]
                },
                {
                    label: 'BRANCHES',
                    backgroundColor: '#3E3E3E',
                    data: [75000, 245000, 255000, 77000, 194000, 663000, 594000, 1435000, 989000, 715000, 1200000, 612000]
                }
            ]
            },
            //LINE CHART 3
            collectionEfficiency: {
            labels: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
            datasets: [
                {
                    label: '',
                    backgroundColor: '#F9951E',
                    data: [0, 17, 15, 35, 22, 55, 77, 62, 99, 25, 43, 81]
                },
            ]
            },
            //DONUT CHART 1
            transactionService:{
                labels: ['BP', 'CBA', 'DTD', 'OTC'],
                datasets: [
                    {
                        backgroundColor: ['#e74347', '#5ec0be', '#f1b45a', '#949fb1'],
                        data: [7.97, 1.45, 76.81, 13.77]
                    }
                ]
            },
            chartOptions: {
                responsive: true,
                maintainAspectRatio: true
            },
        }
    }
}
</script>