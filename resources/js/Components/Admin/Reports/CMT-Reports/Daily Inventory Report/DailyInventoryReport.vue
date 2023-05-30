<script setup>
import NormalButton from "@/Components/Misc/Buttons/NormalButton.vue";
import SearchIcon from "@/Components/Misc/Icons/SearchIcon.vue";
import ListIcon from "@/Components/Misc/Icons/ListIcon.vue";
import DateInput from "@/Components/Misc/Input/DateInput.vue";
</script>

<script>
import BorderButton from "@/Components/Misc/Buttons/BorderButton.vue";
import CheckboxSelectMenu from "@/Components/Misc/Select Menu/CheckboxSelectMenu.vue";
import DailyInventoryReportTable from "./Tables/DailyInventoryReportTable.vue";
export default {
    name: 'Daily Inventory Report',
    components: {
        NormalButton, SearchIcon, ListIcon, DateInput,
        BorderButton, CheckboxSelectMenu, DailyInventoryReportTable
    },
    data() {
        return {
            tieUpPartner:[
                {name: 'Tie-Up 1'},
                {name: 'Tie-Up 2'},
                {name: 'Tie-Up 3'},
            ],
            tradingType:[
                {name: 'BUY'},
                {name: 'SELL'},
                // {name: 'BUY/SELL'}
            ],
            selectedTieUpBanks: '',
            selectedTrading: ''
        }
    },
}
</script>
<template>
    <div class="w-auto h-screen bg-white">
        <div class="flex flex-col gap-[15px] min-w-full px-3 pt-10 pb-5">
            <div class="flex justify-between items-center mx-[12px]">
                <div class="flex gap-[10px] w-[48%]">
                    <div class="w-[70%]">
                        <CheckboxSelectMenu v-model="selectedTieUpBanks" :label="'Tie-up/Banks'" :inputWidth="'w-12/12'"  :placeholder="'SELECT TIE-UP PARTNER/BANKS'" :options="tieUpPartner"/>
                    </div>
                    <div class="w-[30%]">
                        <CheckboxSelectMenu v-model="selectedTrading" :label="'Trading Type'" :inputWidth="'w-12/12'" :placeholder="'SELECT TRADING TYPE'" :options="tradingType"/>
                    </div>
                </div>
                <div>
                    <BorderButton :buttonLabel="'VIEW AVAILABLE INVENTORY'" :buttonPadding="'p-2'" :buttonSize="'h-[40px] w-auto'"/>
                </div>
            </div>
            <div class="flex justify-between items-end h-auto w-full border-b-2 border-[#EAEAEA] px-[11px] pb-[30px]">
                <div class="flex justify-end flex-col">
                    <div class="flex gap-3 items-end">
                        <div>
                            <DateInput label="Start Date" />
                        </div>
                        <div>
                            <DateInput label="End Date" />
                        </div>
                        <div>
                            <NormalButton label="Filter"
                            class="p-1.5 px-6 uppercase h-[34px] bg-[#3E3E3E] tracking-wider text-[10px] text-white" />
                        </div>
                    </div>
                </div>
                <div class="right-side">
                    <form class="flex items-start gap-3">
                        <div class="flex">
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <SearchIcon />
                                </div>
                            <input type="text" id="simple-search"
                                class="bg-gray-50 h-[34px] border border-r-0 border-[#EAEAEA] text-gray-900 text-[10px] block w-full pl-10 py-2 px-1.5"
                                placeholder="Search" required />
                            </div>
                            <NormalButton label="Go"
                            class="p-1.5 px-3 uppercase h-[34px] bg-[#F9951E] text-[10px] text-white" />
                        </div>
                            <NormalButton label="Export"
                        class="p-1.5 px-3 uppercase h-[34px] bg-[#3E3E3E] tracking-wider text-[10px] text-white" />
                    </form>
                </div>
            </div>
        </div>

        <!-- MAIN CONTENT -->
        <div v-if="this.selectedTieUpBanks && this.selectedTrading">
            <DailyInventoryReportTable :TieUpBanks="selectedTieUpBanks.name" :TradingType="selectedTrading.name"/>
        </div>
        <div v-else>
            <div class="flex items-center justify-center h-full w-auto mt-[200px]">
                <h1 class="text-[15px] text-[#3E3E3E]">-- NO RECORDS TO DISPLAY --</h1>
            </div>
        </div>

    </div>
</template>
