<script>
import NormalButton from "@/Components/Misc/Buttons/NormalButton.vue";
import SearchIcon from "@/Components/Misc/Icons/SearchIcon.vue";
import ListIcon from "@/Components/Misc/Icons/ListIcon.vue";
import DateInput from "@/Components/Misc/Input/DateInput.vue";
import CheckboxSelectMenu from "@/Components/Misc/Select Menu/CheckboxSelectMenu.vue";
import ConsolidatedIncomeTable from "./Tables/ConsolidatedIncomeTable.vue";
export default {
    name: 'Consolidated Income Report',
    components: {
        NormalButton, SearchIcon, ListIcon, DateInput,
        CheckboxSelectMenu, ConsolidatedIncomeTable
    },
    data() {
        return {
            yearOptions:[
                {label: '2010'}, {label: '2011'},
                {label: '2012'}, {label: '2013'},
                {label: '2014'}, {label: '2015'},
                {label: '2016'}, {label: '2017'},
                {label: '2018'}, {label: '2019'},
                {label: '2020'}, {label: '2021'},
                {label: '2022'}, {label: '2023'},
                {label: '2024'}, {label: '2025'},
                {label: '2026'}, {label: '2027'},
            ],
            selectedYear: '',
        }
    },
}
</script>
<template>
    <div class="w-full h-auto bg-white">
        <div class="flex flex-col gap-[15px] min-w-full py-5 px-[12px]">
            <div class="flex justify-between items-end h-auto w-full border-b-2 border-[#EAEAEA] px-[11px] pb-[30px]">
                <div class="w-[10%]">
                    <div class="w-full">
                        <CheckboxSelectMenu v-model="selectedYear" :label="'year'" :inputWidth="'w-12/12'"  :placeholder="'select'" :options="yearOptions"/>
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
        <div v-if="this.selectedYear">
            <ConsolidatedIncomeTable :Year="this.selectedYear.label"/>
        </div>
        <div v-else class="flex flex-col items-center justify-center py-20">
            <img src="../../../../../../assets/images/no-records-img.png" alt="" class="h-[200px] w-[230px]">
            <p class="uppercase text-center text-[16px] font-semibold">no records to display</p>
        </div>
  
    </div>
</template>
