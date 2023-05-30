<script setup>
import NormalButton from "@/Components/Misc/Buttons/NormalButton.vue";
import SearchIcon from "@/Components/Misc/Icons/SearchIcon.vue";
import ListIcon from "@/Components/Misc/Icons/ListIcon.vue";
import DateInput from "@/Components/Misc/Input/DateInput.vue";
</script>

<script>
import CheckboxSelectMenu from "@/Components/Misc/Select Menu/CheckboxSelectMenu.vue";
import TransactionReportTable from "./Tables/TransactionReportTable.vue";

export default {
    name: 'Cash Position Report',
    components: {
        NormalButton, SearchIcon, ListIcon, DateInput,
        CheckboxSelectMenu, TransactionReportTable
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
                {name: 'DISTRIBUTION'},
                {name: 'FUNDING'},
                {name: 'TRADING'},
                {name: 'OTHER SERVICES'},
            ],
            transactionType:[
                {name: 'Processing'},
                {name: 'Cancellation'},
                {name: 'Additional'},
                {name: 'Adjustment'},
                {name: 'Refund'},
            ],
            selectedPartner: '',
            selectedReport: '',
            selectedTransaction: '',
        }
    },
}
</script>
<template>
    <div class="h-screen w-full bg-white">
        <div class="flex flex-col justify-end gap-[15px] min-w-full px-3 pt-10 pb-5">
            <div class="flex gap-[10px] w-[65%] mx-[12px]">
                <div class="w-[50%]">
                    <CheckboxSelectMenu v-model="selectedPartner" :placeholder="'select partner/client'" :label="'partner/client'" :options="partnerClient" :withCheckbox="true"/>
                </div>
                <div class="w-[25%]">
                    <CheckboxSelectMenu v-model="selectedReport" :label="'type of report'" :inputWidth="'w-12/12'"  :placeholder="'select report type'"  :options="reportType"/>
                </div>
                <div class="w-[25%]">
                    <CheckboxSelectMenu v-model="selectedTransaction" :label="'transaction type'" :inputWidth="'w-12/12'" :placeholder="'select transaction type'" :options="transactionType"/>
                </div>
            </div>
            <div class="flex justify-between items-end h-auto w-full border-b-2 border-[#EAEAEA] px-[11px] pb-[30px]">
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
            <TransactionReportTable :TieUpPartner="selectedPartner.name" :ReportType="selectedReport.name" :TransactionType="selectedTransaction.name"/>
        </div>
        <div v-else>
            <div class="flex items-center justify-center h-full w-auto mt-[200px]">
                <h1 class="text-[15px] text-[#3E3E3E]">-- NO RECORDS TO DISPLAY --</h1>
            </div>
        </div>
    </div>
</template>
