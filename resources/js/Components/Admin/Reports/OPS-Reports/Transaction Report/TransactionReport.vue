<script>
import NormalButton from "@/Components/Misc/Buttons/NormalButton.vue";
import SearchIcon from "@/Components/Misc/Icons/SearchIcon.vue";
import ListIcon from "@/Components/Misc/Icons/ListIcon.vue";
import DateInput from "@/Components/Misc/Input/DateInput.vue";
import CheckboxSelectMenu from "@/Components/Misc/Select Menu/CheckboxSelectMenu.vue";
import CheckboxSelectMenuThree from "@/Components/Misc/Select Menu/CheckboxSelectMenuThree.vue";
// TABLES
import VolumeSummaryReport from './Tables/VolumeSummaryReport.vue';
import WaivedReport from "./Tables/WaivedReport.vue";
import DetailedVolumeReport from './Tables/DetailedVolumeReport.vue';
import PerServiceReportTable from './Tables/PerServiceReportTable.vue';
import AdditionalTransactionTable from "./Tables/AdditionalTransactionTable.vue";
import ReversalTransactionTable from './Tables/ReversalTransactionTable.vue';
import CancellationTransactionTable from './Tables/CancellationTransactionTable.vue';
import RefundTransactionTable from './Tables/RefundTransactionTable.vue';
export default {
    name: 'OPS Transaction Report',
    components: {
        NormalButton, SearchIcon, ListIcon, DateInput,
        CheckboxSelectMenu, VolumeSummaryReport,WaivedReport, 
        DetailedVolumeReport, PerServiceReportTable,
        AdditionalTransactionTable, ReversalTransactionTable,
        CancellationTransactionTable, RefundTransactionTable,
        CheckboxSelectMenuThree

    },

    data() {
        return {
            tieUp:[
                {
                    label: 'Select All',
                    children: [
                        {label: 'Tie-Up 1', value: 'Tie-Up 1'},
                        {label: 'Tie-Up 2', value: 'Tie-Up 2'},
                        {label: 'Tie-Up 3', value: 'Tie-Up 3'},
                    ]
                }
                ],
            billerName:[
                {
                    label: 'Housing',
                    children: [
                        {label: 'BRIA HOMES INC', value: 'BRIA HOMES INC'},
                        {label: 'COMMUNITIES', value: 'COMMUNITIES'},
                        {label: 'HOUSEHOLD DEVELOPMENT CORP', value: 'HOUSEHOLD DEVELOPMENT CORP'},
                        {label: 'PRIMA CASA LAND/LUMINA', value: 'PRIMA CASA LAND/LUMINA'},
                    ]
                }

            ],
            TypeOfReports:[
                {value: 'VOLUME SUMMARY REPORT', label: 'VOLUME SUMMARY REPORT'},
                {value: 'DETAILED VOLUME REPORT', label: 'DETAILED VOLUME REPORT'},
                {value: 'PER SERVICE TRANSACTION REPORT', label: 'PER SERVICE TRANSACTION REPORT'},
                {value: 'ADDITIONAL TRANSACTION REPORT', label: 'ADDITIONAL TRANSACTION REPORT'},
                {value: 'WAIVED CHARGES REPORT', label: 'WAIVED CHARGES REPORT'},
                {value: 'REVERSAL TRANSACTION REPORT', label: 'REVERSAL TRANSACTION REPORT'},
                {value: 'CANCELLATION TRANSACTION REPORT', label: 'CANCELLATION TRANSACTION REPORT'},
                {value: 'REFUND TRANSACTION REPORT', label: 'REFUND TRANSACTION REPORT'},
            ],
            TransactionTypes:[
                {value: 'OTC/CASH PICKUP ANYWHERE', label: 'OTC/CASH PICKUP ANYWHERE'},
                {value: 'CBA - CREDIT TO BANK ACCOUNT', label: 'CBA - CREDIT TO BANK ACCOUNT'},
                {value: 'BP - BILLS PAYMENT', label: 'BP - BILLS PAYMENT'},
                {value: 'DTD - DOOR TO DOOR DELIVERY', label: 'DTD - DOOR TO DOOR DELIVERY'},
            ],

            test:true,
            TypeOfReportChoice:'',
            TransactionTypeChoice:'',
            TieUpChoice:'',
            billerChoice:'',
            selectedDate:'',
        }
    },

    // methods:{


    // },

    // computed: {
    //     content() {
    //         return this.TypeOfReportChoice !== null;
    //     }
    // },

}
</script>
<template>
    <div class="w-full h-screen bg-white" :class="TieUpChoice.value || TypeOfReportChoice.value || TransactionTypeChoice.value || billerChoice.value">
        <div class="flex flex-col gap-[15px] min-w-full px-3 pt-10 pb-5">
            <div class="flex gap-[10px] w-[90%] mx-[12px]">
                <div class="w-[25%]">
                    <CheckboxSelectMenuThree v-model="TieUpChoice" :label="'Tie-Up'" :inputWidth="'w-12/12'" :placeholder="'SELECT Tie-up Partner'" :options="tieUp"/>
                </div>
                <div  class="w-[25%]">
                    <CheckboxSelectMenu v-model="TypeOfReportChoice" :label="'Type of Report'" :inputWidth="'w-12/12'"  :placeholder="'SELECT Type of Report'" :options="TypeOfReports"/>
                </div>
                <div v-show="TypeOfReportChoice.value === 'PER SERVICE TRANSACTION REPORT'" class="w-[25%]">
                    <CheckboxSelectMenu v-model="TransactionTypeChoice" :label="'Transaction Type'" :inputWidth="'w-12/12'"  :placeholder="'SELECT Transaction Type'" :options="TransactionTypes"/>
                </div>
                <div v-show="TransactionTypeChoice.value"  class="w-[25%]">
                    <CheckboxSelectMenuThree v-model="billerChoice" :label="'Biller Name'" :inputWidth="'w-12/12'"  :placeholder="'SELECT Biller Name'" :options="billerName"/>
                </div>
            </div>
            <div class="flex justify-between items-end h-auto w-full border-b-2 border-[#EAEAEA] px-[11px] pb-[30px]">
                <div class="flex justify-end flex-col">
                    <div class="flex gap-3 items-end">
                        <div>
                            <DateInput  label="Start Date" v-model="selectedDate" />

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
        <div v-if="TieUpChoice.value && TypeOfReportChoice.value === 'VOLUME SUMMARY REPORT'">
            <VolumeSummaryReport :TieUpPartners="TieUpChoice.value" :ReportType="TypeOfReportChoice.value"/>
        </div>
        <div v-else-if="TieUpChoice.value && TypeOfReportChoice.value === 'PER SERVICE TRANSACTION REPORT' && TransactionTypeChoice.value && billerChoice.value">
            <PerServiceReportTable :TieUpPartners="TieUpChoice.value" :ReportType="TypeOfReportChoice.value" :BillerName="billerChoice.value"/>
        </div>
        <div v-else-if="TieUpChoice.value && TypeOfReportChoice.value === 'ADDITIONAL TRANSACTION REPORT'">
            <AdditionalTransactionTable :TieUpPartners="TieUpChoice.value" :ReportType="TypeOfReportChoice.value"/>
        </div>
        <div v-else-if="TieUpChoice.value && TypeOfReportChoice.value === 'REVERSAL TRANSACTION REPORT'">
            <ReversalTransactionTable :TieUpPartners="TieUpChoice.value" :ReportType="TypeOfReportChoice.value"/>
        </div>
        <div v-else-if="TieUpChoice.value && TypeOfReportChoice.value === 'CANCELLATION TRANSACTION REPORT'">
            <CancellationTransactionTable :TieUpPartners="TieUpChoice.value" :ReportType="TypeOfReportChoice.value"/>
        </div>
        <div v-else-if="TieUpChoice.value && TypeOfReportChoice.value === 'REFUND TRANSACTION REPORT'">
            <RefundTransactionTable :TieUpPartners="TieUpChoice.value" :ReportType="TypeOfReportChoice.value"/>
        </div>
        <div v-else-if="TieUpChoice.value && TypeOfReportChoice.value === 'WAIVED CHARGES REPORT'" >
            <WaivedReport :TieUpPartners="TieUpChoice.value" :ReportType="TypeOfReportChoice.value"/>
        </div>
        <div v-else-if="TieUpChoice.value && TypeOfReportChoice.value === 'DETAILED VOLUME REPORT'" >
            <DetailedVolumeReport :TieUpPartners="TieUpChoice.value" :ReportType="TypeOfReportChoice.value"/>
        </div>
        <div v-else>
            <div class="flex items-center justify-center h-full w-auto mt-[200px]">
                <h1 class="text-[15px] text-[#3E3E3E]">-- NO RECORDS TO DISPLAY --</h1>
            </div>
        </div>
    </div>
</template>
