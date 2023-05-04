<script setup>
import EditIcon from "@/Components/Misc/Icons/EditIcon.vue";
import NormalButton from "@/Components/Misc/Buttons/NormalButton.vue";
import SearchIcon from "@/Components/Misc/Icons/SearchIcon.vue";
import ListIcon from "@/Components/Misc/Icons/ListIcon.vue";
import DateInput from "@/Components/Misc/Input/DateInput.vue";
</script>

<script>
import Pagination from "@/Components/Misc/Pagination/Pagination.vue";
import DropDown from '../../../Misc/Dropdown/Dropdown.vue';
import TabNav from "@/Components/Misc/Tabs/TabNav.vue";
import Tab from "@/Components/Misc/Tabs/Tab.vue";
import BorderButton from "@/Components/Misc/Buttons/BorderButton.vue";

export default{

    name:'Inventory - Available Inventory',

    components:{
        Tab,
        TabNav,
        DropDown,
        ListIcon,
        DateInput,
        EditIcon,
        BorderButton,
        Pagination,
    },

    data() {
        return {
            IAvailableInventory: [],
            pagination: {
                current_page: 1,
            },

            labels:[
                {label:'ID'},
                {label:'TRANSACTION DATE'},
                {label:'MAKER'},
                {label:'CLIENT NAME'},
                {label:'REFERENCE NAME'},
                {label:'EXPIRATION DATE'},
                {label:'REFERENCE NO.'},
                {label:'CURRENCY'},
                {label:'AMOUNT'},
                {label:'EXCHANGE RATE'},
                {label:'PHP AMOUNT'},
            ]
        }
    },
    methods: {
        async getIAvailableInventory() {
            await axios.get(`/api/billers?page=${this.pagination.current_page}`)
                .then((response) => {
                    console.log(response.data);
                    this.IAvailableInventory = response.data.data;
                    this.pagination = response.data;
                })
                .catch((errors) => {

            })
        },
    },
}
</script>
<template>
    <div class="h-auto w-full bg-white">
        <div class="flex flex-col justify-between h-full w-full p-3 ">
            <div class="main-content">
                <div class="inline-block min-w-full align-middle md:px-6 lg:px-[45px]">
                    <div class="flex justify-between h-auto min-w-full -mx-10 my-3">
                        <div class="right-side">
                            <form class="flex items-start">
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
                            </form>
                        </div>
                        <div>
                            <NormalButton label="Export"
                            class="p-1.5 px-3 uppercase h-[34px] bg-[#3E3E3E] ml-4 tracking-wider text-[10px] text-white" />
                        </div>
                    </div>
                </div>
                <div>
                    <div class="min-w-full py-2 align-middle ">
                        <div class="relative h-auto ">
                            <!-- overflow-x-auto -->
                            <div class=" shadow ring-1 ring-black ring-opacity-5 mx-1 overflow-auto absolute inset-x-0">
                            <table class=" divide-y divide-gray-300">
                                <thead class="bg-[#D7D7D7] font-medium text-[11px] whitespace-nowrap">
                                    <tr class="divide-x divide-gray-200">
                                        <th v-for="label in labels" :key="label.label" scope="col"
                                            class="py-2 w-1/3 px-1 uppercase tracking-wider text-center text-gray-900">
                                                {{ label.label }}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white text-[10px]">
                                    <tr class="divide-x divide-gray-200">
                                        <td class="flex gap-2 items-center whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                            <a class="underline text-cyan-500" href="#">
                                                01
                                            </a>
                                        </td>
                                        <td
                                            class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                            Kozey-Batz
                                        </td>
                                        <td
                                            class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                            SEC Registration / DTI Registration
                                        </td>
                                        <td
                                            class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                            ALEZANDRA KOZEY-BATZ
                                        </td>
                                        <td
                                            class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                            alezandra@kozeybatz.com
                                        </td>
                                        <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                            09/01/2022
                                        </td>
                                        <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                            59 day(s)
                                        </td>
                                        <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                            expired
                                        </td>
                                        <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                            expired
                                        </td>
                                        <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                            expired
                                        </td>
                                        <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                            expired
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot class="bg-white font-normal text-[11px] whitespace-nowrap">
                                    <tr class="">
                                        <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">

                                        </td>
                                        <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">

                                        </td>
                                        <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">

                                        </td>
                                        <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">

                                        </td>
                                        <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">

                                        </td>
                                        <td class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                       total
                                        </td>
                                        <td class="whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider">
                                        449
                                        </td>
                                        <td class="whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider">
                                        2,705,576.00
                                        </td>
                                        <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">

                                        </td>
                                        <td class="whitespace-nowrap text-left uppercase py-2 px-1 tracking-wider">
                                        131,575,913.68
                                        </td>

                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <Pagination @paginate="getIAvailableInventory()" :pagination="pagination"
                :offset="1" class = ""/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

