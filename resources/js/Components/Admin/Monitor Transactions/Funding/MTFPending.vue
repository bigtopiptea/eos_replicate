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
import Slideover from "@/Components/Misc/Slideover/Slideover.vue";

export default{

    name:'MTFPending',

    components:{
        DropDown,
        EditIcon,
        NormalButton,
        SearchIcon,
        InputLabel,
        ListIcon,
        DateInput,
        Pagination,
        Slideover,
    },

    data() {
        return {
            MTFPending: [],
            pagination: {
                current_page: 1,
            },
            viewDetailsOpen: false,  //Slideover
            viewDocumentsOpen: false,  //Slideover
            viewVerifyFundingOpen: false  //Slideover
        }
    },
    methods: {
        //Slideover
        viewDetailsToggle() {
            this.viewDetailsOpen = false;
        },
        viewDocumentsToggle() {
            this.viewDocumentsOpen = false;
        },
        viewVerifyFundingToggle() {
            this.viewVerifyFundingOpen = false;
        },
        async getMTFPending() {
            await axios.get(`/api/billers?page=${this.pagination.current_page}`)
                .then((response) => {
                    console.log(response.data);
                    this.MTFPending = response.data.data;
                    this.pagination = response.data;
                })
                .catch((errors) => {

                })
            },
        },
    }
</script>

