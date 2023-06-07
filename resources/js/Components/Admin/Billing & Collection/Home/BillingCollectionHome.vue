<template>
  <div class="flex flex-col gap-[70px] justify-center w-full h-auto bg-white p-5">
    <div class="flex flex-col items-center justify-center h-[400px] w-full mt-[30px]">
      <h1 class="text-center font-semibold">BILLS PAYMENT</h1>
      <Line :data="chartData" :options="chartOptions"/>
    </div>
    <div class="flex justify-center gap-[15px]">
      <div v-for="stat in statsTracker" :key="stat.id">
        <div class="flex items-center justify-center  h-[100px] w-[220px] rounded-md bg-[#F9951E] text-white uppercase">
          <div class="flex flex-col items-center justify-center gap-[5px]">
            <div>
              <span class="text-[8px]">{{ stat.currency }}</span>
              <p class="text-[18px] tracking-wide text-center font-semibold">{{ stat.value }}</p>
            </div>
            <p class="text-[11px] ">{{ stat.category }}</p>
          </div>
        </div>
      </div>
    </div>
    <div class="flex justify-between w-full">
      <div class="h-[300px] w-[45%]">
        <h1 class="text-center font-semibold">COLLECTION EFFICIENCY</h1>
        <Line :data="chartDataTwo" :options="chartOptions"/>
      </div>
      <div class="h-[300px] w-[45%]">
        <h1 class="text-center font-semibold">BILLING SUMMARY</h1>
        <Line :data="chartDataThree" :options="chartOptions"/>
      </div>
    </div>
  </div>
</template>
  
<script>
  import { Line } from 'vue-chartjs'
  import {   
  Chart as ChartJS,
  CategoryScale,
  LinearScale,
  PointElement,
  LineElement,
  Title,
  Tooltip,
  Legend } from 'chart.js'
  
  ChartJS.register(  
  CategoryScale,
  LinearScale,
  PointElement,
  LineElement,
  Title,
  Tooltip,
  Legend)
  
  export default {
    name: 'LineChart',
    components: { Line },
    data() {
      return {
        // CHART 1
        chartData: {
          labels: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
          datasets: [
            {
              label: 'BILLED',
              backgroundColor: '#F9951E',
              data: [40, 39, 10, 40, 39, 80, 40, 39, 10, 40, 39, 80, 40]
            },
            {
              label: 'PAYMENTS',
              backgroundColor: '#EE3E2C',
              data: [25, 34, 12, 42, 25, 70, 80, 21, 18, 42, 38, 60, 20]
            }
          ]
        },

        // Chart 2
        chartDataTwo: {
          labels: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
          datasets: [
            {
              backgroundColor: '#F9951E',
              data: [40, 39, 10, 40, 39, 80, 40, 39, 10, 40, 39, 80, 40]
            },
          ]
        },
        // Chart 3
        chartDataThree: {
          labels: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
          datasets: [
            {
              label: 'BUILD SOA',
              backgroundColor: '#F9951E',
              data: [40, 39, 10, 40, 39, 80, 40, 39, 10, 40, 39, 80, 40]
            },
            {
              label: 'OPEN SOA',
              backgroundColor: '#EE3E2C',
              data: [25, 34, 12, 42, 25, 70, 80, 21, 18, 42, 38, 60, 20]
            }
          ]
        },

        chartOptions: {
          responsive: true,
          maintainAspectRatio: true
        },
        statsTracker: [
          {id: 1, currency: 'PHP', value: '15,000,123.45', category: 'AMOUNT OUTSTANDING'},
          {id: 2, currency: 'PHP', value: '4,850,500.12', category: 'COLLECTIONS FOR THE MONTH'},
          {id: 3, currency: 'PHP', value: '5,000,000.12', category: 'TARGET FOR THE MONTH'},
          {id: 4, currency: 'PHP', value: '512,000.12', category: 'COLLECTIONS FOR THE DAY'},
          {id: 5, currency: '', value: '57%', category: 'MONTH TO DATE - HIT RATE'},
        ]
      }
    },
  }
</script>
