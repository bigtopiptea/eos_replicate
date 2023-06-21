<script>
import ChevRightIcon from "@/Components/Misc/Icons/ChevRightIcon.vue";
import EditIcon from "@/Components/Misc/Icons/EditIcon.vue";
import InputLabel from "@/Components/Misc/Input/InputLabel.vue";
import NormalButton from "@/Components/Misc/Buttons/NormalButton.vue";
import SearchIcon from "@/Components/Misc/Icons/SearchIcon.vue";
import ListIcon from "@/Components/Misc/Icons/ListIcon.vue";
import DateInput from "@/Components/Misc/Input/DateInput.vue";
import PaperClipIcon from "@/Components/Misc/Icons/PaperClipIcon.vue";
import LoadingIcon from "@/Components/Misc/Icons/LoadingIcon.vue";
import XMarkIcon from "@/Components/Misc/Icons/XMarkIcon.vue";
import ProgressIcon from "@/Components/Misc/Icons/ProgressIcon.vue";
import Pagination from "@/Components/Misc/Pagination/Pagination.vue";
import DropDown from '@/Components/Misc/Dropdown/Dropdown.vue';
import Slideover from "@/Components/Misc/Slideover/Slideover.vue";
import InputGroup from "@/Components/Misc/Input/InputGroup.vue";
import SmallLabelInput from "@/Components/Misc/Input/SmallLabelInput.vue";
import InputTextarea from "@/Components/Misc/Input/InputTextarea.vue";
import SolidButton from "@/Components/Misc/Buttons/SolidButton.vue";
import BorderButton from "@/Components/Misc/Buttons/BorderButton.vue";
import ChevronDownIcon  from "@/Components/Misc/Icons/ChevronDownIcon.vue";
export default {

    name:'MTFPending',

    components:{
        DropDown,  EditIcon, NormalButton,
        SearchIcon,  InputLabel,  ListIcon,
        DateInput,  Pagination,  Slideover,
        PaperClipIcon,  InputGroup, SmallLabelInput,
        InputTextarea, SolidButton, BorderButton,
        LoadingIcon,  XMarkIcon, ProgressIcon,
        ChevronDownIcon
    },

    data() {
        return {
            MTFPending: [],
            pagination: {
                current_page: 1,
            },
            viewDetailsOpen: false,  //Slideover
            viewDocumentsOpen: false,  //Slideover
            viewVerifyFundingOpen: false,  //Slideover
            paraIcon: '',
            labels:[
                {label:'ID'},
                {label:'DATE'},
                {label:'TYPE'},
                {label:'NAME'},
                {label:'BANK'},
                {label:'CURRENCY'},
                {label:'AMOUNT'},
                {label:'RATE'},
                {label:'NET AMOUNT'},
                {label:'WORKFLOW STATUS'},
                {label:'ACTION'},
            ],
            records: false
        }
    },
    methods: {

        //Slideover
        setIconDetailsOpen(){
            this.viewDetailsOpen === true ? this.paraIcon = 'FIND' : '';
        },
        setIconDocumentsOpen(){
            this.viewDocumentsOpen === true ? this.paraIcon = 'FIND' : '';
        },
        setIconVerifyFundingOpen(){
            this.viewVerifyFundingOpen === true ? this.paraIcon = '' : '' ;
        },
        viewDetailsToggle() {
            this.viewDetailsOpen = false;
        },
        viewDocumentsToggle() {
            this.viewDocumentsOpen = false;
        },
        viewVerifyFundingToggle() {
            this.viewVerifyFundingOpen = false;
        },
        async getMTFPending() {
            await axios.get(`/api/billers?page=${this.pagination.current_page}`)
                .then((response) => {
                    console.log(response.data);
                    this.MTFPending = response.data.data;
                    this.pagination = response.data;
                })
                .catch((errors) => {

                })
            },
        },
    }
</script>

