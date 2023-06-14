<script setup>
import NormalButton from "@/Components/Misc/Buttons/NormalButton.vue";
import SearchIcon from "@/Components/Misc/Icons/SearchIcon.vue";
import ListIcon from "@/Components/Misc/Icons/ListIcon.vue";
import DateInput from "@/Components/Misc/Input/DateInput.vue";

</script>

<script>
import CheckboxSelectMenu from "@/Components/Misc/Select Menu/CheckboxSelectMenu.vue";
import AdvanceSettingsSelectMenu from '../../../../Misc/Select Menu/AdvanceSettingsSelectMenu.vue';
import FloatingLabelInput from "../../../../Misc/Input/FloatingLabelInput.vue";

export default {
    name: 'Collection Report',
    components: {
        NormalButton, SearchIcon, ListIcon, DateInput,
        CheckboxSelectMenu,AdvanceSettingsSelectMenu,FloatingLabelInput
    },
    data() {
        return {
            Category:[
                {name: 'ALL CATEGORIES'},
                {name: 'SETTLED'},
                {name: 'UNSETTLED'},
                {name: 'ON DUE'},
                {name: 'PAST DUE'},
            ],

            CDROSClient:[
                {name: 'Affiliate 1'},
                {name: 'Affiliate 2'},
                {name: 'PAVI GROUP'},
                {name: 'PRIMEWATER INC.'},
                {name: 'STREAMTECH'},
                {name: 'communities'},
                {name: 'Community Davao'},
                {name: 'Community Leyte'},
                {name: 'Community Naga'},
                {name: 'Community Philippines'},
            ],

            CSRTUPClient:[
                {name: 'ALL TIE-UP PARTNERS'},
                {name: 'Al EKTESAD'},
                {name: 'CITI EXPRESS PAYMENT'},
                {name: 'JDEE REMIT'},
                {name: 'REDHA AL ANSARI'},
                {name: 'RIGHT CHOICE PAYMENT'},
                {name: 'RNV FOREX'},
            ],
            CSROSClient:[
                {name: 'All Clients'},
                {name: 'Affiliate 1'},
                {name: 'Affiliate 2'},
            ],
            reportType:[
                {name: 'COLLECTION SUMMARY REPORT'},
                {name: 'COLLECTION DETAILED REPORT'},
            ],
            clientType:[
                {name: 'TIE-UP PARTNERS'},
                {name: 'OTHER SERVICES'},
            ],
            selectedCategory: '',
            selectedReport: '',
            selectedClient:'',
            selectedClientType: '',
            startDate:'',
            endDate:'',
            result: [],
        }
    },
    computed: {
        result() {
            if (this.selectedReport.name === 'COLLECTION SUMMARY REPORT' && this.selectedClientType.name === 'OTHER SERVICES') {
            return this.CSROSClient;
            }
            else if((this.selectedReport.name === 'COLLECTION SUMMARY REPORT' || this.selectedReport.name === 'COLLECTION DETAILED REPORT') && this.selectedClientType.name === 'TIE-UP PARTNERS'){
            return this.CSRTUPClient;
            }
            else if(this.selectedReport.name === 'COLLECTION DETAILED REPORT' && this.selectedClientType.name === 'OTHER SERVICES'){
            return this.CDROSClient;
            }
            else {
            return 0;
            }
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
                    <CheckboxSelectMenu v-model="selectedClientType" :label="'Client Type'" :placeholder="'select Client Type'"  :options="clientType" :withCheckbox="true" />
                </div>
                <div class="w-[25%]">
                    <CheckboxSelectMenu v-model="selectedClient" :label="'Client'"  :placeholder="'select Client'" :options="result" :withCheckbox="true"/>
                </div>
                <div v-show="selectedReport.name == 'COLLECTION DETAILED REPORT'" class="w-[25%]">
                    <CheckboxSelectMenu v-model="selectedCategory" :label="'Category'" :placeholder="'select Category'" :options="Category" :withCheckbox="true"/>
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
        <div v-else class="flex flex-col items-center justify-center py-20">
            <img src="../../../../../../assets/images/no-records-img.png" alt="" class="h-[200px] w-[230px]">
            <p class="uppercase text-center text-[16px] font-semibold">no records to display</p>
        </div>
    </div>
</template>
