<script setup>
import ChevRightIcon from "@/Components/Misc/Icons/ChevRightIcon.vue";
import EditIcon from "@/Components/Misc/Icons/EditIcon.vue";
import InputLabel from "@/Components/Misc/Input/InputLabel.vue";
import NormalButton from "@/Components/Misc/Buttons/NormalButton.vue";
import SearchIcon from "@/Components/Misc/Icons/SearchIcon.vue";
import ListIcon from "@/Components/Misc/Icons/ListIcon.vue";
import DateInput from "@/Components/Misc/Input/DateInput.vue";
import PaperClipIcon from "@/Components/Misc/Icons/PaperClipIcon.vue";


</script>

<script>
import Pagination from "@/Components/Misc/Pagination/Pagination.vue";
import DropDown from '../../../Misc/Dropdown/Dropdown.vue';
import Slideover from "@/Components/Misc/Slideover/Slideover.vue";
import InputGroup from "@/Components/Misc/Input/InputGroup.vue";
import SmallLabelInput from "@/Components/Misc/Input/SmallLabelInput.vue";
import InputTextarea from "@/Components/Misc/Input/InputTextarea.vue";
import BorderButton from "../../../Misc/Buttons/BorderButton.vue";

export default {

    name:'MTFApprovalHistory',

    components:{
        DropDown,
        EditIcon,
        NormalButton,
        SearchIcon,
        InputLabel,
        ListIcon,
        DateInput,
        Pagination,
        Slideover,
        PaperClipIcon,
        InputGroup,
        SmallLabelInput,
        InputTextarea,
        BorderButton
    },

    data() {
        return {
            MTFApprovalHistory: [],
            pagination: {
                current_page: 1,
            },
            viewDetailsOpen: false,  //Slideover
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
                {label:'STATUS'},
            ]
        }
    },
    methods: {
        //Slideover
        setIconDetailsOpen(){
            this.viewDetailsOpen === true ? this.test = 'FIND' : '';
        },
        viewDetailsToggle(){
            this.viewDetailsOpen = false;
        },
        async getMTFApprovalHistory() {
            await axios.get(`/api/billers?page=${this.pagination.current_page}`)
                .then((response) => {
                    console.log(response.data);
                    this.MTFApprovalHistory = response.data.data;
                    this.pagination = response.data;
                })
                .catch((errors) => {

                })
            },
        },
    }
</script>

<template>
    <div class="flex flex-col justify-between h-full w-auto mx-3 my-6 mb-3">
        <div>
            <div class="inline-block min-w-full align-middle px-6 mb-3">
                <div class="flex justify-between h-full min-w-full -mx-6">
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
                    </div>
                    <div class="right-side mt-[5px]">
                        <form class="flex items-start">
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
                            <NormalButton label="Export"
                            class="p-1.5 px-3 uppercase h-[34px] bg-[#3E3E3E] ml-4 tracking-wider text-[10px] font-medium text-white" />
                        </form>
                    </div>
                </div>
            </div>
            <div class="overflow-hidden sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8 ">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-[#D7D7D7] font-medium text-[11px]">
                                <tr class="divide-x divide-gray-200">
                                    <th v-for="label in labels" :key="label.label" scope="col"
                                        class="whitespace-nowrap py-2 px-1 uppercase tracking-wider text-center text-gray-900">
                                        {{ label.label }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white font-light text-[10px] ">
                                <tr class="divide-x divide-gray-200">
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider ">
                                        <a href="#" class="text-cyan-500 underline" @click="(viewDetailsOpen = !viewDetailsOpen), setIconDetailsOpen()" >
                                        01
                                        </a>
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        09/28/2022 10:55:09 AM
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        ACCOUNTING
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        CMT-09282022-0021
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        We Have Everything Distributor
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        php
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        10,000.00
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        1.00
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        10,000.00
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        APPROVED
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <Pagination @paginate="getMTFApprovalHistory()" :pagination="pagination"
            :offset="1" class="my-6"/>
    </div>

     <!-- Slideover (View Details) -->
     <Slideover :show="viewDetailsOpen" @close="viewDetailsToggle" :title="'VIEW DETAILS'" :iconShow="test">
        <div class="flex flex-col justify-between h-full pb-3">
            <div class="mx-10 h-auto">
                <div class="flex flex-col gap-3 mt-14">
                    <InputGroup :inputType="'text'" :inputLabel="'invoice no.'" :labelWidth="'w-6/12'" :inputWidth="'w-6/12'" :isDisabled="true"/>
                    <SmallLabelInput :inputType="'text'" :inputLabel="'supplier name'" :labelWidth="'w-full'" :inputWidth="'w-full'" :isDisabled="true"/>
                    <InputGroup :inputType="'date'" :inputLabel="'due date'" :labelWidth="'w-6/12'" :inputWidth="'w-6/12'" :isDisabled="true"/>
                    <InputGroup :inputType="'text'" :inputLabel="'remarks'" :labelWidth="'w-6/12'" :inputWidth="'w-6/12'" :isDisabled="true"/>
                    <InputGroup :inputType="'text'" :inputLabel="'amount'" :labelWidth="'w-6/12'" :inputWidth="'w-6/12'" :isDisabled="true"/>
                    <InputTextarea :label="'description'" inputWidth="w-[100%]" :inputHeight="'h-[107px]'" :isDisabled="true"/>
                </div>
            </div>
            <div class="flex justify-center">
                <BorderButton @click="(viewDetailsOpen = !viewDetailsOpen)"  :buttonLabel="'CLOSE'" :buttonPadding="'p-2'" :buttonTextColor="'text-[#3e3e3e]'" :buttonBorderColor="'border-[#3e3e3e]'" :buttonHover="'hover:bg-[#3E3E3E]'" :buttonTextSize="'text-[15px]'"/>
            </div>
        </div>
    </Slideover>
</template>
<style>
.slide-fade-enter-active {
    transition: all 0.3s ease-out;
}

.slide-fade-leave-active {
    transition: all 0.8s cubic-bezier(1, 0.5, 0.8, 1);
}

.slide-fade-enter-from,
.slide-fade-leave-to {
    transform: translateY(20px);
    opacity: 0;
}
</style>
