<script>
import ChevRightIcon from "@/Components/Misc/Icons/ChevRightIcon.vue";
import EditIcon from "@/Components/Misc/Icons/EditIcon.vue";
import InputLabel from "@/Components/Misc/Input/InputLabel.vue";
import InputGroup from "@/Components/Misc/Input/InputGroup.vue";
import TextAreaGroup from '@/Components/Misc/Input/TextAreaGroup.vue';
import InputGroupSelectMenu from "@/Components/Misc/Select Menu/InputGroupSelectMenu.vue";
import NormalButton from "@/Components/Misc/Buttons/NormalButton.vue";
import BorderButton from "@/Components/Misc/Buttons/BorderButton.vue";
import SearchIcon from "@/Components/Misc/Icons/SearchIcon.vue";
import ListIcon from "@/Components/Misc/Icons/ListIcon.vue";
import DateInput from "@/Components/Misc/Input/DateInput.vue";
import Pagination from "@/Components/Misc/Pagination/Pagination.vue";
import DropDown from '@/Components/Misc/Dropdown/Dropdown.vue';
import Slideover from '@/Components/Misc/Slideover/Slideover.vue';
import ModalTwo from '@/Components/Misc/Modal/ModalTwo.vue'
export default {

    name:'AP Pending',

    components:{
        ChevRightIcon,
        DropDown,
        EditIcon,
        NormalButton,
        BorderButton,
        InputGroup,
        SearchIcon,
        InputLabel,
        ListIcon,
        DateInput,
        Pagination,
        TextAreaGroup,
        InputGroupSelectMenu,
        Slideover,
        ModalTwo
    },

    data() {
        return {
            user: this.$store.state.auth.user,
            APPending: [],
            pagination: {
                current_page: 1,
            },
            labels:[
                {label:'DATE'},
                {label:'PAYEE'},
                {label:'PV NO.'},
                {label:'INVOICE NO.'},
                {label:'INVOICE AMOUNT'},
                {label:'CREATED BY'},
                {label:'STATUS'},
            ],
            bulkOptionsVerifier:[
                {label: 'verify'},
                {label: 'reject'},
            ],
            bulkOptionsApprover:[
                {label: 'approve'},
                {label: 'reject'},
            ],
            purchaseOrderLabels:[
                {label:'ACCOUNT TITLE'},
                {label:'COST CENTER'},
                {label:'SERVICES'},
                {label:'DEBT'},
                {label:'CREDIT'},
                {label:'VAT RATE'},
                {label:'INPUT TAX (DR.)'},
                {label:'ATC'},
                {label:'EWT RATE'},
                {label:'W/TAX - EXPANDED (CREDIT)'},
            ],
            approvalDetailsOpen: false,
            openModal:false,
            isLoad:false,
        }
    },
    methods: {
        openModalToggle(){
            this.openModal = false;
        },
        approvalDetailsToggle() {
            this.approvalDetailsOpen = false;
        },
        async getAPPending() {
            await axios.get(`/api/billers?page=${this.pagination.current_page}`)
                .then((response) => {
                    console.log(response.data);
                    this.APPending = response.data.data;
                    this.pagination = response.data;
                })
                .catch((errors) => {

                })
        },
    },
}
</script>

