<script setup>
import NormalButton from "@/Components/Misc/Buttons/NormalButton.vue";
import SearchIcon from "@/Components/Misc/Icons/SearchIcon.vue";
import ListIcon from "@/Components/Misc/Icons/ListIcon.vue";
import DateInput from "@/Components/Misc/Input/DateInput.vue";
</script>

<script>
import CheckboxSelectMenu from "@/Components/Misc/Select Menu/CheckboxSelectMenu.vue";


export default {
    name: 'Collection Report',
    components: {
        NormalButton, SearchIcon, ListIcon, DateInput,
        CheckboxSelectMenu,
    },
    data() {
        return {
            partnerClient:[
                {name: 'ALL PARTNERS/CLIENTS'},
                {name: 'Redha Al Ansari Exchange'},
                {name: 'RNV FOREX'},
                {name: 'Right Choice Payments'},
                {name: 'City Express Money Transfer'},
                {name: 'Al Ektasad Exchange'},
                {name: 'J-Dee Remittance Services Pte Ltd'},
                {name: 'Flatley LLC'},
                {name: 'Hodkiewicz Ltd'},
                {name: 'Cummerata Group'},
            ],
            reportType:[
                {name: 'COLLECTION SUMMARY REPORT'},
                {name: 'COLLECTION DETAILED REPORT'},
            ],
            clientType:[
                {name: 'TIE-UP PARTNERS'},
                {name: 'OTHER SERVICES'},
            ],
            selectedPartner: '',
            selectedReport: '',
            selectedClientType: '',
        }
    },
}
</script>
<template>
    <div class="h-screen w-full bg-white">
        <div class="flex flex-col justify-end gap-[15px] min-w-full px-5 pt-10 pb-5">
            <div class="flex gap-[10px] w-[90%] ">

                <div class="w-[25%]">
                    <CheckboxSelectMenu v-model="selectedReport" :placeholder="'select Type of Report'" :label="'Type of Report'" :options="reportType" />
                </div>
                <div class="w-[25%]">
                    <CheckboxSelectMenu v-model="selectedClientType" :label="'Client Type'"   :placeholder="'select Client Type'"  :options="clientType" :withCheckbox="true" />
                </div>
                <div class="w-[25%]">
                    <CheckboxSelectMenu v-model="selectedTransaction" :label="'Client'"  :placeholder="'select Client'" :options="transactionType"/>
                </div>
                <div v-show="selectedReport.name == 'COLLECTION DETAILED REPORT'" class="w-[25%]">
                    <CheckboxSelectMenu v-model="selectedTransaction" :label="'Category'" :placeholder="'select Category'" :options="transactionType"/>
                </div>
            </div>
            <div class="flex justify-between items-end h-auto w-full border-b-2 border-[#EAEAEA]  pb-[30px]">
                <div class="flex justify-end flex-col">
                    <div class="flex gap-3 items-end">
                        <div>
                            <DateInput label="Start Date"/>
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
                            <div class="relative w-full" >
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
        <div v-if="this.selectedPartner && this.selectedPartner && this.selectedTransaction">

        </div>
        <div v-else>
            <div class="flex items-center justify-center h-full w-auto mt-[200px]">
                <h1 class="text-[15px] text-[#3E3E3E]">-- NO RECORDS TO DISPLAY --</h1>
            </div>
        </div>
    </div>
</template>
