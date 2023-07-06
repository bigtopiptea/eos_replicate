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
import SwitchToggle from '@/Components/Misc/Switch(Toggle)/SwitchToggle.vue';
import Slideover from '@/Components/Misc/Slideover/Slideover.vue';
export default {

    name:'JEMaintenance',

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
        SwitchToggle,
        Slideover
    },

    data() {
        return {
            user: this.$store.state.auth.user,
            JEMaintenance: [],
            pagination: {
                current_page: 1,
            },
            labels:[
                {label:'ID'},
                {label:'LABEL'},
                {label:'DEPARTMENT'},
                {label:'TRANSACTION'},
                {label:'FIELD NAME'},
                {label:'DATE ADDED'},
                {label:'ADDED BY'},
                {label:'ACTIONS'},
            ],
            sampleOption:[
                {label: 'OPTION 1'},
                {label: 'OPTION 2'},
                {label: 'OPTION 3'},
            ],
            slideoverOpen: false,
        }
    },
    methods: {
        slideoverToggle(){
            this.slideoverOpen = false;
        },
        async getJEMaintenance() {
            await axios.get(`/api/billers?page=${this.pagination.current_page}`)
                .then((response) => {
                    console.log(response.data);
                    this.JEMaintenance = response.data.data;
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
                <div class="flex justify-between items-center h-full min-w-full ">
                    <div class="flex justify-start flex-col gap-3">
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
                    <div class="right-side mt-[5px]">
                        <BorderButton @click="(slideoverOpen = !slideoverOpen)" :buttonLabel="'ADD NEW'" :buttonPadding="'p-2'" :buttonTextSize="'text-[13px]'"/>
                    </div>
                </div>
            </div>
            <div class="mt-[30px]">
                <div class="min-w-full py-2 align-middle ">
                    <div class="relative h-[360px]">
                        <div class="shadow ring-1 ring-black ring-opacity-5 overflow-auto absolute inset-x-0 min-h-auto max-h-full">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead class="bg-[#D7D7D7] font-medium text-[11px] whitespace-nowrap sticky top-0">
                                    <tr class="divide-x divide-gray-200">
                                        <th v-for="label in labels" :key="label.label" scope="col"
                                            class="py-1 px-5 whitespace-nowrap uppercase tracking-wider text-center text-gray-900">
                                            {{ label.label }}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white font-light text-[10px] text-center">
                                    <tr class="divide-x divide-gray-200">
                                        <td
                                            class="flex items-center justify-center gap-[10px] whitespace-nowrap uppercase py-2 px-2 tracking-wider">
                                            1
                                        </td>
                                        <td
                                            class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                            GROSS AMOUNT
                                        </td>
                                        <td
                                            class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                            operations
                                        </td>
                                        <td
                                            class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                            processing
                                        </td>
                                        <td
                                            class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                            [gross_amount]
                                        </td>
                                        <td
                                            class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                            09/28/2022 08:08:10 AM
                                        </td>
                                        <td
                                            class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                            SABADO, CHRISTIAN PERALTA
                                        </td>
                                        <td class="whitespace-nowrap uppercase justify-evenly py-1   tracking-wider">
                                        <div class="flex justify-around">
                                            <button class="tooltip tooltip-left" data-tip="edit">
                                                <img src="../../../../../../../assets/images/EditIconTwo.png" alt="Reject Icon" class="h-5 w-6">
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
                <Pagination @paginate="getJEMaintenance()" :pagination="pagination"
                    :offset="1" class = "py-10"/>
            </div>
        </div>
    </div>
    <Slideover :show="slideoverOpen" @close="slideoverToggle" :title="'ADD NEW'">
        <div class="flex flex-col justify-between h-full px-[40px] py-[15px]">
            <div class="flex flex-col gap-[10px]">
                <InputGroup  :inputLabel="'id'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'"  :isDisabled="true"/>
                <InputGroup  :inputLabel="'label'" :labelWidth="'w-5/12'" :inputWidth="'w-7/12'" :placeholder="'ENTER LABEL'" :isRequired="true"/>
                <InputGroupSelectMenu :label="'department'" :inputWidth="'w-7/12'" :labelWidth="'w-5/12'" :isRequired="true" :placeholder="'select department'" :options="sampleOption"/>
                <InputGroupSelectMenu :label="'Transaction'" :inputWidth="'w-7/12'" :labelWidth="'w-5/12'" :isRequired="true" :placeholder="'select transaction type'" :options="sampleOption"/>
                <InputGroupSelectMenu :label="'Fieldname'" :inputWidth="'w-7/12'" :labelWidth="'w-5/12'" :isRequired="true" :placeholder="'select field name'" :options="sampleOption"/>
            </div>
            <div class="flex justify-between">
                <BorderButton @click="slideoverToggle()"  :buttonLabel="'CANCEL'" :buttonPadding="'p-2'" :buttonTextColor="'text-[#3e3e3e]'" :buttonBorderColor="'border-[#3e3e3e]'" :buttonHover="'hover:bg-[#3E3E3E]'" :buttonTextSize="'text-[13px]'"/>
                <BorderButton :buttonLabel="'SAVE'" :buttonPadding="'p-2'" :buttonTextSize="'text-[13px]'"/>
            </div>
        </div>
    </Slideover>
</template>