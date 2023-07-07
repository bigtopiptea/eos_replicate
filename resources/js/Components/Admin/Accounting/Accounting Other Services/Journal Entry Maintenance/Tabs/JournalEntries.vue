<script>
import ChevRightIcon from "@/Components/Misc/Icons/ChevRightIcon.vue";
import EditIcon from "@/Components/Misc/Icons/EditIcon.vue";
import InputLabel from "@/Components/Misc/Input/InputLabel.vue";
import InputGroup from "@/Components/Misc/Input/InputGroup.vue";
import InputGroupSelectMenu from "@/Components/Misc/Select Menu/InputGroupSelectMenu.vue";
import NormalButton from "@/Components/Misc/Buttons/NormalButton.vue";
import BorderButton from "@/Components/Misc/Buttons/BorderButton.vue";
import SearchIcon from "@/Components/Misc/Icons/SearchIcon.vue";
import ListIcon from "@/Components/Misc/Icons/ListIcon.vue";
import DateInput from "@/Components/Misc/Input/DateInput.vue";
import Pagination from "@/Components/Misc/Pagination/Pagination.vue";
import DropDown from '@/Components/Misc/Dropdown/Dropdown.vue';
import SwitchToggle from '@/Components/Misc/Switch(Toggle)/SwitchToggle.vue';

export default {

    name:'JEJournalEntries',

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
        InputGroupSelectMenu,
        SwitchToggle,    
    },

    data() {
        return {
            user: this.$store.state.auth.user,
            JEJournalEntries: [],
            pagination: {
                current_page: 1,
            },
            labels:[
                {label:'ID'},
                {label:'CLIENT NAME'},
                {label:'DEPARTMENT'},
                {label:'MODULE'},
                {label:'PROVIDER'},
                {label:'ACCOUNT NAME'},
                {label:'ENTRY TYPE'},
                {label:'FORMULA'},
                {label:'DATE CREATED'},
                {label:'CREATED BY'},
                {label:'ACTIONS'},
            ],

        }
    },
    methods: {
        async getJEJournalEntries() {
            await axios.get(`/api/billers?page=${this.pagination.current_page}`)
                .then((response) => {
                    console.log(response.data);
                    this.JEJournalEntries = response.data.data;
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
                        <div class="left-side-col-2 text-[10px] mb-2">
                            <DropDown label="bulk action"/>
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
                                            AL EKTESAD UNITED EXCHANGE CO. W.L.L.
                                        </td>
                                        <td
                                            class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                            operations
                                        </td>
                                        <td
                                            class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                            ops - processing
                                        </td>
                                        <td
                                            class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                            -
                                        </td>
                                        <td
                                            class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                            AP - al ektesad 
                                        </td>
                                        <td
                                            class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                            debt
                                        </td>
                                        <td
                                        class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                        <p class="text-cyan-600 hover:underline cursor-pointer">SHOW FORMULA</p>
                                        </td>
                                        <td
                                            class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                            09/28/2022 08:08:10 AM
                                        </td>
                                        <td
                                            class="whitespace-nowrap uppercase py-1 px-2 tracking-wider">
                                            SABADO, CHRISTIAN PERALTA
                                        </td>
                                        <td 
                                    class="whitespace-nowrap uppercase justify-evenly py-1   tracking-wider">
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
                <Pagination @paginate="getJEJournalEntries()" :pagination="pagination"
                    :offset="1" class = "py-10"/>
            </div>
        </div>
    </div>
</template>