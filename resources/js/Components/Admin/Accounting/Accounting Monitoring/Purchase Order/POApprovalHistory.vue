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
import ModalTwo from '@/Components/Misc/Modal/ModalTwo.vue'
export default {

    name:'PO Approval History',

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
        ModalTwo
    },

    data() {
        return {
            user: this.$store.state.auth.user,
            POApprovalHistory: [],
            pagination: {
                current_page: 1,
            },
            labels:[
                {label:'DATE'},
                {label:'PAYEE'},
                {label:'INVOICE NO.'},
                {label:'ACCOUNTS PAYABLE'},
                {label:'CREATED BY'},
                {label:'STATUS'},
                {label:'APPROVED BY'},
                {label:'DATE APPROVED'},
            ],
            purchaseOrderLabels:[
                {label:'#'},
                {label:'COST CENTER'},
                {label:'DESCRIPTION'},
                {label:'UNIT'},
                {label:'QUANTITY'},
                {label:'UNIT PRICE'},
                {label:'AMOUNT'},
            ],
            bulkOptionsVerifier:[
                {label: 'verify'},
                {label: 'reject'},
            ],
            bulkOptionsApprover:[
                {label: 'approve'},
                {label: 'reject'},
            ],
            createPurchaseModal:false,
        }
    },
    methods: {
        createPurchaseToggle(){
            this.createPurchaseModal = false;
        },
        async getPOApprovalHistory() {
            await axios.get(`/api/billers?page=${this.pagination.current_page}`)
                .then((response) => {
                    console.log(response.data);
                    this.POApprovalHistory = response.data.data;
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
                    <div class="flex justify-start flex-col gap-3" dis>
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
                                        class="flex items-center gap-[10px] py-1 px-5 whitespace-nowrap uppercase tracking-wider text-center text-gray-900 w-full">
                                        <input type="checkbox">
                                        apv no.
                                    </th>
                                    <th v-for="label in labels" :key="label.label" scope="col"
                                        class="py-1 px-5 whitespace-nowrap uppercase tracking-wider text-center text-gray-900 w-full">
                                        {{ label.label }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white font-light text-[10px] text-center">
                                <tr class="divide-x divide-gray-200">
                                    <td
                                        class="flex items-center justify-center gap-[10px] whitespace-nowrap uppercase py-2 px-2 tracking-wider">
                                        <input type="checkbox">
                                        <!-- set to user.role == 'approver' -->
                                        <p @click.prevent="user.role ? (createPurchaseModal = !createPurchaseModal) : ''" :class="user.role == 'approver' ? 'underline text-cyan-600 cursor-pointer' : 'text-black'">
                                            01
                                        </p>
                                    </td>
                                    <td
                                        class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                        09/28/2022 11:00:09 PM
                                    </td>
                                    <td
                                        class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                        metrobank
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
                                        approved
                                    </td>
                                    <td
                                        class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                        asis, ginalyn ibarra
                                    </td>
                                    <td
                                        class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                        09/28/2022 11:00:09 PM
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <Pagination @paginate="getPOApprovalHistory()" :pagination="pagination"
            :offset="1" class = "py-10"/>
    </div>

    <ModalTwo :show="createPurchaseModal" @close="createPurchaseToggle" :modalTitle="'Create Purchase Order'" :widthModal="'w-[90%]'" :heightModal="'h-[500px]'" :modalTitlePosition="'text-right'" :modalTitleSize="'text-[12px]'">
        <div class="w-full flex flex-col gap-[30px] p-5">
            <div class="flex justify-end ">
                <div class="w-[32.6%]">
                    <InputGroup :inputLabel="'Purchase Order No'" :isDisabled="true" :inputWidth="'w-7/12'" :labelWidth="'w-5/12'" />
                </div>
            </div>
            <div class="flex justify-center">
                <h1 class="uppercase text-[12px] font-bold text-black">Purchase Order</h1>
            </div>
            <div class="flex w-full gap-3">
                <div class="flex flex-col justify-between w-[33%]">
                    <div>
                        <InputGroup :inputLabel="'supplier'" :isDisabled="true" :inputWidth="'w-7/12'" :labelWidth="'w-5/12'" />
                    </div>
                    <div>
                        <InputGroup :inputLabel="'Contact Person'" :isDisabled="true" :inputWidth="'w-7/12'" :labelWidth="'w-5/12'" />
                    </div>
                    <div>
                        <InputGroup :inputLabel="'Email Address'" :isDisabled="true" :inputWidth="'w-7/12'" :labelWidth="'w-5/12'" />
                    </div>
                    <div>
                        <InputGroup :inputLabel="'Contact No.'" :isDisabled="true" :inputWidth="'w-7/12'" :labelWidth="'w-5/12'" />
                    </div>
                </div>
                <div class="flex flex-col justify-between gap-[10px] w-[33%]">
                    <div>
                        <TextAreaGroup :inputLabel="'supplier address'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'" :inputHeight="'h-[70px]'" :isDisabled="true" />
                    </div>
                    <div>
                        <InputGroup :inputLabel="'deliver to'" :inputWidth="'w-7/12'" :labelWidth="'w-5/12'" :inputType="'date'" :isDisabled="true" />
                    </div>
                    <div>
                        <TextAreaGroup :inputLabel="'delivery address'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'" :inputHeight="'h-[70px]'" :isDisabled="true" />
                    </div>

                </div>
                <div class="flex flex-col justify-between w-[33%]">
                    <div>
                        <InputGroup :inputLabel="'PO DATE'" :isDisabled="true" :inputWidth="'w-7/12'" :labelWidth="'w-5/12'" :inputType="'date'" />
                    </div>
                    <div>
                        <InputGroup :inputLabel="'Payment Terms'" :isDisabled="true" :inputWidth="'w-7/12'" :labelWidth="'w-5/12'" />
                    </div>
                    <div>
                        <InputGroup :inputLabel="'Expected Del. Date'" :isDisabled="true" :inputWidth="'w-7/12'" :labelWidth="'w-5/12'"  :inputType="'date'"/>
                    </div>
                    <div>
                        <InputGroup :inputLabel="'Contact Person'" :isDisabled="true" :inputWidth="'w-7/12'" :labelWidth="'w-5/12'" />
                    </div>
                    <div>
                        <InputGroup :inputLabel="'Contact No.'" :isDisabled="true" :inputWidth="'w-7/12'" :labelWidth="'w-5/12'" />
                    </div>
                </div>
            </div>
            <!-- Table -->
            <div>
                <table class="min-w-full divide-y divide-white bg-[#EAEAEA]">
                    <thead class="font-medium text-[11px] whitespace-nowrap sticky top-0">
                        <tr class="divide-x divide-white">
                            <th v-for="label in purchaseOrderLabels" :key="label.label" scope="col"
                                class="p-2 whitespace-nowrap uppercase tracking-wider text-center text-gray-900">
                                {{ label.label }}
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white font-light text-[10px] text-center">
                        <tr class="divide-x divide-white">
                            <td
                                class="flex items-center justify-center gap-[10px] whitespace-nowrap uppercase p-2 tracking-wider">
                                01
                            </td>
                            <td
                                class="whitespace-nowrap uppercase p-2 tracking-wider text-left">
                                ALLCASH SJDM BULACAN
                            </td>
                            <td
                                class="whitespace-nowrap uppercase p-2 tracking-wider text-left">
                                BROTHER 2540 TONER
                            </td>
                            <td
                                class="whitespace-nowrap uppercase p-2 tracking-wider">
                                PCS
                            </td>
                            <td
                                class="whitespace-nowrap uppercase p-2 tracking-wider">
                                2
                            </td>
                            <td
                                class="whitespace-nowrap uppercase p-2 tracking-wider text-right">
                                1,800.00
                            </td>
                            <td
                                class="whitespace-nowrap uppercase p-2 tracking-wider text-right">
                                3,600.00
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="flex flex-col gap-[30px] text-[10px] uppercase">
                <div class="flex gap-[2px]  h-[110px]">
                    <div class="w-[75%] relative">
                        <label for="remarks" class="absolute top-[1px] left-[1px] pt-[10px] pl-[10px]  disabled:bg-[#EAEAEA] w-[99%]">Remarks</label>
                        <textarea class="w-full disabled:bg-[#EAEAEA] bg-white resize-none block pt-[30px] pb-2.5 px-2.5 text-[10px] text-gray-900 h-full border-2 border-[#EAEAEA]" name="remarks" cols="30" rows="10" disabled></textarea>
                    </div>
                    <div class="w-[25%] h-full flex flex-col justify-between">
                        <div class="flex items-center justify-between h-[32%] p-2 bg-[#EAEAEA]">
                            <p>sub-total:</p>
                            <p>3,600.00</p>
                        </div>
                        <div class="flex items-center justify-between h-[32%] p-2 bg-[#EAEAEA]">
                            <p>vat-amount:</p>
                            <p>3,600.00</p>
                        </div>
                        <div class="flex items-center justify-between h-[32%] p-2 bg-[#EAEAEA]">
                            <p>grand total:</p>
                            <p>3,600.00</p>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center gap-[20px]">
                    <BorderButton @click.prevent="createPurchaseToggle()" :buttonLabel="'CLOSE'" :buttonPadding="'p-1'" :buttonTextColor="'text-[#3e3e3e]'" :buttonBorderColor="'border-[#3e3e3e]'" :buttonHover="'hover:bg-[#3E3E3E]'" :buttonTextSize="'text-[13px]'"/>
                    <BorderButton :buttonLabel="'PRINT'" :buttonPadding="'p-1'" :buttonTextSize="'text-[13px]'"/>
                </div>
            </div>
        </div>
    </ModalTwo>
</template>
