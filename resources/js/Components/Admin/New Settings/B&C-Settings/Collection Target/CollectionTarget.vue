<template>
    <div class="min-h-screen max-h-auto w-full bg-white px-5 py-8">
        <div class="flex justify-between items-end h-full min-w-full mb-[20px]">
            <div class="flex justify-start flex-col">
                <div class="flex items-end gap-3">
                    <div>
                        <CheckboxSelectMenu :label="'Year'"  :placeholder="'Select Year'" :options="yearsOption"/>
                    </div>
                    <div>
                        <NormalButton label="Filter" class="py-[3px] px-6 uppercase h-[28px] bg-[#3E3E3E] tracking-wider text-[10px] text-white" />
                    </div>
                </div>
            </div>
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
                    <NormalButton label="Export"
                    class="p-1.5 px-3 uppercase h-[34px] bg-[#3E3E3E]   tracking-wider text-[10px] font-medium text-white" />
                </form>
            </div>
        </div>
        <div class="min-w-full py-2 align-middle">
            <div class="relative h-[360px]">
                <div class="shadow ring-1 ring-black ring-opacity-5 overflow-auto absolute inset-x-0 min-h-auto max-h-full">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-[#EAEAEA] font-medium text-[11px] whitespace-nowrap sticky top-0">
                            <tr class="divide-x divide-gray-200">
                                <th v-for="label in labels" :key="label.label" scope="col"
                                    class="py-2 px-1 uppercase tracking-wider text-center text-gray-900">
                                    {{ label.label }}
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white font-light text-[10px]">
                            <tr class="divide-x divide-gray-200">
                                <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    2022
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">      
                                    december                                     
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    php 
                                    <span v-show="!isEdit">
                                        5,500,000.00
                                    </span>
                                    <span v-show="isEdit">
                                        <input type="text" class="px-1 py-[3px] border border-[#D7D7D7]" placeholder="-">
                                    </span>
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    09/28/2022 10:55:09 aM
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    ALFARO, LECEL PEREZ
                                </td>
                                <td
                                    class="flex justify-center whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    <button class="tooltip tooltip-left" data-tip="edit">
                                        <img  v-show="!isEdit" @click="isEdit = true" class="w-6 h-5" src="../../../../../../assets/images/EditIconTwo.png" alt="Edit Icon">
                                    </button>
                                    <button class="tooltip tooltip-left" data-tip="verify">
                                        <img v-show="isEdit" @click="isEdit = false"  class="w-5 h-5" src="../../../../../../assets/images/VerifyIcon.png" alt="Verify icon">
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <Pagination @paginate="getCollectionTarget()" :pagination="pagination"
                :offset="1" class="mt-8" />
    </div>
</template>
<script>
import CheckboxSelectMenu from '@/Components/Misc/Select Menu/CheckboxSelectMenu.vue'
import DateInput from "@/Components/Misc/Input/DateInput.vue";
import NormalButton from "@/Components/Misc/Buttons/NormalButton.vue";
import BorderButton from '@/Components/Misc/Buttons/BorderButton.vue';
import SearchIcon from '@/Components/Misc/Icons/SearchIcon.vue';
import Pagination from "@/Components/Misc/Pagination/Pagination.vue";
export default {
    components:{
        CheckboxSelectMenu, DateInput, NormalButton,
        BorderButton, SearchIcon, Pagination
    },
    data(){
        return{
            CollectionTarget: [],
            pagination: {
                current_page: 1,
            },
            labels:[
                {label:'YEAR'},
                {label:'MONTH'},
                {label:'AMOUNT'},
                {label:'DATE & TIME UPDATED'},
                {label:'UPDATED BY'},
                {label:'ACTION'},
            ],
            yearsOption:[
                {label: '2020', value: '2020'},
                {label: '2021', value: '2021'},
                {label: '2022', value: '2022'},
                {label: '2023', value: '2023'},
                {label: '2024', value: '2024'},
            ],
            isEdit: false
        }
    },
    methods: {
        async getCollectionTarget() {
            await axios.get(`/api/billers?page=${this.pagination.current_page}`)
                .then((response) => {
                    console.log(response.data);
                  this.CollectionTarget = response.data.data;
                  this.pagination = response.data;
                })
                .catch((errors) => {

                })
        },
    },
}
</script>