<template>
    <!-- Main Content -->
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
                                class="p-1.5 px-3 uppercase h-[34px] bg-[#3E3E3E] ml-4  tracking-wider text-[10px]  text-white" />
                            </div>
                        </div>
                        <div class="left-side-col-2 space-y-3">
                            <DropDown label="bulk action"/>
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
                                    class="bg-gray-50 h-[34px] border border-r-0 border-[#EAEAEA] text-gray-900 font-light text-[10px] block w-full pl-10 p-2.5"
                                    placeholder="Search" required />
                            </div>
                            <NormalButton label="Go"
                            class="p-1.5 px-3 uppercase h-[34px] bg-[#F9951E] text-[10px] font-medium text-white" />
                            <NormalButton label="Export"
                            class="py-1.5 px-3 uppercase h-[34px] bg-[#3E3E3E] ml-2 mr-3 tracking-wider text-[10px] font-medium text-white" />
                        </form>
                    </div>
                </div>
            </div>
            <div class="overflow-hidden sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8 ">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-[#D7D7D7] font-medium text-[11px]">
                                <tr class="divide-x divide-gray-200">
                                    <th scope="col"
                                        class="py-2 px-1 uppercase tracking-wider  text-center whitespace-nowrap text-gray-900">
                                        <span>
                                        ID
                                        </span>
                                    </th>
                                    <th scope="col"
                                        class="py-2 px-1 uppercase tracking-wider  text-center whitespace-nowrap text-gray-900">
                                        DATE
                                    </th>
                                    <th scope="col"
                                        class="py-2 px-1 uppercase tracking-wider  text-center whitespace-nowrap text-gray-900">
                                        TYPE
                                    </th>
                                    <th scope="col"
                                        class="py-2 px-1 uppercase tracking-wider  text-center whitespace-nowrap text-gray-900">
                                        NAME
                                    </th>
                                    <th scope="col"
                                        class="py-2 px-1 uppercase tracking-wider  text-center whitespace-nowrap text-gray-900">
                                        BANK
                                    </th>
                                    <th scope="col"
                                        class="py-2 px-1 uppercase tracking-wider  text-center whitespace-nowrap text-gray-900">
                                        CURRENCY
                                    </th>
                                    <th scope="col"
                                        class="py-2 px-1 uppercase tracking-wider  text-center whitespace-nowrap text-gray-900">
                                        AMOUNT
                                    </th>
                                    <th scope="col"
                                        class="py-2 px-1 uppercase tracking-wider  text-center whitespace-nowrap text-gray-900">
                                        RATE
                                    </th>
                                    <th scope="col"
                                        class="py-2 px-1 uppercase tracking-wider  text-center whitespace-nowrap text-gray-900">
                                        NET AMOUNT
                                    </th>
                                    <th scope="col"
                                        class="py-2 px-1 uppercase tracking-wider  text-center whitespace-nowrap text-gray-900">
                                        WORKFLOW STATUS
                                    </th>
                                    <th scope="col"
                                        class="py-2 px-7 uppercase tracking-wider  text-center whitespace-nowrap text-gray-900">
                                        ACTION
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white text-[10px] font-light">
                                <tr class="divide-x divide-gray-200">
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        <a href="#" class="text-cyan-500 underline" @click="(viewDetailsOpen = !viewDetailsOpen)">
                                        01
                                        </a>
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1  tracking-wider">
                                        09/28/2022 10:55:09 AM
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1  tracking-wider">
                                        ACCOUNTING
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1  tracking-wider">
                                        CMT-09282022-0021
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1  tracking-wider">
                                        We Have Everything Distributor
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1  tracking-wider">
                                        php
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1  tracking-wider">
                                        10,000.00
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1  tracking-wider">
                                        1.00
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1  tracking-wider">
                                        10,000.00
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase py-2 px-1  tracking-wider">
                                        FOR VERIFICATION
                                    </td>
                                    <td
                                        class="whitespace-nowrap text-center uppercase  py-2 px-1  tracking-wider flex justify-between">
                                        <button @click="(viewDocumentsOpen = !viewDocumentsOpen)" type="submit">
                                            <img src="../../../../../assets/images/EyeIcon.png" alt="View Icon" class="h-5 w-5">
                                        </button>
                                        <button>
                                            <img src="../../../../../assets/images/RejectIcon.png" alt="Reject Icon" class="h-5 w-5">
                                        </button>
                                        <button  @click="(viewVerifyFundingOpen = !viewVerifyFundingOpen)" type="submit">
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
        <Pagination @paginate="getMTFPending()" :pagination="pagination"
            :offset="1" class="my-6"/>
    </div>

    <!-- Slideover (View Details) -->
    <Slideover :show="viewDetailsOpen" @close="viewDetailsToggle" :title="'VIEW DETAILS'">
        <div class="flex flex-col justify-between h-full pb-3">
            <div class="mx-10 h-auto">
                <div class="mt-14">
                    <div class="flex items-center text-xs w-full h-7 mb-2">
                        <label for="name" class="inline-flex items-center h-full w-5/12 px-2 text-left border-2 border-[#EAEAEA]">INVOICE NO.</label>
                        <input type="invoice-no" class="w-7/12 h-full bg-#ECECEC p-1 focus:z-10 focus:border-gray-500 focus:ring-gray-500 text-[#3E3E3E] text-center">
                    </div>
                    <div class="flex flex-col text-xs w-full h-7 mb-5">
                        <label for="supplier-name" class="h-full w-5/12 px-2 text-left text-[10px]">SUPPLIER NAME</label>
                        <input type="text" class="w-full h-8 bg-#ECECEC p-1 focus:z-10 focus:border-gray-500 focus:ring-gray-500 text-[#3E3E3E] text-center">
                    </div>
                    <div class="flex items-center text-xs w-full h-7 mb-2">
                        <label for="due-date" class="inline-flex items-center h-full w-5/12 px-2 text-left border-2 border-[#EAEAEA]">DUE DATE</label>
                        <input type="date" class="w-7/12 h-full bg-#ECECEC p-1 focus:z-10 focus:border-gray-500 focus:ring-gray-500 text-[#3E3E3E] text-center">
                    </div>
                    <div class="flex items-center text-xs w-full h-7 mb-2">
                        <label for="remarks" class="inline-flex items-center h-full w-5/12 px-2 text-left border-2 border-[#EAEAEA]">REMARKS</label>
                        <input type="text" class="w-7/12 h-full bg-#ECECEC p-1 focus:z-10 focus:border-gray-500 focus:ring-gray-500 text-[#3E3E3E] text-center">
                    </div>
                    <div class="flex items-center text-xs w-full h-7 mb-2">
                        <label for="amount" class="inline-flex items-center h-full w-5/12 px-2 text-left border-2 border-[#EAEAEA]">AMOUNT</label>
                        <input type="text" class="w-7/12 h-full bg-#ECECEC p-1 focus:z-10 focus:border-gray-500 focus:ring-gray-500 text-[#3E3E3E] text-center">
                    </div>
                    <div class="flex flex-col text-xs w-full  mb-5">
                        <label for="desription" class="w-5/12 px-2 text-left text-[10px]">DESCRIPTION</label>
                        <textarea rows="4" class="resize-none block p-2.5 h-24 w-full text-[10px] text-gray-900 bg-#ECECEC border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                    </div>
                </div>
            </div>
            <div class="flex justify-center">
                <button @click="(viewDetailsOpen = !viewDetailsOpen)" type="submit" class="py-1 px-5 text-[17px] font-medium bg-#3E3E3E text-white">CLOSE</button>
            </div>
        </div>
    </Slideover>

    <!-- Slideover (View Documents) -->
    <Slideover :show="viewDocumentsOpen" @close="viewDocumentsToggle" :title="'VIEW DOCUMENTS'" >
        <div class="flex flex-col justify-between h-full pb-3">
            <div class="mx-10 h-auto">
                <div class="flex gap-3 mt-10">
                    <PaperClipIcon/>
                    <div class="text-[14px]">
                        <p class="text-[#1F4583] underline"><a href="#">payment_request.pdf</a></p>
                        <p class="font-bold">
                            Date uploaded:
                            <span class="font-normal">09/28/2022 10:55:09 AM</span>
                        </p>
                        <p class="font-bold">
                            Uploaded by:
                            <span class="font-normal">SOLTES, CAROL</span>
                        </p>
                    </div>
                </div>
                <div class="flex gap-3 mt-10">
                    <PaperClipIcon/>
                    <div class="text-[14px]">
                        <p class="text-[#1F4583] underline"><a href="#">supporting_docs1.pdf</a></p>
                        <p class="font-bold">
                            Date uploaded:
                            <span class="font-normal">09/28/2022 10:55:09 AM</span>
                        </p>
                        <p class="font-bold">
                            Uploaded by:
                            <span class="font-normal">SOLTES, CAROL</span>
                        </p>
                    </div>
                </div>
                <div class="flex gap-3 mt-10">
                    <PaperClipIcon/>
                    <div class="text-[14px]">
                        <p class="text-[#1F4583] underline"><a href="#">supporting_docs2.pdf</a></p>
                        <p class="font-bold">
                            Date uploaded:
                            <span class="font-normal">09/28/2022 10:55:09 AM</span>
                        </p>
                        <p class="font-bold">
                            Uploaded by:
                            <span class="font-normal">SOLTES, CAROL</span>
                        </p>
                    </div>
                </div>


            </div>
            <div class="flex justify-center">
                <button @click="(viewDocumentsOpen = !viewDocumentsOpen)" type="submit" class="py-1 px-5 text-[17px] font-medium bg-#3E3E3E text-white">CLOSE</button>
            </div>
        </div>
    </Slideover>

    <!-- Slideover (Verify Funding) for Maker and Approver-->
    <Slideover :show="viewVerifyFundingOpen" @close="viewVerifyFundingToggle" :title="'VERIFY FUNDING'">
        <div class="flex flex-col justify-between h-full pb-3">
            <div class="mx-10 h-auto">
                <div class="mt-14">
                    <div class="flex items-center text-xs w-full h-7 mb-2">
                        <label for="name" class="inline-flex items-center h-full w-5/12 px-2 text-left border-2 border-[#EAEAEA]">INVOICE NO.</label>
                        <input type="invoice-no" class="w-7/12 h-full bg-#ECECEC p-1 focus:z-10 focus:border-gray-500 focus:ring-gray-500 text-[#3E3E3E] text-center">
                    </div>
                    <div class="flex flex-col text-xs w-full h-7 mb-5">
                        <label for="supplier-name" class="h-full w-5/12 px-2 text-left text-[10px]">SUPPLIER NAME</label>
                        <input type="text" class="w-full h-8 bg-#ECECEC p-1 focus:z-10 focus:border-gray-500 focus:ring-gray-500 text-[#3E3E3E] text-center">
                    </div>
                    <div class="flex items-center text-xs w-full h-7 mb-2">
                        <label for="due-date" class="inline-flex items-center h-full w-5/12 px-2 text-left border-2 border-[#EAEAEA]">DUE DATE</label>
                        <input type="date" class="w-7/12 h-full bg-#ECECEC p-1 focus:z-10 focus:border-gray-500 focus:ring-gray-500 text-[#3E3E3E] text-center">
                    </div>
                    <div class="flex items-center text-xs w-full h-7 mb-2">
                        <label for="remarks" class="inline-flex items-center h-full w-5/12 px-2 text-left border-2 border-[#EAEAEA]">REMARKS</label>
                        <input type="text" class="w-7/12 h-full bg-#ECECEC p-1 focus:z-10 focus:border-gray-500 focus:ring-gray-500 text-[#3E3E3E] text-center">
                    </div>
                    <div class="flex items-center text-xs w-full h-7 mb-2">
                        <label for="amount" class="inline-flex items-center h-full w-5/12 px-2 text-left border-2 border-[#EAEAEA]">AMOUNT</label>
                        <input type="text" class="w-7/12 h-full bg-#ECECEC p-1 focus:z-10 focus:border-gray-500 focus:ring-gray-500 text-[#3E3E3E] text-center">
                    </div>
                    <div class="flex flex-col text-xs w-full  mb-5">
                        <label for="desription" class="w-5/12 px-2 text-left text-[10px]">DESCRIPTION</label>
                        <textarea rows="4" class="resize-none block p-2.5 h-24 w-full text-[10px] text-gray-900 bg-#ECECEC border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                    </div>
                </div>
            </div>
            <div class="flex flex-col justify-between text-center mx-10">
                <h5 class="uppercase text-[15px] px-10">Are you sure you want to verify this transaction?</h5>
                <div class="flex justify-between mt-7">
                    <button @click="(viewVerifyFundingOpen = !viewVerifyFundingOpen)" type="submit" class="py-1 px-5 text-[17px]font-medium bg-#3E3E3E text-white">DECLINE</button>
                    <button type="submit" class="py-1 px-5 text-[17px] font-medium bg-#F9951E text-white">VERIFY</button>
                </div>
            </div>
        </div>
    </Slideover>

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
