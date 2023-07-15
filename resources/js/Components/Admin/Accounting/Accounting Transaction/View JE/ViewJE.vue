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
import DropDown from '@/Components/Misc/Dropdown/Dropdown.vue';

export default {

    name:'InventoryLogs',

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
            InventoryLogs: [],
            pagination: {
                current_page: 1,
            },

                labels: [
                { label: 'Department' },
                { label: 'Type'},
                { label: 'Reference No.' },
                { label: 'Date'},
                { label: 'Account' },
                { label: 'Particulars' },
                { label: 'Debit' },
                { label: 'Credit' },
            ],
            isSearched:false,
            isHovered:false,
        }
    },
    methods: {


        async getInventoryLogs() {
            await axios.get(`/api/billers?page=${this.pagination.current_page}`)
                .then((response) => {
                    console.log(response.data);
                    this.InventoryLogs = response.data.data;
                    this.pagination = response.data;
                })
                .catch((errors) => {

                })
            },
        },
    }
</script>

<template>
 <div class="w-full min-h-screen  max-h-auto bg-white px-3 py-5  ">
    <div class="inline-block min-w-full align-middle">
        <div class="flex justify-end h-full min-w-full ">
            <div class="right-side mt-[5px]">
                <form class="flex items-start gap-3">
                    <div class="flex">
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <SearchIcon />
                            </div>
                            <input type="text" id="simple-search"
                            class="bg-gray-50 h-[34px] border border-r-0 border-[#EAEAEA] text-gray-900 text-[10px] font-light block w-full pl-10 p-2.5"
                            placeholder="Search" required />
                        </div>
                        <NormalButton label="Go"
                        class="p-1.5 px-3 uppercase h-[34px] bg-[#F9951E] text-[10px] text-white" />
                    </div>
                    <NormalButton @click="(isSearched = !isSearched)" label="Export"
                    class="p-1.5 px-3 uppercase h-[34px] bg-[#3E3E3E] tracking-wider text-[10px] font-medium text-white" />
                </form>
            </div>
        </div>
    </div>
    <!-- Divider -->
    <div>
        <div class="border w-full my-5"/>
    </div>

    <!-- table -->
    <div v-if="isSearched" class="min-w-full py-3  align-middle ">
        <div class="relative h-[360px]">
            <div class="shadow ring-1 ring-black ring-opacity-5 overflow-auto absolute inset-x-0 min-h-auto max-h-full">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead class="bg-[#D7D7D7] font-medium text-[11px] whitespace-nowrap sticky top-0">
                        <tr  class="divide-x divide-gray-200">
                            <th v-for="label in labels" :key="label.label" scope="col"
                            class="py-1 px-2 uppercase tracking-wider text-center text-gray-900 w-[13%]">
                            {{ label.label }}
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white font-light text-[10px] ">
                        <tr class="divide-x divide-gray-200">
                            <td class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                Operations
                            </td>
                            <td class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                Cancellation
                            </td>
                            <td class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                OERI-0001
                            </td>
                            <td class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                09/28/2022 08:21:04 AM
                            </td>
                            <td class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                AR - FUNDING BDO PHP
                            </td>
                            <td class="truncate whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider max-w-[200px]" >
                                TO BOOK CREDIT BACK FOR BDO UNDER REF. NO. OERO 0001 0001 0011
                            </td>
                            <td class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                25,000.13
                            </td>
                            <td class="whitespace-nowrap text-center uppercase py-1 px-2 tracking-wider">
                                0.00
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <Pagination @paginate="getInventoryLogs()" :pagination="pagination"
            :offset="1" class="mt-8" />
    </div>
    <div v-else class="flex flex-col items-center justify-center py-20">
        <img src="../../../../../../assets/images/no-records-img.png" alt="" class="h-[200px] w-[230px]">
        <p class="uppercase text-center text-[16px] font-semibold">no records to display</p>
    </div>
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
