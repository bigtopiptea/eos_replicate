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
import BoxIconDrop from '@/Components/Misc/Icons/BoxIconDrop.vue';
import BoxIconX from '@/Components/Misc/Icons/BoxIconX.vue';
import Slideover from '@/Components/Misc/Slideover/Slideover.vue';
import ModalTwo from '@/Components/Misc/Modal/ModalTwo.vue';
import FloatingLabelInput from '@/Components/Misc/Input/FloatingLabelInput.vue';
import Accordion from '@/Components/Misc/Accordion.vue';
import CheckboxSelectMenu from '@/Components/Misc/Select Menu/CheckboxSelectMenu.vue';
import FloatingTextArea from '@/Components/Misc/Input/FloatingTextArea.vue';

export default {

    name:'Reconciliation',

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
        BoxIconDrop,
        BoxIconX,
        Slideover,
        ModalTwo,
        FloatingLabelInput,
        Accordion,
        CheckboxSelectMenu,
        FloatingTextArea
    },

    data() {
        return {
            finding:0,
            counter:1,
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
            FindingLabels:[
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
            ]
        }
    },
}
</script>
<template>
    <div class="bg-white px-3 py-5">

        <!-- Black Container Content -->
        <div class="w-full h-auto bg-[#3E3E3E] px-3 py-5">
            <div class="flex justify-between">
                <div class="flex flex-col gap-3 w-[39%]">
                    <InputGroup  :inputLabel="'BANK STATEMENT DATE'" :labelWidth="'w-5/12'" :inputType="'date'" :inputWidth="'w-7/12'"  :labelTextColor="'text-white'" />
                <InputGroupSelectMenu  :label="'ACCOUNT NAME'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'"   :labelTextColor="'text-white'" :placeholder="'Select Account Name'"/>
                <div class="flex gap-0 text-[10px] w-full h-7 whitespace-nowrap">
                    <label for="name" class="uppercase inline-flex items-center h-full px-2 text-left border border-[#EAEAEA] text-white text-[10px] w-[42.5%]">DISPLAY PERIOD</label>
                        <input type="date" class="mr-1 bg-white h-full p-1 pr-[15px] border border-gray-300 text-[#3E3E3E] w-[29%]">
                        <input type="date" class=" bg-white h-full p-1 pr-[15px] border border-gray-300 text-[#3E3E3E] w-[29%]">
                    </div>
                    <InputGroup  :inputLabel="'CASH POSITION'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'" :inputTextAlign="'text-right'" :labelTextColor="'text-white'" :placeholder="'-'"/>
                </div>
                <div class="flex flex-col gap-3 w-[39%]">
                    <InputGroup  :inputLabel="'BANK STATEMENT CLOSING'" :labelWidth="'w-7/12'" :inputWidth="'w-5/12'" :inputTextAlign="'text-right'" :labelTextColor="'text-white'" :placeholder="'-'"/>
                    <InputGroup  :inputLabel="'SYSTEM CALCULATED BANK CLOSING'" :labelWidth="'w-7/12'" :inputWidth="'w-5/12'" :inputTextAlign="'text-right'"   :labelTextColor="'text-white'" :placeholder="'-'"/>
                    <InputGroup  :inputLabel="'OUT OF BALANCE BY'" :labelWidth="'w-7/12'" :inputWidth="'w-5/12'" :inputTextAlign="'text-right'"   :labelTextColor="'text-white'" :placeholder="'-'"/>
                    <div class="flex justify-start gap-3 ">
                        <div class="flex gap-3 items-center ">
                            <input type="checkbox">
                            <p class="uppercase whitespace-nowrap text-[10px] text-white">Show Unticked Transactions</p>
                        </div>
                        <div class="flex gap-3 items-center ">
                            <input type="checkbox">
                            <p class="uppercase whitespace-nowrap text-[10px] text-white">Show All Transactions</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-center gap-5 pt-[30px] ">
                <BorderButton  :buttonLabel="'RESET'" :buttonPadding="'p-1'" :buttonTextColor="'text-white'" :buttonBorderColor="'border-white'" :buttonHover="'hover:bg-white'" :buttonTextSize="'text-[13px]'" :buttonHoverTextColor="'hover:text-[#3e3e3e]'" />
                <NormalButton :label="'VIEW'" class="bg-[#F9951E] p-1 text-white text-[13px] w-[120px] text-bold"/>
            </div>
        </div>

        <div class="inline-block min-w-full align-middle py-3">
            <div class="flex justify-end h-full min-w-full ">
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
                        <NormalButton @click="(isFiltered = !isFiltered)" label="Export"
                        class="p-1.5 px-3 uppercase h-[34px] bg-[#3E3E3E]   tracking-wider text-[10px] font-medium text-white" />
                    </form>
                </div>
            </div>
        </div>
        <!-- Table Content -->
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
                                <th class="py-1 px-2 whitespace-nowrap uppercase tracking-wider text-center text-gray-900">
                                    <input type="checkbox">
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
                                <td
                                    class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                    <input type="checkbox" >
                                </td>

                            </tr>
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
                                <td
                                    class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                    <input type="checkbox" >
                                </td>

                            </tr>
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
                                <td
                                    class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                    <input type="checkbox" >
                                </td>

                            </tr>
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
                                <td
                                    class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                    <input type="checkbox" >
                                </td>

                            </tr>
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
                                <td
                                    class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                    <input type="checkbox" >
                                </td>

                            </tr>
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
                                <td
                                    class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                    <input type="checkbox" >
                                </td>

                            </tr>
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
                                <td
                                    class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                    <input type="checkbox" >
                                </td>

                            </tr>
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
                                <td
                                    class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                    <input type="checkbox" >
                                </td>

                            </tr>
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
                                <td
                                    class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                    <input type="checkbox" >
                                </td>

                            </tr>
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
                                <td
                                    class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                    <input type="checkbox" >
                                </td>

                            </tr>
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
                                <td
                                    class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                    <input type="checkbox" >
                                </td>

                            </tr>
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
                                <td
                                    class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                    <input type="checkbox" >
                                </td>

                            </tr>
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
                                <td
                                    class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                    <input type="checkbox" >
                                </td>

                            </tr>
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
                                <td
                                    class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                    <input type="checkbox" >
                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="flex justify-end py-3">
                <BorderButton @click="finding++" :isDisabled="finding == 1 ? true : false"  :buttonLabel="'+ Findings'" :buttonPadding="'px-2 py-1'" :buttonTextColor="'text-[#EE3E2C]'" :buttonSize="'h-auto w-auto'" :buttonBorderColor="'border-[#EE3E2C]'" :buttonHover="'hover:bg-[#EE3E2C]'"/>
            </div>
        </div>
        <Accordion v-for="finding in finding" :key="finding" sectiontitle="FINDINGS" :setOpen=true :accordionColor="'bg-[#EE3E2C]'">
            <div class="min-w-full py-3 align-middle">
                <div class="relative w-auto">
                    <div class="shadow ring-1 ring-black ring-opacity-5">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-300 border">
                                <thead class="font-medium text-[11px] whitespace-nowrap bg-[#EAEAEA] sticky top-0">
                                    <tr class="divide-x divide-gray-300">
                                        <th v-for="label in FindingLabels" :key="label.label" scope="col"
                                            class="p-2 whitespace-nowrap uppercase tracking-wider text-center text-gray-900">
                                            {{ label.label }}
                                        </th>
                                        <th class="p-2 whitespace-nowrap uppercase tracking-wider text-center text-gray-900">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="font-light text-[10px] text-center overflow-y-auto" style="max-height: calc(100vh - 150px);">
                                    <tr v-for="counter in counter" :key="counter" class="divide-x divide-gray-300">
                                        <td class="whitespace-nowrap uppercase p-2 tracking-wider">
                                            <FloatingLabelInput :inputType="'date'"/>
                                        </td>
                                        <td class="whitespace-nowrap uppercase p-2 tracking-wider text-left">
                                            <FloatingLabelInput :inputType="'date'"/>
                                        </td>
                                        <td class="whitespace-nowrap uppercase p-1 tracking-wider text-left  w-[250px]">
                                            <FloatingTextArea :placeholder="'-'" :inputHeight="'h-[50px]'" />
                                        </td>
                                        <td class="whitespace-nowrap uppercase p-2 tracking-wider">
                                            <FloatingLabelInput :placeholder="'Input Voucher'" />
                                        </td>
                                        <td class="whitespace-nowrap uppercase p-2 tracking-wider">
                                            <FloatingLabelInput :placeholder="'Input Cheque'" />
                                        </td>
                                        <td class="whitespace-nowrap uppercase p-2 tracking-wider text-center">
                                            <div class="w-full">
                                                <CheckboxSelectMenu :placeholder="'Select Department'"/>
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap uppercase p-2 tracking-wider text-center">
                                            <input placeholder="-"  type="number" class="quantity bg-white uppercase h-7 p-1 border border-[#EAEAEA] text-[#3E3E3E] pl-2 text-right w-full">
                                        </td>
                                        <td class="whitespace-nowrap uppercase p-2 tracking-wider text-center">
                                            <input placeholder="-"  type="number" class="quantity bg-white uppercase h-7 p-1 border border-[#EAEAEA] text-[#3E3E3E] pl-2 text-right w-full">
                                        </td>
                                        <td class="whitespace-nowrap uppercase p-2 tracking-wider text-right">
                                            <input placeholder="-"  type="number" class="quantity bg-white uppercase h-7 p-1 border border-[#EAEAEA] text-[#3E3E3E] pl-2 text-right w-full">
                                        </td>
                                        <td class="whitespace-nowrap uppercase p-2 tracking-wider text-right">
                                            <input placeholder="-"  type="number" class="quantity bg-white uppercase h-7 p-1 border border-[#EAEAEA] text-[#3E3E3E] pl-2 text-right w-full">
                                        </td>
                                        <td class="whitespace-nowrap uppercase p-2 tracking-wider text-right w-[70px]">
                                            <div class="flex justify-around">
                                                <button class="tooltip tooltip-left" data-tip="Edit">
                                                    <img src="../../../../../../../assets/images/EditIconTwo.png" alt="Edit Icon" class="h-5 w-6">
                                                </button>
                                                <button class="tooltip tooltip-left" data-tip="Verify">
                                                    <img src="../../../../../../../assets/images/VerifyIcon.png" alt="Verify Icon" class="h-5 w-5">
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="flex gap-[10px] mt-[5px]">
                    <BorderButton @click="counter++" :buttonLabel="'add new line'" :buttonPadding="'p-0'" :buttonTextSize="'text-[10px]'" :buttonSize="'h-auto w-[100px]'"/>
                    <BorderButton @click="counter = 1" :buttonLabel="'clear all'" :buttonPadding="'p-0'" :buttonTextColor="'text-[#ee3e2c]'" :buttonBorderColor="'border-[#ee3e2c]'" :buttonHover="'hover:bg-[#ee3e2c]'" :buttonTextSize="'text-[10px]'" :buttonSize="'h-auto w-[100px]'"/>
                </div>
            </div>
        </Accordion>
    </div>
    <div class="flex justify-center gap-5 w-full h-auto py-5">
        <BorderButton :buttonLabel="'CANCEL'" :buttonPadding="'py-2'" :buttonTextColor="'text-[#3e3e3e]'" :buttonBorderColor="'border-[#3e3e3e]'" :buttonHover="'hover:bg-[#3E3E3E]'" :buttonTextSize="'text-[15px]'"/>
        <BorderButton :buttonLabel="'SAVE'" :buttonPadding="'py-2'" :buttonTextSize="'text-[15px]'" />
    </div>
</template>



