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
            CollectionAllTable: [],
            pagination: {
                current_page: 1,
            },
            labels:[
                {label:'COUNT'},
                {label:'DATE'},
                {label:'SOA NO.'},
                {label:'REFERENCE NO.'},
                {label:'SERVICES'},
                {label:'DESCRIPTION'},
                {label:'CCY'},
                {label:'BENEFICIARY'},
                {label:'PRINCIPAL AMT.'},
                {label:'SERVICE FEE'},
                {label:'COST'},
                {label:'TAX'},
                {label:'PENALTY'},
                {label:'AMOUNT TO PAY'},
                {label:'AMOUNT ALLOCATED'},
                {label:'OUTSTANDING BALANCE'},
                {label:'STATUS'},
            ],

        }
    },
    methods: {
        async getCollectionAllTable() {
            await axios.get(`/api/billers?page=${this.pagination.current_page}`)
                .then((response) => {
                    console.log(response.data);
                  this.CollectionAllTable = response.data.data;
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
        <form class="flex self-end gap-3 mb-[30px]">
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
                                    <router-link to="/app/billing-collection/collection/payment" class="underline text-cyan-500" href="#">
                                        1
                                    </router-link>
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">                            
               
                                    09/28/2022 10:55:09 aM
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    <router-link to="/app/billing-collection/collection/payment" class="underline text-cyan-500" href="#">
                                        SOAOOOOOOOO077
                                    </router-link>
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
                                   16.20
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                   0.00
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                   151.20
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                   0.00
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                   151.20
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
        <Pagination @paginate="getCollectionAllTable()" :pagination="pagination"
                :offset="1" class="mt-8" />
    </div>

</template>