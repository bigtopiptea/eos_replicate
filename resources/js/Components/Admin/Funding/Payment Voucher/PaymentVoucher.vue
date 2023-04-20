<script setup>
import ChevRightIcon from "@/Components/Misc/Icons/ChevRightIcon.vue";
import EditIcon from "@/Components/Misc/Icons/EditIcon.vue";
import InputLabel from "@/Components/Misc/Input/InputLabel.vue";
import NormalButton from "@/Components/Misc/Buttons/NormalButton.vue";
import SearchIcon from "@/Components/Misc/Icons/SearchIcon.vue";
import ListIcon from "@/Components/Misc/Icons/ListIcon.vue";

</script>

<script>


import Pagination from "@/Components/Misc/Pagination/Pagination.vue";
import TabNav from "@/Components/Misc/Tabs/TabNav.vue";
import Tab from "@/Components/Misc/Tabs/Tab.vue";
import axios from "axios";


export default{

    name:'Payment Voucher',

    components:{
    Tab, TabNav,
    EditIcon,
    NormalButton,
    SearchIcon,
    InputLabel,
    ListIcon,
    Pagination,
},

    data() {
        return {
            PaymentVoucher: [],
            pagination: {
                current_page: 1,
            },

            selected: "Pending",
            isOpen: true,
            // rates: [],
            // selected: '',
        }
    },
    methods: {
        async getPaymentVoucher() {
            await axios.get(`/api/billers?page=${this.pagination.current_page}`)
                .then((response) => {
                    console.log(response.data);
                    this.PaymentVoucher = response.data.data;
                    this.pagination = response.data;
                })
                .catch((errors) => {

                })
            },

        setSelected(tab) {
        this.selected = tab;
        },

        async getRate(){
            await axios.get('/api/rates/cmt/list')
                .then((response) => {
                    this.rates = response.data;
                })
                .catch((errors) => [
                ])
        },
    },
}
</script>

<template>

<div class="border m-3 bg-white border-white shadow-md ">
    <TabNav :tabs="['Pending',  'Approval History' ]" :selected="selected" @selected="setSelected" :setBorder="'border-[#EE3E2C]'" :setHover="'hover:bg-[#EE3E2C] '" :setSelectedBg="'bg-[#EE3E2C] text-white'">
        <Tab :isSelected="selected === 'Pending'" >
            <div :show="mainContentShow" class=" h-full  overflow-x-hidden">
               <div class="inline-block min-w-full align-middle md:px-6 lg:px-8">
                    <div class="h-auto min-w-full -mx-6 mt-4">
                        <div class="flex">
                            <form class="flex items-end">
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <SearchIcon/>
                                    </div>
                                    <input type="text" id="simple-search"
                                        class="bg-gray-50 h-[34px] border border-r-0 border-[#EAEAEA] text-gray-900 text-[10px] block w-full pl-10 p-2.5"
                                        placeholder="Search" required />
                                </div>
                                <NormalButton label="Go"
                                class="p-1.5 px-3 uppercase h-[34px] bg-[#F9951E] text-[10px]  text-white" />
                            </form>
                        </div>
                    </div>
                </div>
                <div class="overflow-hidden -mx-3 sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8 ">
                        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 m-2 ">
                            <table class="min-w-full divide-y divide-gray-300 text-xs overflow-x-scroll">
                                <thead class="bg-[#D7D7D7] font-medium text-[11px] whitespace-nowrap">
                                    <tr class="divide-x divide-gray-200">
                                        <th scope="col"
                                            class="py-2 px-1 uppercase tracking-wider  text-center   text-gray-900">
                                            pv no.
                                        </th>
                                        <th scope="col"
                                            class="py-2 px-1 uppercase tracking-wider  text-center   text-gray-900">
                                            date
                                        </th>
                                        <th scope="col"
                                            class="py-2 px-1 uppercase tracking-wider  text-center   text-gray-900">
                                            invoice no.
                                        </th>
                                        <th scope="col"
                                            class="py-2 px-1 uppercase tracking-wider  text-center   text-gray-900">
                                            supplier
                                        </th>
                                        <th scope="col"
                                            class="py-2 px-1 uppercase tracking-wider  text-center   text-gray-900">
                                            apv amount
                                        </th>
                                        <th scope="col"
                                            class="py-2 px-1 uppercase tracking-wider  text-center   text-gray-900">
                                            amount paid
                                        </th>
                                        <th scope="col"
                                            class="py-2 px-1 uppercase tracking-wider  text-center   text-gray-900">
                                            balance
                                        </th>
                                        <th scope="col"
                                            class="py-2 px-1 uppercase tracking-wider  text-center   text-gray-900">
                                            due date
                                        </th>
                                        <th scope="col"
                                            class="py-2 px-1 uppercase tracking-wider  text-center   text-gray-900">
                                            ACTION
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white font-light text-[10px]">
                                    <tr class="divide-x divide-gray-200">
                                        <td
                                            class="whitespace-nowrap text-center uppercase py-2 px-1  tracking-wider">
                                            <a  class="underline text-cyan-500" href="#">
                                                01
                                            </a>
                                        </td>
                                        <td
                                            class="whitespace-nowrap text-center uppercase py-2 px-1  tracking-wider">
                                            09/28/2022 12:00:05 PM
                                        </td>
                                        <td
                                            class="whitespace-nowrap text-center uppercase py-2 px-1   tracking-wider">
                                            INV000000001
                                        </td>
                                        <td
                                            class="whitespace-nowrap text-center uppercase py-2 px-1   tracking-wider">
                                            INKLINE OFFICE SOLUTIONS INC.
                                        </td>
                                        <td
                                            class="whitespace-nowrap text-center uppercase py-2 px-1   tracking-wider">
                                            10,000.00
                                        </td>
                                        <td
                                            class="whitespace-nowrap text-center uppercase py-2 px-1   tracking-wider">
                                            -
                                        </td>
                                        <td
                                            class="whitespace-nowrap text-center uppercase py-2 px-1   tracking-wider">
                                            10,000.00
                                        </td>
                                        <td
                                            class="whitespace-nowrap text-center uppercase py-2 px-1  tracking-wider">
                                            10/01/2022 12:00:00 AM
                                        </td>
                                        <td class="whitespace-nowrap uppercase text-center py-2 px-1  tracking-wider">
                                            <router-link to="/app/funding/payment-voucher" class="flex justify-center">

                                                <img src="../../../../../assets/images/EditIcon.png" alt="Edit Icon" class="h-5 w-5">
                                            </router-link>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <Pagination @paginate="getPaymentVoucher()"  :pagination="pagination"
                        :offset="1" class="mt-8" />

            </div>
            <router-view></router-view>
        </Tab>
    </TabNav>
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
