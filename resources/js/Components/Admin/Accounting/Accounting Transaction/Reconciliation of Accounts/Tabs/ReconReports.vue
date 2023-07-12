<script>
import ChevRightIcon from "@/Components/Misc/Icons/ChevRightIcon.vue";
import InputLabel from "@/Components/Misc/Input/InputLabel.vue";
import InputGroup from "@/Components/Misc/Input/InputGroup.vue";
import TextAreaGroup from '@/Components/Misc/Input/TextAreaGroup.vue';
import InputGroupSelectMenu from "@/Components/Misc/Select Menu/InputGroupSelectMenu.vue";
import NormalButton from "@/Components/Misc/Buttons/NormalButton.vue";
import BorderButton from "@/Components/Misc/Buttons/BorderButton.vue";
import SearchIcon from "@/Components/Misc/Icons/SearchIcon.vue";
import DateInput from "@/Components/Misc/Input/DateInput.vue";
import Pagination from "@/Components/Misc/Pagination/Pagination.vue";
import DropDown from '@/Components/Misc/Dropdown/Dropdown.vue';
import Slideover from '@/Components/Misc/Slideover/Slideover.vue';
import ModalTwo from '@/Components/Misc/Modal/ModalTwo.vue';
import FloatingLabelInput from '@/Components/Misc/Input/FloatingLabelInput.vue';
import CheckboxSelectMenu from '../../../../../Misc/Select Menu/CheckboxSelectMenu.vue';



export default {

    name:'Recon Reports',

    components:{
        ChevRightIcon,
        DropDown,
        NormalButton,
        BorderButton,
        InputGroup,
        SearchIcon,
        InputLabel,
        DateInput,
        Pagination,
        TextAreaGroup,
        InputGroupSelectMenu,
        Slideover,
        ModalTwo,
        FloatingLabelInput,
        CheckboxSelectMenu,

    },

    data() {
        return {
            reconReports: [],
                pagination: {
                    current_page: 1,
                },
            options:[
                {label:'Hello'},
                {label:'OPTIMUMBANK WCC SF PHP'},

            ],
            labels:[
                {label:'STATEMENT DATE'},
                {label:'TXN. DATE'},
                {label:'DESCRIPTION'},
                {label:'VOUCHER NO.'},
                {label:'CHEQUE NO.'},
                {label:'DEPARTMENT'},
                {label:'DEBIT (USD)'},
                {label:'CREDIT (USD)'},
                {label:'DEBIT (PHP)'},
                {label:'CREDIT (PHP)'},
            ],
        }
    },
    methods: {
            async getreconReports() {
                await axios.get(`/api/billers?page=${this.pagination.current_page}`)
                    .then((response) => {
                        console.log(response.data);
                        this.reconReports = response.data.data;
                        this.pagination = response.data;
                    })
                    .catch((errors) => {

                    })
                },
            },
}
</script>
<template>
    <div class="bg-white w-full h-auto px-3 py-5">
        <div class="flex justify-between">
            <div class="flex gap-3 w-full items-end">
                <div class="w-[20%]">
                    <CheckboxSelectMenu :options="options" :buttonHeight="'h-[34px]'" :label="'Account Name'" :placeholder="'Select Account Name'" />
                </div>
                <div>
                    <DateInput label="Start Date" />
                </div>
                <div>
                    <DateInput label="End Date" />
                </div>
                <div>
                    <NormalButton @click="isFiltered = !isFiltered" label="Filter"
                    class="p-1.5 px-3 uppercase h-[34px] bg-[#3E3E3E] tracking-wider text-[10px] font-medium text-white" />
                </div>
            </div>
            <div>
                <BorderButton :buttonLabel="'SUMMARY'"/>
            </div>
        </div>
        <div class="flex flex-col gap-3 py-3 w-[30%]">
            <div>
                <InputGroup  :inputLabel="'BANK STATEMENT CLOSING'" :labelWidth="'w-7/12'" :inputWidth="'w-5/12'" :inputTextAlign="'text-right'"  :placeholder="'-'" :isDisabled="true" />
            </div>
            <div>
                <InputGroup  :inputLabel="'SYSTEM CALCULATED BANK CLOSING'" :labelWidth="'w-7/12'" :inputWidth="'w-5/12'" :inputTextAlign="'text-right'" :placeholder="'-'" :isDisabled="true"/>
            </div>
        </div>
        <div class="flex justify-between w-full">
            <div class="w-[30%]">
                <InputGroup  :inputLabel="'OUT OF BALANCE BY'" :labelWidth="'w-7/12'" :inputWidth="'w-5/12'" :inputTextAlign="'text-right'" :placeholder="'-'" :isDisabled="true"/>
            </div>
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
        <div class="min-w-full py-2 align-middle ">
            <div class="relative h-[285px]">
                <div class="shadow ring-1 ring-black ring-opacity-5 overflow-auto absolute inset-x-0 min-h-auto max-h-full">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-[#EDEDED] font-medium text-[11px] whitespace-nowrap sticky top-0">
                            <tr class="divide-x divide-gray-200">
                                <th v-for="label in labels" :key="label.label" scope="col"
                                    class="py-1 px-2 whitespace-nowrap uppercase tracking-wider text-center text-gray-900">
                                    {{ label.label }}
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white font-light text-[10px] text-center">
                            <tr class="divide-x divide-gray-200">
                                <td
                                    class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                    -
                                </td>
                                <td
                                    class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                    09/27/2022
                                </td>
                                <td
                                    class="whitespace-nowrap uppercase py-1 px-2 tracking-wider truncate max-w-[300px]">
                                    TO BOOK FUND TRANSFER TO ALLBANK SF FROM ALLBANK Padadadada
                                </td>
                                <td
                                    class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                    -
                                </td>
                                <td
                                    class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                    -
                                </td>
                                <td
                                    class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                    CMT
                                </td>
                                <td
                                    class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                    0.00
                                </td>
                                <td
                                    class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                    0.00
                                </td>
                                <td
                                    class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                    1,800,000.00
                                </td>
                                <td
                                    class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                    0.00
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <Pagination @paginate="getreconReports()" :pagination="pagination"
    :offset="1" class="mt-8" />
    </div>

</template>



