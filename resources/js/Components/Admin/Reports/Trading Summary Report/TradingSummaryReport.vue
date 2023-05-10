<script setup>
import SearchIcon from "@/Components/Misc/Icons/SearchIcon.vue";
import ListIcon from "@/Components/Misc/Icons/ListIcon.vue";
</script>

<script>
import NormalButton from "@/Components/Misc/Buttons/NormalButton.vue";
import DateInput from "@/Components/Misc/Input/DateInput.vue";
import SmallHeading from "@/Components/Misc/Heading/SmallHeading.vue";
export default {
    name: 'Cash Position Report',
    components: {
        NormalButton, SearchIcon, ListIcon, DateInput,
        SmallHeading
    },
    data() {
        return {
            tableOneLabels:[
                {label:'OPEN'},
                {label:'HIGH'},
                {label:'LOW'},
                {label:'CLOSE'},
            ],
            valueTodayLabels:[
                {label:'BANKS/BIDDER'},
                {label:'DATE'},
                {label:'TRADED RATE'},
                {label:'USD AMOUNT'},
                {label:'PESO VALUE'},
                {label:'REMARK'},
                {label:'TYPE'},
            ]
        }
    },
}
</script>
<template>
    <div class="container h-auto bg-white">
        <div class="flex flex-col gap-[15px] min-w-full px-3 pt-10 pb-5">
            <form class="flex justify-between items-end h-auto w-full border-b-2 border-[#EAEAEA] px-[11px] pb-[15px]">
                <div class="flex justify-end flex-col">
                    <div class="flex items-end">
                        <div class="-ml-3">
                            <DateInput label="Date" />
                        </div>
                        <div>
                            <NormalButton label="Filter"
                            class="p-1.5 px-6 uppercase h-[34px] bg-[#3E3E3E] ml-3 tracking-wider text-[10px] text-white" />
                        </div>
                    </div>
                </div>
                <div class="right-side">
                    <div class="flex items-start">
                        <NormalButton label="Export"
                        class="p-1.5 px-3 uppercase h-[34px] bg-[#3E3E3E] ml-4 tracking-wider text-[10px] text-white" />
                    </div>
                </div>
            </form>
        </div>

        <!-- MAIN CONTENT -->
        <div class="flex flex-col gap-[20px] h-auto pb-10 px-3">
            <div class="flex flex-col justify-between uppercase mb-[30px]">
                <h2 class="text-[16px] text-center font-semibold">OPTIMUM EXCHANGE REMIT INC.</h2>
                <div class="text-center mt-[20px]">
                    <h3 class="text-[13px] font-semibold">TRADING SUMMARY</h3>
                    <p class="text-[12px]">09/28/2022</p>
                </div>
            </div>
            <!-- TABLE 1 -->
            <div class="w-[60%] self-end ">
                <div class="2xl:container w-full border">
                    <table class="w-full">
                        <thead class="divide-y divide-gray-200 bg-[#3E3E3E] text-[11px] font-normal text-white text-center uppercase whitespace-nowrap">
                            <tr class="divide-x divide-gray-200 ">
                                <th v-for="label in tableOneLabels" :key="label.label" scope="col" class="px-1 py-2">
                                    {{label.label}}
                                </th>
                            </tr>
                        </thead>
                        <tbody class=" text-[10px] font-light text-right text-#3E3E3E whitespace-nowrap">
                            <tr class="divide-x divide-gray-200">
                                <td class="w-1/4 whitespace-nowrap uppercase py-2 px-1 tracking-wider">
                                    47.80
                                </td>
                                <td class="w-1/4 whitespace-nowrap uppercase py-2 px-1 tracking-wider">
                                    47.80
                                </td>
                                <td class="w-1/4 whitespace-nowrap uppercase py-2 px-1 tracking-wider">
                                    47.80
                                </td>
                                <td class="w-1/4 whitespace-nowrap uppercase py-2 px-1 tracking-wider">
                                    47.80
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- TABLE 2 -->
            <div class="w-[60%]">
                <div class="2xl:container w-full">
                    <table class="w-full">
                        <thead class="divide-y divide-gray-200 bg-[#3E3E3E] text-[11px] font-normal text-white text-center uppercase whitespace-nowrap">
                            <tr class="divide-x divide-gray-200 ">
                                <th colspan="3" class="px-1 py-2 uppercase tracking-wider text-left">
                                    WEIGHTED AVERAGE RATE OF VALUE TOMORROW
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-[10px] font-light text-#3E3E3E whitespace-nowrap">
                            <tr class="divide-x divide-gray-200">
                                <td class="w-2/4 whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider font-semibold">
                                    COMMITTED RATE
                                </td>
                                <td class="w-1/4 whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider bg-[#D7D7D7] font-semibold">
                                    NOON
                                </td>
                                <td class="w-1/4 whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider bg-[#D7D7D7] font-semibold">
                                    FINAL
                                </td>
                            </tr>
                            <tr class="divide-x divide-gray-200">
                                <td class="w-1/4 whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider">
                                    AL EKTASAD
                                </td>
                                <td class="w-1/4 whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                    47.8O
                                </td>
                                <td class="w-1/4 whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                    47.8O
                                </td>
                            </tr>
                            <tr class="divide-x divide-gray-200">
                                <td class="w-1/4 whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider">
                                    REDHA AL ANSARI
                                </td>
                                <td class="w-1/4 whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                    47.8O
                                </td>
                                <td class="w-1/4 whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                    47.8O
                                </td>
                            </tr>
                            <tr class="divide-x divide-gray-200">
                                <td class="w-1/4 whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider font-semibold">
                                    WEIGHTED AVERAGE RATE
                                </td>
                                <td class="w-1/4 whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                    
                                </td>
                                <td class="w-1/4 whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                    47.8O
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="w-full">
                <h1 class="text-[13px] font-semibold">TRADE FOR TODAY</h1>
                <SmallHeading label="VALUE TODAY" class="pl-6 w-[15%]"/>
                <!-- TABLE 3 -->
                <div class="overflow-auto w-full">
                    <div class="2xl:container w-full border">
                        <table class="w-full">
                            <thead class="divide-y divide-gray-200 bg-[#D7D7D7] text-[11px] font-normal  text-[#3E3E3E] uppercase whitespace-nowrap">
                                <tr class="divide-x divide-gray-200 ">
                                    <th v-for="label in valueTodayLabels" :key="label.label" scope="col" class="px-1 py-2 uppercase tracking-wider text-center">
                                    {{label.label}}
                                    </th>
                                </tr>
                            </thead>
                            <tbody class=" text-[10px] font-light text-#3E3E3E whitespace-nowrap">
                                <tr class="divide-x divide-gray-200">
                                    <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        Multi Line Structures
                                    </td>
                                    <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        09/28/2022 11:00:22 AM
                                    </td>
                                    <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        47.870
                                    </td>
                                    <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        10,000.00 
                                    </td>
                                    <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        478,700.00
                                    </td>
                                    <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        tod-ELIO
                                    </td>
                                    <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        SELL
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="w-full">
                <SmallHeading label="VALUE TOMORROW" class="pl-6 w-[15%]"/>
                <!-- TABLE 3 -->
                <div class="overflow-auto w-full">
                    <div class="2xl:container w-full border">
                        <table class="w-full">
                            <thead class="divide-y divide-gray-200 bg-[#D7D7D7] text-[11px] font-normal  text-[#3E3E3E] uppercase whitespace-nowrap">
                                <tr class="divide-x divide-gray-200 ">
                                    <th v-for="label in valueTodayLabels" :key="label.label" scope="col" class="px-1 py-2 uppercase tracking-wider text-center">
                                    {{label.label}}
                                    </th>
                                </tr>
                            </thead>
                            <tbody class=" text-[10px] font-light text-#3E3E3E whitespace-nowrap">
                                <tr class="divide-x divide-gray-200">
                                    <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        Multi Line Structures
                                    </td>
                                    <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        09/28/2022 11:00:22 AM
                                    </td>
                                    <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        47.870
                                    </td>
                                    <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        10,000.00 
                                    </td>
                                    <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        478,700.00
                                    </td>
                                    <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        tod-ELIO
                                    </td>
                                    <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        BUY
                                    </td>
                                </tr>
                            </tbody>
                            <!-- AVERAGE -->
                            <tfoot class="text-[10px] font-bold text-#3E3E3E bg-white whitespace-nowrap ">
                                <tr class="divide-x divide-gray-200">
                                    <td></td>
                                    <td></td>
                                    <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider border-y-2 border-#D7D7D7">
                                        49.16
                                    </td>
                                    <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider border-y-2 border-#D7D7D7">
                                        738,238.77
                                    </td>
                                    <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider border-y-2 border-#D7D7D7">
                                        38,812,684.15
                                    </td>
                                    <td class="border-y-2 border-#D7D7D7"></td>
                                    <td class="border-y-2 border-#D7D7D7"></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>