<template>
    <div class="flex flex-col justify-between h-full w-auto my-5 px-3">
        <div>
            <div class="inline-block min-w-full align-middle ">
                <div class="flex justify-between h-full min-w-full ">
                    <div class="flex justify-start flex-col gap-3">
                        <div class="flex items-end gap-3 left-side-col-1">
                            <div>
                                <DateInput label="Start Date" />
                            </div>
                            <div>
                                <DateInput label="End Date" />
                            </div>
                            <div>
                                <NormalButton label="Filter"
                                class="p-1.5 px-3 uppercase h-[34px] bg-[#3E3E3E] tracking-wider text-[10px] font-medium text-white" />
                            </div>
                        </div>
                        <div v-if="user.role == 'verifier' || user.role == 'approver'" class="left-side-col-2 text-[10px] mb-2">
                            <DropDown label="bulk action" :options="user.role == 'verifier' ? bulkOptionsVerifier : bulkOptionsApprover"/>
                            <NormalButton label="Apply" class="bg-[#F9951E] h-[34px] p-1.5 text-[10px] text-white px-3 uppercase" />
                        </div>
                    </div>
                    <div class="right-side mt-[5px]">
                        <form class="flex items-start gap-3">
                            <div class="flex">
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <SearchIcon />
                                </div>
                                <input type="text" id="simple-search"
                                    class="bg-gray-50 h-[34px] border border-r-0 border-[#EAEAEA] text-gray-900 text-[10px] font-light block w-full pl-10 p-2.5"
                                    placeholder="Search" required />
                                </div>
                                <NormalButton label="Go"
                                class="p-1.5 px-3 uppercase h-[34px] bg-[#F9951E] text-[10px] text-white" />
                            </div>
                            <NormalButton label="Export"
                            class="p-1.5 px-3 uppercase h-[34px] bg-[#3E3E3E]   tracking-wider text-[10px] font-medium text-white" />
                        </form>
                    </div>
                </div>
            </div>
            <div class="min-w-full py-2 align-middle ">
                <div class="relative h-[360px]">
                    <div class="shadow ring-1 ring-black ring-opacity-5 overflow-auto absolute inset-x-0 min-h-auto max-h-full">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-[#D7D7D7] font-medium text-[11px] whitespace-nowrap sticky top-0">
                                <tr class="divide-x divide-gray-200">
                                    <th scope="col"
                                        class="flex justify-center items-center gap-[10px] py-1 px-5 whitespace-nowrap uppercase tracking-wider text-center text-gray-900 ">
                                        <input type="checkbox">
                                        id
                                    </th>
                                    <th v-for="label in labels" :key="label.label" scope="col"
                                        class="py-1 px-5 whitespace-nowrap uppercase tracking-wider text-center text-gray-900 ">
                                        {{ label.label }}
                                    </th>
                                    <th v-if="user.role == 'verifier' || user.role == 'approver'" scope="col"
                                        class="py-1 px-5 whitespace-nowrap uppercase tracking-wider text-center text-gray-900 w-full">
                                        action
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white font-light text-[10px] text-center">
                                <tr class="divide-x divide-gray-200">
                                    <td
                                        class="flex items-center justify-center gap-[10px] whitespace-nowrap uppercase py-2 px-2 tracking-wider">
                                        <input type="checkbox">
                                        <p @click="(approvalDetailsOpen = !approvalDetailsOpen)"  class="underline text-cyan-600 cursor-pointer">
                                            01
                                        </p>
                                    </td>
                                    <td
                                        class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                        09/28/2022 11:00:09 PM
                                    </td>
                                    <td
                                        class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                        INKLINE OFFICE SOLUTIONS INC.
                                    </td>
                                    <td
                                        class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                        <p @click="(openModal = !openModal)" class="underline text-cyan-600 cursor-pointer">
                                            092022-0001
                                        </p>
                                    </td>
                                    <td
                                        class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                        INV00000001
                                    </td>
                                    <td
                                        class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                        10,000.00
                                    </td>
                                    <td
                                        class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                        sabado, christian peralta
                                    </td>
                                    <td
                                        class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                        for verification
                                    </td>
                                    <td v-if="user.role == 'verifier'"
                                        class="whitespace-nowrap uppercase justify-evenly py-1   tracking-wider">
                                        <div class="flex justify-around">
                                            <button class="tooltip tooltip-left" data-tip="reject">
                                                <img src="../../../../../../assets/images/RejectIcon.png" alt="Reject Icon" class="h-5 w-5">
                                            </button>
                                            <button class="tooltip tooltip-left" data-tip="verify">
                                                <img src="../../../../../../assets/images/VerifyIcon.png" alt="Verify Icon" class="h-5 w-5">
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <Pagination @paginate="getAPPending()" :pagination="pagination"
            :offset="1" class = "py-10"/>
    </div>

    <Slideover :show="approvalDetailsOpen" @close="approvalDetailsToggle" :title="'APPROVAL DETAILS'" >
        <div class="flex flex-col justify-between h-full pb-5 mx-10">
            <div class="flex flex-col gap-[50px] mt-5">
                <div class="flex flex-col gap-3">
                    <InputGroup :inputLabel="'maker'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'"  :isDisabled="true"/>
                    <InputGroup :inputLabel="'date requested'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'" :inputType="'date'" :isDisabled="true"/>
                    <InputGroup :inputLabel="'verifier'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'"  :isDisabled="true"/>
                    <InputGroup :inputLabel="'date verified'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'" :inputType="'date'" :isDisabled="true"/>
                    <InputGroup :inputLabel="'approver'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'"  :isDisabled="true"/>
                    <InputGroup :inputLabel="'date approved'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'" :inputType="'date'" :isDisabled="true"/>
                </div>
            </div>
            <div class="flex justify-center">
                <BorderButton @click.prevent="approvalDetailsToggle()" :buttonLabel="'close'" :buttonPadding="'p-2'" :buttonTextColor="'text-[#3e3e3e]'" :buttonBorderColor="'border-[#3e3e3e]'" :buttonHover="'hover:bg-[#3E3E3E]'" :buttonTextSize="'text-[15px]'"/>
            </div>
        </div>
    </Slideover>

    <ModalTwo :show="openModal" @close="openModalToggle" :modalTitle="'View AP Voucher'" :widthModal="'w-[90%]'" :heightModal="'h-[500px]'" :modalTitlePosition="'text-right'" :modalTitleSize="'text-[12px]'">
        <div class="w-full flex flex-col gap-[20px] p-5">
            <div class="uppercase text-[10px]">
                <div class="flex items-center w-[35%] h-3 ">
                    <div class="w-[50%]">
                        <div class="flex item-center gap-[5px]">
                            <input v-model="isLoad" type="checkbox" name="load_purchase">
                            <label for="load_purchase">load from purchase order</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-center">
                <h1 class="uppercase text-[12px] font-bold text-black">Accounts Payable Voucher</h1>
            </div>
            <div class="flex justify-between w-full">
                <div class="flex flex-col gap-[5px] w-[33%]">
                    <div>
                        <InputGroup :inputLabel="'date'" :inputWidth="'w-7/12'" :isDisabled="true" :labelWidth="'w-5/12'" :inputType="'date'"/>
                    </div>
                    <div>
                        <InputGroup :inputLabel="'ap voucher no.'" :isDisabled="true" :inputWidth="'w-7/12'" :labelWidth="'w-5/12'" />
                    </div>
                    <div>
                        <InputGroup :inputLabel="'payee'" :inputWidth="'w-7/12'" :labelWidth="'w-5/12'" :isDisabled="true" />
                    </div>
                    <div>
                        <TextAreaGroup :inputLabel="'particulars'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'" :isDisabled="true" />
                    </div>
                    <div class="ml-1">
                        <BorderButton @click="(openSlideover = !openSlideover)" :buttonLabel="'attachments'" :buttonPadding="'p-0'" :buttonTextColor="'text-[#3e3e3e]'" :buttonBorderColor="'border-[#3e3e3e]'" :buttonHover="'hover:bg-[#3e3e3e]'" :buttonTextSize="'text-[10px]'" :buttonSize="'h-auto w-[100px]'"/>
                    </div>
                </div>
                <div class="flex flex-col gap-[5px] w-[33%]">
                    <div>
                        <InputGroup :inputLabel="'invoice no.'" :inputWidth="'w-7/12'" :labelWidth="'w-5/12'" :isDisabled="true" />
                    </div>
                    <div>
                        <InputGroup :inputLabel="'invoice date'" :inputWidth="'w-7/12'" :labelWidth="'w-5/12'" :inputType="'date'" :isDisabled="true" />
                    </div>
                    <div>
                        <InputGroup :inputLabel="'invoice amount'" :inputWidth="'w-7/12'" :labelWidth="'w-5/12'" :isDisabled="true" />
                    </div>
                    <div>
                        <InputGroup :inputLabel="'due date'" :inputWidth="'w-7/12'" :labelWidth="'w-5/12'" :inputType="'date'" :isDisabled="true" />
                    </div>
                    <div class="flex justify-between text-[10px] w-full h-7 whitespace-nowrap">
                        <label for="name" class="uppercase inline-flex items-center h-full px-2 text-left border border-[#EAEAEA] text-[10px] w-[41.5%]">covered period</label>
                        <input type="date" class=" bg-white h-full px-3 border border-[#EAEAEA] text-[#3E3E3E] w-[29%] disabled:bg-[#EAEAEA]" disabled>
                        <input type="date" class=" bg-white h-full px-3 border border-[#EAEAEA] text-[#3E3E3E] w-[29%] disabled:bg-[#EAEAEA]" disabled>
                    </div>
                    <div>
                        <InputGroup :inputLabel="'accounts payable'" :inputWidth="'w-7/12'" :labelWidth="'w-5/12'" :isDisabled="true" />
                    </div>
                </div>
            </div>
            <!-- Table -->
            <div class="relative">
                <table class="min-w-full divide-y divide-gray-300 ">
                    <thead class="font-medium text-[11px] whitespace-nowrap bg-[#EAEAEA] sticky top-0 border">
                        <tr class="divide-x divide-gray-300 ">
                            <th v-for="label in purchaseOrderLabels" :key="label.label" scope="col"
                                class=" whitespace-nowrap uppercase px-2 py-1 tracking-wider text-center text-gray-900 ">
                                {{ label.label }}
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-300 font-light text-[10px] text-center border-x">
                        <tr  class="divide-x divide-gray-300 w-full">
                            <td
                                class="whitespace-nowrap uppercase p-2 tracking-wider text-left">
                               other services
                            </td>
                            <td
                                class="whitespace-nowrap uppercase p-2 tracking-wider text-left">
                                head office
                            </td>
                            <td
                                class="whitespace-nowrap uppercase p-2 tracking-wider text-left w-[150px]">
                                -
                            </td>
                            <td
                                class="whitespace-nowrap uppercase p-2  tracking-wider text-right w-[100px]">
                                8,928.57
                            </td>
                            <td
                                class="whitespace-nowrap uppercase p-2  tracking-wider text-right w-[100px]">
                                -
                            </td>
                            <td
                                class="whitespace-nowrap uppercase p-2  tracking-wider text-center">
                                VAT INCLUSIVE (12%)
                            </td>
                            <td
                                class="whitespace-nowrap uppercase p-2   tracking-wider text-right">
                                1,071.00
                            </td>
                            <td
                                class="whitespace-nowrap uppercase p-2 tracking-wider text-right">
                                WC158
                            </td>
                            <td
                                class="whitespace-nowrap uppercase p-2 tracking-wider text-right">
                                1%
                            </td>
                            <td
                                class="whitespace-nowrap uppercase p-2 tracking-wider text-right">
                                44.64
                            </td>
                        </tr>
                    </tbody>
                    <tfoot class="font-light text-[10px] text-center">
                        <td colspan="2" class="whitespace-nowrap uppercase  tracking-wider text-right">

                        </td>
                        <td class="whitespace-nowrap uppercase p-2 tracking-wider text-right font-bold ">
                            total
                        </td>
                        <td class="whitespace-nowrap uppercase p-2  tracking-wider text-right border">
                            10,000.00
                        </td>
                        <td class="whitespace-nowrap uppercase p-2  tracking-wider text-right border">
                            10,000.00
                        </td>
                        <td colspan="5" class="whitespace-nowrap uppercase   tracking-wider text-right"></td>
                    </tfoot>
                </table>
                <div class="flex justify-center gap-[20px] mt-[30px]">
                    <BorderButton @click.prevent="openModalToggle()" :buttonLabel="'CLOSE'" :buttonPadding="'p-1'" :buttonTextColor="'text-[#3e3e3e]'" :buttonBorderColor="'border-[#3e3e3e]'" :buttonHover="'hover:bg-[#3E3E3E]'" :buttonTextSize="'text-[13px]'"/>
                    <BorderButton :buttonLabel="'PRINT'" :buttonPadding="'p-1'" :buttonTextSize="'text-[13px]'"/>
                </div>
            </div>
        </div>
    </ModalTwo>
</template>
