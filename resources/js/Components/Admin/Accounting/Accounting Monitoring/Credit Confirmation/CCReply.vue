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
export default {

    name:'CC Reply',

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
        Slideover,
        TextAreaGroup,
        InputGroupSelectMenu,
    },

    data() {
        return {
            CCReply: [],
            pagination: {
                current_page: 1,
            },
            labels:[
                {label:'DATE'},
                {label:'REFERENCE NO.'},
                {label:'CANCELLATION REF. NO.'},
                {label:'FROM'},
                {label:'TO'},
                {label:'CURRENCY'},
                {label:'AMOUNT'},
                {label:'REMARKS'},
                {label:'ACTION'},
            ],
            statusOption:[
                {label: 'no credit bank'},
                {label: 'with credit bank'},
                {label: 'no credit bank'},
            ],
            replyOpen: false,
            approvalDetailsOpen: false
        }
    },
    methods: {
        replyToggle() {
            this.replyOpen = false;
        },
        approvalDetailsToggle() {
            this.approvalDetailsOpen = false;
        },
        async getCCReply() {
            await axios.get(`/api/billers?page=${this.pagination.current_page}`)
                .then((response) => {
                    console.log(response.data);
                    this.CCReply = response.data.data;
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
                                        class="flex items-center justify-center gap-[10px] py-1 px-5 whitespace-nowrap uppercase tracking-wider text-center text-gray-900 w-full">
                                        <input type="checkbox">
                                        id
                                    </th>
                                    <th v-for="label in labels" :key="label.label" scope="col"
                                        class="py-1 px-5 whitespace-nowrap uppercase tracking-wider text-center text-gray-900 ">
                                        {{ label.label }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white font-light text-[10px] text-center">
                                <tr class="divide-x divide-gray-200">
                                    <td
                                        class="flex items-center justify-center gap-[10px] whitespace-nowrap uppercase py-2 px-2 tracking-wider">
                                        <input type="checkbox">
                                        <p @click="(approvalDetailsOpen = !approvalDetailsOpen)"  class="underline text-cyan-500 cursor-pointer">
                                            01
                                        </p>
                                    </td>
                                    <td
                                        class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                        09/28/2022 11:00:09 PM
                                    </td>
                                    <td
                                        class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                        REDHA-09282022-0001
                                    </td>
                                    <td
                                        class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                        <p class="underline text-cyan-500">
                                            amd-09282022-0001
                                        </p>
                                    </td>
                                    <td
                                        class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                        BDO
                                    </td>
                                    <td
                                        class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                        OUT
                                    </td>
                                    <td
                                        class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                        PHP
                                    </td>
                                    <td
                                        class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                        58,650.00
                                    </td>
                                    <td
                                        class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                        INVALID ACCOUNT NO.
                                    </td>
                                    <td
                                        class="whitespace-nowrap uppercase justify-evenly py-1   tracking-wider">
                                        <div class="flex justify-around">
                                            <button class="tooltip tooltip-left" data-tip="view">
                                                <img src="../../../../../../assets/images/EyeIcon.png" alt="Lists Icon" class="h-5 w-5">
                                            </button>
                                            <button @click="(replyOpen = !replyOpen)" class="tooltip tooltip-left" data-tip="reply">
                                                <img src="../../../../../../assets/images/reply-icon.png" alt="Reply Icon" class="h-5 w-5">
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
        <Pagination @paginate="getCCReply()" :pagination="pagination"
            :offset="1" class = "py-10"/>
    </div>

    <Slideover :show="replyOpen" @close="replyToggle" :title="'CANCELLATION'" :iconShow="''">
        <div class="flex flex-col justify-between h-full pb-5 mx-10">
            <div class="flex flex-col gap-[50px] mt-5">
                <div class="flex flex-col gap-3">
                    <InputGroup :inputLabel="'reference no.'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'"  :isDisabled="true"/>
                    <InputGroup :inputLabel="'cancellation ref. no.'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'" :isDisabled="true"/>
                    <InputGroup :inputLabel="'beneficiary'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'"  :isDisabled="true"/>
                    <InputGroup :inputLabel="'account number'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'"  :isDisabled="true"/>
                    <InputGroup  :inputLabel="'bank'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'"  :isDisabled="true"/>
                    <InputGroup :inputLabel="'amount'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'"  :isDisabled="true"/>
                    <InputGroup :inputLabel="'remarks'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'"  :isDisabled="true"/>
                    <InputGroup :inputLabel="'operations maker'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'"  :isDisabled="true"/>
                    <InputGroup :inputLabel="'cmt maker'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'"  :isDisabled="true"/>
                </div>
                <div class="flex flex-col gap-2 pb-[50px]">
                    <div class="flex flex-col gap-2">
                        <InputGroupSelectMenu :label="'confirmation status'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'" :options="statusOption"/>
                        <div class="flex justify-end">
                            <div class="flex items-center gap-[5px] w-[58%]">
                                <input type="checkbox" name="confirm-status">
                                <span class="uppercase text-[11px]">special handling</span>
                            </div>
                        </div>
                    </div>
                    <TextAreaGroup :inputLabel="'reply'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'"/>
                </div>
            </div>
            <div class="flex justify-between">
                <BorderButton @click.prevent="replyToggle()" :buttonLabel="'cancel'" :buttonPadding="'p-2'" :buttonTextColor="'text-[#3e3e3e]'" :buttonBorderColor="'border-[#3e3e3e]'" :buttonHover="'hover:bg-[#3E3E3E]'" :buttonTextSize="'text-[15px]'"/>
                <BorderButton :buttonLabel="'save'" :buttonPadding="'py-2'" :buttonTextSize="'text-[15px]'"/>
            </div>
        </div>
    </Slideover>

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
</template>