<template>
    <!-- Main Content -->
    <div class="flex flex-col justify-between h-full w-auto px-3 py-5 ">
        <div>
            <div class="inline-block min-w-full align-middle ">
                <div class="flex justify-between h-full min-w-full ">
                    <div class="flex justify-start flex-col space-x-3">
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
                        <div class="left-side-col-2 space-y-3 text-[10px] mb-4">
                            <DropDown label="bulk action" class="-m-3" />
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
                            class="p-1.5 px-3 uppercase h-[34px] bg-[#3E3E3E] tracking-wider text-[10px] font-medium text-white" />
                        </form>
                    </div>
                </div>
            </div>
            <div class="min-w-full py-2 align-middle ">
                <div class="relative h-[360px]">
                    <div class="shadow ring-1 ring-black ring-opacity-5 overflow-auto absolute inset-x-0 min-h-auto max-h-full">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-[#D7D7D7] font-medium text-[11px] sticky top-0">
                                <tr class="divide-x divide-gray-200">
                                    <th v-for="label in labels" :key="label.label" scope="col"
                                        class="py-1 px-3 uppercase tracking-wider text-center whitespace-nowrap text-gray-900 w-full">
                                    {{ label.label }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white text-[10px] font-light">
                                <tr class="divide-x divide-gray-200">
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                        <a href="#" class="text-cyan-500 underline" @click="(viewDetailsOpen = !viewDetailsOpen), setIconDetailsOpen()" >
                                        01
                                        </a>
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                        09/28/2022 10:55:09 AM
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                        ACCOUNTING
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                        CMT-09282022-0021
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                        We Have Everything Distributor
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                        php
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                        10,000.00
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                        1.00
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                        10,000.00
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                        FOR VERIFICATION
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-1  tracking-wider flex justify-between gap-1">
                                        <button class="tooltip tooltip-left" data-tip="view document" @click="(viewDocumentsOpen = !viewDocumentsOpen), setIconDocumentsOpen()" type="submit" >
                                            <img src="../../../../../assets/images/EyeIcon.png" alt="View Icon" class="h-5 w-5">
                                        </button>
                                        <button class="tooltip tooltip-left" data-tip="decline">
                                            <img src="../../../../../assets/images/RejectIcon.png" alt="Reject Icon" class="h-5 w-5">
                                        </button>
                                        <button class="tooltip tooltip-left" data-tip="verify"  @click="(viewVerifyFundingOpen = !viewVerifyFundingOpen)" type="submit">
                                            <img src="../../../../../assets/images/VerifyIcon.png" alt="Verify Icon" class="h-5 w-5">
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
         </div>
        <Pagination @paginate="getMTFPending()" :pagination="pagination"
            :offset="1" class="py-10"/>
    </div>

    <!-- Slideover (View Details) -->
    <Slideover :show="viewDetailsOpen" @close="viewDetailsToggle" :title="'VIEW DETAILS'" :iconShow="paraIcon">
        <div class="flex flex-col justify-between h-full pb-3">
            <div class="mx-10 h-auto">
                <div class="flex flex-col gap-3 mt-14">
                    <InputGroup  :inputLabel="'invoice no.'" :labelWidth="'w-6/12'" :inputWidth="'w-6/12'"  :isDisabled="true"/>
                    <SmallLabelInput :inputType="'text'" :inputLabel="'supplier name'" :labelWidth="'w-full'" :inputWidth="'w-full'" :isDisabled="true"/>
                    <InputGroup :inputType="'date'" :inputLabel="'due date'" :labelWidth="'w-6/12'" :inputWidth="'w-6/12'"  :isDisabled="true"/>
                    <InputGroup  :inputLabel="'remarks'" :labelWidth="'w-6/12'" :inputWidth="'w-6/12'"  :isDisabled="true"/>
                    <InputGroup :inputType="'text'" :inputLabel="'amount'" :labelWidth="'w-6/12'" :inputWidth="'w-6/12'" :isDisabled="true"/>
                    <InputTextarea :label="'description'" inputWidth="w-[100%]" :inputHeight="'h-[107px]'" :isDisabled="true" :inputColor="'bg-[#EAEAEA]'"/>
                </div>
            </div>
            <div class="flex justify-center">
                <BorderButton @click="(viewDetailsOpen = !viewDetailsOpen)" :buttonLabel="'CLOSE'" :buttonPadding="'p-2'" :buttonTextColor="'text-[#3e3e3e]'" :buttonBorderColor="'border-[#3e3e3e]'" :buttonHover="'hover:bg-[#3E3E3E]'" :buttonTextSize="'text-[15px]'"/>
            </div>
        </div>
    </Slideover>

    <!-- Slideover (View Documents) -->
    <Slideover :show="viewDocumentsOpen" @close="viewDocumentsToggle" :title="'VIEW DOCUMENTS'" :iconShow="paraIcon">
        <div class="flex flex-col justify-between gap-[20px] h-full py-5 mx-10">
            <div>
                <div>
                    <div class="flex flex-col items-center border-dashed border-2 border-[#7F7F7F] rounded-md p-5">
                        <div class="text-center mb-5">
                            <p class="text-sm">DRAG FILE HERE<br>OR</p>
                            <div class="flex items-center justify-center cursor-pointer">
                                <BorderButton :buttonLabel="'browse'" :buttonSize="'h-auto w-[100px]'" :buttonTextColor="'text-[#EE3E2C]'" :buttonBorderColor="'border-[#EE3E2C]'" :buttonHover="'hover:bg-[#EE3E2c]'" :buttonPadding="'px-4 py-1'" :buttonTextSize="'text-[12px]'"/>
                                <input class="absolute w-[100px] opacity-0" type="file" accept=".jpg, .jpeg, .png, .pdf">
                            </div>
                        </div>
                        <div class="text-center text-[10px]">
                            <p>MAX FILE SIZE: <span class="font-bold">10MB</span><br>
                            SUPPORTED FILE TYPES: <span class="font-bold">JPEG, JPG, PNG, PDF</span>
                            </p>
                        </div>
                    </div>
                    <div class="pt-5 ">
                        <div class="flex justify-between mb-3">
                            <div class="flex items-center text-sm">
                                <LoadingIcon></LoadingIcon>
                                <span>photo_lasconia.jpg</span>
                            </div>
                            <div class="cursor-pointer">
                                <XMarkIcon></XMarkIcon>
                            </div>
                        </div>
                        <div class="mb-3">
                            <ProgressIcon :progressWidth="'w-96'"></ProgressIcon>
                        </div>
                        <div class="flex justify-between text-[10px] mb-3">
                            <div>
                                <p>
                                    <span>0.5 MB</span>
                                    of
                                    <span>10 MB</span>
                                </p>
                            </div>
                            <div class="text-#194E72">
                                <p>UPLOADING...
                                    <span>50%</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="relative flex flex-col gap-5 h-auto border-dashed border-2 border-[#7F7F7F] rounded-md p-5">
                    <h1 class="absolute -top-[10px] px-[5px] text-[13px] font-semibold text-[#3E3E3E] bg-white">UPLOADED DOCUMENTS</h1>
                    <div v-if="!records" class="flex flex-col gap-[20px]">
                        <div>
                            <div class="flex gap-3">
                                <PaperClipIcon/>
                                <div class="text-[12px]">
                                    <div class="flex items-center gap-3">
                                        <p class="text-[#1F4583] underline"><a href="#">payment_request.pdf</a></p>
                                        <XMarkIcon class="stroke-red-500 cursor-pointer"></XMarkIcon>
                                    </div>
                                    <p class="font-bold">
                                        Date uploaded:
                                        <span class="font-normal">09/28/2022 10:55:09 AM</span>
                                    </p>
                                    <p class="font-bold">
                                        Uploaded by:
                                        <span class="font-normal">SOLTES, CAROL</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-center text-[#1F4583] text-[14px] hover:underline cursor-pointer">
                            <p class="capitalize">See more</p>
                            <ChevronDownIcon class="w-5 h-6"/>
                        </div>
                    </div>
                    <div v-else class="flex flex-col items-center justify-center">
                        <img src="../../../../../assets/images/no-records-img.png" alt="" class="h-[150px] w-[180px]">
                        <p class="uppercase text-center text-[14px] font-semibold">no records to display</p>
                    </div>
                </div>                
            </div>
            <div class="flex justify-center">
                <BorderButton @click="(viewDocumentsOpen = !viewDocumentsOpen)"  :buttonLabel="'CLOSE'" :buttonPadding="'p-2'" :buttonTextColor="'text-[#3e3e3e]'" :buttonBorderColor="'border-[#3e3e3e]'" :buttonHover="'hover:bg-[#3E3E3E]'" :buttonTextSize="'text-[15px]'"/>
            </div>
        </div>
    </Slideover>

    <!-- Slideover (Verify Funding) for Maker and Approver-->
    <Slideover :show="viewVerifyFundingOpen" @close="viewVerifyFundingToggle" :title="'VERIFY FUNDING'">
        <div class="flex flex-col justify-between h-full pb-3">
            <div class="mx-10 h-auto">
                <div class="flex flex-col gap-3 mt-[30px]">
                    <InputGroup :inputType="'text'" :inputLabel="'invoice no.'" :labelWidth="'w-6/12'" :inputWidth="'w-6/12'"  :isDisabled="true"/>
                    <SmallLabelInput :inputType="'text'" :inputLabel="'supplier name'" :labelWidth="'w-full'" :inputWidth="'w-full'" :isDisabled="true"/>
                    <InputGroup :inputType="'date'" :inputLabel="'due date'" :labelWidth="'w-6/12'" :inputWidth="'w-6/12'"  :isDisabled="true"/>
                    <InputGroup :inputType="'text'" :inputLabel="'remarks'" :labelWidth="'w-6/12'" :inputWidth="'w-6/12'"  :isDisabled="true"/>
                    <InputGroup :inputType="'text'" :inputLabel="'amount'" :labelWidth="'w-6/12'" :inputWidth="'w-6/12'"  :isDisabled="true"/>
                    <InputTextarea :label="'description'" inputWidth="w-[100%]" :inputHeight="'h-[107px]'" :isDisabled="true"/>
                </div>
            </div>
            <div class="flex flex-col justify-between text-center mx-10">
                <h5 class="uppercase text-[15px] px-10">Are you sure you want to verify this transaction?</h5>
                <div class="flex justify-between mt-7">
                    <BorderButton @click="(viewVerifyFundingOpen = !viewVerifyFundingOpen)"  :buttonLabel="'DECLINE'" :buttonPadding="'py-2'" :buttonTextColor="'text-[#3e3e3e]'" :buttonBorderColor="'border-[#3e3e3e]'" :buttonHover="'hover:bg-[#3E3E3E]'" :buttonTextSize="'text-[15px]'"/>
                    <BorderButton :buttonLabel="'VERIFY'" :buttonPadding="'py-2'" :buttonTextSize="'text-[15px]'"/>
                </div>
            </div>
        </div>
    </Slideover>
</template>
