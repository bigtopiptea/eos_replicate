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
            CollectionDetailedTable: [],
            pagination: {
                current_page: 1,
            },
            labels:[
                {label:'DATE'},
                {label:'REF NO.'},
                {label:'SERVICES'},
                {label:'DESCRIPTION'},
                {label:'PRINCIPAL AMT.'},
                {label:'SERVICE FEE'},
                {label:'COST'},
                {label:'TAX'},
                {label:'PENALTY'},
                {label:'AMT. TO PAY'},
                {label:'AMT. ALLOCATED'},
                {label:'OUTSTANDING BALANCE'},
                {label:'NET OF EWT'},
                {label:'STATUS'},
            ],

        }
    },
    methods: {
        async getCollectionDetailedTable() {
            await axios.get(`/api/billers?page=${this.pagination.current_page}`)
                .then((response) => {
                    console.log(response.data);
                  this.CollectionDetailedTable = response.data.data;
                  this.pagination = response.data;
                })
                .catch((errors) => {

                })
        },
    },
}
</script>
<template>
    <div class="flex flex-col h-auto p-5">
        <!-- TABLE -->
        <div class="flex justify-between px-[20px]">
            <div class="flex gap-[100px] uppercase text-[11px] w-[40%]">
                <div class="flex flex-col gap-[5px]">
                    <div class="flex gap-[5px]">
                        <input type="checkbox" name="" id="">
                        <p>less ewt</p>
                    </div>
                    <div>
                        <p class="pl-[17px]">total ewt: -</p>
                    </div>
                </div>
                <div class="flex flex-col gap-[5px]">
                    <div class="flex gap-[10px]">
                        <p>total items selected:</p>
                        <p>7 items</p>
                    </div>
                    <div class="flex gap-[10px]">
                        <p>total amount selected:</p>
                        <p>PHP 1,058.40</p>
                    </div>
                </div>
            </div>
            <form class="flex gap-3 mb-[30px]">
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
                                <th class="flex items-center gap-[5px] py-2 px-1 uppercase tracking-wider text-center text-gray-900">
                                    <input type="checkbox" name="" id="">
                                    <a href="">ID</a>
                                </th>
                                <th v-for="label in labels" :key="label.label" scope="col"
                                    class="py-2 px-1 uppercase tracking-wider text-center text-gray-900">
                                    {{ label.label }}
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white font-light text-[10px]">
                            <tr class="divide-x divide-gray-200">
                                <td class="flex justify-center gap-[5px] hitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    <input type="checkbox" name="" id=""> 
                                    <a href="">1</a> 
                                </td>
                                <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">                            
                                    09/28/2022 10:55:09 aM
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                    LBC120626689PH
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
                                    135.00
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
                                   0.00
                                </td>
                                <td
                                    class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                   UNPAID
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <Pagination @paginate="getCollectionDetailedTable()" :pagination="pagination"
                :offset="1" class="mt-8" />
    </div>

</template>