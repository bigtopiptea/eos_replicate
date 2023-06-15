<script>
import NormalButton from "@/Components/Misc/Buttons/NormalButton.vue";
import SearchIcon from "@/Components/Misc/Icons/SearchIcon.vue";
import ListIcon from "@/Components/Misc/Icons/ListIcon.vue";
import DateInput from "@/Components/Misc/Input/DateInput.vue";
import OutwardRemittanceTable from "./Tables/OutwardRemittanceTable.vue";
import CheckboxSelectMenu from "@/Components/Misc/Select Menu/CheckboxSelectMenu.vue";
import CheckboxSelectMenuThree from "@/Components/Misc/Select Menu/CheckboxSelectMenuThree.vue";
export default {
  watch: {
  },
    name: 'Outward Remittance Report',
    components: {
        NormalButton, SearchIcon, ListIcon, DateInput,
        CheckboxSelectMenu, OutwardRemittanceTable,
        CheckboxSelectMenuThree
    },
    data() {
        return {
            remitterOptions:[
                {
                    label: 'SELECT ALL',
                    children:[
                        {label: 'Dusit Hospitality Education Phils In'},
                        {label: 'Multi - Line Building SystemALLBANK INC'},
                        {label: 'Prime Asset Ventures INC'},
                        {label: 'TKH Marketing'},
                        {label: 'The Lift Company Phils'},
                        {label: 'vertex entertainment and resorts corp'},
                    ]
                }

            ],
            country:[
                {label: 'Philippines'},
                {label: 'Japan'},
                {label: 'Korea'},
            ],
            selectedRemitter: '',
            selectedCountry: ''
        }
    },
}
</script>
<template>
    <div class="3xl:container h-screen bg-white px-3">
        <div class="flex flex-col gap-[15px] min-w-full pt-10 pb-5">
            <div class="flex gap-[10px] w-[85%] mx-[12px]">
                <div class="w-[23.5%]">
                    <CheckboxSelectMenuThree v-model="selectedRemitter" :label="'remitter'" :inputWidth="'w-12/12'"  :options="remitterOptions" :placeholder="'SELECT REMITTER'"/>
                </div>
                <div class="w-[23.5%]">
                    <CheckboxSelectMenu v-if="this.selectedRemitter.name" v-model="selectedCountry" :label="'country'" :placeholder="'SELECT COUNTRY'" :inputWidth="'w-12/12'" :options="country"/>
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
                                class="bg-gray-50 h-[34px] border border-r-0 border-[#EAEAEA] text-gray-900 text-[10px] block w-full pl-10 py-1 px-2.5"
                                placeholder="Search" required />
                            </div>
                            <NormalButton label="Go"
                            class="p-1.5 px-3 uppercase h-[34px] bg-[#F9951E] text-[10px] text-white" />
                        </div>
                        <NormalButton label="Export"
                        class="p-1.5 px-3 uppercase h-[34px] bg-[#3E3E3E]  tracking-wider text-[10px] text-white" />
                    </form>
                </div>
            </div>
        </div>

        <!-- MAIN CONTENT -->
        <div v-if="this.selectedRemitter && this.selectedCountry">
            <OutwardRemittanceTable :Remitter="selectedRemitter.name"/>
        </div>
        <div v-else>
            <div class="flex items-center justify-center h-full w-auto mt-[200px]">
                <h1 class="text-[15px] text-[#3E3E3E]">-- NO RECORDS TO DISPLAY --</h1>
            </div>
        </div>
    </div>
</template>
