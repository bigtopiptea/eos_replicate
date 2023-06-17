<script>
import NormalButton from "@/Components/Misc/Buttons/NormalButton.vue";
import SearchIcon from "@/Components/Misc/Icons/SearchIcon.vue";
import ListIcon from "@/Components/Misc/Icons/ListIcon.vue";
import DateInput from "@/Components/Misc/Input/DateInput.vue";
import CheckboxSelectMenu from "@/Components/Misc/Select Menu/CheckboxSelectMenu.vue";
import CheckboxSelectMenuThree from "@/Components/Misc/Select Menu/CheckboxSelectMenuThree.vue";
import AdvanceSettingsSelectMenu from "@/Components/Misc/Select Menu/AdvanceSettingsSelectMenu.vue";
import FloatingLabelInput from "../../../../Misc/Input/FloatingLabelInput.vue";
import CollectionReportCSRTable1 from './Tables/CollectionReportCSRTable1.vue';
import CollectionReportCSRTable2 from './Tables/CollectionReportCSRTable2.vue';
import CollectionReportCDRTable1 from './Tables/CollectionReportCDRTable1.vue';
import CollectionReportCDRTable2 from './Tables/CollectionReportCDRTable2.vue';
export default {
    name: 'Collection Report',
    components: {
        NormalButton, SearchIcon, ListIcon, DateInput,
        CheckboxSelectMenu,AdvanceSettingsSelectMenu,FloatingLabelInput,
        CollectionReportCSRTable1,CollectionReportCDRTable1,CollectionReportCSRTable2
        ,CollectionReportCDRTable2, CheckboxSelectMenuThree, AdvanceSettingsSelectMenu
    },
    data() {
        return {
            CDRAdvanceSettings1:[
                {checked: false, label:'TRANSACTION DATE'},
                {checked: false, label:'DUE DATE'},
                {checked: false, label:'PAST DUE (DAYS)'},
                {checked: false, label:'USER ID'},
                {checked: false, label:'BRANCH'},
                {checked: false, label:'SERVICES'},
                {checked: false, label:'COMPANY'},
                {checked: false, label:'CUSTOMER NAME'},
                {checked: false, label:'BOOKING #/AIRWAY #'},
                {checked: false, label:'DESCRIPTION'},
                {checked: false, label:'REFERENCE NO.'},
                {checked: false, label:'PRINCIPAL AMOUNT'},
                {checked: false, label:'CHARGES'},
                {checked: false, label:'COST'},
                {checked: false, label:'TAX'},
                {checked: false, label:'AMOUNT TO PAY'},
                {checked: false, label:'OUTSTANDING BALANCE'},
                {checked: false, label:'NET OF EWT'},
                {checked: false, label:'STATUS'},
                {checked: false, label:'TOTAL AMOUNT PAID'},
            ],
            CDRAdvanceSettings2:[
                {checked: false, label:'TRANSACTION DATE'},
                {checked: false, label:'TIE-UP PARTNER'},
                {checked: false, label:'REFERENCE NO.'},
                {checked: false, label:'SERVICE'},
                {checked: false, label:'SUB-TYPE'},
                {checked: false, label:'CCY'},
                {checked: false, label:'PRINCIPAL AMOUNT'},
                {checked: false, label:'RATE'},
                {checked: false, label:'GROSS AMOUNT'},
                {checked: false, label:'FEE'},
                {checked: false, label:'NET AMOUNT'},
                {checked: false, label:'AMOUNT TO PAY'},
            ],
            Category:[
                {
                    label: 'ALL CATEGORIES',
                    children: [
                        {label: 'SETTLED'},
                        {label: 'UNSETTLED'},
                        {label: 'ON DUE'},
                        {label: 'PAST DUE'},
                    ]
                }
            ],

            CDROSClient:[
                {
                    label: 'Affiliate 1',
                    children:[]
                },
                {
                    label: 'Affiliate 2',
                    children:[]
                },
                {
                    label: 'PAVI GROUP',
                    children:[
                        {label: 'PRIMEWATER INC.'},
                        {label: 'STREAMTECH'},
                    ]
                },
                {
                    label: 'communities',
                    children:[
                        {label: 'Community Davao'},
                        {label: 'Community Leyte'},
                        {label: 'Community Naga'},
                        {label: 'Community Philippines'},
                    ]
                },
            ],

            CSRTUPClient:[
                {
                    label: 'ALL TIE-UP PARTNERS',
                    children: [
                        {label: 'Al EKTESAD'},
                        {label: 'CITI EXPRESS PAYMENT'},
                        {label: 'JDEE REMIT'},
                        {label: 'REDHA AL ANSARI'},
                        {label: 'RIGHT CHOICE PAYMENT'},
                        {label: 'RNV FOREX'},
                    ]
                }
            ],
            CSROSClient:[
                {
                    label: 'ALL Clients',
                    children:[
                        {label: 'Affiliate 1'},
                        {label: 'Affiliate 2'},
                    ]
                }
            ],
            reportType:[
                {label: 'COLLECTION SUMMARY REPORT'},
                {label: 'COLLECTION DETAILED REPORT'},
            ],
            clientType:[
                {label: 'TIE-UP PARTNERS'},
                {label: 'OTHER SERVICES'},
            ],
            selectedCategory: [],
            selectedReport: '',
            selectedClient:'',
            selectedClientType: '',
            startDate:'',
            endDate:'',
            isClicked: false,
        }
    },
    computed: {
        result() {
            if (this.selectedReport.label === 'COLLECTION SUMMARY REPORT' && this.selectedClientType.label === 'OTHER SERVICES') {
                return this.CSROSClient;
            }
            else if((this.selectedReport.label === 'COLLECTION SUMMARY REPORT' || this.selectedReport.label === 'COLLECTION DETAILED REPORT') && this.selectedClientType.label === 'TIE-UP PARTNERS'){
                return this.CSRTUPClient;
            }
            else if(this.selectedReport.label === 'COLLECTION DETAILED REPORT' && this.selectedClientType.label === 'OTHER SERVICES'){
                return this.CDROSClient;
            }
            else {
                return 0;
            }
        },
        advanceSettings(){
            if (this.selectedReport.label === 'COLLECTION DETAILED REPORT' && this.selectedClientType.label === 'OTHER SERVICES') {
                return this.CDRAdvanceSettings1;
            }
            else if(this.selectedReport.label === 'COLLECTION DETAILED REPORT' && this.selectedClientType.label === 'TIE-UP PARTNERS') {
                return this.CDRAdvanceSettings2;
            }   
        }
    },
    methods: {
        updateSelectedCategory(value) {
            this.selectedCategory = value;
        },
    },
}

