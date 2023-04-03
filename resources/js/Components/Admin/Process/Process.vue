<script>
import NormalBtn from '../../Misc/Buttons/NormalButton.vue';
import Title from '../../Misc/Section/Title.vue';
import SearchIcon from '../../Misc/Icons/SearchIcon.vue';
import DropDown from '../../Misc/Dropdown/Dropdown.vue';
import DateInput from '../../Misc/Input/DateInput.vue';
import TableInput from '../../Misc/Table/TableInput.vue';
import TabNav from '../../Misc/Tabs/TabNav.vue';
import Tab from '../../Misc/Tabs/Tab.vue';
import EditIcon from '../../Misc/Icons/EditIcon.vue';
import Modal from '../../Misc/Modal/Modal.vue';
import { HalfCircleSpinner  } from 'epic-spinners'
import handlingFee from "@/Components/Admin/Settings/Handling Fee/HandlingFee.vue";
import {getText} from "@tiptap/core";
import axios from "axios";
export default {
    name: 'Process',
    components: {
        NormalBtn,
        Title,
        DropDown,
        DateInput,
        TabNav,
        TableInput,
        Tab,
        Modal,
        EditIcon,
        SearchIcon,
        HalfCircleSpinner,
    },
    data() {
        return {
            labels: [
                { label: 'No.' },
                { label: 'TIE-UP PARTNER'},
                { label: 'FILENAME' },
                { label: 'Date Uploaded'},
                { label: 'ITEMS' },
                { label: 'CURRENCY' },
                { label: 'AMOUNT' },
                { label: 'Rate' },
                { label: 'GROSS AMOUNT' },
            ],
            selected: 'Summary',
            showModal: false,
            isProcess: false,
            isProcessing: false,
            clickType: '',
            process_data: '',
            selectId: [],
            isLoading: false,
            isSummary: false,
            isHide: false,
            summary: [],
            transaction: Object,
        }
    },
    methods: {
        getText,
        handlingFee() {
            return handlingFee
        },
        async processData(){
            this.isLoading = true;
            axios.get('/api/transactions')
                .then((response) => {
                    this.process_data = response.data.data.data;
                    this.isLoading = false;
                })
                .catch((error) => {
                    this.isLoading = true;
                })
        },
        async process(){
            this.isProcessing = true;
            this.isSummary = true;
            this.isHide = true;
            await axios.get(`/api/transactions/${this.selectId}/processed-data`)
                .then(response => {
                    this.summary = response.data;
                    this.isSummary = false;
                })
        },
        async processForApproval(){
            await axios.post('/api/transactions/processedForApproval',{
                selectedIds:  this.selectId,
                summary:  this.summary,
                batchUpload: this.process_data,
            }).then((response) => {

            }).catch((errors) => {

            })

        },
        setSelected(tab) {
            this.selected = tab;
        },
        getState(type) {
            this.clickType = type;
        },
        async editTransaction(item){
            this.transaction = item;
            // await axios.get(`/api/transactions/edit-transaction/${id}`)
            //     .then((response) => {
            //         this.transaction = response.data;
            //     })
        }

    },
    computed: {
        shouldScroll(){
            const totalLength = this.summary.data.reduce((acc, item) => {
                return acc + item.items.length;
            }, 0);
            return totalLength > 10;
        }
    },
    created() {
        this.processData();
    }
}
</script>

<template>
    <Modal :transaction="transaction" v-if="showModal" @close="showModal = false" :state="clickType" />

    <div class="bg-white w-full  border border-white">
        <div class="px-4 sm:px-6 lg:px-8 mt-10">
            <div class="flex justify-between">
                <div class="flex">

                    <DropDown label="bulk action" />

                    <NormalBtn label="Apply" class="bg-[#F9951E] h-[34px]  p-1.5 text-sm text-white px-3 uppercase" />

