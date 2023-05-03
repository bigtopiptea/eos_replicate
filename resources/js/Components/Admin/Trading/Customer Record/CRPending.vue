<script setup>
import EditIcon from "@/Components/Misc/Icons/EditIcon.vue";
import NormalButton from "@/Components/Misc/Buttons/NormalButton.vue";
import SearchIcon from "@/Components/Misc/Icons/SearchIcon.vue";
import ListIcon from "@/Components/Misc/Icons/ListIcon.vue";
import UserIcon from "@/Components/Misc/Icons/UserIcon.vue";
import UserGroupIcon from "@/Components/Misc/Icons/UserGroupIcon.vue";
import DateInput from "@/Components/Misc/Input/DateInput.vue";
</script>

<script>
import Pagination from "@/Components/Misc/Pagination/Pagination.vue";
import DropDown from '../../../Misc/Dropdown/Dropdown.vue';
import TabNav from "@/Components/Misc/Tabs/TabNav.vue";
import Tab from "@/Components/Misc/Tabs/Tab.vue";
import BorderButton from "@/Components/Misc/Buttons/BorderButton.vue";
import ModalTwo from "@/Components/Misc/Modal/ModalTwo.vue";

export default {

    name:'Customer Record - Pending',

    components:{
        Tab,
        TabNav,
        DropDown,
        ListIcon,
        UserIcon,
        UserGroupIcon,
        DateInput,
        EditIcon,
        BorderButton,
        Pagination,
        ModalTwo
    },

    data() {
        return {
            CRPending: [],
            pagination: {
                current_page: 1,
            },
            viewModalOpen: false,

            labels:[
                {label:'CUSTOMER TYPE'},
                {label:'NAME'},
                {label:'ADDRESS'},
                {label:'DATE ADDED'},
                {label:'DATE REGISTERED'},
                {label:'STATUS'},
                {label:'ACTION'},
            ]
        }
    },
    methods: {
        // Modal
        viewModalToggle() {
            this.viewModalOpen = false;
        },
        async getCRPending() {
            await axios.get(`/api/billers?page=${this.pagination.current_page}`)
                .then((response) => {
                    console.log(response.data);
                    this.CRPending = response.data.data;
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
                    <div class="flex items-start justify-between h-auto min-w-full -mx-7 my-3">
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
                                class="p-1.5 px-3 uppercase h-[34px] bg-[#F9951E] text-[10px] text-white" />
                                <NormalButton label="Export"
                                class="p-1.5 px-3 uppercase h-[34px] bg-[#3E3E3E] ml-4 tracking-wider text-[10px] text-white mr-3" />
                            </form>
                        </div>
                        <div>
                            <BorderButton @click="(viewModalOpen = !viewModalOpen)" :buttonLabel="'ADD NEW'"/>
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
                                            class="flex justify-between items-center py-2 px-1 uppercase tracking-wider text-center text-gray-900 gap-2">
                                            <input type="checkbox">
                                            <span>
                                                cust. id.
                                            </span>
                                        </th>
                                        <th v-for="label in labels" :key="label.label" scope="col"
                                            class="py-2 px-1 uppercase tracking-wider text-center text-gray-900">
                                            {{label.label}}
                                        </th>

                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white text-[10px]">
                                    <tr class="divide-x divide-gray-200">
                                        <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
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
                                            for review
                                        </td>
                                        <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                            <div class="flex justify-center">
                                                <!-- <router-link :to="{path: '/app/funding/edit'}">
                                                    Go
                                                </router-link> -->
                                                <button @click="switchContentToggle()" >
                                                    <img src="../../../../../assets/images/EditIconTwo.png" alt="Edit Icon" class="h-5 w-6">
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <Pagination @paginate="getCRPending()" :pagination="pagination"
        :offset="1" class = "mb-6 mt-6"/>
        </div>
    </div>
    <ModalTwo :show="viewModalOpen" @close="viewModalToggle" :modalTitle="'NEW CUSTOMER'" :heightModal="'h-[300px]'" :modalTitlePosition="'text-center'">
        <div class="flex flex-col justify-between mx-5 mb-5 h-full">
            <div class="flex justify-between">
                <router-link to="/app/trading/customer-record/individual">
                    <div class="indiv-client flex flex-col justify-center items-center ">
                        <svg class="h-[176px] w-[196px] border-[3px] border-[#F9951E] hover:bg-[#F9951E]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#F9951E">
                            <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                        </svg>
                        <p class="text-[#F9951E] text-center text-[14px] font-bold">
                            INDIVIDUAL<br>CLIENT
                        </p>
                    </div>
                </router-link>
                <router-link to="/app/trading/customer-record/corporate">
                    <div class="flex flex-col justify-center items-center h-[176px] w-[196px] border-[3px] border-[#F9951E]">
                        <div class="h-[92px] w-[90px]">
                            <svg fill="none" stroke="#F9951E" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-[#F9951E] text-center text-[14px] font-bold">
                                CORPORATE<br>CLIENT
                            </p>
                        </div>
                    </div>
                </router-link>
            </div>
            <div class="flex justify-center">
                <BorderButton @click="(viewModalOpen = !viewModalOpen)" :buttonLabel="'CANCEL'" :buttonSize="'h-auto w-[120px]'" :buttonStyle="'border-2 border-black text-black'" :buttonPadding="'p-2'" :buttonHover="'hover:bg-black'"/>
            </div>
        </div>
    </ModalTwo>
</template>
<style scoped>
.indiv-client :hover{
    stroke: white;
}
</style>
