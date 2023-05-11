<script>
import NormalButton from '@/Components/Misc/Buttons/NormalButton.vue';
import EditIcon from '@/Components/Misc/Icons/EditIcon.vue';
import SearchIcon from '@/Components/Misc/Icons/SearchIcon.vue';
import Pagination from '@/Components/Misc/Pagination/Pagination.vue';
import ModalTwo from "@/Components/Misc/Modal/ModalTwo.vue";
import SolidButton from '../../../Misc/Buttons/SolidButton.vue';
import BorderButton from '../../../Misc/Buttons/BorderButton.vue';
export default {
    name: 'Break&Entry',
    components: { 
        SearchIcon, NormalButton, EditIcon, Pagination, ModalTwo,
        SolidButton, BorderButton
    },
    data() {
        return {
            BreakEntry: [],
            pagination: {
                current_page: 1,
            },
            viewModalOpen: false,

            labels:[
                {label:'REFERENCE NO.'},
                {label:'PROCESSED DATE'},
                {label:'VALUE DATE'},
                {label:'BANK'},
                {label:'CURRENCY'},
                {label:'ITEMS'},
                {label:'AMOUNT'},
                {label:'ACTION'},
            ]
        }
    },

    methods: {
        // Modal
        viewModalToggle() {
           this.viewModalOpen = false;
        },
        async getBreakEntry() {
            await axios.get(`/api/billers?page=${this.pagination.current_page}`)
                .then((response) => {
                    console.log(response.data);
                    this.BreakEntry = response.data.data;
                    this.pagination = response.data;
                })
                .catch((errors) => {

                })
        },
        createBreakEntry() {
           this.$router.push("");
        },
    },
    created() {
       this.getBreakEntry();
    }
}
</script>
<template>
    <div class="w-full h-auto bg-white">
        <div class=" sm:px-4 lg:px-0">
            <div class="flex flex-col">
                <div class="flex justify-end mb-8">
                    <div class="mt-4 sm:mt-0 sm:flex-none">
                        <div class="relative w-full">
                            <form class="flex items-center mr-2">
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <SearchIcon />
                                    </div>
                                    <input type="text" id="simple-search"
                                        class="bg-gray-50 h-[34px] border border-[#EAEAEA] text-gray-900 text-[10px] font-l block w-full pl-10 p-2.5"
                                        placeholder="Search" required />
                                </div>
                                <NormalButton label="Go"
                                    class="p-1.5 px-3 font-rubik-light uppercase h-[34px] bg-[#F9951E] text-[10px] text-white" />
                                <NormalButton label="Export"
                                    class="p-1.5 px-3 font-rubik-light uppercase h-[34px] bg-[#3E3E3E] ml-4 tracking-wider text-[10px] text-white" />
                            </form>
                        </div>
                    </div>
                </div>
                <div class="mb-8  overflow-x-auto sm:-mx-4 lg:-mx-6">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 mx-1 ">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead class="bg-[#D7D7D7] text-[10px] font-bold">
                                    <tr class="divide-x divide-gray-200">
                                        <th v-for="label in labels" :key="label.label" scope="col"
                                            class="py-2 px-1 uppercase tracking-wider text-center text-gray-900">
                                            {{ label.label }}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white text-[10px]">
                                    <!-- v-for="biller in billers" :key="biller.id" -->
                                    <tr class="divide-x divide-gray-200">
                                        <td
                                            class="whitespace-nowrap space-x-3 uppercase py-2 px-1 tracking-wider">
                                            <input type="checkbox" />
                                            <span>
                                                CMTO-092822-0002
                                            </span>
                                        </td>
                                        <td
                                            class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                            11-12-13
                                        </td>
                                        <td
                                            class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                            <!-- {{ biller.name }} -->
                                            CMTO-092822-0002
                                        </td>

                                        <td
                                            class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                            <!-- {{ biller.created_at }} -->
                                            OTC-API
                                        </td>
                                        <td
                                            class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                            <!-- {{ biller.created_at }} -->
                                            OTC-API
                                        </td>
                                        <td
                                            class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                            <!-- {{ biller.created_at }} -->
                                            OTC-API
                                        </td>
                                        <td
                                            class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                            <!-- {{ biller.created_at }} -->
                                            OTC-API
                                        </td>
                                        <td
                                            class="whitespace-nowrap uppercase text-center py-2 px-1 tracking-wider">
                                            <button @click="(viewModalOpen = !viewModalOpen)">
                                                <EditIcon class="text-[#F9951E] w-full" />
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <Pagination @paginate="getBreakEntry()" :pagination="pagination"
                    :offset="5" />
            </div>
        </div>
    </div>

    <!-- Modal -->
    <ModalTwo :show="viewModalOpen" @close="viewModalToggle">
        <div class="flex flex-col items-center justify-center h-full">
            <div class="text-center">
                <h1 class="text-[20px]">OTC API</h1>
                <p class="text-[15px]">NOT ALLOWED FOR ADVANCE FUNDING</p>
            </div>
            <div class="flex justify-center gap-7 mt-14">
                <BorderButton @click="(viewModalOpen = !viewModalOpen)"  :buttonLabel="'CANCEL'" :buttonPadding="'p-2'" :buttonTextColor="'text-[#3e3e3e]'" :buttonBorderColor="'border-[#3e3e3e]'" :buttonHover="'hover:bg-[#3E3E3E]'" :buttonTextSize="'text-[15px]'"/>
                <BorderButton :buttonLabel="'CONFIRM'" :buttonPadding="'p-2'" :buttonTextSize="'text-[15px]'"/>
            </div>
        </div>
    </ModalTwo>
</template>
