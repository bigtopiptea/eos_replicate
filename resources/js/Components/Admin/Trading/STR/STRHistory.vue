<script setup>
import ChevRightIcon from "@/Components/Misc/Icons/ChevRightIcon.vue";
import EditIcon from "@/Components/Misc/Icons/EditIcon.vue";
import InputLabel from "@/Components/Misc/Input/InputLabel.vue";
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

export default{

    name:'Tie Up To Oeri',

    components:{
        Tab, TabNav,
        DropDown,
        EditIcon,
        NormalButton,
        SearchIcon,
        InputLabel,
        ListIcon,
        DateInput,
        Pagination,
    },

    data() {
        return {
            TieUpToOeri: [],
            pagination: {
                current_page: 1,
            },
            selected: "Pending",
            mainContentShow: true,
        }
    },
    methods: {
        async getTieUpToOeri() {
            await axios.get(`/api/billers?page=${this.pagination.current_page}`)
                .then((response) => {
                    console.log(response.data);
                    this.TieUpToOeri = response.data.data;
                    this.pagination = response.data;
                })
                .catch((errors) => {

            })
        },
        switchContentToggle(){
            this.mainContentShow = !this.mainContentShow;
        },
        updateMainValue(newValue){
            this.mainContentShow = newValue;
        }
    },
}
</script>

<template>
    <div class="flex flex-col justify-between h-full w-auto m-3">
        <div>
            <div class="inline-block min-w-full align-middle md:px-6 lg:px-8">
                <div class="flex items-start justify-between h-auto min-w-full -mx-10">
                    <div class="flex justify-end flex-col space-x-3">
                        <div class="flex items-end left-side-col-1 ">
                            <div>
                                <DateInput label="Start Date" />
                            </div>
                            <div>
                                <DateInput label="End Date" />
                            </div>
                            <div>
                                <NormalButton label="Filter"
                                class="p-1.5 px-6 uppercase h-[34px] bg-[#3E3E3E] ml-3  tracking-wider text-[10px]  text-white" />
                            </div>
                        </div>
                    </div>
                    <div class="right-side flex">
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
                            class="p-1.5 px-3 uppercase h-[34px] bg-[#F9951E] text-[10px]  text-white" />
                            <NormalButton label="Export"
                            class="p-1.5 px-3 uppercase h-[34px] bg-[#3E3E3E] ml-4 tracking-wider text-[10px]  text-white mr-3" />
                        </form>
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
                                        class="py-2 px-1 uppercase tracking-wider  text-center  text-gray-900">
                                        ID
                                    </th>
                                    <th scope="col"
                                        class="py-2 px-1 uppercase tracking-wider  text-center  text-gray-900">
                                        DATE
                                    </th>
                                    <th scope="col"
                                        class="py-2 px-1 uppercase tracking-wider  text-center  text-gray-900">
                                        TIE UP
                                    </th>
                                    <th scope="col"
                                        class="py-2 px-1 uppercase tracking-wider  text-center  text-gray-900">
                                        BATCH
                                    </th>
                                    <th scope="col"
                                        class="py-2 px-1 uppercase tracking-wider  text-center  text-gray-900">
                                        FILENAME
                                    </th>
                                    <th scope="col"
                                        class="py-2 px-1 uppercase tracking-wider  text-center  text-gray-900">
                                        CURRENCY
                                    </th>
                                    <th scope="col"
                                        class="py-2 px-1 uppercase tracking-wider  text-center  text-gray-900">
                                        ITEMS
                                    </th>
                                    <th scope="col"
                                        class="py-2 px-1 uppercase tracking-wider  text-center  text-gray-900">
                                        TOTAL TXN. AMT
                                    </th>
                                    <th scope="col"
                                        class="py-2 px-1 uppercase tracking-wider  text-center  text-gray-900">
                                        FUNDED AMT
                                    </th>
                                    <th scope="col"
                                        class="py-2 px-4 uppercase tracking-wider  text-center  text-gray-900">
                                        OUTSTANDING AMT.
                                    </th>
                                    <th scope="col"
                                        class="py-2 px-4 uppercase tracking-wider  text-center  text-gray-900">
                                        OUTSTANDING AMT.
                                    </th>
                                    <th scope="col"
                                        class="py-2 px-4 uppercase tracking-wider  text-center  text-gray-900">
                                        COMMITED RATE
                                    </th>
                                    <th scope="col"
                                        class="py-2 px-4 uppercase tracking-wider  text-center  text-gray-900">
                                        CONVERTED AMOUNT
                                    </th>
                                    <th scope="col"
                                        class="py-2 px-4 uppercase tracking-wider  text-center  text-gray-900">
                                        ACTION
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white text-[10px]">
                                <tr class="divide-x divide-gray-200">
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1  tracking-wider">
                                        <a class="underline text-cyan-500" href="#">
                                            01
                                        </a>
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1  tracking-wider">
                                        09/28/2022 11:00:09 PM
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1  tracking-wider">
                                        redha al ansari
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1  tracking-wider">
                                        01
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1  tracking-wider">
                                        usd
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1  tracking-wider">
                                        redha batch 01
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1  tracking-wider">
                                        usd                                                </td>
                                    <td
                                        class=" whitespace-nowrap text-center uppercase py-2 px-1  tracking-wider">
                                        547
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1  tracking-wider">
                                        113,784.25
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1  tracking-wider">
                                        0.00
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1  tracking-wider">
                                        113,784.25
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1  tracking-wider">
                                        48.25
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1  tracking-wider">
                                        5,490,090.06
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1  tracking-wider">
                                        <div class="flex justify-center">

                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <Pagination @paginate="getTieUpToOeri()"  :pagination="pagination"
    :offset="1" class = "mb-6 mt-6"/>
    </div>
</template>
<style>
.slide-fade-enter-active {
    transition: all 0.3s ease-out;
}

.slide-fade-leave-active {
    transition: all 0.8s cubic-bezier(1, 0.5, 0.8, 1);
}

.slide-fade-enter-from,
.slide-fade-leave-to {
    transform: translateY(20px);
    opacity: 0;
}
</style>