<!--                    <DateInput label="Process Date" />-->
                </div>
                <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                    <div class="relative w-full">
                        <form class="flex items-center">
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <SearchIcon />
                                </div>
                                <input type="text" id="simple-search"
                                    class="bg-gray-50 h-[34px] border border-r-0 border-[#EAEAEA] text-gray-900 text-sm block w-full pl-10 p-2.5"
                                    placeholder="Search">
                            </div>
                            <NormalBtn label="Go"
                                class="p-1.5 px-3 uppercase h-[34px] bg-[#F9951E] text-sm font-medium text-white" />
                        </form>
                    </div>
                </div>
            </div>

            <div class="mt-4 flex flex-col">
                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 ">
                            <table class="min-w-full table-fixed divide-y divide-gray-300">
                                <thead class="bg-[#D7D7D7]">
                                <tr class="divide-x divide-solid">
                                    <th>
                                        <input type="checkbox"
                                               class="h-3 w-3 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                                    </th>
                                    <th v-for="label in labels" :key="label.label" scope="col"
                                        class="px-3 py-2 uppercase text-center text-[11px] font-semibold text-gray-900">
                                        {{ label.label }}
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">

                                 <tr v-for="data in process_data" :key="data.batch_number"  class="divide-x divide-gray-200">
                                    <td class="text-center px-3 py-2">
                                        <input :value="data.batch_id" v-model="selectId" type="checkbox"
                                               class="h-3 w-3 rounded  border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                                    </td>
                                    <td class="whitespace-nowrap uppercase text-center px-3 py-2 text-[11px] text-[#3E3E3E]">
                                        {{data.batch_id}}
                                    </td>
                                    <td class="whitespace-nowrap text-center uppercase px-3 py-2 text-[11px] text-[#3E3E3E]">
                                        {{ data.company_name.name }}
                                    </td>
                                    <td class="whitespace-nowrap text-center uppercase px-3 py-2 text-[11px] text-[#3E3E3E]">
                                        {{ data.filename ? data.filename : '-' }}
                                    </td>
                                     <td class="whitespace-nowrap text-center uppercase px-3 py-2 text-[11px] text-[#3E3E3E]">
                                        {{ $moment(data.date_uploaded).format('MM/DD/YYYY, h:mm:ss a')}}
                                     </td>
                                    <td class="whitespace-nowrap text-center px-3 py-2 text-[11px] text-[#3E3E3E]">
                                        {{data.total_count}}
                                    </td>
                                    <td class="whitespace-nowrap uppercase text-center px-3 py-2 text-[11px] text-[#3E3E3E]">
                                        {{data.original_currency}}
                                    </td>
                                    <td class="whitespace-nowrap text-center px-3 py-2 text-[11px] text-[#3E3E3E]">
                                        {{data.total_amount}}
                                    </td>
                                    <td class="whitespace-nowrap text-center px-3 py-2 text-[11px] text-[#3E3E3E]">
                                        {{ data.exchange_rate }}
                                    </td>
                                    <td class="whitespace-nowrap text-center px-3 py-4 text-[11px] text-[#3E3E3E]">
                                        {{ (data.total_amount * data.exchange_rate).toLocaleString() === 'NaN' ? data.total_amount :  (data.total_amount * data.exchange_rate).toLocaleString()}}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <div v-show="isLoading" class="flex items-center justify-center my-10">
                                <half-circle-spinner
                                    :size="30"
                                    color="#F9951E"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-end space-x-2 my-4">
                <NormalBtn label="Reset"
                    class="hover:bg-[#3E3E3E] hover:text-white transition ease-in-out delay-150 duration-300 uppercase text-[#3E3E3E] text-[11px] py-1 font-semibold border-[3px] w-[118px] tracking-widest border-[#3E3E3E]" />
                <NormalBtn :disabled="selectId < 1" :class="selectId < 1 ? 'hover:bg-transparent hover:text-mid-red' : ''"  @click="process()" label="Process Data"
                    class="hover:bg-red-500 hover:text-white transition ease-in-out delay-150 duration-300 uppercase font-bold text-mid-red h-[34px] text-[11px] tracking-widest border-[3px] border-mid-red w-[160px] " />
            </div>

            <!-- Summary Start -->
            <TabNav v-if="isProcessing" :tabs="['Summary', 'View Transactions']" :selected="selected" @selected="setSelected">
                <Tab :isSelected="selected === 'Summary'">
                    <div class="flex flex-col mt-2">
                        <div class="-my-2  -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full align-middle md:px-6 lg:px-8">
                                <div class="relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 ">
                                    <table v-if="!isSummary"
                                            class="min-w-full table-fixed divide-y divide-gray-300 border-b border-gray-300 ">
                                        <thead class="bg-[#D7D7D7]">
                                            <tr class="divide-x divide-solid">
                                                <th scope="col"
                                                    class="py-2 text-center text-[11px]  font-semibold text-gray-900">
                                                    BANK
                                                </th>
                                                <th scope="col"
                                                    class="px-3 py-2 uppercase text-center text-[11px] font-semibold text-gray-900">
                                                    TRANSACTION TYPE
                                                </th>
                                                <th scope="col"
                                                    class="px-3 py-2 uppercase text-center text-[11px] font-semibold text-gray-900">
                                                    Currency
                                                </th>
                                                <th scope="col"
                                                    class="px-3 py-2 uppercase text-center text-[11px] font-semibold text-gray-900">
                                                    Items
                                                </th>
                                                <th scope="col"
                                                    class="px-3 py-2 uppercase text-center text-[11px] font-semibold text-gray-900">
                                                    Amount
                                                </th>
                                                <th scope="col"
                                                    class="px-3 py-2 uppercase text-center text-[11px] font-semibold text-gray-900">
                                                    Handling Fee
                                                </th>
                                                <th scope="col"
                                                    class="px-3 py-2 uppercase text-center text-[11px] font-semibold text-gray-900">
                                                    Cost
                                                </th>
                                                <th scope="col"
                                                    class="px-3 py-2 uppercase text-center text-[11px] font-semibold text-gray-900">
                                                    Income
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody v-for="item in summary.data"    class="divide-y divide-gray-200 bg-white">
                                            <tr class="divide-x divide-gray-200">
                                                <td
                                                    class="whitespace-nowrap px-3 text-left py-2 text-[11px] text-[#3E3E3E]">
                                                    {{item.biller.name}}
                                                </td>
                                                <td
                                                    class="whitespace-nowrap uppercase text-center px-3 py-2 text-[11px] text-[#3E3E3E]">
                                                    {{ item.transaction_type }}
                                                </td>
                                                <td
                                                    class="whitespace-nowrap text-center uppercase px-3 py-2 text-[11px] text-[#3E3E3E]">
                                                    {{ item.currency }}
                                                </td>
                                                <td
                                                    class="whitespace-nowrap text-center px-3 py-2 text-[11px] text-[#3E3E3E]">
                                                    {{ item.item_count }}
                                                </td>
                                                <td
                                                    class="whitespace-nowrap uppercase text-center px-3 py-4 text-[11px] text-[#3E3E3E]">
                                                    {{ item.amount.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}) }}
                                                </td>
                                                <td
                                                    class="whitespace-nowrap text-center px-3 py-2 text-[11px] text-[#3E3E3E]">
                                                    {{ item.handling_fee.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}) }}
                                                </td>
                                                <td
                                                    class="whitespace-nowrap text-center px-3 py-2 text-[11px] text-[#3E3E3E]">
                                                    26,200.00
                                                </td>
                                                <td
                                                    class="whitespace-nowrap text-center px-3 py-2 text-[11px] text-[#3E3E3E]">
                                                    26,200.00
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tbody>
                                            <tr>
                                                <td
                                                    class="whitespace-nowrap text-center px-3 py-2 text-[11px] text-[#3E3E3E]">

                                                </td>
                                                <td
                                                    class="whitespace-nowrap text-center px-3 py-2 text-[11px] text-[#3E3E3E]">

                                                </td>
                                                <td
                                                    class="whitespace-nowrap font-bold text-center px-3 py-2 text-[11px] text-[#3E3E3E]">
                                                    GRAND TOTAL
                                                </td>
                                                <td
                                                    class="whitespace-nowrap text-center px-3 py-2 text-[11px] text-[#3E3E3E]">
                                                    {{ summary.computation.total_count }}
                                                </td>
                                                <td
                                                    class="whitespace-nowrap text-center px-3 py-2 text-[11px] text-[#3E3E3E]">
                                                    {{ summary.computation.total_amount.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}) }}
                                                </td>
                                                <td
                                                    class="whitespace-nowrap text-center px-3 py-2 text-[11px] text-[#3E3E3E]">
                                                    {{ summary.computation.total_handling.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}) }}
                                                </td>
                                                <td
                                                    class="whitespace-nowrap text-center px-3 py-2 text-[11px] text-[#3E3E3E]">
                                                    114,581.05
                                                </td>
                                                <td
                                                    class="whitespace-nowrap text-center px-3 py-2 text-[11px] text-[#3E3E3E]">
                                                    74,143.95
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div v-else class="flex items-center justify-center my-10">
                                        <half-circle-spinner
                                            :size="30"
                                            color="#F9951E"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="-mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8 mt-6 mb-10">
                        <div class="min-w-full align-middle md:px-6 lg:px-8">
                            <div class="relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 ">
                                <table
                                    class="min-w-full table-fixed divide-y divide-gray-300 border-b border-gray-300 ">
                                    <thead class="bg-[#D7D7D7]">
                                    <tr class="divide-x divide-solid">
                                        <th scope="col"
                                            class="py-2 text-center uppercase text-[11px] font-semibold text-gray-900">
                                            <span>
                                                Batch No.
                                            </span>
                                        </th>
                                        <th scope="col"
                                            class="px-3 py-2 uppercase text-center text-[11px] font-semibold text-gray-900">
                                            FILENAME
                                        </th>
                                        <th scope="col"
                                            class="px-3 py-2 uppercase text-center text-[11px] font-semibold text-gray-900">
                                            RATE
                                        </th>
                                        <th scope="col"
                                            class="px-3 py-2 uppercase text-center text-[11px] font-semibold text-gray-900">
                                            AMOUNT
                                        </th>
                                        <th scope="col"
                                            class="px-3 py-2 uppercase text-left text-[11px] font-semibold text-gray-900">
                                            TIE-UP PARTNER
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                    <tr class="divide-x divide-gray-200">
                                        <td class="whitespace-nowrap px-3 text-center py-2 text-[11px] text-[#3E3E3E]">
                                            010120-01
                                        </td>
                                        <td
                                            class="whitespace-nowrap uppercase  text-center px-3 py-2 text-[11px] text-[#3E3E3E]">
                                            RHAAE_Batch1
                                        </td>
                                        <td
                                            class="whitespace-nowrap text-center uppercase px-3 py-2 text-[11px] text-[#3E3E3E]">
                                            48.25

                                        </td>
                                        <td class="whitespace-nowrap text-center px-3 py-2 text-[11px] text-[#3E3E3E]">
                                            500.00
                                        </td>
                                        <td
                                            class="whitespace-nowrap uppercase text-left px-3 py-2 text-[11px] text-[#3E3E3E]">
                                            Redha Al-Ansari Exchange
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        </td>
                                        <td>
                                        </td>
                                        <td>
                                        </td>
                                        <td>
                                        </td>
                                        <td class="whitespace-nowrap font-bold float-right text-[11px] uppercase col-span-5 px-3 py-2 text-[#3E3E3E]">
                                                    22,463,676.15
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </Tab>
                <Tab :isSelected="selected === 'View Transactions'">
                    <div class="mt-4 mb-6 flex-none flex justify-end">
                        <div class="relative w-3/12">
                            <form class="flex">
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <SearchIcon />
                                    </div>
                                    <input type="text" id="simple-search"
                                        class="bg-gray-50 h-[34px] border border-r-0 border-[#EAEAEA] text-gray-900 text-[11px] block w-full pl-10 p-2.5"
                                        placeholder="Search" required>
                                </div>
                                <NormalBtn label="Go"
                                    class="p-1.5 px-3 uppercase h-[34px] bg-[#F9951E] text-[11px] font-medium text-white" />
                            </form>
                        </div>
                    </div>
                    <div class="flex flex-col my-6">
                        <div class="-my-2  -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full align-middle md:px-6 lg:px-8">
                                <div class="relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 ">
                                    <table
                                        class="min-w-full table-fixed divide-y divide-gray-300 border-b border-gray-300 ">
                                        <thead class="bg-[#D7D7D7]">
                                            <tr class="divide-x divide-solid">
                                                <th scope="col"
                                                    class="py-2 text-center uppercase text-[11px] font-semibold text-gray-900">
                                                    REF. no.
                                                </th>
                                                <th scope="col"
                                                    class="px-3 py-2 uppercase text-center text-[11px] font-semibold text-gray-900">
                                                    beneficiary
                                                </th>
                                                <th scope="col"
                                                    class="px-3 py-2 uppercase text-center text-[11px] font-semibold text-gray-900">
                                                    bank
                                                </th>
                                                <th scope="col"
                                                    class="px-3 py-2 uppercase text-center text-[11px] font-semibold text-gray-900">
                                                    currency
                                                </th>
                                                <th scope="col"
                                                    class="px-3 py-2 uppercase text-center text-[11px] font-semibold text-gray-900">
                                                    AMOUNT
                                                </th>
                                                <th scope="col"
                                                    class="px-3 py-2 uppercase text-center text-[11px] font-semibold text-gray-900">
                                                    HANDLING FEE
                                                </th>
                                                <th scope="col"
                                                    class="px-3 py-2 uppercase text-center text-[11px] font-semibold text-gray-900">
                                                    COST
                                                </th>
                                                <th scope="col"
                                                    class="px-3 py-2 uppercase text-center text-[11px] font-semibold text-gray-900">
                                                    action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody v-for="items in summary.data" class="divide-y divide-gray-200 bg-white">
                                            <tr v-for="item in items.items" class="divide-x divide-gray-200">
                                                <td
                                                    class="whitespace-nowrap p-4 text-center py-2 text-[11px] text-[#3E3E3E]">
                                                    <button @click="showModal = true, getState('show'), editTransaction(item)"
                                                        class="text-blue-400 underline">
                                                        {{item.id }}
                                                    </button>
                                                </td>
                                                <td
                                                    class="whitespace-nowrap uppercase  text-center px-3 py-2 text-[11px] text-[#3E3E3E]">
                                                    {{ item.get_beneficiary.last_name }}, {{ item.get_beneficiary.first_name }}
                                                </td>
                                                <td
                                                    class="whitespace-nowrap text-center uppercase px-3 py-2 text-[11px] text-[#3E3E3E]">
                                                    {{ item.bank_name }}
                                                </td>
                                                <td
                                                    class="whitespace-nowrap text-center px-3 py-2 text-[11px] text-[#3E3E3E]">
                                                    {{ item.original_currency }}
                                                </td>
                                                <td
                                                    class="whitespace-nowrap uppercase text-center px-3 py-2 text-[11px] text-[#3E3E3E]">
                                                    {{ item.gross_amount.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}) }}
                                                </td>
                                                <td
                                                    class="whitespace-nowrap text-center px-3 py-2 text-[11px] text-[#3E3E3E]">
                                                    {{ items.handling_fee }}
                                                </td>
                                                <td
                                                    class="whitespace-nowrap text-center px-3 py-2 text-[11px] text-[#3E3E3E]">
                                                    50.00
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-2 text-center text-[11px]">
                                                    <button @click="showModal = true, getState('edit'), editTransaction(item)"
                                                        class="rounded-full">
                                                        <EditIcon class="text-center text-blue-400 h-6 w-6" />
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </Tab>
                <div class="mb-10 flex justify-between">
                    <div></div>
                    <NormalBtn @click="isProcess = true, processForApproval()"
                       class="transition ease-in-out delay-150 duration-300 px-6 py-1 border-[3px] hover:bg-[#F26400]
                       hover:text-white hover:border-[#F26400] border-#F9951E uppercase text-[11px] tracking-wide
                       font-[500] text-[#F9951E] "
                       label="Process for Approval"
                    />
                </div>

            </TabNav>

        </div>
    </div>
</template>
