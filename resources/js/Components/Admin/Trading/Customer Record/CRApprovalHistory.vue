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
            myOptions:['activate', 'inactivate']
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
        <div class="flex flex-col justify-between h-full w-auto m-3">
            <div>
                <div class="inline-block min-w-full align-middle md:px-6 lg:px-8">
                    <div class="flex items-center justify-between h-auto min-w-full -mx-7 my-3">
                        <div>
                            <DropDown label="bulk action" :options="myOptions"/>
                            <NormalButton label="Apply" class="bg-[#F9951E] h-[34px] t-1.5 text-[10px] text-white px-3 uppercase" />
                        </div>
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
                            <NormalButton label="Export"
                            class="p-1.5 px-3 uppercase h-[34px] bg-[#3E3E3E] ml-4 tracking-wider text-[10px] text-white" />
                        </div>
                    </div>
                </div>
                <div class="overflow-hidden sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8 ">
                        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 mx-1">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead class="bg-[#D7D7D7] font-medium text-[11px] whitespace-nowrap">
                                    <tr class="divide-x divide-gray-200">
                                        <th scope="col"
                                            class="flex justify-between items-center py-2 px-1 uppercase tracking-wider text-center text-gray-900">
                                            <input type="checkbox" name="" id="">
                                            <span>
                                                cust. id.
                                            </span>
                                        </th>
                                        <th scope="col"
                                            class="py-2 px-1 uppercase tracking-wider text-center text-gray-900">
                                            customer type
                                        </th>
                                        <th scope="col"
                                            class="py-2 px-1 uppercase tracking-wider text-center text-gray-900">
                                            name
                                        </th>
                                        <th scope="col"
                                            class="py-2 px-1 uppercase tracking-wider text-center text-gray-900">
                                            address
                                        </th>
                                        <th scope="col"
                                            class="py-2 px-1 uppercase tracking-wider text-center text-gray-900">
                                            date added
                                        </th>
                                        <th scope="col"
                                            class="py-2 px-1 uppercase tracking-wider text-center text-gray-900">
                                            date registered
                                        </th>
                                        <th scope="col"
                                            class="py-2 px-1 uppercase tracking-wider text-center text-gray-900">
                                            status
                                        </th>
                                        <th scope="col"
                                            class="py-2 px-4 uppercase tracking-wider text-center text-gray-900">
                                            ACTION
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
                                            class="whitespace-normal text-center uppercase py-2 px-1 tracking-wider">
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
                                            for review                                               </td>
                                        <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                            <div class="flex justify-center">
                                                <button>
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
        :offset="1" class = "mb-6 mt-6"/>
        </div>
    </div>
</template>
