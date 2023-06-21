<script>
export default{
    data(){
        return{
            activeTab: 1,
            items: [
                { id:1, href: '#item1'},
                { id:2, href: '#item2'},
                { id:3, href: '#item3'},
            ],
            statsTracker: [
                {
                    id: 1, 
                    value: '49.00',
                    tieUp: 'REDHA AL ANSARI EXCHANGE',
                    latestUpdate: '09/28/2022 8:00:00 AM'
                },
                {
                    id: 2, 
                    value: '50.01',
                    tieUp: 'REDHA AL ANSARI EXCHANGE',
                    latestUpdate: '09/28/2022 8:00:00 AM'
                },
                {
                    id: 3, 
                    value: '50.03',
                    tieUp: 'REDHA AL ANSARI EXCHANGE',
                    latestUpdate: '09/28/2022 8:00:00 AM'
                },
                {
                    id: 4, 
                    value: '45.00',
                    tieUp: 'REDHA AL ANSARI EXCHANGE',
                    latestUpdate: '09/28/2022 8:00:00 AM'
                },
                {
                    id: 5, 
                    value: '49.99',
                    tieUp: 'REDHA AL ANSARI EXCHANGE',
                    latestUpdate: '09/28/2022 8:00:00 AM'
                },
            ]
        }
    },
    methods: {
        changeActiveTab(tabId) {
            this.activeTab = tabId;
        }
    }
}
</script>
<template>
    <div class="w-full h-auto p-3 bg-white">
        <div>
            <p class="text-base font-bold">COMMITED RATE AS OF: <br>
               <span class="text-sm">SEPTEMBER 28,2022 08:00:00 AM</span> 
            </p>
        </div>
        <div class="flex justify-center gap-2 mt-3 pb-5 border-b-2 border-[#EAEAEA] w-full">
            <div class="flex flex-col gap-3 w-[80%]">
                <!-- daisyUI - Carousel -->
                <div class="carousel w-full">
                    <div id="item1" class="carousel-item flex justify-center gap-2 w-full">
                        <div v-for="(stat, id) in statsTracker" :key="id" class="flex flex-col justify-center gap-3 h-[120px] w-[20%] py-2 px-1 bg-#F9951E text-center text-white rounded-md">
                            <div class="text-xl">
                                <h3 class="font-bold">{{ stat.value }}</h3>
                            </div>
                            <div>
                                <p class="text-[10px] font-semibold">{{ stat.tieUp }}</p>
                                <p class="text-[8px] uppercase">
                                    <span class="font-semibold">Last update:</span> 
                                    {{ stat.latestUpdate }}
                                </p>
                            </div>
                        </div>
                    </div> 
                    <div id="item2" class="carousel-item flex justify-center gap-3 w-full">
                        <div v-for="(stat, id) in statsTracker" :key="id" class="flex flex-col justify-center gap-3 h-[120px] w-[20%] py-2 px-1 bg-#F9951E text-center text-white rounded-md">
                            <div class="text-xl">
                                <h3 class="font-bold">{{ stat.value }}</h3>
                            </div>
                            <div>
                                <p class="text-[10px] font-semibold">{{ stat.tieUp }}</p>
                                <p class="text-[8px] uppercase">
                                    <span class="font-semibold">Last update:</span> 
                                    {{ stat.latestUpdate }}
                                </p>
                            </div>
                        </div>
                    </div> 
                    <div id="item3" class="carousel-item flex justify-center gap-3 w-full">
                        <div v-for="(stat, id) in statsTracker" :key="id" class="flex flex-col justify-center gap-3 h-[120px] w-[20%] py-2 px-1 bg-#F9951E text-center text-white rounded-md">
                            <div class="text-xl">
                                <h3 class="font-bold">{{ stat.value }}</h3>
                            </div>
                            <div>
                                <p class="text-[10px] font-semibold">{{ stat.tieUp }}</p>
                                <p class="text-[8px] uppercase">
                                    <span class="font-semibold">Last update:</span> 
                                    {{ stat.latestUpdate }}
                                </p>
                            </div>
                        </div>
                    </div> 
                </div> 
                <div class="flex justify-center w-full gap-2">
                    <a v-for="item in items" :key="item.id" :href="item.href" 
                        :class="[
                            'w-3 h-3 rounded-full',
                            item.id === activeTab ? 'bg-[#F9951E]' : 'bg-[#D9D9D9]'
                        ]"
                    @click="changeActiveTab(item.id)"></a>
                </div>
                <!-- daisyUI - Carousel -->
            </div>
            <div class="relative h-[120px] w-[20%] px-1 border-l-2 border-b-2 border-#EAEAEA text-center text-black flex flex-col justify-end rounded-md">
                <img src="../../../../../assets/images/usd_to_php_graph.png" alt="graph-image" class="absolute bottom-0 h-[80px] w-full"/>
                <p class="text-xs text-left font-medium">USD to PHP</p>
            </div>
        </div>
        <div class="flex justify-between gap-[15px] w-full h-auto my-5">
            <div class="h-auto overflow-y-auto rounded-md">
                <table class="h-full w-[350px] text-center">
                    <thead class="sticky top-0 font-medium text-[11px]">
                        <tr>
                            <th class="bg-#3E3E3E text-white" colspan="2">BANK BALANCES</th>
                        </tr>
                        <tr>
                            <th class="bg-#D9D9D9">BANKS</th>
                            <th class="bg-#D9D9D9">AMOUNT</th>
                        </tr>
                    </thead>
                    <tbody class="border-2 border-#EAEAEA divide-y divide-gray-200">
                        <tr class="divide-x divide-gray-200">
                            <td> - </td>
                            <td> - </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="h-auto overflow-y-auto rounded-md">
                <table class="h-full w-[350px] text-center">
                    <thead class="sticky top-0 font-medium text-[11px]">
                        <tr>
                            <th class="bg-#3E3E3E text-white" colspan="2">TIE-UPS FUNDS</th>
                        </tr>
                        <tr>
                            <th class="bg-#D9D9D9">TIE-UPS</th>
                            <th class="bg-#D9D9D9">AMOUNT</th>
                        </tr>
                    </thead>
                    <tbody class="border-2 border-#EAEAEA divide-y divide-gray-200">
                        <tr class="divide-x divide-gray-200">
                            <td> - </td>
                            <td> - </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="h-auto overflow-y-auto rounded-md">
                <table class="h-full w-[350px] text-center">
                    <thead class="sticky top-0 font-medium text-[11px]">
                        <tr>
                            <th class="bg-#3E3E3E text-white" colspan="2">BANK & PROVIDERS FUNDS</th>
                        </tr>
                        <tr>
                            <th class="bg-#D9D9D9">BANKS & PROVIDERS</th>
                            <th class="bg-#D9D9D9">AMOUNT</th>
                        </tr>
                    </thead>
                    <tbody class="border-2 border-#EAEAEA divide-y divide-gray-200">
                        <tr class="divide-x divide-gray-200">
                            <td> - </td>
                            <td> - </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
