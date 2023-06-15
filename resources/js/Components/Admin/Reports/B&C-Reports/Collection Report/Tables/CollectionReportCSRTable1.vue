<script>
import Pagination from "@/Components/Misc/Pagination/Pagination.vue";
import CheckboxSelectMenu from "@/Components/Misc/Select Menu/CheckboxSelectMenu.vue";
export default{
    components:{
        Pagination, CheckboxSelectMenu
    },
    data() {
        return {
            CSRTable1: [],
            pagination: {
                current_page: 1,
            },
            labels:[
                {label:'CLIENT NAME'},
                {label:'AMOUNT TO PAY'},
                {label:'AMOUNT PAID'},
                {label:'OUTSTANDING BALANCE'},
                {label:'PAYMENT PERCENTAGE'},
                {label:'STATUS'},
            ],

        }
    },
    props:{
        TypeOfReport:{
            type: String,
            default: ''
        },
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
        async getCSRTable1() {
            await axios.get(`/api/billers?page=${this.pagination.current_page}`)
                .then((response) => {
                    console.log(response.data);
                  this.CSRTable1 = response.data.data;
                  this.pagination = response.data;
                })
                .catch((errors) => {

                })
        },
    },
}
</script>
<template>
    <div class="flex flex-col h-auto px-3 py-5">
        <div class="flex flex-col justify-between uppercase mb-[30px]">
            <h2 class="text-[16px] text-center font-semibold">Optimum Exchange Remit Inc.</h2>
            <div class="text-center mt-[20px]">
                <h3 class="text-[13px] font-semibold">{{ TypeOfReport }}</h3>
                <p class="text-[12px]">{{ StartDate }} - {{ EndDate }}</p>
            </div>
        </div>
        <!-- TABLE -->
        <div class="min-w-full py-2 align-middle px-8">
            <div class="relative h-[360px]">
                <div class="shadow ring-1 ring-black ring-opacity-5 overflow-auto absolute inset-x-0 min-h-auto max-h-full">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-[#EDEDED] font-medium text-[11px] whitespace-nowrap sticky top-0">
                            <tr class="divide-x divide-gray-200">
                                <th v-for="label in labels" :key="label.label" scope="col"
                                    class="px-2 py-2 uppercase tracking-wider text-center text-gray-900">
                                    {{ label.label }}
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white font-light text-[10px]">
                            <tr class="divide-x divide-gray-200">
                                <td class="whitespace-nowrap text-right uppercase px-2 py-2 tracking-wider" scope="col">
                                    AFFILIATE 1
                                </td>
                                <td class="whitespace-nowrap text-right uppercase px-2 py-2 tracking-wider" scope="col">
                                    156,329.12
                                </td>
                                <td
                                    class="whitespace-nowrap text-right uppercase px-2 py-2 tracking-wider" scope="col">
                                    44,044.56
                                </td>
                                <td
                                    class="whitespace-nowrap text-right uppercase px-2 py-2 tracking-wider" scope="col">
                                    112,284.56
                                </td>
                                <td
                                    class="whitespace-nowrap text-right uppercase px-2 py-2 tracking-wider" scope="col">
                                    28%
                                </td>
                                <td
                                    class="whitespace-nowrap text-right uppercase px-2 py-2 tracking-wider" scope="col">
                                    UNSETTLED
                                </td>
                            </tr>
                        </tbody>
                        <tfoot class="text-[10px]  bg-[#EDEDED]">
                            <tr>
                                <td scope="col" class="whitespace-nowrap text-right uppercase px-2 py-2 tracking-wider">

                                </td>
                                <td scope="col" class="whitespace-nowrap text-right uppercase px-2 py-2 tracking-wider">
                                    156,329.12
                                </td>
                                <td scope="col" class="whitespace-nowrap text-right uppercase px-2 py-2 tracking-wider">
                                    44,044.56
                                </td>
                                <td scope="col" class="whitespace-nowrap text-right uppercase px-2 py-2 tracking-wider">
                                    112,284.56
                                </td>
                                <td scope="col" class="whitespace-nowrap text-right uppercase px-2 py-2 tracking-wider">
                                    28%
                                </td>
                                <td scope="col" class="whitespace-nowrap text-right uppercase px-2 py-2 tracking-wider">

                                </td>

                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <Pagination @paginate="getCSRTable1()" :pagination="pagination"
                :offset="1" class="mt-8" />
    </div>

</template>
