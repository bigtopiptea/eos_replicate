<script>
import Pagination from "@/Components/Misc/Pagination/Pagination.vue";
import CheckboxSelectMenu from "@/Components/Misc/Select Menu/CheckboxSelectMenu.vue";
export default{
    components:{
        Pagination, CheckboxSelectMenu
    },
    data() {
        return {
            StatusReport: [],
            pagination: {
                current_page: 1,
            },
            labels:[
                {label:'DATE'},
                {label:'REFERENCE NO.'},
                {label:'TRANSACTION TYPE'},
                {label:'REMITTER NAME'},
                {label:'BENEFICIARY'},
                {label:'PHP AMOUNT'},
                {label:'STATUS'},
            ],

        }
    },
    methods: {
        async getStatusReport() {
            await axios.get(`/api/billers?page=${this.pagination.current_page}`)
                .then((response) => {
                    console.log(response.data);
                  this.StatusReport = response.data.data;
                  this.pagination = response.data;
                })
                .catch((errors) => {

                })
        },
    },
}
</script>
<template>
    <div class="overflow-hidden w-full px-3">
        <div class="inline-block min-w-full  align-middle ">
            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 m-2 ">
                <table class="min-w-full divide-y divide-gray-300 overflow-x-scroll">
                    <thead class="bg-[#D7D7D7] font-medium text-[11px] whitespace-nowrap">
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
                                09/28/2022 10:55:09 aM
                            </td>
                            <td class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">                            
                                <a class="underline text-cyan-500" href="#">
                                    OERI-0000
                                </a>
                            </td>
                            <td
                                class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                OTC - CASH PICKUP ANYWHERE
                            </td>
                            <td
                                class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                DELA CRUZ, JUAN CRUZ
                            </td>
                            <td
                                class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                DELA CRUZ, ANNIE PEREZ
                            </td>
                            <td
                                class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                1,500.00
                            </td>
                            <td
                                class="whitespace-nowrap text-center uppercase py-2 px-1 tracking-wider">
                                claimed
                            </td>
                        </tr>
                    </tbody>
                    <tfoot class="text-[11px] font-semibold bg-[#D7D7D7]">
                        <tr>
                            <td colspan="7" class="whitespace-nowrap text-right uppercase py-2 px-1 tracking-wider">
                                TOTAL PAYMENT
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <Pagination @paginate="getStatusReport()" :pagination="pagination"
            :offset="1" class="mt-8" />
</template>