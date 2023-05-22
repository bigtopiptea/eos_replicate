<script>
import NormalButton from "@/Components/Misc/Buttons/NormalButton.vue";
import SearchIcon from "@/Components/Misc/Icons/SearchIcon.vue";
import ListIcon from "@/Components/Misc/Icons/ListIcon.vue";
import DateInput from "@/Components/Misc/Input/DateInput.vue";
import CheckboxSelectMenu from "@/Components/Misc/Select Menu/CheckboxSelectMenu.vue";

export default {
    name: 'Status Report',
    components: {
        NormalButton, SearchIcon, ListIcon, DateInput,
        CheckboxSelectMenu,
    },

    data() {
        return {
            supplier:[
                {name: 'Supplier 1'},
                {name: 'Supplier 2'},
                {name: 'Supplier 3'},
            ],
            TypeOfReports:[
                {value: 'VOLUME REPORT SUMMARY', name: 'VOLUME REPORT SUMMARY'},
                {value: 'DETAILED VOLUME REPORT', name: 'DETAILED VOLUME REPORT'},
                {value: 'PER SERVICE TRANSACTION REPORT', name: 'PER SERVICE TRANSACTION REPORT'},
                {value: 'ADDITIONAL TRANSACTIONS', name: 'ADDITIONAL TRANSACTIONS'},
                {value: 'WAIVED CHARGES', name: 'WAIVED CHARGES'},
                {value: 'REVERSAL TRANSACTIONS', name: 'REVERSAL TRANSACTIONS'},
            ],
            TransactionTypes:[
                {value: 'OTC/CASH PICKUP ANYWHERE', name: 'OTC/CASH PICKUP ANYWHERE'},
                {value: 'CBA - CREDIT TO BANK ACCOUNT', name: 'CBA - CREDIT TO BANK ACCOUNT'},
                {value: 'BP - BILLS PAYMENT', name: 'BP - BILLS PAYMENT'},
                {value: 'DTD - DOOR TO DOOR DELIVERY', name: 'DTD - DOOR TO DOOR DELIVERY'},
            ],

            test:true,
            TypeOfReportChoice:'',
            TransactionTypeChoice:'',
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
    <div class="w-full h-screen bg-white">
        <div class="flex flex-col gap-[15px] min-w-full px-3 pt-10 pb-5">
            <div class="flex gap-[10px] w-[90%] mx-[12px]">
                <div class="w-[25%]">
                    <CheckboxSelectMenu :label="'Tie-Up'" :inputWidth="'w-12/12'"  :placeholder="'SELECT Tie-up Partner'" :options="supplier"/>
                </div>
                <div  class="w-[25%]">
                    <CheckboxSelectMenu v-model="TypeOfReportChoice" :label="'Type of Report'" :inputWidth="'w-12/12'"  :placeholder="'SELECT Type of Report'" :options="TypeOfReports"/>
                </div>
                <div v-show="TypeOfReportChoice.value === 'PER SERVICE TRANSACTION REPORT'" class="w-[25%]">
                    <CheckboxSelectMenu v-model="TransactionTypeChoice" :label="'Transaction Type'" :inputWidth="'w-12/12'"  :placeholder="'SELECT Transaction Type'" :options="TransactionTypes"/>
                </div>
                <div class="w-[25%]">
                    <CheckboxSelectMenu :label="'Biller Name'" :inputWidth="'w-12/12'"  :placeholder="'SELECT Biller Name'" :options="supplier"/>
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
        {{ TransactionTypeChoice.value }}
        <div class="flex flex-col h-auto pb-10">
            <div class="flex flex-col justify-between uppercase mb-[30px]">
                <h2 class="text-[16px] text-center font-semibold">OPTIMUM EXCHANGE REMIT INC.</h2>
                <div class="text-center mt-[20px]">
                    <h3 class="text-[13px] font-semibold">SUCCESSFUL PAYMENT TO SUPPLIERS</h3>
                    <p class="text-[12px]">09/28/2022 -  09/28/2022</p>
                </div>
            </div>
            <!-- TABLE -->
            <StatusReportTable/>
        </div>
    </div>
</template>
