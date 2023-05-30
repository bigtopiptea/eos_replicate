<script setup>
import EditIcon from "@/Components/Misc/Icons/EditIcon.vue";
import SearchIcon from "@/Components/Misc/Icons/SearchIcon.vue";
import ListIcon from "@/Components/Misc/Icons/ListIcon.vue";
import DateInput from "@/Components/Misc/Input/DateInput.vue";
</script>

<script>
import Pagination from "@/Components/Misc/Pagination/Pagination.vue";
import NormalButton from "@/Components/Misc/Buttons/NormalButton.vue";
import DropDown from '../../../Misc/Dropdown/Dropdown.vue';
import TabNav from "@/Components/Misc/Tabs/TabNav.vue";
import Tab from "@/Components/Misc/Tabs/Tab.vue";
import BorderButton from "@/Components/Misc/Buttons/BorderButton.vue";
import SwitchToggle from "@/Components/Misc/Switch(Toggle)/SwitchToggle.vue";

export default {

    name:'Customer Record - Pending',

    components:{
        Tab,
        TabNav,
        DropDown,
        ListIcon,
        DateInput,
        EditIcon,
        SwitchToggle,
        BorderButton,
        Pagination,
        NormalButton
    },

    data() {
        return {
            CRApprovalHistory: [],
            pagination: {
                current_page: 1,
            },
            myOptions:['activate', 'inactivate'],
            labels:[
                {label:'CUSTOMER TYPE'},
                {label:'NAME'},
                {label:'ADDRESS'},
                {label:'DATE ADDED'},
                {label:'DATE REGISTERED'},
                {label:'STATUS'},
                {label:'ACTION'},
            ],

        }
    },
    methods: {
        async getCRApprovalHistory() {
            await axios.get(`/api/billers?page=${this.pagination.current_page}`)
                .then((response) => {
                    console.log(response.data);
                    this.CRApprovalHistory = response.data.data;
                    this.pagination = response.data;
                })
                .catch((errors) => {

            })
        },
    },
}
</script>
<template>
    <div>
        <div class="flex flex-col justify-between h-full w-auto px-3 py-5">
            <div>
                <div class="inline-block min-w-full align-middle ">
                    <div class="flex items-center justify-between h-auto min-w-full ">
                        <div>
                            <DropDown label="bulk action" :options="myOptions"/>
                            <NormalButton label="Apply" class="bg-[#F9951E] h-[34px] t-1.5 text-[10px] text-white px-3 uppercase" />
                        </div>
                        <form class="gap-3 flex items-start">
                            <div class="flex">
                                <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <SearchIcon />
                                </div>
                                <input type="text" id="simple-search"
                                    class="bg-gray-50 h-[34px] border border-r-0 border-[#EAEAEA] text-gray-900 font-light text-[10px] block w-full pl-10 p-2.5"
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
                <div class="min-w-full py-5 align-middle ">
                    <div class="relative h-[360px]">
                        <div class="shadow ring-1 ring-black ring-opacity-5 overflow-auto absolute inset-x-0 min-h-auto max-h-full">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead class="bg-[#D7D7D7] font-medium text-[11px] whitespace-nowrap sticky top-0">
                                    <tr class="divide-x divide-gray-200">
                                        <th scope="col"
                                            class="flex justify-between items-center py-2 px-1 uppercase tracking-wider text-center text-gray-900 gap-2">
                                            <input type="checkbox" name="" id="">
                                            <span>
                                                cust. id.
                                            </span>
                                        </th>
                                        <th v-for="label in labels" :key="label.label" scope="col"
                                            class="py-2 px-4 uppercase tracking-wider text-center text-gray-900">
                                            {{label.label}}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white text-[10px]">
                                    <tr class="divide-x divide-gray-200">
                                        <td class=" whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                            <div class="flex justify-center items-center gap-2">
                                                <input type="checkbox" name="" id="">
                                                <a class="underline text-cyan-500" href="#">
                                                    0007
                                                </a>
                                            </div>
                                        </td>
                                        <td
                                            class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                            CORPORATION
                                        </td>
                                        <td
                                            class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                            Flatley LLC.
                                        </td>
                                        <td
                                            class="whitespace-normal text-left uppercase py-2 px-1 tracking-wider">
                                            KM. 18 South Superhighway West Service Road, Brgy. Marcelo Barangay Marcelo
                                        </td>
                                        <td
                                            class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                            09/28/2022 10:38:20 AM
                                        </td>
                                        <td
                                            class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                            09/28/2022 10:38:20 AM
                                        </td>
                                        <td
                                            class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                            for review
                                        </td>
                                        <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                            <div class="flex justify-center">
                                                <button class="tooltip tooltip-left lowercase" data-tip="edit" >
                                                    <img src="../../../../../assets/images/EditIconTwo.png" alt="Edit Icon" class="h-5 w-6">
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
            </div>
            <Pagination @paginate="getCRApprovalHistory()"  :pagination="pagination"
        :offset="1" class = "my-10"/>
        </div>
    </div>
</template>