</script>
<template>
    <div class="min-h-screen max-h-auto w-full bg-white">
        <div class="flex flex-col justify-end gap-[15px] min-w-full px-5 pt-10 pb-5">
            {{ 'Category: ' + selectedCategory.map(option => option.label).join(' | ') }}
            <div class="flex gap-[10px] w-[90%] ">
                <div class="w-[25%]">
                    <CheckboxSelectMenu v-model="selectedReport" :placeholder="'select Type of Report'" :label="'Type of Report'" :options="reportType" />
                </div>
                <div class="w-[25%]">
                    <CheckboxSelectMenu v-model="selectedClientType" :label="'Client Type'" :placeholder="'select Client Type'"  :options="clientType" :withCheckbox="true" />
                </div>
                <div class="w-[25%]">
                    <CheckboxSelectMenuThree v-model="selectedClient" :label="'Client'"  :placeholder="'select Client'" :options="result"/>
                </div>
                <div v-show="selectedReport.label == 'COLLECTION DETAILED REPORT'" class="w-[25%]">
                    <CheckboxSelectMenuThree v-model="selectedCategory" :label="'Category'" :placeholder="'select Category'" :options="Category" @input="updateSelectedCategory"/>
                </div>
            </div>

            <div class="flex justify-between items-end h-auto w-full border-b-2 border-[#EAEAEA]  pb-[30px]">
                <div class="flex justify-end flex-col">
                    <div class="flex gap-3 items-end">
                        <div>
                            <DateInput v-model="startDate" label="Start Date" format="MM/DD/YY"/>
                        </div>
                        <div>
                            <DateInput v-model="endDate" label="End Date" format="MM/DD/YY" />
                        </div>
                        <div>
                            <NormalButton @click="(isClicked = !isClicked)" label="Filter"
                            class="p-1.5 px-6 uppercase h-[34px] bg-[#3E3E3E] tracking-wider text-[10px] text-white" />
                        </div>
                        <div v-if="this.selectedReport.label == 'COLLECTION DETAILED REPORT' && this.selectedClientType" class="w-[200px]">
                            <AdvanceSettingsSelectMenu :options="advanceSettings"/>
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
        <div v-if="this.isClicked" >
            <!-- <CollectionReportCSRTable1 :StartDate="startDate" :EndDate="endDate" :TypeOfReport="selectedReport.label" />
            <CollectionReportCDRTable1 :StartDate="startDate" :EndDate="endDate" :TypeOfReport="selectedReport.label" />
            <CollectionReportCDRTable2 :StartDate="startDate" :EndDate="endDate" :TypeOfReport="selectedReport.label" /> -->
            <CollectionReportCSRTable2 :StartDate="startDate" :EndDate="endDate" :TypeOfReport="selectedReport.label" />
        </div>
        <div v-else class="flex flex-col items-center justify-center py-20">
            <img src="../../../../../../assets/images/no-records-img.png" alt="" class="h-[200px] w-[230px]">
            <p class="uppercase text-center text-[16px] font-semibold">no records to display</p>
        </div>
    </div>
</template>
