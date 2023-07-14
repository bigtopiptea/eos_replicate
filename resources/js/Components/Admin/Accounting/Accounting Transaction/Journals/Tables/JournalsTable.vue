<script>
import moment from 'moment';
import Pagination from "@/Components/Misc/Pagination/Pagination.vue";
import ChevronDownIcon from '@/Components/Misc/Icons/ChevronDownIcon.vue';
import ModalTwo from '@/Components/Misc/Modal/ModalTwo.vue';
import BorderButton from '../../../../../Misc/Buttons/BorderButton.vue';
import SmallHeading from '../../../../../Misc/Heading/SmallHeading.vue';
import InputGroup from '../../../../../Misc/Input/InputGroup.vue';
import SettingsInput from '@/Components/Misc/Input/SettingsInput.vue';
export default{
    components:{
        Pagination, ChevronDownIcon, moment, ModalTwo, BorderButton, SmallHeading,InputGroup,SettingsInput
    },
    props:{
        Report:{
            type: String,
            default: ''
        },
        StartDate:{
            type: String,
            default: 'MM/DD/YYYY'
        },
        EndDate:{
            type: String,
            default: 'MM/DD/YYYY'
        },
    },
    data() {
        return {
            isSelected: false,
            modalData: [
            {
                jeNo: 'JE0001',
                date: '09/28/2022 10:55:09 AM',
                accountType: 'ACCOUNTS RECEIVABLE',
                accountSubtype: ' AL EKTESAD PHP',
                document:'OPS-PROCESSING',
                name: 'AL EKTESAD',
                debit: '0.00',
                credit: '0.00'
            },
            {
                jeNo: 'JE0002',
                date: '09/28/2022 10:55:09 AM',
                accountType: 'ACCOUNTS RECEIVABLE',
                accountSubtype: ' AL EKTESAD PHP',
                document:'OPS-PROCESSING',
                name: 'AL EKTESAD',
                debit: '0.00',
                credit: '0.00'
            },

            // Add more objects for additional rows if needed
            ],
            modalLabels:[
                {label:'DATE'},
                {label:'ACCOUNT TYPE'},
                {label:'ACCOUNT SUBTYPE'},
                {label:'DOCUMENT TYPE'},
                {label:'NAME'},
                {label:'DEBIT'},
                {label:'CREDIT'},
            ],
            labels:[
                {label:'SERIES'},
                {label:'ACCOUNT TYPE'},
                {label:'DEBIT'},
                {label:'CREDIT'},
            ],
            APData: [
                {
                    label: '210',
                    data: [
                        '',
                        'ACCOUNTS PAYABLE', '0.00',
                        '0.00',
                    ],
                    rowData: [
                        {
                            rowlabel:'210-101-001',
                            data: [
                                'AP - ALLDAY-SMR-EASTLAKE',
                                '0.00','0.00'

                            ]
                        },
                        {
                            rowlabel:'210-101-002',
                            data: [

                                'AP - AP - RNV FOREX',
                                '0.00','0.00'

                            ]
                        },

                    ]
                }
            ],
            openModal:false,
            expandedRows: [],
            formattedStartDate: '',
            formattedEndDate: '',
            isRotated: false,
            label:'',
            accountName:'',
        }
    },
    mounted() {
        this.formatDates();
    },
    methods: {
        openModalToggle(){
            this.openModal = false;
        },
        formatDates() {
            this.formattedStartDate = moment(this.StartDate).format('L');
            this.formattedEndDate = moment(this.EndDate).format('L');
        },
        toggleRow(group, key) {
            const index = this.expandedRows.findIndex(item => item.group === group && item.key === key);
            if (index !== -1) {
                this.expandedRows.splice(index, 1); // Collapse the row
            } else {
                this.expandedRows.push({ group, key }); // Expand the row
            }
        },
        isExpanded(group, key) {
            return this.expandedRows.some(item => item.group === group && item.key === key);
        },
        toggleRotation() {
            this.isRotated = !this.isRotated;
        }
    },
}
</script>
<template>
    <div class="flex flex-col pb-10">
        <!-- TABLE -->
        <div class="overflow-hidden w-full px-3">
            <div class="relative h-[560px]">
                <div class="shadow ring-1 ring-black ring-opacity-5 overflow-auto absolute inset-x-0 min-h-auto max-h-full">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-[#D7D7D7] font-medium text-[11px] whitespace-nowrap sticky top-0">
                            <tr class="divide-x divide-gray-200">
                                <th v-for="label in labels" :key="label.label" scope="col"
                                    class="py-2 px-10 uppercase tracking-wider text-center text-gray-900">
                                    {{ label.label }}
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white font-light text-[10px]">
                            <template v-for="(buttonData, buttonDataKey) in APData" :key="buttonDataKey">
                                <tr  @click="toggleRow('APData', buttonDataKey)" class="divide-x divide-gray-200 font-bold">
                                    <td  class="flex justify-center whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider" :class="{ expanded: isExpanded('APData', buttonDataKey) }">
                                        {{ buttonData.label }}
                                    </td>
                                    <td  v-for="(cell, cellIndex) in buttonData.data.slice(1)" :key="cellIndex" class="whitespace-nowrap w-full uppercase py-2 px-1 tracking-wider" :class="cellIndex == 0 ? 'text-left ' : 'text-center'">
                                        {{ cell }}
                                    </td>
                                </tr>
                                <template v-if="isExpanded('APData', buttonDataKey)">
                                    <tr v-for="(rowData, rowDataIndex) in buttonData.rowData" :key="rowDataIndex" class="divide-x divide-gray-200">
                                        <td  class="whitespace-nowrap  uppercase py-2 px-3 tracking-wider text-center">
                                            <span @click="(openModal = !openModal), label=rowData.rowlabel, accountName=rowData.data[0]"  class="underline text-cyan-600 cursor-pointer">
                                                {{ rowData.rowlabel }}
                                            </span>
                                        </td>
                                        <td v-for="(cell, cellIndex) in rowData.data" :key="cellIndex"  class="whitespace-nowrap  uppercase py-2 px-3 tracking-wider text-left" >
                                        {{ cell }}
                                        </td>
                                    </tr>
                                </template>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <ModalTwo :show="openModal" @close="openModalToggle" :modalTitle="isSelected ?  'JOURNAL ENTRIES' : 'JOURNAL ENTRIES SUMMARY' " :widthModal="'w-[90%]'" :heightModal="'h-[500px]'" :modalTitlePosition="'text-right'" :modalTitleSize="'text-[12px]'">
        <div v-show="isSelected == false"  class="h-auto w-full px-3 pt-5">
            <div class="flex justify-end pb-3">
                <div class="flex flex-col">
                    <span class="font-bold text-[11px] text-end">
                        {{ label }}
                    </span>
                    <span class="font-bold text-[11px] text-end">
                        {{ accountName }}
                    </span>
                </div>
            </div>
            <div class="min-w-full py-2 align-middle ">
                <div class="relative h-[360px]">
                    <div class="shadow ring-1 ring-black ring-opacity-5 overflow-auto absolute inset-x-0 min-h-auto max-h-full">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-[#D7D7D7] font-medium text-[11px] whitespace-nowrap sticky top-0">
                                <tr class="divide-x divide-gray-200">
                                    <th scope="col"
                                        class="py-1 px-2 whitespace-nowrap uppercase tracking-wider text-center text-gray-900 ">
                                        <div class="flex justify-between">
                                            <div class="flex justify-start">
                                                <input type="checkbox">
                                            </div>
                                            <span class="flex justify-center">
                                                JE NO.
                                            </span>
                                            <span/>
                                        </div>
                                    </th>
                                    <th v-for="label in modalLabels" :key="label.label" scope="col"
                                        class="py-1 px-2 whitespace-nowrap uppercase tracking-wider text-center text-gray-900  " >
                                        {{ label.label }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white font-light text-[10px] text-center">
                                <tr v-for="(row, rowIndex) in modalData" :key="rowIndex" class="divide-x divide-gray-200">
                                    <td class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                    <div class="flex justify-between">
                                        <div class="flex justify-start">
                                        <input type="checkbox">
                                        </div>
                                        <span @click="isSelected=true" class="underline cursor-pointer text-cyan-600 flex justify-center">
                                        {{ row.jeNo }}
                                        </span>
                                        <span/>
                                    </div>
                                    </td>
                                    <td class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                    {{ row.date }}
                                    </td>
                                    <td class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                    {{ row.accountType }}
                                    </td>
                                    <td class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                    {{ row.accountSubtype }}
                                    </td>
                                    <td class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                    {{ row.document }}
                                    </td>
                                    <td class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                    {{ row.name }}
                                    </td>
                                    <td class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                    {{ row.debit }}
                                    </td>
                                    <td class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                    {{ row.credit }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col h-full justify-between">
            <div v-show="isSelected == true">
                <div  class="h-auto w-full px-3 py-5">
                    <div class="flex w-[30%] flex-col justify-start gap-3">
                        <div>
                            <InputGroup :inputLabel="'Transaction Date'" :isDisabled="true" :inputWidth="'w-7/12'" :labelWidth="'w-5/12'" />
                        </div>
                        <div>
                            <InputGroup :inputLabel="'Documnet Type'" :isDisabled="true" :inputWidth="'w-7/12'" :labelWidth="'w-5/12'" />
                        </div>
                        <div>
                            <InputGroup :inputLabel="'Name'" :inputWidth="'w-7/12'" :labelWidth="'w-5/12'" :isDisabled="true"/>
                        </div>
                    </div>
                </div>
                <div class="w-full py-5">
                <SmallHeading label="Journal Entry" class="uppercase bg-[#F9951E] tracking-wider w-full" :justify="'justify-start'"/>
                </div>
                <div class="inline-block min-w-full py-4 px-3 align-middle ">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 ">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-[#3E3E3E] text-[10px]">
                                <tr class="divide-x divide-#EAEAEA">
                                    <th scope="col"
                                        class="pl-5 py-2 whitespace-nowrap uppercase tracking-wider text-left font-bold text-#FFFFFF">
                                        Entries
                                    </th>
                                    <th scope="col"
                                        class="px-2 py-2 w-[15%] uppercase tracking-wider text-center font-semibold text-#FFFFFF">
                                        Debit
                                    </th>
                                    <th scope="col"
                                        class="px-2 py-2 w-[15%] uppercase whitespace-nowrap tracking-wider text-center font-semibold text-#FFFFFF">
                                        Credit
                                    </th>
                                    <th scope="col"
                                        class="px-2 py-2 w-[40%] uppercase tracking-wider text-center font-semibold text-#FFFFFF">
                                        Remarks
                                    </th>

                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white text-[10px]">
                                <tr class="divide-x divide-gray-200">
                                    <td class="whitespace-nowrap uppercase py-2 px-2 tracking-wider">
                                        <SettingsInput class="w-full uppercase " :isDisabled="true"/>
                                    </td>
                                    <td class="whitespace-nowrap uppercase py-2 px-2 tracking-wider">
                                        <SettingsInput class="w-full uppercase " :isDisabled="true"/>
                                    </td>
                                    <td class="whitespace-nowrap uppercase py-2 px-2 tracking-wider">
                                        <SettingsInput class="w-full uppercase " :isDisabled="true"/>
                                    </td>
                                    <td class="whitespace-nowrap uppercase py-2 px-2 tracking-wider">
                                        <SettingsInput class="w-full uppercase " :isDisabled="true"/>
                                    </td>
                                </tr>
                                <tr class="divide-x divide-gray-200">
                                    <td class="whitespace-nowrap uppercase py-2 px-2 tracking-wider">
                                        <SettingsInput class="w-full uppercase " :isDisabled="true"/>
                                    </td>
                                    <td class="whitespace-nowrap uppercase py-2 px-2 tracking-wider">
                                        <SettingsInput class="w-full uppercase " :isDisabled="true"/>
                                    </td>
                                    <td class="whitespace-nowrap uppercase py-2 px-2 tracking-wider">
                                        <SettingsInput class="w-full uppercase " :isDisabled="true"/>
                                    </td>
                                    <td class="whitespace-nowrap uppercase py-2 px-2 tracking-wider">
                                        <SettingsInput class="w-full uppercase " :isDisabled="true"/>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="flex justify-center items-end gap-[20px]" :class="isSelected ? 'pb-7' : 'pb-5'">
                <BorderButton @click.prevent="isSelected ? isSelected = false : openModalToggle()"  :buttonLabel="'CANCEL'" :buttonPadding="'p-1'" :buttonTextColor="'text-[#3e3e3e]'" :buttonBorderColor="'border-[#3e3e3e]'" :buttonHover="'hover:bg-[#3E3E3E]'" :buttonTextSize="'text-[13px]'"/>
                <BorderButton :buttonLabel="'Export'" :buttonPadding="'p-1'" :buttonTextSize="'text-[13px]'"/>
            </div>
        </div>
    </ModalTwo>
</template>
