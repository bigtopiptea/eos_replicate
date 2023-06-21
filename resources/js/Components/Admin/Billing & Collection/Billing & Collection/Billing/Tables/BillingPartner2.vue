<script>
import Pagination from "@/Components/Misc/Pagination/Pagination.vue";
import CheckboxSelectMenu from "@/Components/Misc/Select Menu/CheckboxSelectMenu.vue";
import NormalButton from '@/Components/Misc/Buttons/NormalButton.vue'
import SearchIcon from "@/Components/Misc/Icons/SearchIcon.vue";
export default{
    components:{
        Pagination, CheckboxSelectMenu, NormalButton, SearchIcon
    },
    data() {
        return {
            BillingTable2: [],
            pagination: {
                current_page: 1,
            },
            labels:[
                {label:'COUNT'},
                {label:'DATE'},
                {label:'REFERENCE NO.'},
                {label:'SERVICES'},
                {label:'SUB-TYPE'},
                {label:'CCY'},
                {label:'PRINCIPAL AMT.'},
                {label:'RATE'},
                {label:' GROSS AMT.'},
                {label:'FEE'},
                {label:'NET AMT.'},
                {label:'AMOUNT TO PAY'},
            ],

        }
    },
    props:{
        StartDate:{
            type: Date,
            default: 'MM/DD/YYYY'
        },
        EndDate:{
            type: Date,
            default: 'MM/DD/YYYY'
        },
    },
    methods: {
        async getBillingTable2() {
            await axios.get(`/api/billers?page=${this.pagination.current_page}`)
                .then((response) => {
                    console.log(response.data);
                  this.BillingTable2 = response.data.data;
                  this.pagination = response.data;
                })
                .catch((errors) => {

                })
        },
    },
}
</script>
<template>
    <div class="flex flex-col h-auto pb-10">
        <!-- TABLE -->
        <div class="flex justify-between mb-3 ">
            <div class="flex items-center ">
                <h1 class="text-[12px]">SEPTEMBER 2022 | SOA NO. <span class="cursor-pointer text-cyan-500"> SOAOOOOOOOO91 </span></h1>
            </div>
                <form class="flex gap-3 ">
                    <div class="flex">
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <SearchIcon />
                        </div>
                        <input type="text" id="simple-search"
                        class="bg-gray-50 h-[34px] border border-r-0 border-[#EAEAEA] text-gray-900 text-[10px] block w-full pl-10 py-2 px-1.5"
                        placeholder="Search" required />
                    </div>
                    <NormalButton label="Go"
                    class="p-1.5 px-3 uppercase h-[34px] bg-[#F9951E] text-[10px] text-white" />
                </div>
                <NormalButton label="Export"
                class="p-1.5 px-3 uppercase h-[34px] bg-[#3E3E3E] tracking-wider text-[10px] text-white" />
            </form>
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
                                    1
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">

                                    09/28/2022 10:55:09 aM
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                        SOAOOOOOOOO077
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    OPT-LBC-1201
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                     LBC
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    COURIER CHARGES
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    PHP
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    DELA CRUZ, JUAN CRUZ
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                   135.50
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                   67.20
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                   84.00
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                   OPEN
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <Pagination @paginate="getBillingTable2()" :pagination="pagination"
                :offset="1" class="mt-8" />
    </div>

</template>
