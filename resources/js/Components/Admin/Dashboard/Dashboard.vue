<script setup>
const stats = [
    {
        name: 'Total Processed', stat: 5, others: [
            2, 2, 0, 0, 0, 1
        ]
    },
]
</script>
<template>
    <div class="bg-white w-full h-screen border border-white ">
        <div class="p-4 pt-0">
            <dl class="mt-5 grid gap-5 grid-cols-1 h-[169px] md:grid-cols-4">
                <!--Total Pending-->
                <div class="md:overflow-hidden border border-gray-200 bg-[#F9951E] px-4 py-3  shadow-lg">
                    <dt
                        class="truncate text-[12px] text-[#ffffff] text-center font-rubik font-semibold tracking-wider uppercase">
                        Total Pending
                    </dt>
                    <div class="flex items-center justify-center mt-4">
                        <dd class="text-[48px] font-rubik underline font-semibold tracking-tight text-[#ffffff] text-center">
                            4
                        </dd>
                    </div>
                </div>
                <!--Total Processed-->
                <div v-for="item in stats" :key="item.name"
                    class="md:overflow-hidden border border-gray-200 bg-white px-4 py-3  shadow-lg">
                    <dt
                        class="truncate text-[12px] text-[#3E3E3E] text-center font-rubik font-semibold tracking-wider uppercase">
                        {{ item.name }}
                    </dt>
                    <div class="flex items-center justify-center space-x-12 mt-4">
                        <dd
                            class="text-[48px] -mt-3 font-rubik underline font-semibold tracking-tight text-[#0070C0] text-center">
                            {{ item.stat }}
                        </dd>
                        <ul class="text-right text-sm leading-none font-[300px] text-[#3E3E3E] uppercase">
                            <li>Redha - {{ item.others[0] }}</li>
                            <li>Ekte - {{ item.others[1] }}</li>
                            <li>JDEE - {{ item.others[2] }}</li>
                            <li>CITI - {{ item.others[3] }}</li>
                            <li>RNV - {{ item.others[4] }}</li>
                            <li>RCP - {{ item.others[5] }}</li>
                        </ul>
                    </div>
                </div>
                <!--Total TXN Count-->
                <div class="md:overflow-hidden border border-gray-200 bg-white px-4 py-3  shadow-lg">
                    <dt
                        class="truncate text-[12px] text-[#3E3E3E] text-center font-rubik font-semibold tracking-wider uppercase">
                        TOTAL TXN COUNT: 1,537
                    </dt>
                    <div class="flex items-center justify-left mt-4 space-x-6   ">
                        <dd
                            class="text-[48px] font-rubik underline font-semibold tracking-tight text-[#0070C0] text-center">

                        </dd>
                        <ul class="text-left leading-none font-[300px] text-sm text-[#3E3E3E] uppercase">
                            <li>Redha - 2</li>
                            <li>Ekte - 2</li>
                            <li>JDEE - 0</li>
                            <li>CITI - 0</li>
                            <li>RNV - 0</li>
                            <li>RCP - 2</li>
                        </ul>
                    </div>
                </div>
                <!-- Total Amount-->
                <div class="md:overflow-hidden border border-gray-200 bg-white px-4 py-3  shadow-lg">
                    <dt
                        class="truncate text-[12px] text-[#3E3E3E] text-center font-rubik font-semibold tracking-wider uppercase">
                        TOTAL AMOUNT
                    </dt>
                    <div class="flex items-center justify-left mt-4 space-x-6   ">
                        <dd
                            class="text-[48px] font-rubik underline font-semibold tracking-tight text-[#0070C0] text-center">

                        </dd>
                        <ul class="text-left leading-none font-[300px] text-[#3E3E3E] tracking-wider text-sm">
                            <li>
                                <span class="uppercase">Redha</span> - x,xxx,xxx,xx
                            </li>
                            <li>
                                <span class="uppercase">Ekte</span> - xxx,xxx,xxx
                            </li>
                            <li>
                                <span class="uppercase">JDEE</span> - 0
                            </li>
                            <li>
                                <span class="uppercase">citi</span> - 0
                            </li>
                            <li>
                                <span class="uppercase">rnv</span>- 0
                            </li>
                            <li>
                                <span class="uppercase">RCP</span> - xx,xxx,xx
                            </li>
                        </ul>
                    </div>
                </div>
            </dl>
        </div>
    </div>
    <!-- <GChart type="ColumnChart" :data="chartData" :options="chartOptions" /> -->
</template>
