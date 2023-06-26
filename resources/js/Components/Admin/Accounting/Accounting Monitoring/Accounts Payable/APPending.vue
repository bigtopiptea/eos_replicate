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
    },

    data() {
        return {
            user: this.$store.state.auth.user,
            APPending: [],
            pagination: {
                current_page: 1,
            },
            labels:[
                {label:'ID'},
                {label:'DATE'},
                {label:'PAYEE'},
                {label:'INVOICE NO.'},
                {label:'INVOICE AMOUNT'},
                {label:'CREATED BY'},
                {label:'STATUS'},
            ],
            bulkOptions:[
                {label: 'verify'},
                {label: 'reject'},
            ]
        }
    },
    methods: {
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
                        <div v-show="user.role == 'verifier'" class="left-side-col-2 text-[10px] mb-2">
                            <DropDown label="bulk action" :options="bulkOptions"/>
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
                                    <th v-for="label in labels" :key="label.label" scope="col"
                                        class="py-1 px-5 whitespace-nowrap uppercase tracking-wider text-center text-gray-900 w-full">
                                        {{ label.label }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white font-light text-[10px] text-center">
                                <tr class="divide-x divide-gray-200">
                                    <td
                                        class="whitespace-nowrap uppercase py-2 px-2 tracking-wider">
                                        <a class="underline text-cyan-500" href="#">
                                            01
                                        </a>
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
                                    <!-- <td
                                        class="whitespace-nowrap uppercase justify-evenly py-1   tracking-wider">
                                        <div class="flex justify-around">
                                            <button class="tooltip tooltip-left" data-tip="view">
                                                <img src="../../../../../../assets/images/EyeIcon.png" alt="Eye Icon" class="h-5 w-5">
                                            </button>
                                            <button class="tooltip tooltip-left" data-tip="reply">
                                                <img src="../../../../../../assets/images/reply-icon.png" alt="Reply Icon" class="h-5 w-5">
                                            </button>
                                        </div>
                                    </td> -->
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

</template>