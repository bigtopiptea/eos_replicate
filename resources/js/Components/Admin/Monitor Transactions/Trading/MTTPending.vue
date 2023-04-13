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

export default{

    name:'DistributionSummary',

    components:{
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
            distributionSummary: [],
            pagination: {
                current_page: 1,
            }

        }
    },
    methods: {
        async getDistributionSummary() {
            await axios.get(`/api/billers?page=${this.pagination.current_page}`)
                .then((response) => {
                    console.log(response.data);
                    this.distributionSummary = response.data.data;
                    this.pagination = response.data;
                })
                .catch((errors) => {

                })
            },
        },
    }
</script>

<template>
    <div class="flex flex-col justify-between h-full w-auto mx-3 my-6 mb-3">
        <div>
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="flex items-end justify-between h-auto min-w-full -mx-10">
                    <div class="flex justify-start flex-col space-x-3">
                        <div class="flex items-end left-side-col-1">
                            <div>
                                <DateInput label="Start Date" />
                            </div>
                            <div>
                                <DateInput label="End Date" />
                            </div>
                            <div>
                                <NormalButton label="Filter"
                                class="p-1.5 px-3 uppercase h-[40px] bg-[#3E3E3E] ml-4  tracking-wider text-sm font-medium text-white" />
                            </div>
                        </div>
                        <div class="left-side-col-2 space-y-3">
                            <DropDown label="bulk action"/>
                            <NormalButton label="Apply" class="bg-[#F9951E] h-[34px]  p-1.5 text-sm text-white px-3 uppercase" />
                        </div>
                    </div>
                        <div class="right-side flex h-20 ">
                        <form class="flex items-start">
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <SearchIcon />
                                </div>
                                <input type="text" id="simple-search"
                                    class="bg-gray-50 h-[34px] border border-r-0 border-[#EAEAEA] text-gray-900 text-sm block w-full pl-10 p-2.5"
                                    placeholder="Search" required />
                            </div>
                            <NormalButton label="Go"
                            class="p-1.5 px-3 uppercase h-[34px] bg-[#F9951E] text-sm font-medium text-white" />
                            <NormalButton label="Export"
                            class="py-1.5 px-3 uppercase h-[34px] bg-[#3E3E3E] ml-2 mr-3 tracking-wider text-sm font-medium text-white" />
                        </form>
                    </div>
                </div>
            </div>
            <div class="overflow-hidden sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8 ">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-[#D7D7D7]">
                                <tr class="divide-x divide-gray-200">
                                    <th scope="col"
                                        class="py-3.5 px-1 space-x-3 uppercase tracking-wider font-rubik-light text-center text-xs font-bold text-gray-900">
                                        <span>
                                        ID
                                        </span>
                                    </th>
                                    <th scope="col"
                                        class="py-3.5 px-1 uppercase tracking-wider font-rubik-light text-center text-xs font-bold text-gray-900">
                                        DATE
                                    </th>
                                    <th scope="col"
                                        class="py-3.5 px-1 uppercase tracking-wider font-rubik-light text-center text-xs font-bold text-gray-900">
                                        TYPE
                                    </th>
                                    <th scope="col"
                                        class="py-3.5 px-1 uppercase tracking-wider font-rubik-light text-center text-xs font-bold text-gray-900">
                                        NAME
                                    </th>
                                    <th scope="col"
                                        class="py-3.5 px-1 uppercase tracking-wider font-rubik-light text-center text-xs font-bold text-gray-900">
                                        BANK
                                    </th>
                                    <th scope="col"
                                        class="py-3.5 px-1 uppercase tracking-wider font-rubik-light text-center text-xs font-bold text-gray-900">
                                        CURRENCY
                                    </th>
                                    <th scope="col"
                                        class="py-3.5 px-1 uppercase tracking-wider font-rubik-light text-center text-xs font-bold text-gray-900">
                                        AMOUNT
                                    </th>
                                    <th scope="col"
                                        class="py-3.5 px-1 uppercase tracking-wider font-rubik-light text-center text-xs font-bold text-gray-900">
                                        RATE
                                    </th>
                                    <th scope="col"
                                        class="py-3.5 px-1 uppercase tracking-wider font-rubik-light text-center text-xs font-bold text-gray-900">
                                        NET AMOUNT
                                    </th>
                                    <th scope="col"
                                        class="py-3.5 px-1 uppercase tracking-wider font-rubik-light text-center text-xs font-bold text-gray-900">
                                        WORKFLOW STATUS
                                    </th>
                                    <th scope="col"
                                        class="py-3.5 px-7 uppercase tracking-wider font-rubik-light text-center text-xs font-bold text-gray-900">
                                        ACTION
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                <tr class="divide-x divide-gray-200">
                                    <td
                                        class="whitespace-nowrap space-x-3 uppercase p-2 text-xs text-center font-rubik-light tracking-wider">
                                        <span>
                                        01
                                        </span>
                                    </td>
                                    <td
                                        class="whitespace-normal text-center uppercase p-2 text-xs font-rubik-light tracking-wider">
                                        09/28/2022 10:55:09 AM
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase p-2 text-xs font-rubik-light tracking-wider">
                                        ACCOUNTING
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase p-2 text-xs font-rubik-light tracking-wider">
                                        CMT-09282022-0021
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase p-2 text-xs font-rubik-light tracking-wider">
                                        We Have Everything Distributor
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase p-2 text-xs font-rubik-light tracking-wider">
                                        php
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase p-2 text-xs font-rubik-light tracking-wider">
                                        10,000.00
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase p-2 text-xs font-rubik-light tracking-wider">
                                        1.00
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase p-2 text-xs font-rubik-light tracking-wider">
                                        10,000.00
                                    </td>
                                    <td
                                        class="whitespace-normal text-center uppercase p-2 text-xs font-rubik-light tracking-wider">
                                        FOR VERIFICATION
                                    </td>
                                    <td
                                        class="whitespace-nowrap uppercase text-center p-2 text-xs font-rubik-light tracking-wider flex justify-between">
                                        <button>
                                            <img src="../../../../../assets/images/EyeIcon.png" alt="View Icon" class="h-5 w-5">
                                        </button>
                                        <button>
                                            <img src="../../../../../assets/images/RejectIcon.png" alt="Reject Icon" class="h-5 w-5">
                                        </button>
                                        <button>
                                            <img src="../../../../../assets/images/VerifyIcon.png" alt="Verify Icon" class="h-5 w-5">
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
         </div>
        <Pagination @paginate="getDistributionSummary()" :pagination="pagination"
            :offset="1" class="mb-6"/>
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
