<script setup>
import SearchIcon from "@/Components/Misc/Icons/SearchIcon.vue";
import ListIcon from "@/Components/Misc/Icons/ListIcon.vue";

</script>
<script>
import SwitchToggle from "@/Components/Misc/Switch(Toggle)/SwitchToggle.vue";
import NormalButton from '@/Components/Misc/Buttons/NormalButton.vue'
import BorderButton from '@/Components/Misc/Buttons/BorderButton.vue'
import Slideover from '@/Components/Misc/Slideover/Slideover.vue'
import DropdownNoLabel from '@/Components/Misc/Input/DropdownNoLabel.vue'
import Pagination from "@/Components/Misc/Pagination/Pagination.vue";
import FloatingLabelDropdown from '@/Components/Misc/Input/FloatingLabelDropdown.vue';
import InputGroup from '../../../../Misc/Input/InputGroup.vue';
import FloatingLabelInput from '../../../../Misc/Input/FloatingLabelInput.vue';
import SolidButton from '../../../../Misc/Buttons/SolidButton.vue';
import CheckboxSelectMenu from '@/Components/Misc/Select Menu/CheckboxSelectMenu.vue';

export default {


    components:{
        SearchIcon,
        NormalButton,
        BorderButton,
        ListIcon,
        SwitchToggle,
        Slideover,
        DropdownNoLabel,
        Pagination,
        FloatingLabelDropdown,
        InputGroup,
        FloatingLabelInput,
        SolidButton,
        CheckboxSelectMenu

    },

    data() {
        return {
            SetupBanksProvider: [],
            pagination: {
                current_page: 1,
            },
            labels:[
                {label:'BANKS/providers'},
                {label:'date added'},
                {label:'ADDED BY'},
                {label:'Actions'},
            ],

            BankProvider:[
               {name: 'BPI'},
               {name: 'Eastwest'},
               {name: 'Landbank'},
               {name: 'Chinabank'},
               {name: 'Banco De Oro'},
               {name: 'Cebuana Lhuillier'},
            ],
            AddNewOpen: false,
            paraIcon:'CHECK', //Icon Parameter
        }
    },
    methods: {
        // Slider
        AddNewToggle(){
            this.AddNewOpen = false;
        },
        async getSetupBanksProvider() {
            await axios.get(`/api/billers?page=${this.pagination.current_page}`)
                .then((response) => {
                    console.log(response.data);
                    this.SetupBanksProvider = response.data.data;
                    this.pagination = response.data;
                })
                .catch((errors) => {

                })
        },
    },
}
</script>
<template>
    <div class="h-auto w-full bg-white px-3 py-5">
        <div class="flex flex-col min-w-full">
            <div class="w-[35%] pb-3">
                <CheckboxSelectMenu :label="'Bank/Provider'" :inputWidth="'w-full'" :placeholder="'Select Banks/Providers'" :options="BankProvider" />
            </div>
            <div class="flex justify-between items-center">
                <div class="flex w-[40%]">
                    <div class="w-full">
                        <form class="flex items-start gap-3">
                            <div class="flex">
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <SearchIcon />
                                    </div>
                                    <input type="text" id="simple-search"
                                    class="bg-gray-50 h-[34px] border border-r-0 border-[#EAEAEA] text-gray-900 text-[10px] block w-full pl-10 py-1 px-2.5"
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
                <div>
                    <BorderButton :buttonLabel="'ADD NEW'" :buttonPadding="'p-2'" :buttonSize="'h-auto w-[120px]'" :buttonStyle="'border-2 border-#F9951E text-#F9951E text-[13px]'" @click="(AddNewOpen = !AddNewOpen)"/>
                </div>
            </div>
        </div>

        <!-- TABLE-->
        <div class="min-w-full py-5 align-middle ">
            <div class="relative h-[360px]">
                <div class="shadow ring-1 ring-black ring-opacity-5 overflow-auto absolute inset-x-0 min-h-auto max-h-full">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-[#D7D7D7] font-medium text-[11px] whitespace-nowrap sticky top-0">
                            <tr class="divide-x divide-gray-200">
                                <th scope="col"
                                    class="flex justify-center items-center py-1 px-2 uppercase tracking-wider text-center text-gray-900 gap-2">
                                    <input type="checkbox" name="" id="">
                                    <span>
                                        ID
                                    </span>
                                </th>
                                <th v-for="label in labels" :key="label.label" scope="col"
                                    class="py-1 px-2 uppercase tracking-wider text-center text-gray-900">
                                    {{label.label}}
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white text-[10px]">
                            <tr class="divide-x divide-gray-200">
                                <td class=" whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                    <div class="flex justify-center items-center gap-2">
                                        <input type="checkbox" name="" id="">
                                        <a class="underline text-cyan-500" href="#">
                                            01
                                        </a>
                                    </div>
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                    BANCO DE ORO OERI TIEUP1 USD
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                    09/28/2022 11:00:05 AM
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                    banaria, jeffrey clidorio
                                </td>

                                <td class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                    <div class="flex justify-center">
                                        <button>
                                            <img src="../../../../../../assets/images/EditIconTwo.png" alt="Edit Icon" class="h-5 w-6">
                                        </button>
                                        <SwitchToggle
                                            :status="true"
                                            :isChecked="true"
                                        />
                                    </div>
                                </td>
                                </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="py-6">
            <Pagination @paginate="getSetupBanksProvider()" :pagination="pagination"
            :offset="1" class = ""/>
        </div>

    </div>

    <Slideover :show="AddNewOpen" @close="AddNewToggle" :title="'Add New'">
        <div class="flex flex-col justify-between h-full pb-[20px]">
            <div class="mx-20 h-auto">
                <div class="mt-[30px]">
                    <div class="mb-5">
                        <FloatingLabelInput :inputLabel="'Banks/Provider'" :placeholder="'Bank or Proviver Name'"/>
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-[100px]">

                <div class="flex justify-center gap-[100px] border-black">
                    <BorderButton @click="(AddNewOpen = !AddNewOpen)" :buttonLabel="'CANCEL'" :buttonPadding="'py-2'" :buttonTextColor="'text-[#3e3e3e]'" :buttonBorderColor="'border-[#3e3e3e]'" :buttonHover="'hover:bg-[#3E3E3E]'" :buttonTextSize="'text-[15px]'"/>
                     <BorderButton :buttonLabel="'CONFIRM'" :buttonPadding="'py-2'" :buttonTextSize="'text-[15px]'"/>
                </div>
            </div>
        </div>
    </Slideover>
</template>
