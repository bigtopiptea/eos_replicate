<script setup>
import NormalButton from "@/Components/Misc/Buttons/NormalButton.vue";
import SearchIcon from "@/Components/Misc/Icons/SearchIcon.vue";
import ListIcon from "@/Components/Misc/Icons/ListIcon.vue";
import DateInput from "@/Components/Misc/Input/DateInput.vue";
</script>

<script>
import CheckboxSelectMenu from "@/Components/Misc/Select Menu/CheckboxSelectMenu.vue";
import CashPositionReportTable from "./Tables/CashPositionReportTable.vue";
export default {
    name: 'Cash Position Report',
    components: {
        NormalButton, SearchIcon, ListIcon, DateInput,
        CheckboxSelectMenu, CashPositionReportTable
    },
    data() {
        return {
            reportType:[
                {name: 'DISTRIBUTION'},
                {name: 'FUNDING'},
                {name: 'TRADING'},
                {name: 'OTHER SERVICES'},
            ],
            banksProviders:[
                {name: 'All Banks/Providers'},
                {name: 'BDO PASEO SF PHP'},
                {name: 'BOC BANAUE OF PHP'},
                {name: 'BOC SHAW SF PHP'},
                {name: 'BPI H.O. SF PHP'},
                {name: 'BPI INSTAPAY PHP'},
                {name: 'CHINABANK DEL MONTE-MATUTUM SF PHP'},
            ],
            currency:[
                {name: 'SELECT ALL'},
                {name: 'USD'},
                {name: 'PHP'},
            ],
            selectedReport: '',
            selectedCurrency: '',
            selectedBanksProviders: ''
        }
    },
    methods: {
        async getCashPositionReport() {
            await axios.get(`/api/billers?page=${this.pagination.current_page}`)
                .then((response) => {
                    console.log(response.data);
                  this.CashPositionReport = response.data.data;
                  this.pagination = response.data;
                })
                .catch((errors) => {

                })
        },

    },
}
</script>
<template>
    <div class="h-screen w-full bg-white">
        <div class="flex flex-col gap-[15px] min-w-full px-3 pt-10 pb-5">
            <div class="flex gap-[10px] w-[85%] mx-[12px]">
                <div class="w-[33.33%]">
                    <CheckboxSelectMenu v-model="selectedReport"  :label="'type of report'" :inputWidth="'w-12/12'" :placeholder="'Select type of report'" :options="reportType"/>
                </div>
                <div class="w-[33.33%]">
                    <CheckboxSelectMenu v-model="selectedCurrency" :label="'currency'" :inputWidth="'w-12/12'" :placeholder="'SELECT CURRENCY'" :options="currency" :withCheckbox="true"/>
                </div>
                <div class="w-[33.33%]">
                    <CheckboxSelectMenu v-model="selectedBanksProviders" :label="'banks/providers'" :inputWidth="'w-12/12'" :placeholder="'SELECT BANK/PROVIDER'" :options="banksProviders" :withCheckbox="true"/>
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
        <div v-if="this.selectedReport && this.selectedCurrency && this.selectedBanksProviders">
            <CashPositionReportTable :ReportType="selectedReport.name" :CurrencyType="selectedCurrency.name" :BanksProviders="selectedBanksProviders.name"/>
        </div>
        <div v-else>
            <div class="flex items-center justify-center h-full w-auto mt-[200px]">
                <h1 class="text-[15px] text-[#3E3E3E]">-- NO RECORDS TO DISPLAY --</h1>
            </div>
        </div>
    </div>
</template>
