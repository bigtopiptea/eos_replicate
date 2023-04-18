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
import ModalTwo from "@/Components/Misc/Modal/ModalTwo.vue";

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
        ModalTwo
    },

    data() {
        return {
            MTDPending: [],
            pagination: {
                current_page: 1,
            },
            viewModalOpen: false,
        }
    },
    methods: {
        async getMTDPending() {
            await axios.get(`/api/billers?page=${this.pagination.current_page}`)
                .then((response) => {
                    console.log(response.data);
                    this.MTDPending = response.data.data;
                    this.pagination = response.data;
                })
                .catch((errors) => {

                })
            },
        },
    }
</script>

<template>
    <div class="flex flex-col justify-between h-full w-auto mx-3 my-6 mb-3 ">
        <div>
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="flex items-end justify-between h-auto min-w-full -mx-10">
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
                        <div class="left-side-col-2 space-y-3">
                            <DropDown label="bulk action" />
                            <NormalButton label="Apply" class="bg-[#F9951E] h-[34px]  p-1.5 text-[10px] text-white px-3 uppercase" />
                        </div>
                    </div>
                        <div class="right-side flex h-20 ">
                        <form class="flex items-start">
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <SearchIcon />
                                </div>
                                <input type="text" id="simple-search"
                                    class="bg-gray-50 h-[34px] border border-r-0 border-[#EAEAEA] text-gray-900 text-[10px] block w-full pl-10 py-2 px-1.5"
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
                        <thead class="bg-[#D7D7D7] text-[11px] font-medium">
                            <tr class="divide-x divide-gray-200">
                                <th scope="col"
                                    class="py-2 px-1 whitespace-nowrap uppercase tracking-wider text-center  text-gray-900">
                                    ID
                                </th>
                                <th scope="col"
                                    class="py-2 px-1 whitespace-nowrap uppercase tracking-wider  text-center  text-gray-900">
                                    DATE
                                </th>
                                <th scope="col"
                                    class="py-2 px-1 whitespace-nowrap uppercase tracking-wider  text-center  text-gray-900">
                                    TYPE
                                </th>
                                <th scope="col"
                                    class="py-2 px-1 whitespace-nowrap uppercase tracking-wider  text-center  text-gray-900">
                                    REFERENCE NO.
                                </th>
                                <th scope="col"
                                    class="py-2 px-1 whitespace-nowrap uppercase tracking-wider  text-center  text-gray-900">
                                    BANK
                                </th>
                                <th scope="col"
                                    class="py-2 px-1 whitespace-nowrap uppercase tracking-wider  text-center  text-gray-900">
                                    CURRENCY
                                </th>
                                <th scope="col"
                                    class="py-2 px-1 whitespace-nowrap uppercase tracking-wider  text-center  text-gray-900">
                                    ITEMS
                                </th>
                                <th scope="col"
                                    class="py-2 px-1 whitespace-nowrap uppercase tracking-wider  text-center  text-gray-900">
                                    NET AMOUNT
                                </th>
                                <th scope="col"
                                    class="py-2 px-1 whitespace-nowrap uppercase tracking-wider  text-center  text-gray-900">
                                    WORKFLOW STATUS
                                </th>
                                <th scope="col"
                                    class="py-2 px-4 whitespace-nowrap uppercase tracking-wider  text-center  text-gray-900">
                                    ACTION
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white font-light text-[10px] text-center">
                            <tr class="divide-x divide-gray-200">
                                <td
                                    class="whitespace-nowrap  uppercase py-2 px-2   tracking-wider">
                                    <a class="underline text-cyan-500" href="#" @click="(viewModalOpen = !viewModalOpen)">
                                        01
                                    </a>
                                </td>
                                <td
                                    class="whitespace-nowrap uppercase py-2 px-1   tracking-wider">
                                    09/28/2022 11:00:09 PM
                                </td>
                                <td
                                    class="whitespace-nowrap  uppercase py-2 px-1   tracking-wider">
                                    PROCESSING
                                </td>
                                <td
                                    class="whitespace-nowrap  uppercase py-2 px-1   tracking-wider">
                                    CMT0-09282022-0006
                                </td>
                                <td
                                    class="whitespace-nowrap  uppercase py-2 px-1   tracking-wider">
                                    BDO OUT
                                </td>
                                <td
                                    class="whitespace-nowrap  uppercase py-2 px-1   tracking-wider">
                                    PHP
                                </td>
                                <td
                                    class="whitespace-nowrap  uppercase py-2 px-1   tracking-wider">
                                    524
                                </td>
                                <td
                                    class="whitespace-nowrap  uppercase py-2 px-1   tracking-wider">
                                    9,240,003.25
                                </td>
                                <td
                                    class="whitespace-nowrap  uppercase py-2 px-1   tracking-wider">
                                    FOR VERIFICATION
                                </td>
                                <td
                                    class="flex whitespace-nowrap uppercase justify-evenly py-2 px-1    tracking-wider">
                                    <button>
                                       <img src="../../../../../assets/images/PrintIcon.png" alt="Lists Icon" class="h-5 w-5">
                                    </button>
                                    <button>
                                       <img src="../../../../../assets/images/EyeIcon.png" alt="Lists Icon" class="h-5 w-5">
                                    </button>
                                    <button>
                                       <img src="../../../../../assets/images/RejectIcon.png" alt="Lists Icon" class="h-5 w-5">
                                    </button>
                                    <button>
                                       <img src="../../../../../assets/images/VerifyIcon.png" alt="Lists Icon" class="h-5 w-5">
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
        <Pagination @paginate="MTDPending()"  :pagination="pagination"
            :offset="1" class = "mb-6 mt-6"/>
    </div>

    <!-- Modal -->
    <ModalTwo :show="viewModalOpen" @close="viewModalToggle" :modalTitle="'VIEW DETAILS'" :heightModal="'h-[500px]'" :widthModal="'w-[1000px]'">
        <div class="flex flex-col justify-between mx-5 mb-5 h-full">
            <table class="min-w-full max-h-[450px] divide-y divide-gray-300 overflow-y-auto">
                <thead class="bg-[#D7D7D7] text-[11px] font-medium ">
                    <tr class="divide-x divide-gray-200">
                        <th scope="col"
                            class="py-2 px-1 uppercase tracking-wider text-center  text-gray-900">
                            REFERENCE NO.
                        </th>
                        <th scope="col"
                            class="py-2 px-1 uppercase tracking-wider text-center  text-gray-900">
                            BENEFICIARY
                        </th>
                        <th scope="col"
                            class="py-2 px-1 uppercase tracking-wider text-center  text-gray-900">
                            BANK
                        </th>
                        <th scope="col"
                            class="py-3.5 px-1 uppercase tracking-wider text-center  text-gray-900">
                            AMOUNT
                        </th>
                        <th scope="col"
                            class="py-2 px-1 uppercase tracking-wider text-center   text-gray-900">
                            COST
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white text-[10px] font-light">
                    <tr class="divide-x divide-gray-200">
                        <td
                            class="whitespace-nowrap space-x-3 uppercase py-2 px-1 tracking-wider">
                            <span>
                                redha-09282022-0001
                            </span>
                        </td>
                        <td
                            class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                            dela cruz, anna perez
                        </td>
                        <td
                            class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                            banco de oro
                        </td>
                        <td
                            class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                            25,000.00
                        </td>
                        <td
                            class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                            50.00
                        </td>                                              
                    </tr>
                    <tr class="divide-x divide-gray-200">
                        <td
                            class="whitespace-nowrap space-x-3 uppercase py-2 px-1 tracking-wider">
                            <span>
                                redha-09282022-0001
                            </span>
                        </td>
                        <td
                            class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                            dela cruz, anna perez
                        </td>
                        <td
                            class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                            banco de oro
                        </td>
                        <td
                            class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                            25,000.00
                        </td>
                        <td
                            class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                            50.00
                        </td>                                              
                    </tr>
                </tbody>
                <tfoot class="divide-y divide-gray-200 bg-white text-[11px] font-bold">
                    <tr>
                        <td class="whitespace-nowrap space-x-3 uppercase py-2 px-1 tracking-wider">
                            <span>
                                
                            </span>
                        </td>
                        <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                            
                        </td>
                        <td
                            class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                            TOTAL
                        </td>
                        <td
                            class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                            250,000,000.00
                        </td>
                        <td
                            class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                            26.00
                        </td>                                              
                    </tr>
                </tfoot>
            </table>
            <div class="flex justify-center gap-7">
                <button @click="(viewModalOpen = !viewModalOpen)"  type="submit" class="py-1 px-5 text-[17px]font-medium bg-#3E3E3E text-white">CLOSE</button>
            </div>
        </div>
    </ModalTwo>
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
